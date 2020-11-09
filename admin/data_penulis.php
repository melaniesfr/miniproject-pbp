<?php include '../includes/header_admin.php'; ?>

  <div class="content">
    <main>
      <div class="container-fluid">
        <div class="container-fluid mt-4 text-mattBlackDark" style="max-width: 1000px;">
          <div class="card">
            <div class="card-header text-center" style="font-weight: bold; font-size: 20px; padding: 15px 0; color: white; background-color: #f74343;">Data Penulis</div>
            <div class="card-body">
              <table class="table table-striped text-mattBlackDark">
                <tr>
                  <th>No</th>
                  <th>Nama Penulis</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Action</th>
                </tr>

                <?php
                  // Execute the query
                  $query = "SELECT * FROM penulis ORDER BY idpenulis";
                  $result = $db->query($query);
                  if (!$result) {
                    die ("Could not query the database: <br>".$db->error."<br>Query: ".$query);
                  }

                  // Fetch and display the results
                  $i = 1;
                  while ($row = $result->fetch_object()) {
                    echo '<tr>';
                    echo '<td>'.$i.'</td>';
                    echo '<td>'.$row->nama.'</td>';
                    echo '<td>'.$row->email.'</td>';
                    echo '<td>'.$row->password.'</td>';
                    echo '<td>
                            <a class="btn btn-warning btn-sm" href="reset_pass.php?id='.$row->idpenulis.'" onClick="reset()">Reset Password</a>
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
  function reset() {
    alert("Password penulis ini akan di-reset!");
  }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha256-OUFW7hFO0/r5aEGTQOz9F/aXQOt+TwqI1Z4fbVvww04=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js" integrity="sha256-qE/6vdSYzQu9lgosKxhFplETvWvqAAlmAuR+yPh/0SI=" crossorigin="anonymous"></script>
<script src="../src/js/script.js"></script>

<?php include '../includes/footer.php'; ?>
