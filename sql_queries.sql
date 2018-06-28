-- Affichage des articles dans la home page :

SELECT articles.id, title, content, creationDate, author.name
FROM articles
INNER JOIN author ON articles.idAuthor = author.id
ORDER BY creationDate DESC

-- Affichage du détail d'un article :

SELECT articles.id, title, content, creationDate, author.name
FROM articles
INNER JOIN author ON articles.idAuthor = author.id
WHERE articles.id = ?
ORDER BY creationDate DESC

SELECT username, comments.content, comments.creationDate
FROM articles
INNER JOIN author ON articles.idAuthor = author.id
INNER JOIN comments ON articles.id = comments.idArticle
ORDER BY comments.creationDate DESC

-- Affichage du détails des articles administration

SELECT a.id, title, content, au.name, creationDate
FROM articles a
INNER JOIN author au ON a.idAuthor = au.id
ORDER BY creationDate