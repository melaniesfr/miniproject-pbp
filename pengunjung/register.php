<?php
  session_start(); // Inisialisasi session
  require_once('../lib/db_login.php');

  $nama = $email = $password = $notelp = $kota = $alamat = '';

  // Mengecek apakah user belum menekan tombol submit
  if (isset($_POST["submit"])) {
    $valid = TRUE;

	// Cek validasi nama
    $nama = test_input($_POST['nama']);
    if (empty($nama)) {
      $error_nama = 'Name is required';
      $valid = FALSE;
    } elseif (!preg_match('/^[a-zA-Z ]*$/', $nama)) {
      $error_nama = 'Only letters and white space allowed';
      $valid = FALSE;
    }

	// Cek validasi email
    $email = test_input($_POST['email']);
    if ($email == '') {
      $error_email = "Email is required";
      $valid = FALSE;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error_email = "Invalid email format";
      $valid = FALSE;
    }

	// Cek validasi password
    $password = test_input($_POST['password']);
    if ($password == '') {
      $error_password = "Password is required";
      $valid = FALSE;
    }

	// Cek validasi no telp
	$notelp = test_input($_POST['notelp']);
    if (empty($notelp)) {
      $error_notelp = 'Phone number is required';
      $valid = FALSE;
    } elseif (!preg_match('/^[0-9]*$/', $notelp)) {
      $error_notelp = 'Only numbers allowed';
      $valid = FALSE;
    }

	// Cek validasi kota
    $kota = test_input($_POST['kota']);
    if (empty($kota)) {
      $error_kota = 'City is required';
      $valid = FALSE;
    } elseif (!preg_match('/^[a-zA-Z ]*$/', $nama)) {
      $error_nama = 'Only letters and white space allowed';
      $valid = FALSE;
    }

	// Cek validasi alamat
    $alamat = test_input($_POST['alamat']);
    if (empty($alamat)) {
      $error_alamat = 'Address is required';
      $valid = FALSE;
    } elseif (!preg_match('/^[a-zA-Z0-9 ]*$/', $nama)) {
      $error_nama = 'Only letters, numbers, and white space allowed';
      $valid = FALSE;
    }

    // Add data to database
    if ($valid) {
      $query = "INSERT INTO penulis (nama,password, alamat, kota, email, no_telp) VALUES ('$nama', '".md5($password)."', '$alamat', '$kota', '$email', '$notelp')";
      $result = $db->query($query);
      if (!$result) {
        die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query);
      } else {
        $db->close();
        header('Location: pengunjung_home.php');
      }
    }
  }
?>

<?php include '../includes/header_pengunjung.php'; ?>

  <div class="content">
    <main>
      <div class="container-fluid">
        <div class="container-fluid mt-4 text-mattBlackDark" style="max-width: 680px;">
          <div class="card">
            <div class="card-header text-center bg-warning" style="font-weight: bold; font-size: 20px; padding: 15px 0; color: white;">Create Account</div>
            <div class="card-body">
              <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <div class="form-group">
                  <label for="nama">Nama <span style="color: red; font-size: 0.8em;">*</span></label>
                  <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" autofocus>
                  <div class="error" style="color: red; font-size: 0.75em;"><?php if (isset($error_nama)) echo $error_nama; ?></div>
                </div>

				        <div class="form-group">
                  <label for="email">Email <span style="color: red; font-size: 0.8em;">*</span></label>
                  <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                  <div class="error" style="color: red; font-size: 0.75em;"><?php if (isset($error_email)) echo $error_email; ?></div>
                </div>

				        <div class="form-group">
                  <label for="password">Password <span style="color: red; font-size: 0.8em;">*</span></label>
                  <input type="text" class="form-control" id="password" name="password" value="<?php echo $password; ?>">
                  <div class="error" style="color: red; font-size: 0.75em;"><?php if (isset($error_password)) echo $error_password; ?></div>
                </div>

				        <div class="form-group">
                  <label for="notelp">No Telp <span style="color: red; font-size: 0.8em;">*</span></label>
                  <input type="text" class="form-control" id="notelp" name="notelp" value="<?php echo $notelp; ?>">
                  <div class="error" style="color: red; font-size: 0.75em;"><?php if (isset($error_notelp)) echo $error_notelp; ?></div>
                </div>

				        <div class="form-group">
                  <label for="kota">Kota <span style="color: red; font-size: 0.8em;">*</span></label>
                  <input type="text" class="form-control" id="kota" name="kota" value="<?php echo $kota; ?>">
                  <div class="error" style="color: red; font-size: 0.75em;"><?php if (isset($error_kota)) echo $error_kota; ?></div>
                </div>

				        <div class="form-group">
                  <label for="alamat">Alamat <span style="color: red; font-size: 0.8em;">*</span></label>
                  <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat; ?>">
                  <div class="error" style="color: red; font-size: 0.75em;"><?php if (isset($error_alamat)) echo $error_alamat; ?></div>
                </div>

                <br>
                <button type="submit" class="btn btn-danger btn-block" name="submit" value="submit" style="border-radius: 50px;">Register</button>
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
