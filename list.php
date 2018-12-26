<?php
/**
 * Function to query information based on
 * a parameter: in this case, location.
 *
 */
if (isset($_POST['submit'])) {
    try  {

        require "config.php";
        require "common.php";
        $connection = new PDO($dsn, $username, $password, $options);
        $sql = "SELECT *
                        FROM users";
        $statement = $connection->prepare($sql);
        // $statement->bindParam(':location', $location, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchAll();
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>
<?php require "template/header.php"; ?>

<?php
if (isset($_POST['submit'])) {
    if ($result && $statement->rowCount() > 0) { ?>
        <h2>Resultado</h2>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col"> # </th></li>
                    <th scope="col"> Nome </th>
                    <th scope="col"> Email </th>
                    <th scope="col"> Sexo </th>
                    <th scope="col"> Tipo de documento </th>
                    <th scope="col">Documento </th>
                    <th scope="col">Date </th>
                </tr>
            </thead>
            <tbody>
        <?php foreach ($result as $row) { ?>
            <tr>
                <td><?php echo escape($row["id"]); ?></td>
                <td><?php echo escape($row["name"]); ?></td>
                <td><?php echo escape($row["email"]); ?></td>
                <td><?php echo escape($row["sex"]); ?></td>
                <td><?php echo escape($row["type_doc"]); ?></td>
                <td><?php echo escape($row["doc"]); ?></td>
                <td><?php echo escape($row["date"]); ?> </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <?php } else { ?>
        <blockquote>Nenhum usuário encontrado.</blockquote>
    <?php }
}
?>

<h2><i class="fas fa-list-ul"></i> Listar usuários</h2>

<div class="form-group">
  <form method="post">
      <input type="submit" name="submit" value="Listar">
  </form>
</div>

<div class="form-group">
  <a href="index.php">Voltar</a>
<div>

<?php require "template/footer.php"; ?>
