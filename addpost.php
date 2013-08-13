<?php
// add post

try{
    $db = new pdo( 'mysql:host=mysql.markwoo.i-xo.net;dbname=markwoo;charset=utf8',
                    'mukk88',
                    'dbPa$$w0rd',
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    $title = $_POST[title];
    $words = $_POST[words];


	$qry = $db->prepare(
    'INSERT INTO posts (title, words, hash, icon, cover, images, public) VALUES (?,?,?,?,?,?,?)');
	$qry->execute(array($title,$words, '', '', '', '',1 ));

	echo 'post added';	
}


catch(PDOException $ex){
    die(json_encode(array('outcome' => false, 'message' => 'error')));
}


?>