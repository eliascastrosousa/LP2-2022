<div class="container">
    <div style="height: 100vh">
        <div class="flex-center flex-column">

            <h3 class="mb-5">Biblioteca IFSP - Guarulhos</h3>
            <p class="h4 mb-4">Cadastro de Emprestimo</p>

            <form action="?page=FUNCOES" method="POST" style="width: 50% height: 50%;">
                <input type="hidden" name="acao" value="cadastrar-emprestimo">
                <hr>
                Usuario
                <select class="form-control mb-4" data-val="true" name="usuarioID">
                <option > </option>
                <hr>
                    <?php 
                        $sql = mysqli_query($conn, "select id, nome from usuario where id >= 1");
                        while($row = mysqli_fetch_assoc($sql)){
                            echo "<option value=".$row['id'].">".$row['nome']."</option>";
                        }
                    ?>
                </select>
                Livro
                <select class="form-control mb-4" data-val="true" name="livroID">
                    <option > </option>
                    <?php 
                        $sql = mysqli_query($conn, "select id, titulo from livro where id >= 1");
                        while($row = mysqli_fetch_assoc($sql)){
                            echo "<option value=".$row['id'].">".$row['titulo']."</option>";
                        }
                    ?>
                </select>

                <input type="hidden" name="multa" value="0">

                <div class="mb-3">
                    <input type="submit" value="Confirmar" class="btn btn-success">
                </div>


            </form>


        </div>
    </div>

</div>
</div>