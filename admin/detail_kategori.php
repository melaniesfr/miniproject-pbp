<?php include '../includes/header_admin.php'; ?>

<?php
  $id = $_GET['id'];

  // Execute the query
  $query1 = "SELECT p.idpost AS idpost, p.judul AS judul, k.nama AS kategori, p.isi_post AS isi_post, p.file_gambar AS file_gambar, p.tgl_update AS tgl_update, pe.nama AS penulis FROM post p JOIN kategori k JOIN penulis pe ON p.idkategori = k.idkategori AND p.idpenulis = pe.idpenulis WHERE k.idkategori = '$id'";
  $query2 = "SELECT COUNT(k.idkomentar) AS jml_komen FROM post p JOIN komentar k ON p.idpost = k.idpost GROUP BY k.idkomentar";

  $result1 = $db->query($query1);
  $result2 = $db->query($query1);
  $result3 = $db->query($query2);

  if (!$result1 || !$result2 || !$result3) {
    die ("Could not query the database: <br>".$db->error."<br>Query: ".$query);
  }
?>

  <div class="content">
    <main>
      <div class="container-fluid">
        <div class="container-fluid mt-4 text-mattBlackDark" style="max-width: 1000px;">
          <div class="card">
            <div class="card-header text-center" style="font-weight: bold; font-size: 20px; padding: 15px 0; color: white; background-color: #67bb30">
              <?php
                if ($row1 = $result1->fetch_object()) {
                  echo $row1->kategori;
                }
              ?>
            </div>

            <a class="btn btn-danger" href="rekap_post.php" style="max-width: 67px; margin: 20px 0 0 20px;">Back</a>

            <div class="card-body">
            <?php
              echo '<div class="card">';

              // Fetch and display the results
              while ($row2 = $result2->fetch_object()) {
                echo '<small class="text-muted text-right">Last update: '.$row2->tgl_update.'</small> <br>
                <img src="../img/'.$row2->file_gambar.'" class="card-img-top mx-auto d-block" alt="'.$row2->judul.'" style="width: 300px;">
                      <div class="card-body">
                        <h5 class="card-title text-center" style="font-weight: bold; margin-bottom: 20px;">'.$row2->judul.'</h5>
                        <p class="card-text">'.$row2->isi_post.'</p>
                        <br>
                        <p class="float-right" style="margin-bottom: 0; font-size: 0.9em;">Oleh: '.$row2->penulis.'</p>
                      </div>
                      <div class="card-footer">
                        <small class="text-muted float-left">'; ?>
                          <?php
                            if ($row3 = $result3->fetch_object()) {
                              echo $row3->jml_komen;
                            }; ?>
                        <?php echo ' komentar</small>
                      </div>
                      <hr>';
              }

              $result->free();
              $db->close();

              echo '</div>'; ?>
            </div>
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
