<?php

include 'utilities.php';

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

if(!empty($_POST['title'])&& !empty($_POST['content'])){
		$dataArticle = $_POST;
		var_dump($dataArticle);

		$query = 'INSERT INTO articles(title, content, idCategory, idAuthor)
		  VALUES (?, ?, ?, ?)';

		$requete = $db->prepare($query);
		$requete->execute(array($_POST['title'], $_POST['content'], $_POST['idCategory'], $_POST['idAuthor']));


}

//header('Location: index.phtml'); after displaying form
//exit();

$template = "addArticle";

include '../masterPage.phtml';

?>