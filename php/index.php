<?php

include 'utilities.php';

$query = 'SELECT articles.id, title, content, creationDate, author.name
		  FROM articles
		  INNER JOIN author ON articles.idAuthor = author.id
		  ORDER BY creationDate DESC';
	

$requete = $db->prepare($query);
$requete->execute();
$allArticles = $requete->fetchAll(PDO::FETCH_ASSOC);

$template = "index";

include "../masterPage.phtml";

?>