<?php  
    if($_POST){
        // Obtenemos los datos en formato variable1=valor1&variable2=valor2&...
        $raw_post_data = file_get_contents('php://input');
 
        // Los separamos en un array
        $raw_post_array = explode('&',$raw_post_data);
 
        // Separamos cada uno en un array de variable y valor
        $myPost = array();
        foreach($raw_post_array as $keyval){
            $keyval = explode("=",$keyval);
            if(count($keyval) == 2)
                $myPost[$keyval[0]] = urldecode($keyval[1]);
        }
 
        // Nuestro string debe comenzar con cmd=_notify-validate
        $req = 'cmd=_notify-validate';
        if(function_exists('get_magic_quotes_gpc')){
            $get_magic_quotes_exists = true;
        }
        foreach($myPost as $key => $value){
            // Cada valor se trata con urlencode para poder pasarlo por GET
            if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
                $value = urlencode(stripslashes($value)); 
            } else {
                $value = urlencode($value);
            }
 
            //Añadimos cada variable y cada valor
            $req .= "&$key=$value";
        }

        $ch = curl_init('https://www.sandbox.paypal.com/cgi-bin/webscr');   // Esta URL debe variar dependiendo si usamos SandBox o no. Si lo usamos, se queda así.
        //$ch = curl_init('https://www.paypal.com/cgi-bin/webscr');         // Si no usamos SandBox, debemos usar esta otra linea en su lugar.
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
 
        if( !($res = curl_exec($ch)) ) {
            // Ooops, error. Deberiamos guardarlo en algún log o base de datos para examinarlo después.
            curl_close($ch);
            exit;
        }
        curl_close($ch);

        if (strcmp ($res, "VERIFIED") == 0) {

            
            /**
             * A partir de aqui, deberiamos hacer otras comprobaciones rutinarias antes de continuar. Son opcionales, pero recomiendo al menos las dos primeras. Por ejemplo:
             * 
             * * Comprobar que $_POST["payment_status"] tenga el valor "Completed", que nos confirma el pago como completado.
             * * Comprobar que no hemos tratado antes la misma id de transacción (txd_id)
             * * Comprobar que el email al que va dirigido el pago sea nuestro email principal de PayPal
             * * Comprobar que la cantidad y la divisa son correctas
             */
 
            // Después de las comprobaciones, toca el procesamiento de los datos.
            
            include('connect_bd.php');
            connect_base_de_datos();

            $id_trans = $_POST['txn_id'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $payer_email = $_POST['payer_email'];
            $mc_gross_pay = $_POST['mc_gross'];
            $payment_date = $_POST['payment_date'];
            
            $query = 'INSERT INTO cliente_reg (txn_id, first_name, last_name, payer_email, mc_gross, payment_date) VALUES ('$id_trans','$first_name','$last_name','$payer_email','$mc_gross_pay','$mc_gross_pay','$payment_date')';
            $result = mysql_query($query) or die('Fallo en el registro.' ..mysql_error());

            if($result){
                $to = $payer_email;
                $subject = 'Registro a Beer Fans.'
                $message = "<html><head></head><body>";
                $message .= "<img src='unnamed.png' alt='bievenida' /></body></html>";
                mail($to, $subject, $message);
            }


            /**
             * En este punto tratamos la información.
             * Podemos hacer con ella muchas cosas:
             * 
             * * Guardarla en una base de datos.
             * * Guardar cada linea del pedido en una linea diferente en la base de datos.
             * * Guardar un log.
             * * Restar las cantidades de los artículos del stock.
             * * Enviar un mensaje de confirmcaión al cliente.
             * * Enviar un mensaje al encargado de pedidos para que lo prepare.
             * * Comprobar mediante complejas operaciones matemáticas si el cliente es el número un millon y notificarle de que ha ganado dos noches de hotel en Torrevieja.
             * * ¡Imaginación!
             */
        } else if (strcmp ($res, "INVALID") == 0) {
            // El estado que devuelve es INVALIDO, la información no ha sido enviada por PayPal. Deberías guardarla en un log para comprobarlo después
        } 
    } else {    // Si no hay datos $_POST
        // Podemos guardar la incidencia en un log, redirigir a una URL...
    }






?>