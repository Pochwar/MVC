<?php
$this->titre = "Mon Blog de OUF ! " . $post['titre'];

?>
<article>
  <header>
    <h1 class="titreBillet"><?php echo $post['titre'] ?></h1>
    <time><?php echo $post['date'] ?></time>
  </header>
  <p><?php echo $post['contenu'] ?></p>
</article>
<hr />
<header>
  <h1 id="titreReponses">Réponses à <?php echo $post['titre'] ?></h1>
</header>
<?php foreach ($commentaire as $commentaire): ?>
  <p><?php echo $commentaire['auteur'] ?> dit :</p>
  <p><?php echo $commentaire['contenu'] ?></p>
<?php endforeach;
