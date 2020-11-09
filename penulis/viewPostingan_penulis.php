<?php include('../includes/header_penulis.php'); ?>

<?php

  if (isset($_GET['idpost'])) {
    $id_post = $_GET['idpost'];
  } else {
    die ("Error. No ID Selected!");
  }
?>

  <div class="content">
    <main>
      <div class="container-fluid">
        <div class="container" style='margin-top: 20px;'>
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
            echo '<img src="../img/'.$view->file_gambar.'" class="card-img-top m-2 mx-auto d-block" style="width: 500px;" alt="image">';
            echo "<p class='mt-3'>$view->isi_post</p>";
            echo "<p class='mt-3'>Update oleh $nama->nama, <span class='text-secondary'> $view->tgl_insert</span></p>";

            echo "</div>";
            echo "</div>";
            echo "<br />";
            echo "<a href='index_penulis.php' class='btn btn-info'>Kembali</a>";
            echo "<br />";
            include 'komentarPostingan_penulis.php';
          ?>
        </div>
      </div>
    </main>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha256-OUFW7hFO0/r5aEGTQOz9F/aXQOt+TwqI1Z4fbVvww04=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js" integrity="sha256-qE/6vdSYzQu9lgosKxhFplETvWvqAAlmAuR+yPh/0SI=" crossorigin="anonymous"></script>
<script src="../src/js/script.js"></script>

<?php include('../includes/footer.php'); ?>
