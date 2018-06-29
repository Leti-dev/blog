<?php

include 'utilities.php';

$query = 'DELETE FROM comments
		  WHERE idArticle = ?';
	

$requete = $db->prepare($query);
$requete->execute(array($_GET['idArticle']));

/////////////////////////////////////////////////

$query = 'DELETE FROM articles
		  WHERE id = ?';
	

$requete = $db->prepare($query);
$requete->execute(array($_GET['idArticle']));

////////////////////////////////////////////////

header('Location: admin.php'); 
exit();

?>