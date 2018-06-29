<?php

include 'utilities.php';

if(empty($_POST)){
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

////////////////////////////////////////////////////

	$template = "addArticle";
	include '../masterPage.phtml';

}else{

	if(!empty($_POST['title'])&& !empty($_POST['content'])){

		$query = 'INSERT INTO articles(title, content, idCategory, idAuthor)
		  		  VALUES (?, ?, ?, ?)';

		$requete = $db->prepare($query);
		$requete->execute(array($_POST['title'], $_POST['content'], $_POST['idCategory'], $_POST['idAuthor']));

		header('Location: index.php'); 
		exit();

	}else{

		header('Location: addArticle.php');
		exit();
	}

}

?>