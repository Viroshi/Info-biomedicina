<?php
    include_once "includes/header.php";
    session_start();
    

  if (!isset($_SESSION['cadastros'])) {
      $_SESSION['cadastros'] = [];
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $dados = [
          'nome' => $_POST['nome'],
          'sobrenome' => $_POST['sobrenome'],
          'email' => $_POST['email'],
          'endereco' => $_POST['endereco'],
          'numero' => $_POST['numero'],
          'complemento' => $_POST['complemento'],
          'estado' => $_POST['estado'],
          'cidade' => $_POST['cidade'],
          'cep' => $_POST['cep']
      ];

      $_SESSION['cadastros'][] = $dados;
      header('Location: dados.php');
      exit;
  }
?>

<main class="d-flex justify-content-center align-items-center form">
  <h1>Formulário de cadastro</h1>
  <h3 class="text-white">Você está um passo de receber as ultimas noticias</h3>
<form class="row g-3" method="POST" action="form.php">
  <div class="col-md-6">
    <label for="inputPrimaryName4" class="form-label fw-semibold">Primeiro Nome</label>
    <input type="text" class="form-control" id="inputPrymaryName4" name="nome" required>
  </div>
  <div class="col-md-6">
    <label for="inputSecondyName4" class="form-label fw-semibold">Sobrenome</label>
    <input type="text" class="form-control" id="inputSecondyName4" name="sobrenome" required>
  </div>
  <div class="col-12">
    <label for="inputEmail" class="form-label fw-semibold">Email</label>
    <input type="email" class="form-control" id="inputEmail" placeholder="email@email.com" name="email" required>
  </div>
  <div class="col-md-8">
    <label for="inputAddress1" class="form-label fw-semibold">Endereço</label>
    <input type="text" class="form-control" id="inputAddress1" placeholder="Rua XXXX N 0" name="endereco" required>
  </div>
  <div class="col-md-4">
    <label for="inputNumber" class="form-label fw-semibold">Numero</label>
    <input type="text" class="form-control" id="inputNumber" placeholder="S/N para sem número" name="numero" required>
  </div>
  <div class="col-12">
    <label for="inputAddress2" class="form-label fw-semibold">Complemento</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartamento, casa, comércio" name="complemento" required>
  </div>
  <div class="col-md-4">
    <label for="inputState" class="form-label fw-semibold">Estado</label>
    <select id="inputState" class="form-select" name="estado" required>
    </select>
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label fw-semibold">Cidade</label>
    <select id="inputCity" class="form-select" name="cidade" required>
    </select>
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label fw-semibold">CEP</label>
    <input type="text" class="form-control" id="inputZip" placeholder="00000-000" name="cep" required>
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck" name="checkbox" required>
      <label class="form-check-label" for="gridCheck">
        Concordo com os <a href="#" class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">Termos</a> de uso
      </label>
    </div>
  </div>
  <div class=" div-btn col-12 d-flex justify-content-around">
    <button type="submit" class="btn btn-primary">Enviar</button>
    <button type="reset" class="btn btn-secondary">Apagar tudo</button>
  </div>
</form>
</main>

<?php
    include_once "includes/footer.php";
?>