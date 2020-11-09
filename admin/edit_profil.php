<?php include '../includes/header_admin.php'; ?>

  <div class="content">
    <main>
      <div class="container-fluid">
        <!-- Edit Form -->
        <div class="container-fluid mt-4 text-mattBlackDark" style="max-width: 425px;">
          <div class="card">
            <div class="card-header text-center bg-primary" style="font-weight: bold; font-size: 20px; padding: 15px 0; color: white;">Edit Profil Admin</div>
            <div class="card-body">
              <?php
                require_once('../lib/db_login.php');

                if ($_SESSION['username']) {
                  $user = $_SESSION['username'];

                  $query = "SELECT * FROM admin where email = '$user'";
                  $result = $db->query($query);
                  if (!$result) {
                    die ("Could not query the database: <br>".$db->error.'<br>Query:'.$query);
                  } else {
                    while ($row = $result->fetch_object()) {
                      $nama = $row->nama;
                      $email = $row->email;
                      $password = $row->password;
                    }
                  }
                }

                if (@$_POST['save']) {
                  $user = $_SESSION['username'];

                  $valid = TRUE; // Flag validasi
                  $nama = test_input($_POST['nama']);
                  if ($nama == '') {
                    $error_nama = "Name is required";
                    $valid = FALSE;
                  } elseif (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
                    $error_nama = "Only letters and white space allowed";
                    $valid = FALSE;
                  }

                  $email = test_input($_POST['email']);
                  if ($email == '') {
                    $error_email = "Email is required";
                    $valid = FALSE;
                  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $error_email = "Invalid email format";
                    $valid = FALSE;
                  }

                  $password = $_POST['password'];
                  if ($password == '') {
                    $error_password = "Password is required";
                    $valid = FALSE;
                  }

                  // Update data into database
                  if ($valid) {
                    // Asign a query
                    $query = "UPDATE admin SET nama = '".$nama."', email = '".$email."', password = '".md5($password)."' WHERE email = '$user'";

                    // Execute the query
                    $result = $db->query($query);
                    if (!$result) {
                      die ("Could not query the database: <br>".$db->error.'<br>Query:'.$query);
                    } else {
                      $db->close();
                    }
                  }
                }
              ?>

              <form method="POST" autocomplete="on" action="">
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="nama" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" autofocus>
                  <div class="error" style="color: red; font-size: 0.75em;"><?php if (isset($error_nama)) echo $error_nama; ?></div>
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                  <div class="error" style="color: red; font-size: 0.75em;"><?php if (isset($error_email)) echo $error_email; ?></div>
                </div>

                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="text" class="form-control" id="password" name="password" value="">
                  <div class="error" style="color: red; font-size: 0.75em;"><?php if (isset($error_password)) echo $error_password; ?></div>
                </div>

                <br>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="save" value="save">Save</button>
                  <a href="edit_profil.php" class="btn btn-secondary">Cancel</a>
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
