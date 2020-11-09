<?php include '../includes/header_admin.php'; ?>

  <div class="content">
    <main>
      <div class="container-fluid">
        <div class="col-md-12 mt-4">
          <div class="jumbotron">
            <h3 class="display-4 text-center">Selamat datang,
              <?php
                if ($_SESSION['username']) {
                  $user = $_SESSION['username'];
                }

                $query = "SELECT * FROM admin WHERE email = '$user'";
                $result = $db->query($query);
                if (!$result) {
                  die ("Could not query the database: <br>".$db->error);
                }

                while ($row = $result->fetch_object()) {
                  echo "$row->nama!";
                }

                $result->free();
                $db->close();
              ?>
            </h3>
            <hr class="my-4">
            <p class="lead text-center">Halaman ini merupakan <i>dashboard</i> pada bagian Admin.</p>
            </p>
          </div>
          <div class="alert alert-info text-center" style="margin-top: 225px;">Copyright 2020 &copy; Pengembangan Berbasis Platform</div>
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
