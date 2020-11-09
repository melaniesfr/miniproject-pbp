<?php include('../includes/header_penulis.php'); ?>

<?php
  $query1 = "SELECT * from post";

  $result1 = $db->query($query1);
  if (!$result1) {
    die ("Could not query the database: <br>".$db->error);
  }
?>

  <div class="content">
    <main>
      <div class="container-fluid">
        <div class="row" style="margin-top: 20px;">
          <div class="container" style="background-color: #00000000;">
            <section class="jumbotron text-center">
              <div class="container">
                <h1>Selamat datang,
                  <?php
                    if ($_SESSION['username']) {
                      $user = $_SESSION['username'];
                    }

                    $query2 = "SELECT * FROM penulis WHERE email = '$user'";
                    $result2 = $db->query($query2);
                    if (!$result2) {
                      die ("Could not query the database: <br>".$db->error);
                    }

                    while ($row = $result2->fetch_object()) {
                      echo "$row->nama!";
                    }
                  ?>
                </h1>
                <p class="lead text-muted">Artikel sekumpulan hewan</p>
                <p>
                  <a href="add_post.php" class="btn btn-primary my-2">Buat Postingan</a>
                  <a href="postingan.php" class="btn btn-secondary my-2">Lihat Postinganku</a>
                  <a href="edit_profil.php" class="btn btn-danger my-2">Profilku</a>
                <!-- END PILIHAN KATEGORI-->
                </p>
              </div>
            </section>
          </div>

          <!--KUMPULAN POSTINGAN-->
          <div class="container">
            <?php
              echo "<div class='album-py-5 bg-transparent'>";
              echo "<div class='container'>";
              echo "<div class='row'>";
              $no = 1;
              while ($row = $result1->fetch_object()) {
                echo "<div  class='col-md-4'>";
                // card mx-5
                echo "<div class='card mx-5 mb-5' style='width: 18rem;'>";
                echo "<div class='card-header bg-primary text-light text-center'>$row->tgl_insert</div>";
                echo '<img src="../img/'.$row->file_gambar.'" class="card-img-top mx-auto d-block" style="margin: 10px; width: 250px;" alt="image">';

                echo " <div class='card-body'>";
                echo "<h5 class='card-title text-center'>$row->judul</h5>";
                echo '<div class="text-center">';
                echo "<a href='viewPostingan_penulis.php?idpost=".$row->idpost."' class='btn btn-warning'>View</a>";
                echo '</div>';
                echo "</div>";
                // card body end
                echo "</div>";
                // card end mx-5
                echo "</div>";
                // col end md-4

                $no++;
              }

              echo "</div>";
              // row end
              echo "</div>";
              // container end
              echo "</div>";
            ?>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha256-OUFW7hFO0/r5aEGTQOz9F/aXQOt+TwqI1Z4fbVvww04=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js" integrity="sha256-qE/6vdSYzQu9lgosKxhFplETvWvqAAlmAuR+yPh/0SI=" crossorigin="anonymous"></script>
<script src="../src/js/script.js"></script>

<?php include '../includes/footer.php'; ?>
