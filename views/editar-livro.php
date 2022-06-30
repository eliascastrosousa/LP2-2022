<div class="container">
    <div style="height: 100vh">
        <div class="flex-center flex-column">

            <h3 class="mb-5">Biblioteca IFSP - Guarulhos</h3>
            <p class="h4 mb-4">Editar livro</p>


            <?php
            $sql = "SELECT * FROM livro WHERE id=" . $_REQUEST["id"];

            $res = $conn->query($sql);

            $row = $res->fetch_object();
            ?>

            <div class="mt-4">
                <form action="?page=FUNCOES" method="POST" style="width: 50%;">
                    <input type="hidden" name="acao" value="editar-livro">
                    <input type="hidden" name="id" value="<?php print $row->id; ?>">
                    <div class="mb-3">
                        <label for="nome">Título:</label>
                        <input type="text" name="titulo" value="<?php print $row->titulo; ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Salvar" class="btn btn-success">
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>