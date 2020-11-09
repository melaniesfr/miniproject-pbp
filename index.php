<?php include 'includes/header_index.php'; ?>

<?php
  include_once('lib/db_login.php');

  $query1 = "SELECT * from post ORDER BY tgl_insert DESC";

  $result1 = $db->query($query1);
  if (!$result1) {
    die ("Could not query the database: <br>".$db->error);
  }
?>

  <div class="content">
    <main>
      <div class="container-fluid">
        <div class="col-md-12 mt-4">
          <div class="jumbotron">
            <h3 class="display-4 text-center">Selamat datang di website kami!</h3>
            <p class="lead text-muted text-center">Artikel sekumpulan hewan</p>
            </p>
          </div>

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

<center>
  <div id="footer">Copyright 2020 &copy; Mini-Project PBP Kelas B</div>
</center>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha256-OUFW7hFO0/r5aEGTQOz9F/aXQOt+TwqI1Z4fbVvww04=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js" integrity="sha256-qE/6vdSYzQu9lgosKxhFplETvWvqAAlmAuR+yPh/0SI=" crossorigin="anonymous"></script>
<script src="src/js/script.js"></script>

<?php include 'includes/footer.php'; ?>
