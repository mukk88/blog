<?php
// Create connection

try{
    $db = new pdo( 'mysql:host=mysql.markwoo.i-xo.net;dbname=markwoo;charset=utf8',
                    'mukk88',
                    'dbPa$$w0rd',
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    foreach($db->query('SELECT * FROM users') as $row) {
    	echo $row['username'];
	}

	$qry = $db->prepare(
    'INSERT INTO posts (id, title, words, hash, icon, cover, images, public) VALUES (?, ?,?,?,?,?,?,?)');
	$qry->execute(array(1,'my first post','a bunch of words', '', '', '', '',1 ));

	echo $qry.' were affected';	
    // die(json_encode(array('outcome' => true)));
}


catch(PDOException $ex){
    die(json_encode(array('outcome' => false, 'message' => 'error')));
}


?>