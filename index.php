<?php
/**
 * Formulário HTML para criar novo usuário
 * no banco de dados.
 *
 */
if (isset($_POST['submit'])) {
    require "config.php";
    require "common.php";
    try  {
        $connection = new PDO($dsn, $username, $password, $options);

        $new_user = array(
            "name" => $_POST['name'],
            "email"     => $_POST['email'],
            "sex"       => $_POST['sex'],
            "type_doc"  => $_POST['type_doc'],
            "doc"       => $_POST['doc']
        );
        $sql = sprintf(
                "INSERT INTO %s (%s) values (%s)",
                "users",
                implode(", ", array_keys($new_user)),
                ":" . implode(", :", array_keys($new_user))
        );

        $statement = $connection->prepare($sql);
        $statement->execute($new_user);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>

<?php require "template/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) { ?>
    <blockquote><?php echo $_POST['name']; ?> adicionado(a) com sucesso.</blockquote>
<?php } ?>

<div class="form-group">
  <h4><i class="fas fa-list-ul"></i><a href="list.php"> Listar usuários</h4></a>
</div>
<div class="form-group">
  <h4><i class="fas fa-edit"></i><a href="update.php"> Atualizar usuários</h4></a>
</div>

<h2><i class="fas fa-address-book"></i> Novo usuário </h2>

<div class="container">
          <form name="simple-form" action="" method="post" id="simple-form">
            <div class="form-group">
              <label for="label_nome">Nome</label>
              <input type="nome" name="name" class="form-control" id="name" aria-describedby="nome" placeholder="Insira seu nome completo">
            </div>
            <div class="form-group">
              <div class="form-row">
                <label for="label_sexo">Sexo</label>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sex" id="feminino" value="1">
                    <label class="form-check-label" for="inlineRadio1">Feminino</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sex" id="masculino" value="2">
                    <label class="form-check-label" for="inlineRadio2">Masculino</label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-check form-check-inline">
                  <label for="label_tel">Telefone</label>
                    <div class="col">
                      <input class="form-check-input" type="radio" name="tel" id="residencial" value="1">
                      <label class="form-check-label" for="inlineRadio1">Residencial</label>
                    </div>
                    <div class="col">
                      <input class="form-check-input" type="radio" name="tel" id="celular" value="2">
                      <label class="form-check-label" for="inlineRadio2">Celular</label>
                    </div>
                  </div>
                  <input type="nome" name="name" class="form-control" id="tel_n" aria-describedby="telephone" placeholder="Insira seu número">
                </div>
                <div class="form-group">
                  <label for="label_email">Email</label>
                  <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Insira seu email">
              </div>
              <div class="form-group">
                    <label for="label_cep">CEP</label>
                    <input type="cep" name="cep" class="form-control" id="cep" aria-describedby="cep" placeholder="Insira seu cep">
                </div>
              <div class="form-group">
                    <label for="label_cep">Bairro</label>
                    <input type="bairro" name="bairro" class="form-control" id="bairro" aria-describedby="neighborhood" placeholder="Insira seu bairro">
              </div>
              <div class="form-group">
                    <label for="label_cep">Estado</label>
                    <input type="estado" name="estado" class="form-control" id="estado" aria-describedby="state" placeholder="Insira o estado de sua residência">
              </div>
              <div class="form-group">
                    <label for="label_rua">Rua</label>
                    <input type="rua" name="email" class="form-control" id="street" aria-describedby="street" placeholder="Insira seu logradouro">
                </div>
                <div class="form-group">
                      <label for="label_rua">Número da residência</label>
                      <input type="num" name="str_num" class="form-control" id="str_num" aria-describedby="number" placeholder="Insira o número da residência">
                  </div>
              <div class="form-group">
                  <label for="tipo_doc">Tipo de documento</label>
                  <select class="form-control" id="type_doc" name="type_doc">
                    <option value="RG">RG</option>
                    <option value="CPF">CPF</option>
                    <option value="NAO">Não tem</option>
                  </select>
              </div>
            <div class="form-group">
              <label for="label_doc">Documento</label>
              <input type="documento" name="doc" class="form-control" id="doc" placeholder="Documento">
            </div>

            <button type="submit" class="btn btn-primary" name="submit" value="Submit" id="submit_form">Enviar</button>

          </form>

      </div> <!-- container -->

      <!-- Bootstrap core JavaScript -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<?php require "template/footer.php"; ?>
