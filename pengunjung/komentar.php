<script>
  function error() {
    alert('Go to the Penulis page.');
	document.location='../penulis/login.php';
  }
</script>

<?php
	$id = $_GET['id'];
	$query = "SELECT * FROM komentar ko JOIN post p JOIN penulis pe ON ko.idpost = p.idpost AND ko.idpenulis = pe.idpenulis WHERE p.idpost = $id" ;
	$result = $db->query($query);
	if (!$result) {
		die("could not query database: <br>".$db->error."<br>Query: ".$query);
	}

  echo '<button class="btn btn-light" onClick="error()" type="submit" name="btnkomen">Komentar</button>';

	while ($row = $result->fetch_object()){
		$idk = $row->idkomentar;
		$idp = $row->idpost;
		$isi = $row->isi;

		echo '<hr style="background-color: white;">
			    <div class="card">
			      <span class="text-right" style="color: grey; font-size: 0.8em; margin: 10px 10px 0 0;">'.$row->tgl_update.'</span>
						<b style="margin-left: 10px;">'.$row->nama.'</b>
						<p style="margin-left: 10px;">'.$row->isi.'</p>
					</div>';
	}

	$result->free();
	$db->close();
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha256-OUFW7hFO0/r5aEGTQOz9F/aXQOt+TwqI1Z4fbVvww04=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js" integrity="sha256-qE/6vdSYzQu9lgosKxhFplETvWvqAAlmAuR+yPh/0SI=" crossorigin="anonymous"></script>
<script src="../src/js/script.js"></script>

<?php include '../includes/footer.php'; ?>
