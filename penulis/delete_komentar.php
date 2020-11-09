<?php
  include_once '../lib/db_login.php';

  $id = $_GET['id'];

  // Delete data from database
  if (!empty($id)) {
    $query = "DELETE FROM komentar WHERE idkomentar = '$id'";
    $result = $db->query($query);
    if (!$result) {
      die('Could not query the database: <br>'.$db->error.'<br>Query: '.$query);
    } else {
      $db->close();
      header('Location: index_penulis.php');
    }
  }
?>
