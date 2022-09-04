<?php
  if (isset($_POST["id"])) {
      $id = $db->real_escape_string($_POST["id"]);
  } else {
      $id = 0;
  }

  $logout = $db->query('UPDATE user SET is_login=0 WHERE id="'.$id.'"'); 
?>