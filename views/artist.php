<a href="index.php"><i class="fas fa-home"></i> Retour à l'index</a>

<p>Nom de l'artistde : <?= $artist['name'] ?></p>

<p>Bio : <?= $artist['biography'] ?></p>

Albums :

<?php if(sizeof($albums) > 0): ?>
  <ul>
  <?php foreach($albums as $album): ?>
    <li><a href="index.php?p=album&album_id=<?= $album['id'] ?>"><?= $album['name'] ?></a></li>
  <?php endforeach; ?>
  </ul>
<?php else: ?>
  <p>aucun album pour cet artiste</p>
<?php endif; ?>
