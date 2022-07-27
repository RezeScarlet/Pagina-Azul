<?php

  $conexao = mysqli_connect("localhost", "root", "", "pagina azul");

  if (mysqli_connect_error()) {
    echo "Failed to connect to MySQL:" . mysqli_connect_error();
  }


?>