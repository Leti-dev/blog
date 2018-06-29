<?php

include 'utilities.php';

if(array_key_exists('username', $_POST) && array_key_exists('comment', $_POST) && !empty($_POST['username'])&& !empty($_POST['comment'])){

		$query = 'INSERT INTO comments(username, content, idArticle)
		  VALUES (?, ?, ?)';

		$requete = $db->prepare($query);
		$requete->execute(array($_POST['username'], $_POST['comment'], $_GET['idArticle']));


}

header('Location: showArticle.php?idArticle=' . $_GET['idArticle']);
exit();

?>