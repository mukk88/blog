<?php
// add post

try{
    $db = new pdo( 'mysql:host=mysql.markwoo.i-xo.net;dbname=markwoo;charset=utf8',
                    'mukk88',
                    'dbPa$$w0rd',
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    $title = $_POST[title];
    $words = $_POST[words];
    $description = $_POST[description];
    $hash = $_POST[hash];


	$qry = $db->prepare(
    'INSERT INTO posts (title, words, description, hash, icon, cover, images, public) VALUES (?,?,?,?,?,?,?,?)');
	$qry->execute(array($title,$words,$description, $hash, '', '', '',1 ));

	header('Location: index.php' ) ;
}

catch(PDOException $ex){
    die(json_encode(array('outcome' => false, 'message' => 'error')));
}


?>