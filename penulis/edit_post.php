<?php
  session_start();
  require_once('../lib/db_login.php');
  $id = $_GET['id']; // Mendapatkan idkategori yang dilewatkan ke url

  // Mengecek apakah user belum menekan tombol submit
  if (!isset($_POST["submit"])) {
    $query = "SELECT * FROM post WHERE idpost = ".$id."";

    // Execute the query
    $result = $db->query($query);
    if (!$result) {
      die ("Could not query the database: <br>".$db->error);
    } else {
      while ($row = $result->fetch_object()) {
        $judul = $row->judul;
        $isi = $row->isi_post;
        $gambar = $row->file_gambar;
      }
    }
  } else {
    $valid = TRUE; // Flag validasi
    $judul = test_input($_POST['judul']);
    if ($judul == '') {
      $error_judul = "Title is required";
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

    move_uploaded_file($_FILES['gambar']['tmp_name'], "../img/".$gambar);

    // Update data into database
    if ($valid) {
      // Asign a query
      $query = "UPDATE post SET judul = '".$judul."', isi_post = '".$isi."', file_gambar = '".$gambar."', tgl_update = NOW() WHERE idpost = ".$id."";

      // Execute the query
      $result = $db->query($query);
      if (!$result) {
        die ("Could not query the database: <br>".$db->error.'<br>Query:'.$query);
      } else {
        $db->close();
        header('Location: postingan.php');
      }
    }
  }
?>

<?php include '../includes/header_penulis.php'; ?>

  <div class="content">
    <main>
      <div class="container-fluid">
        <div class="container-fluid mt-4 text-mattBlackDark" style="max-width: 680px;">
          <div class="card">
            <div class="card-header text-center bg-warning" style="font-weight: bold; font-size: 20px; padding: 15px 0; color: white;">Edit Postingan</div>
            <div class="card-body">
              <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?id='.$id; ?>" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="judul">Judul</label>
                  <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $judul; ?>" autofocus>
                  <div class="error" style="color: red; font-size: 0.75em"><?php if (isset($error_judul)) echo $error_judul; ?></div>
                </div>

                <div class="form-group">
                  <label for="isi">Isi Post</label>
                  <textarea type="text" class="form-control" id="isi" name="isi" rows="3"><?php echo $isi; ?></textarea>
                  <div class="error" style="color: red; font-size: 0.75em"><?php if (isset($error_isi)) echo $error_isi; ?></div>
                </div>

                <div class="form-group">
                  <label for="gambar">File Gambar</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="gambar" name="gambar">
                    <label class="custom-file-label" for="gambar" id="nama_gambar" nama="nama_gambar"><?php echo $gambar; ?></label>
                  </div>
                  <div class="error" style="color: red; font-size: 0.75em"><?php if (isset($error_gambar)) echo $error_gambar; ?></div>
                </div>

                <br>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit">Save</button>
                  <a href="postingan.php" class="btn btn-secondary">Cancel</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>

<?php
  $db->close();
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha256-OUFW7hFO0/r5aEGTQOz9F/aXQOt+TwqI1Z4fbVvww04=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js" integrity="sha256-qE/6vdSYzQu9lgosKxhFplETvWvqAAlmAuR+yPh/0SI=" crossorigin="anonymous"></script>
<script src="../src/js/script.js"></script>

<?php include '../includes/footer.php'; ?>
