<?php

include 'utilities.php';

$query = 'SELECT a.id, title, content, au.name, creationDate
          FROM articles a
          INNER JOIN author au ON a.idAuthor = au.id
          ORDER BY creationDate';
	

$requete = $db->prepare($query);
$requete->execute();
$allArticles = $requete->fetchAll(PDO::FETCH_ASSOC);

$template = "admin";

include '../masterPage.phtml';

?>