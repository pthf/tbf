<?php

	include ("../php/connect_bd.php");
	connect_base_de_datos();

	$query = "SELECT * FROM user
						INNER JOIN countries ON user.country_id = countries.id
						INNER JOIN states ON user.state_id = states.id";
	$result = mysql_query($query) or die(mysql_error());

	if(mysql_num_rows($result) > 0 ){

		require_once 'PHPExcel/Classes/PHPExcel.php';
		$objPHPExcel  = new PHPExcel();

		$objPHPExcel->getProperties()->setCreator("Users The Beer Fans") // Nombre del autor
		    ->setLastModifiedBy("Users The Beer Fans") //Ultimo usuario que lo modificó
		    ->setTitle("Users The Beer Fans") // Titulo
		    ->setSubject("Users The Beer Fans") //Asunto
		    ->setDescription("Users The Beer Fans") //Descripción
		    ->setKeywords("Users The Beer Fans") //Etiquetas
		    ->setCategory("Users The Beer Fans"); //Categorias

	    $tituloReporte = "Users The Beer Fans";
			$titulosColumnas = array('#',
															 'Registration',
															 'Name',
															 'Last Name',
															 'Birth',
															 'Country',
															 'State',
															 'E-mail',
															 'Status',
															 'Exp');

			$objPHPExcel->setActiveSheetIndex(0)
    		->mergeCells('A1:K1');

    	$objPHPExcel->setActiveSheetIndex(0)
		    ->setCellValue('A1',  $tituloReporte) // Titulo del reporte
		    ->setCellValue('A3',  $titulosColumnas[0])  //Titulo de las columnas
		    ->setCellValue('B3',  $titulosColumnas[1])
				->setCellValue('C3',  $titulosColumnas[2])
				->setCellValue('D3',  $titulosColumnas[3])
				->setCellValue('E3',  $titulosColumnas[4])
				->setCellValue('F3',  $titulosColumnas[5])
				->setCellValue('G3',  $titulosColumnas[6])
				->setCellValue('H3',  $titulosColumnas[7])
				->setCellValue('I3',  $titulosColumnas[8])
				->setCellValue('J3',  $titulosColumnas[9]);

		 	$i = 4;
		 	while ($line = mysql_fetch_array($result)) {
		 	$objPHPExcel->setActiveSheetIndex(0)
	        	->setCellValue('A'.$i, $line['idUser'])
	         	->setCellValue('B'.$i, $line['registrationDate'])
						->setCellValue('C'.$i, $line['userName'])
						->setCellValue('D'.$i, $line['userLastName'])
						->setCellValue('E'.$i, $line['userBirthDate'])
						->setCellValue('F'.$i, $line['name_c'])
						->setCellValue('G'.$i, $line['name_s'])
						->setCellValue('H'.$i, $line['userEmail'])
						->setCellValue('I'.$i, $line['userStatus'])
	         	->setCellValue('J'.$i, $line['userExp']);
     		$i++;
		 }

		for($i = 'A'; $i <= 'J'; $i++){
			$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension($i)->setAutoSize(TRUE);
		}

		$objPHPExcel->getActiveSheet()->setTitle('USERS');
		$objPHPExcel->setActiveSheetIndex(0);

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="userthebeerfans.xlsx"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;




	}

?>
