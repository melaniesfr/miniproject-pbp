<?php include '../includes/header_pengunjung.php'; ?>

  <div class="content">
    <main>
      <div class="container-fluid">
        <br><h2>Kategori</h2>
        <?php
          require_once('../lib/db_login.php');

          // Asign query
          $query2 = "SELECT * FROM kategori ORDER BY idkategori";
          $result2 = $db->query($query2);

          if (!$result2 ) {
              // Cek apakah querynya jalan (Semua query harus bisa jalan)
              die ("Could not query the database: <br />".$db->error);
          } else{
            while($row = $result2->fetch_object()){
              echo '<h3>'.$row->nama.'</h3>'; // Nama Kategori
              echo '<div class="row">';
              $query3 = "SELECT * FROM post WHERE idkategori = ".$row->idkategori.""; //Mengkategorikan post berdasarkan kategori
              $result3 = $db->query($query3);

              if (!$result3) {
                die ("Gagal membagi post: <br />".$db->error);
              } else {
                while ($column = $result3->fetch_object()) {
                  $id = $column->idpost;
                  $judul = $column->judul;
                  $isi = $column->isi_post;
                  $gambar = $column->file_gambar;
                  $tgl_insert = $column->tgl_insert;

                  if (strlen($judul) > 50) {
                    $judul = substr($judul,0,50)."...";
                  } else if(strlen($isi)>100){
                    $isi = substr($isi,0,100)."...";
                  }

                  echo '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">';
                  echo '<div class="bg-mattBlackLight my-2 p-3">';
                  echo '<img class="img-fluid" src = "../img/'.$gambar.'" width = "480px">';
                  echo '<h5>'.$judul.'</h5>';
                  echo '<p class="card-text">'.$isi.'</p>';
                  echo '<a href="artikel.php?id='.$column->idpost.'" class="btn btn-secondary" role="button">READ MORE</a>';
                  echo '</div>';
                  echo '</div>';
                }
              }
              echo '</div>';
            }
          }

          $result2->free();
          $result3->free();
          $db->close();
        ?>
      </div>
    </main>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha256-OUFW7hFO0/r5aEGTQOz9F/aXQOt+TwqI1Z4fbVvww04=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js" integrity="sha256-qE/6vdSYzQu9lgosKxhFplETvWvqAAlmAuR+yPh/0SI=" crossorigin="anonymous"></script>
<script src="../src/js/script.js"></script>

<?php include '../includes/footer.php'; ?>
