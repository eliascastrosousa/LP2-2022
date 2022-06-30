<h1>Editar usuário</h1>

<?php
    $sql = "SELECT * FROM usuario WHERE id=".$_REQUEST["id"];

    $res = $conn->query($sql);

    $row = $res -> fetch_object();
?>

<div class="mt-4">
    <form action="?page=FUNCOES" method="POST" style="width: 50%;">
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id" value="<?php print $row->id;?>">
        <div class="mb-3">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" value="<?php print $row->nome;?>" class="form-control">
        </div>
        <div class="mb-3">
            <label for="email">E-mail:</label>
            <input type="email" name="email" value="<?php print $row->email;?>" class="form-control">
        </div>
        <div class="mb-3">
            <label for="tipo">Tipo de usuário:</label><br>
            <input type="radio" name="tipo" value="professor"> Professor <br>
            <input type="radio" name="tipo" value="aluno"> Aluno <br>
            <input type="radio" name="tipo" value="funcionario"> Funcionário <br>
        </div>
        <input type="hidden" name="multa" value="0">
        <div class="mb-3">
            <input type="submit" value="Salvar" class="btn btn-success">
        </div>
    </form>
</div>