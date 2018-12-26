<?php
/**
 * Use an HTML form to edit an entry in the
 * users table.
 *
 */
require "config.php";
require "common.php";
if (isset($_POST['submit'])) {
  try {
    $connection = new PDO($dsn, $username, $password, $options);
    $user =[
      "id"        => $_POST['id'],
      "name"      => $_POST['name'],
      "sex"       => $_POST['sex'],
      "email"     => $_POST['email'],
      "type_doc"  => $_POST['type_doc'],
      "doc"       => $_POST['doc'],
      "date"      => $_POST['date']
    ];

    $sql = "UPDATE users
            SET id = :id,
              name = :name,
              sex = :sex,
              email = :email,
              type_doc = :type_doc,
              doc = :doc,
              date = :date
            WHERE id = :id";

  $statement = $connection->prepare($sql);
  $statement->execute($user);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
}

if (isset($_GET['id'])) {
  try {
    $connection = new PDO($dsn, $username, $password, $options);
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id = :id";
    $statement = $connection->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
} else {
    echo "Something went wrong!";
    exit;
}
?>

<?php require "template/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) : ?>
	<blockquote>Usuário atualizado com sucesso.</blockquote>
<?php endif; ?>

<h2><i class="fas fa-edit"></i>Atualizar usuário</h2>

<form method="post">
    <?php foreach ($user as $key => $value) : ?>
      <div class="form-group">
        <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
  	    <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" value="<?php echo escape($value); ?>" <?php echo ($key === 'id' ? 'readonly' : null); ?>>
      </div>
    <?php endforeach; ?>

    <div class="form-group">
      <input type="submit" name="submit" value="Enviar">
    </div>

</form>

<div class="form-group">
  <a href="index.php">Voltar</a>
<div>

<?php require "template/footer.php"; ?>
