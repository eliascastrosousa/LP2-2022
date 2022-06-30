<div class="container">
    <div style="height: 100vh">
        <div class="flex-center flex-column">

            <h3 class="mb-5">Biblioteca IFSP - Guarulhos</h3>

            <form action="?page=FUNCOES" method="POST" style="width: 50% height: 50%;">
                <input type="hidden" name="acao" value="cadastrar">
                <p class="h4 mb-4">Cadastro de usuario</p>

                <div class="form-row mb-4">
                    <div class="col">
                        <input type="text" name="nome" class="form-control" placeholder="Nome Completo">
                    </div>
                </div>

                <input type="email" name="email" class="form-control mb-4" placeholder="E-mail">

                <hr>
                Tipo de Usuario
                <select class="form-control mb-4" data-val="true" name="tipo">
                    <option value="professor">Professor</option>
                    <option value="aluno">Aluno</option>
                    <option value="funcionario">Servidor</option>
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