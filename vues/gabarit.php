<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <base href="<?php echo $base_url; ?>">
    <link rel="stylesheet" href="css/style.css" />
    <title><?php echo $titre; ?></title>
</head>
<body>
    <div id="global">
        <header>
            <a href=""><h1 id="titreBlog">Mon Blog</h1></a>
            <p>Je vous souhaite la bienvenue sur ce modeste blog.</p>
        </header>
        <div id="contenu">
            <?php echo $contenu; ?>
        </div> <!-- #contenu -->
        <footer id="piedBlog">
            Blog réalisé avec PHP, HTML5 et CSS.
        </footer>
    </div> <!-- #global -->
</body>
</html>
