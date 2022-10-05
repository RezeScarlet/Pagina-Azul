<?php
  if (!isset($_SESSION["nome"])) {
    header("location: ../../admin/login");
  }
?>