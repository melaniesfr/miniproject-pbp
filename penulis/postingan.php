<?php include '../includes/header_penulis.php'; ?>

<?php
  if ($_SESSION['username']) {
    $user = $_SESSION['username'];
    $query1 = "SELECT * FROM penulis WHERE email = '$user'";
  }
  $result1 = $db->query($query1);
  if (!$result1) {
    die ("Could not query the database: <br>".$db->error);
  }

  while ($row1 = $result1->fetch_object()) {
    $idpenulis = $row1->idpenulis;
  }
?>

  <div class="content">
    <main>
      <div class="container-fluid">
        <div class="container-fluid mt-4 text-mattBlackDark" style="max-width: 1100px;">
          <div class="card">
            <div class="card-header text-center bg-secondary" style="font-weight: bold; font-size: 20px; padding: 15px 0; color: white;">Daftar Postingan</div>
            <a class="btn btn-info" href="index_penulis.php" style="max-width: 95px; margin: 20px 0 0 20px;">Kembali</a>
            <div class="card-body">
              <table class="table table-striped text-mattBlackDark">
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Isi</th>
                  <th>Gambar</th>
                  <th>Kategori</th>
                  <th>Terakhir Update</th>
                  <th>Action</th>
                </tr>

                <?php
                  // Execute the query
                  $query = "SELECT * from post WHERE idpenulis = '$idpenulis'";
                  $result = $db->query($query);
                  if (!$result) {
                    die ("Could not query the database: <br>".$db->error."<br>Query: ".$query);
                  }

                  // Fetch and display the results
                  $i = 1;
                  while ($row = $result->fetch_object()) {
                    $isi = $row->isi_post;
                    if (strlen($isi) > 25) {
                      $isi = substr($isi, 0, 25)."...";
                    }

                    echo '<tr>';
                    echo '<td>'.$i.'</td>';
                    echo '<td>'.$row->judul.'</td>';
                    echo '<td>'.$isi.'</td>';
                    echo '<td><img src="../img/'.$row->file_gambar.'" class="card-img-top mx-auto d-block" alt="'.$row->judul.'" style="width: 100px;"></td>';
                    echo '<td>'.$row->idkategori.'</td>';
                    echo '<td>'.$row->tgl_update.'</td>';
                    echo '<td>
                              <a class="btn btn-warning btn-sm" href="edit_post.php?id='.$row->idpost.'">Edit</a>&nbsp;&nbsp;
                              <a class="btn btn-danger btn-sm" href="delete_post.php?id='.$row->idpost.'" onClick="hapus()">Delete</a>
                          </td>';
                    echo '</tr>';

                    $i++;
                  }
                  echo '</table>';
                  echo '<br>';
                  echo 'Total Rows = '.$result->num_rows;

                  $result->free();
                  $db->close();
                ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>

<script>
  function hapus() {
    alert("Postingan ini akan dihapus!");
  }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha256-OUFW7hFO0/r5aEGTQOz9F/aXQOt+TwqI1Z4fbVvww04=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js" integrity="sha256-qE/6vdSYzQu9lgosKxhFplETvWvqAAlmAuR+yPh/0SI=" crossorigin="anonymous"></script>
<script src="../src/js/script.js"></script>

<?php include '../includes/footer.php'; ?>
