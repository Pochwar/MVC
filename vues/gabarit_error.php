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
            <a href="index.php"><h1 id="titreBlog">Mon Blog</h1></a>
        </header>
        <div id="contenu" class="error">
            <?php echo $contenu; ?>
        </div>
    </div>
</body>
</html>
