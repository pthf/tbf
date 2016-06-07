<?php
include('../../admin/php/connect_bd.php');
connect_base_de_datos();

$query = "SELECT * FROM user u
			INNER JOIN countries c
			ON c.id = u.country_id
			INNER JOIN states s
			ON s.id = u.state_id
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
?>
