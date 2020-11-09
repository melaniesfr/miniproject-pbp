<?php
  include_once('lib/db_login.php');

  if (isset($_GET['idpost'])) {
    $id_post = $_GET['idpost'];
  } else {
    die ("Error. No ID Selected!");
  }
?>

<?php include('includes/header_index.php'); ?>

  <div class="content">
    <main>
      <div class="container-fluid">
        <div class="container" style='margin-top: 20px;'>
          <div class="card">
            <div class="card-body">
              <?php
                $query = "SELECT * FROM post WHERE idpost = '$id_post'";
                $query1 = "SELECT * FROM penulis";
                $result = $db->query($query);
                $result1 = $db->query($query1);
                $view = $result->fetch_object();
                $nama = $result1->fetch_object();

                echo "<div class='card'>";
                echo "<div class='card-body'>";
                echo "<h3 class='mt-2 text-center' style='font-weight: bold;'>$view->judul</h3>";
                echo '<img src="img/'.$view->file_gambar.'" class="card-img-top m-2 mx-auto d-block" style="width: 500px;" alt="image">';
                echo "<p class='mt-3'>$view->isi_post</p>";
                echo "<p class='mt-3'>Update oleh $nama->nama, <span class='text-secondary'> $view->tgl_insert</span></p>";
                echo "</div>";
                echo "</div>";
              ?>
            </div>
          </div>
        </div>

        <div class="container">
          <div class="card">
            <div class="card-body">
              <?php
                $query = "SELECT k.isi AS komen, p.nama AS penulis, k.tgl_update AS tanggal, k.idkomentar AS idkomentar FROM komentar k JOIN penulis p ON k.idpenulis = p.idpenulis WHERE idpost = '$id_post'";
                $result = $db->query($query);

                $query2 = "SELECT COUNT(k.idkomentar) AS jml_komen FROM post p JOIN komentar k ON p.idpost = k.idpost GROUP BY k.idkomentar";

                $result2 = $db->query($query2);

                while ($komentar = $result->fetch_object()) {
                  echo '<div class="card-footer">
                        <small class="text-muted float-left">'; ?>
                          <?php
                            if ($row2 = $result2->fetch_object()) {
                              echo $row2->jml_komen;
                            }; ?>
                        <?php echo ' komentar</small>
                      </div>';
                  echo "<hr/>";
                  echo "<span class='float-right' style='color: grey; font-size: 0.8em;'>$komentar->tanggal</span>";
                  echo "<p style='font-weight: bold; font-size: 1.1em;'>$komentar->penulis</p>";
                  echo "<p class='mt-2'>$komentar->komen</p>";
                }
              ?>
            </div>
          </div>
        </div>
        <br>
        <a href='index.php' class='btn btn-info' style='margin-left: 14px;'>Kembali</a>
      </div>
    </main>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha256-OUFW7hFO0/r5aEGTQOz9F/aXQOt+TwqI1Z4fbVvww04=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js" integrity="sha256-qE/6vdSYzQu9lgosKxhFplETvWvqAAlmAuR+yPh/0SI=" crossorigin="anonymous"></script>
<script src="../src/js/script.js"></script>

<?php include('includes/footer.php'); ?>
