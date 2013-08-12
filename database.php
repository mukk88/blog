<?php
// Create connection

try{
    $dbh = new pdo( 'mysql:host=mysql.markwoo.i-xo.net;dbname=markwoo;charset=utf8',
                    'mukk88',
                    'dbPa$$w0rd',
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    foreach($db->query('SELECT * FROM users') as $row) {
    	echo $row['username'].;
	}


    // die(json_encode(array('outcome' => true)));
}


catch(PDOException $ex){
    die(json_encode(array('outcome' => false, 'message' => 'error')));
}


?>