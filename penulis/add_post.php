<?php include '../includes/header_penulis.php'; ?>

<?php
  require_once('../lib/db_login.php');
?>

<script type="text/javascript">
  function sukses() {
    alert('ADD SUKSES.');
	window.location='penulis/index_penulis.php';
  }
</script>

<?php
  // Mengecek apakah user belum menekan tombol submit
  if (isset($_POST["submit"])) {
    if ($_SESSION['username']) {
      $user = $_SESSION['username'];
      $query = "SELECT * FROM penulis WHERE email = '$user'";
    }
    $result = $db->query($query);
    if (!$result) {
      die ("Could not query the database: <br>".$db->error);
    }

    $valid = TRUE;
    while ($row = $result->fetch_object()) {
      $idpenulis = $row->idpenulis;

      $judul = test_input($_POST['judul']);
      if ($judul == '') {
        $error_judul = "Title is required";
        $valid = FALSE;
      }

      $idkategori = test_input($_POST['idkategori']);
      if ($idkategori == '') {
        $error_kategori = "Category ID is required";
        $valid = FALSE;
      } elseif (!preg_match('/^[0-9]*$/', $idkategori)) {
        $error_kategori = 'Only numbers allowed';
        $valid = FALSE;
      }

      $isi = test_input($_POST['isi']);
      if ($isi == '') {
        $error_isi = "Post is required";
        $valid = FALSE;
      }

      $gambar = $_FILES['gambar']['name'];
      if ($gambar == '') {
        $error_gambar = "Picture is required";
        $valid = FALSE;
      }
    }

      move_uploaded_file($_FILES['gambar']['tmp_name'], "../img/$gambar");

      // Add data to database
      if ($valid) {
        $query1 = "INSERT INTO post (judul, idkategori, isi_post, file_gambar, tgl_insert, tgl_update, idpenulis) VALUES ('$judul', '$idkategori', '$isi', '$gambar', NOW(), NOW() , '$idpenulis')";
        $result1 = $db->query($query1);

        if (!$result1) {
          die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query1);
        } else {
          $db->close();
        }
      }
    }
?>

  <div class="content">
    <main>
      <div class="container-fluid">
        <div class="container-fluid mt-4 text-mattBlackDark" style="max-width: 680px;">
          <div class="card">
            <div class="card-header text-center bg-primary" style="font-weight: bold; font-size: 20px; padding: 15px 0; color: white;">Buat Postingan</div>
            <div class="card-body">
              <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="judul">Judul</label>
                  <input type="text" class="form-control" id="judul" name="judul" autofocus>
                  <div class="error" style="color: red; font-size: 0.75em;"><?php if (isset($error_judul)) echo $error_judul; ?></div>
                </div>

                <div class="form-group">
                  <label for="idkategori">ID Kategori</label>
                  <input type="text" class="form-control" id="idkategori" name="idkategori">
                  <div class="error" style="color: red; font-size: 0.75em;"><?php if (isset($error_kategori)) echo $error_kategori; ?></div>
                </div>

                <div class="form-group">
                  <label for="isi">Isi Post</label>
                  <textarea type="text" class="form-control" id="isi" name="isi" rows="3"></textarea>
                  <div class="error" style="color: red; font-size: 0.75em"><?php if (isset($error_isi)) echo $error_isi; ?></div>
                </div>

                <div class="form-group">
                  <label for="gambar">File Gambar</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="gambar" name="gambar">
                    <label class="custom-file-label" for="gambar" id="nama_gambar" nama="nama_gambar">
                        gambar
                    </label>
                  </div>
                  <div class="error" style="color: red; font-size: 0.75em"><?php if (isset($error_gambar)) echo $error_gambar; ?></div>
                </div>

                <br>
                <div class="text-center">
                 <button type="submit" onClick="sukses()" class="btn btn-primary" name="submit" value="submit">Add</button>
                  <a href="index_penulis.php" class="btn btn-secondary">Cancel</a>
                </div>
              </form>
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
