<?php
  session_start(); // Inisialisasi session
  require_once('../lib/db_login.php');

  $email = $password = '';

  // Cek apakah user sudah submit form
  if (isset($_POST["submit"])) {
    $valid = TRUE; // Flag validasi

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

    // Cek validasi
    if ($valid) {
      // Asign a query
      $query = "SELECT * FROM admin WHERE email = '".$email."' AND password = '".md5($password)."'";

      // Execute the query
      $result = $db->query($query);
      if (!$result) {
        die ("Could not query the database: <br>".$db->error);
      } else {
        if ($result->num_rows > 0) { // Login berhasil
          $_SESSION['username'] = $email;
          header('Location: dashboard.php');
          exit;
        } else { // Login gagal
          $error_login = 'Combination of email and password are not correct.';
        }
      }

      // Close db connection
      $db->close();
    }
  }
?>

<?php include '../includes/header_admin_login.php'; ?>

  <div class="content" style="margin-top: 10%;">
    <main>
      <div class="container-fluid">
        <!-- Login Form -->
        <div class="container-fluid mt-4 text-mattBlackDark" style="max-width: 400px;">
          <div class="card">
            <div class="card-header text-center bg-info" style="font-weight: bold; font-size: 20px; padding: 15px 0; color: white;">Login Admin</div>
            <div class="card-body">
              <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group">
                  <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" placeholder="Email" autofocus>
                  <div class="error" style="color: red; font-size: 0.75em;"><?php if (isset($error_email)) echo $error_email; ?></div>
                </div>

                <div class="form-group">
                  <input type="password" class="form-control" id="password" name="password" value="" placeholder="Password">
                  <div class="error" style="color: red; font-size: 0.75em;"><?php if (isset($error_password)) echo $error_password; ?></div>
                </div>

                <br>
                <button type="submit" class="btn btn-danger btn-block" name="submit" value="submit" style="border-radius: 50px;">Login</button>
                <div class="error text-center mt-3" style="color: red; font-size: 0.75em;"><?php if (isset($error_login)) echo $error_login; ?></div>
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
