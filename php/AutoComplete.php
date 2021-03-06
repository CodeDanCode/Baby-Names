<?php

    include 'db_connect.php';

    $name = $_GET['babyname'];

    $sql = "SELECT name FROM babies WHERE name like '$name%' ORDER BY name ";

    $res = $db->query($sql);

    if(!$res)
		echo mysqli_error($db);
	else
		while( $row = $res->fetch_object() )
			echo "<option value='".$row->name."'>";
?>