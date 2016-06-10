<?php
include('../../admin/php/connect_bd.php');
connect_base_de_datos();


if ($_POST['option'] == 1) {

   $query = "SELECT * FROM user u
            INNER JOIN countries c ON c.id = u.country_id
            INNER JOIN states s ON s.id = u.state_id
            WHERE u.userStatus <> 0
            AND u.userName LIKE '" . $_POST['valores'] . "%'
            OR s.name_s LIKE '" . $_POST['valores'] . "%'
            OR c.sortname LIKE '" . $_POST['valores'] . "%'
            OR name_c LIKE '" . $_POST['valores'] . "%'
            LIMIT 10";

    $resultado = mysql_query($query) or die(mysql_error());
    if (mysql_num_rows($resultado) > 0) {

        while ($line = mysql_fetch_array($resultado)) {
            ?>

            <a href="perfil.php?idUser=<?=$line['idUser'];?>">
                <div class="profile-search users">
                    <span class="profile-img">
                        <img src="../../images/userProfile/<?php echo $line['userProfileImage']; ?>" alt="profile image" title="profile image">
                    </span>
                    <span class="profile-info">
                        <span class="profile-name"><?php echo $line['userName']; ?></span> <br>
                        <span class="profile-city"><?php echo $line['name_s']; ?> - <?php echo $line['sortname']; ?></span>
                    </span>
                </div>
            </a>
            <?php
        }
    } else {
        ?>

        <div class="profile-search noresults">
            <span class="profile-info no-results">
                <span class="profile-name">NO SE HA ENCONTRADO RESULTADOS</span> <br>
            </span>
        </div>

        <?php
    }

} else if ($_POST['option'] == 2) {

    $query = "SELECT * FROM beer b
            INNER JOIN beertype bt ON bt.idbeertype = b.idbeertype
            INNER JOIN producer pr ON pr.idProducer = b.idProducer
            INNER JOIN countries co ON co.id = pr.country_id
            INNER JOIN states st ON st.id = pr.state_id
            WHERE b.beerName LIKE '" . $_POST['valores'] . "%'
            OR bt.beertypeName LIKE '" . $_POST['valores'] . "%'
            OR st.name_s LIKE '" . $_POST['valores'] . "%'
            OR co.sortname LIKE '" . $_POST['valores'] . "%'
            OR co.name_c LIKE '" . $_POST['valores'] . "%'
            LIMIT 10";

    $resultado = mysql_query($query) or die(mysql_error());
    if (mysql_num_rows($resultado) > 0) {

        while ($line = mysql_fetch_array($resultado)) {
            ?>

            <a href="perfil_beer.php?id=<?=$line['idBeer'];?>">
                <div class="profile-search users">
                    <span class="profile-img">
                        <img src="../../images/beerBottles/<?php echo $line['beerBottleImage']; ?>" alt="profile image" title="profile image">
                    </span>
                    <span class="profile-info">
                        <span class="profile-name"><?php echo $line['beerName']; ?></span> <br>
                        <span class="profile-city"><?php echo $line['name_s']; ?> - <?php echo $line['sortname']; ?></span>
                    </span>
                </div>
            </a>
            <?php
        }
    } else {
        ?>

        <div class="profile-search noresults">
            <span class="profile-info no-results">
                <span class="profile-name">NO SE HA ENCONTRADO RESULTADOS</span> <br>
            </span>
        </div>

        <?php
    }

} else if ($_POST['option'] == 3){

    $query = "SELECT * FROM producer pr
            INNER JOIN producertype pt ON pt.idProducerType = pr.idProducerType
            INNER JOIN countries co ON co.id = pr.country_id
            INNER JOIN states st ON st.id = pr.state_id
            WHERE pr.producerName LIKE '" . $_POST['valores'] . "%'
            OR pt.producerTypeName LIKE '" . $_POST['valores'] . "%'
            OR st.name_s LIKE '" . $_POST['valores'] . "%'
            OR co.sortname LIKE '" . $_POST['valores'] . "%'
            OR co.name_c LIKE '" . $_POST['valores'] . "%'
            LIMIT 10";

    $resultado = mysql_query($query) or die(mysql_error());
    if (mysql_num_rows($resultado) > 0) {

        while ($line = mysql_fetch_array($resultado)) {
            ?>

            <a href="perfil_empresa.php?id=<?=$line['idProducer'];?>">
                <div class="profile-search users">
                    <span class="profile-img">
                        <img src="../../images/producerProfiles/<?php echo $line['producerProfileImage']; ?>" alt="profile image" title="profile image">
                    </span>
                    <span class="profile-info">
                        <span class="profile-name"><?php echo $line['producerName']; ?></span> <br>
                        <span class="profile-city"><?php echo $line['name_s']; ?> - <?php echo $line['sortname']; ?></span>
                    </span>
                </div>
            </a>
            <?php
        }
    } else {
        ?>

        <div class="profile-search noresults">
            <span class="profile-info no-results">
                <span class="profile-name">NO SE HA ENCONTRADO RESULTADOS</span> <br>
            </span>
        </div>

        <?php
    }

} else if ($_POST['option'] == 4) {

    $query = "SELECT * FROM rawmaterial rm
            INNER JOIN rawmaterial_has_rawmaterialtype rhm ON rhm.idRawMaterial = rm.idRawMaterial 
            INNER JOIN rawmaterialtype rmt ON rmt. idDrawMaterialType = rhm.idDrawMaterialType
            INNER JOIN countries co ON co.id = rm.country_id
            INNER JOIN states st ON st.id = rm.state_id
            WHERE rm.rawMaterialName LIKE '" . $_POST['valores'] . "%'
            OR rmt.rawMaterialTypeName LIKE '" . $_POST['valores'] . "%'
            OR st.name_s LIKE '" . $_POST['valores'] . "%'
            OR co.sortname LIKE '" . $_POST['valores'] . "%'
            OR co.name_c LIKE '" . $_POST['valores'] . "%'
            LIMIT 10";

    $resultado = mysql_query($query) or die(mysql_error());
    if (mysql_num_rows($resultado) > 0) {

        while ($line = mysql_fetch_array($resultado)) {
            ?>

            <a href="perfil_materia.php?id=<?=$line['idRawMaterial'];?>">
                <div class="profile-search users">
                    <span class="profile-img">
                        <img src="../../images/rawMaterialProfiles/<?php echo $line['rawMaterialProfileImage']; ?>" alt="profile image" title="profile image">
                    </span>
                    <span class="profile-info">
                        <span class="profile-name"><?php echo $line['rawMaterialName']; ?></span> <br>
                        <span class="profile-city"><?php echo $line['name_s']; ?> - <?php echo $line['sortname']; ?></span>
                    </span>
                </div>
            </a>
            <?php
        }
    } else {
        ?>

        <div class="profile-search noresults">
            <span class="profile-info no-results">
                <span class="profile-name">NO SE HA ENCONTRADO RESULTADOS</span> <br>
            </span>
        </div>

        <?php
    }
    
} else if ($_POST['option'] > 4) { ?>

    <div class="profile-search noresults">
            <span class="profile-info no-results">
                <span class="profile-name">NO SE HA ENCONTRADO RESULTADOS</span> <br>
            </span>
        </div>

<?php } 


?>
