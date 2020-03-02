
        <table  class="table">
            <thead class="thead-dark">
              <tr>
                <th>Titre</th>
                <th>Artiste</th>
                <th>Album</th>
              </tr>
            </thead>
            <?php foreach($songs as $song): ?>
              <tr>
                <td>
                  <a href="index.php?p=song&song_id=<?= $song['id'] ?>">
                    <?= $song['title'] ?>
                  </a>
                </td>
                <td>
                  <a href="index.php?p=artist&artist_id=<?= $song['artist_id'] ?>">
                    <?php
                      $artist = getArtist($song['artist_id']);
                      echo $artist['name'];
                    ?>
                  </a>
                </td>
                <td>
                  <a href="index.php?p=album&album_id=<?= $song['album_id'] ?>">
                    <?php
                      $album = getAlbum($song['album_id']);
                      echo $album['name'];
                    ?>
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>

        </table>
