<?php

/**
 * List all users with a link to edit
 */

try {
  require "config.php";
  require "common.php";

  $connection = new PDO($dsn, $username, $password, $options);

  $sql = "SELECT * FROM users";

  $statement = $connection->prepare($sql);
  $statement->execute();

  $result = $statement->fetchAll();

} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}
?>

<?php require "template/header.php"; ?>

<h2><i class="fas fa-edit"></i>Atualizar usuários</h2>

<table class="table">
  <thead>
    <tr>
      <th scope="col"> # </th>
      <th scope="col"> Nome </th>
      <th scope="col"> Sexo </th>
      <th scope="col"> Email </th>
      <th scope="col"> Tipo do documento </th>
      <th scope="col"> Documento </th>
      <th scope="col"> Date </th>
      <th scope="col"> Editar </th>
      <th scope="col"> Excluir </th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($result as $row) : ?>
    <tr>
      <td><?php echo escape($row["id"]); ?></td>
      <td><?php echo escape($row["name"]); ?></td>
      <td><?php echo escape($row["sex"]); ?></td>
      <td><?php echo escape($row["email"]); ?></td>
      <td><?php echo escape($row["type_doc"]); ?></td>
      <td><?php echo escape($row["doc"]); ?></td>
      <td><?php echo escape($row["date"]); ?> </td>
      <td><a href="update-user.php?id=<?php echo escape($row["id"]); ?>"><i class="fas fa-edit"></a></td>
      <td><a href="delete.php?id=<?php echo escape($row["id"]); ?>"><i class="fas fa-trash-alt"></i></a></td>
  </tr>
  <?php endforeach; ?>
  </tbody>
</table>

<div class="form-group">
  <a href="index.php">Voltar</a>
<div>

  <?php require "template/footer.php"; ?>
