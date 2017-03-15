<?php
$this->titre = "Mon Blog de OUF !";

foreach ($posts as $post): ?>
<article>
    <header>
        <a href="post/<?= $post['id'] ?>">
            <h1 class="titreBillet"><?= $post['titre'] ?></h1>
        </a>
        <time><?= $post['date'] ?></time>
        <p class="nbcomments">(<?= $post['nbcom'] ?> commentaires)</p>
    </header>
    <p class="preview"><?= substr($post['contenu'], 0, 150); ?> (...) <a href="index.php?action=post&id=<?= $post['id'] ?>">lire la suite</a></p>
</article>
<hr />
<?php endforeach;
