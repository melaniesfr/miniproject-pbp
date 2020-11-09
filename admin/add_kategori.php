<?php include '../includes/header_admin.php'; ?>

<?php
  require_once('../lib/db_login.php');
  $nama = '';

  // Mengecek apakah user belum menekan tombol submit
  if (isset($_POST["submit"])) {
    $valid = TRUE;

    $nama = test_input($_POST['nama']);
    if (empty($nama)) {
      $error_nama = 'Name is required';
      $valid = FALSE;
    } elseif (!preg_match('/^[a-zA-Z ]*$/', $nama)) {
      $error_nama = 'Only letters and white space allowed';
      $valid = FALSE;
    }

    // Add data to database
    if ($valid) {
      $query = "INSERT INTO kategori (nama) VALUES ('$nama')";
      $result = $db->query($query);
      if (!$result) {
        die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query);
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
            <div class="card-header text-center bg-info" style="font-weight: bold; font-size: 20px; padding: 15px 0; color: white;">Tambah Kategori</div>
            <div class="card-body">
              <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama" autofocus>
                  <div class="error" style="color: red; font-size: 0.75em;"><?php if (isset($error_nama)) echo $error_nama; ?></div>
                </div>

                <br>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit">Add</button>
                  <a href="data_kategori.php" class="btn btn-secondary">Back</a>
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
