<?php include '../includes/header_pengunjung.php'; ?>

  <div class="content">
    <main>
      <div class="container-fluid">
        <br><h2>Article</h2>

				<?php
					$id = $_GET['id'];
					require_once('../lib/db_login.php');

					$query = "SELECT * FROM post WHERE idpost = $id";
					$result = $db->query($query);
					if (!$result) {
						die ("could not query database: <br>".$db->error."<br>Query: ".$query);
					}

					while ($row = $result->fetch_object()) {
						$id = $row->idpost;
						$judul = $row->judul;
						$isi = $row->isi_post;
						$gambar = $row->file_gambar;
						$tgl_insert = $row->tgl_insert;

						echo '<center>
                    <div class="card-body">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="bg-mattBlackLight my-2 p-3">
                          <h3>'.$judul.'</h3>
                          <img class="img-fluid" src="../img/'.$gambar.'" width="480px";>
                          <br><br>
                          <p class="card-text text-left">'.$isi.'</p>
                          <span class="float-right" style="color: grey; font-size: 0.8em; margin-right: 10px;">'.$row->tgl_insert.'</span>
                        </div>
                      </div>
                    </div>
                  </center>';
          }
          echo '<br/><br/>';
					include 'komentar.php';
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
