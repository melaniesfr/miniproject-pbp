<?php
  require_once('../lib/db_login.php');
  $id = $_GET['id'] ?? NULL;

  // Delete data from database
  if (!empty($id)) {
    $query = "DELETE FROM kategori WHERE idkategori = '$id'";
    $result = $db->query($query);
    if (!$result) {
      die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query);
    } else {
      $db->close();
      header('Location: data_kategori.php');
    }
  }
?>
