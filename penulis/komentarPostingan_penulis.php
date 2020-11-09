<?php
  include_once('../lib/db_login.php');


 if (isset($_GET['idpost'])) {
    $id_post = $_GET['idpost'];
  } else {
    die ("Error. No ID Selected!");
  }

  if (!isset($_POST['submit'])) {
    $valid = TRUE;

    $query1 = "SELECT * FROM penulis";
    $result1 = $db->query($query1);
    $pnls = $result1->fetch_object();

    // Cek validasi nama
if(isset($_POST['submit'])){

    if (empty($isi)) {
      $valid = FALSE;
    }

    // Add data to database
    if ($valid) {

       $query2 = "SELECT * FROM post";
        $result1 = $db->query($query2);
        $post = $result1->fetch_object();

        $id_post = $post->idpost;

      $isi = $_POST['isi'];
      $penulis = $pnls->idpenulis;
      $query  = "INSERT INTO komentar (idpost, idpenulis, isi, tgl_update) VALUES('$id_post', '$penulis', '$isi', NOW())";
      $result = $db->query($query);
      if (!$result) {
        die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query);
      } else {
        if ($result) {


          echo "<p>Data Berhasil Dikirim</p><br>";
        }
      }
    }else{
    die ('absolutly died inside');
  }
}
}
?>
    <br>
    <main>
      <div class="container-fluid">
        <div class="container">
          <div class="card">
            <div class="card-body">
              <h3>Berikan Komentar</h3>
              <form method="post">
                <div class='form-group'>
                  <label for='komentar'>Komentar anda</label>
                  <input type="text" class='form-control' name='isi' id='isi' rows='3'></input>
                </div>
                <input type="submit" name="submit" value="submit" href="<?php
                if (!$result) {
                        die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query);
                      } else {
                        if ($result) {

                             $query2 = "SELECT * FROM post";
                                $result1 = $db->query($query2);
                                $post = $result1->fetch_object();

                                $id_post = $post->idpost;

                              $isi = $_POST['isi'];
                              $penulis = $pnls->idpenulis;
                              $query  = "INSERT INTO komentar (idpost, idpenulis, isi, tgl_update) VALUES('$id_post', '$penulis', '$isi', NOW())";
                          echo "Data Berhasil Dikirim.<br>";


                        }
                      }
                ?>">
              </form>
            </div>
          </div>
        </div>

        <div class="container">
          <div class="card">
            <div class="card-body">
              <?php
                $query = "SELECT k.isi AS komen, p.nama AS penulis, k.tgl_update AS tanggal, k.idkomentar AS idkomentar FROM komentar k JOIN penulis p ON k.idpenulis = p.idpenulis WHERE idpost = '$id_post'";
                $result = $db->query($query);

                while ($komentar = $result->fetch_object()) {

                  echo "<hr/>";
                  echo "<span class='float-right' style='color: grey; font-size: 0.8em;'>$komentar->tanggal</span>";
                  echo "<br />" ;
                  echo "<p style='font-weight: bold; font-size: 1.1em;'>$komentar->penulis</p>";
                  echo "<p class='text-dark mt-2'>$komentar->komen</p>";
                  echo "<a class='btn btn-danger btn-sm' href='delete_komentar.php?id=$komentar->idkomentar' onClick='hapus()'>Hapus</a>";
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </main>


<script>
  function hapus() {
    alert("Komentar ini akan dihapus!");
  }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha256-OUFW7hFO0/r5aEGTQOz9F/aXQOt+TwqI1Z4fbVvww04=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js" integrity="sha256-qE/6vdSYzQu9lgosKxhFplETvWvqAAlmAuR+yPh/0SI=" crossorigin="anonymous"></script>
<script src="../src/js/script.js"></script>

<?php include '../includes/footer.php'; ?>
