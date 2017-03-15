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
  <p class="date"><?php echo $commentaire['date']; ?></p>
  <p><?php echo htmlentities($commentaire['auteur']); ?> dit :</p>
  <p><?php echo htmlentities($commentaire['contenu']); ?></p>
  <hr/>
<?php endforeach; ?>
<form action="index.php?action=comment" method="post">
    <input type="text" name="author" placeholder="Votre pseudo" required><br/>
    <textarea name="content" rows="8" cols="80" placeholder="Votre commentaire" required></textarea><br/>
    <input type="hidden" name="postid" value="<?php echo $post['id']; ?>">
    <input type="submit" name="" value="Commenter">
</form>
