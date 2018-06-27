<?php

include 'utilities.php';

$idArticle = $_GET['idArticle'];

$query = 'SELECT articles.id, title, content, creationDate, author.name
		  FROM articles
		  INNER JOIN author ON articles.idAuthor = author.id
		  WHERE articles.id = ?
		  ORDER BY creationDate DESC';

$requete = $db->prepare($query);
$requete->execute(array($idArticle));
$article = $requete->fetch(PDO::FETCH_ASSOC);


$query = 'SELECT username, comments.content, comments.creationDate
		  FROM articles
		  INNER JOIN author ON articles.idAuthor = author.id
		  INNER JOIN comments ON articles.id = comments.idArticle
		  WHERE articles.id = ?
		  ORDER BY comments.creationDate DESC';

$requete = $db->prepare($query);
$requete->execute(array($idArticle));
$comments = $requete->fetchAll(PDO::FETCH_ASSOC);

$template = "showArticle";

include "../masterPage.phtml";

?>