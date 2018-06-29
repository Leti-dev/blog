<?php

include 'utilities.php';

if(empty($_POST)){
	$query = 'SELECT articles.id, title, content, idCategory, idAuthor, label, name
		  FROM articles
		  INNER JOIN author ON articles.idAuthor = author.id
		  INNER JOIN category ON articles.idCategory = category.id
		  WHERE articles.id = ?';
	

	$requete = $db->prepare($query);
	$requete->execute(array($_GET['idArticle']));
	$article = $requete->fetch(PDO::FETCH_ASSOC);

//////////////////////////////////////////////////////////

	$query = 'SELECT id, label
		  FROM category 
		  ORDER BY id';
	
	$requete = $db->prepare($query);
	$requete->execute();
	$categories = $requete->fetchAll(PDO::FETCH_ASSOC);

////////////////////////////////////////////////////

	$query = 'SELECT id, name
		  FROM author
		  ORDER BY id';
	
	$requete = $db->prepare($query);
	$requete->execute();
	$authors = $requete->fetchAll(PDO::FETCH_ASSOC);

/////////////////////////////////////////////////////////

	$template = "updateArticle";

	include '../masterPage.phtml';

}else{

	$query = 'UPDATE articles
		  	  SET title = ?,
		  	  	content = ?,
		  	  	idAuthor = ?,
		  	  	idCategory = ?
		  	  WHERE id = ?';
	
	$requete = $db->prepare($query);
	$requete->execute(array($_POST['title'], $_POST['content'], $_POST['idAuthor'], $_POST['idCategory'], $_GET['idArticle']));

	header('Location: index.php'); 
	exit();

}

?>