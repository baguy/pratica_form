<?php
  $toEmail = "mayradbueno@gmail.com";
  $mailHeaders = "From: " . $_POST["your_name"] . "<". $_POST["your_email"] .">\r\n";
  if(mail($toEmail, $_POST["comments"], $_POST["your_phone"], $mailHeaders)) {
    echo"<p class='success'>Email enviado.</p>";
  } else {
    echo"<p class='Error'>Erro enviando email.</p>";
  }
?>
