<?php
  require_once('../lib/db_login.php');

  $id = $_GET['id']; // Mendapatkan idkategori yang dilewatkan ke url
  $pass = 'password'; // Password penulis akan otomatis ter-reset menjadi 'password'

  if (!isset($_POST["submit"])) {
    $query = "UPDATE penulis SET password = '".md5($pass)."' WHERE idpenulis = ".$id."";

    // Execute the query
    $result = $db->query($query);
    if (!$result) {
      die ("Could not query the database: <br>".$db->error.'<br>Query:'.$query);
    } else {
      $db->close();
      header('Location: data_penulis.php');
    }
  }
?>
