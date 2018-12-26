<?php
    require_once("config.php");
    if((isset($_POST['name'])&& $_POST['name'] !='') && (isset($_POST['email'])&& $_POST['email'] !=''))
    {
      require_once("contact_mail.php<strong>");
    </strong>
    $yourName = $conn->real_escape_string($_POST['name']);
    $yourEmail = $conn->real_escape_string($_POST['your_email']);
    $yourPhone = $conn->real_escape_string($_POST['your_phone']);
    $comments = $conn->real_escape_string($_POST['comments']);

    $sql="INSERT INTO simple_form_info (name, email, phone, comments) VALUES ('".$formName."','".$formEmail."', '".$formPhone."', '".$comments."')";


    if(!$result = $conn->query($sql)){
      die('There was an error running the query [' . $conn->error . ']');
    }
    else
    {
      echo "Obrigado.";
    }
    }
    else
    {
      echo "Erro.";
    }
?>
