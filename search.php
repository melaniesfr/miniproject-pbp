<?php
  include_once('lib/db_login.php');

  function clean($data) {
    global $db;

    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    $data = strip_tags($data);
    return $data;
  }

  function getPostsBySearch() {
    global $db;

    if (isset($_POST['search_post'])) {
      $keyword = clean($_POST['search']);

      $query = "SELECT P.*, K.idkategori, K.nama AS nama_kategori, PS.* FROM post P JOIN kategori K ON P.idkategori = K.idkategori JOIN penulis PS ON P.idpenulis = PS.idpenulis WHERE P.judul LIKE '%$keyword%' ORDER BY tgl_insert DESC";
      $result = $db->query($query);

      if (!$result) {
        die('Could not query the database: <br>' . $db->error . '<br>Query: ' . $query);
      } else {
        if ($result->num_rows > 0) {
          $output = $result;
        } else {
          $output = '<div class="text-center">
                       <h2 class="mb-4">Whoops!</h2>
                       <p class="mb-1">Sorry, but nothing matched your search.</p>
                       <p class="mb-1">Please try some different keywords.</p>
                     </div>';
        }

        return $output;
      }
    }
  }
?>

<?php include 'includes/header_index.php'; ?>

  <div class="content">
    <main>
      <div class="container-fluid">
        <div class="col-md-12 mt-4">
          <div class="container">
            <?php $result = getPostsBySearch(); ?>
            <?php if (is_string($result)): ?>
              <?= $result; ?>
            <?php else: ?>
              <?php while ($row = $result->fetch_object()): ?>
              <?php
                echo "<div class='album-py-5 bg-transparent'>";
                echo "<div class='container'>";
                echo "<div class='row'>";
                echo "<div  class='col-md-4'>";
                // card mx-5
                echo "<div class='card mx-5 mb-5' style='width: 18rem;'>";
                echo "<div class='card-header bg-primary text-light text-center'>$row->tgl_insert</div>";
                echo '<img src="img/'.$row->file_gambar.'" class="card-img-top mx-auto d-block" style="margin: 10px; width: 250px;" alt="image">';

                $isi = $row->isi_post;
                if (strlen($isi) > 75) {
                  $isi = substr($isi, 0, 75)."...";
                }

                echo " <div class='card-body'>";
                echo "<h5 class='card-title text-center'>$row->judul</h5>";
                echo "<p class='card-text'>$isi</p>";
                echo '<div class="text-center">';
                echo "<a href='view_post.php?idpost=".$row->idpost."' class='btn btn-warning'>View</a>";
                echo '</div>';
                echo "</div>";
                // card body end
                echo "</div>";
                // card end mx-5
                echo "</div>";
                // col end md-4

                echo "</div>";
                // row end
                echo "</div>";
                // container end
                echo "</div>";
              ?>
              <?php endwhile; ?>
          </div>
        </div>
        <?php endif; ?>
        <?php if (!is_string($result)) { $result->close(); }; ?>
      </div>
    </main>
  </div>
</div>
