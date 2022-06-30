<div class="container">
    <div style="height: 100vh">
        <div class="flex-center flex-column">

            <h3 class="mb-5">Biblioteca IFSP - Guarulhos</h3>
            <p class="h4 mb-4">Lista de usuários</p>

            <?php
            $sql = "SELECT * FROM usuario";

            $res = $conn->query($sql);

            $qtd = $res->num_rows;

            if ($qtd > 0) {
                print "<table class='mt-4 table table-hover table-striped table bordered'>";
                print "<tr>";
                print "<th>ID</th>";
                print "<th>Nome</th>";
                print "<th>E-mail</th>";
                print "<th>Tipo</th>";
                //print "<th>Livros</th>";
                print "<th>Multa</th>";
                print "<th>Ação</th>";
                print "<tr>";
                while ($row = $res->fetch_object()) {
                    print "<tr>";
                    print "<td>" . $row->id . "</td>";
                    print "<td>" . $row->nome . "</td>";
                    print "<td>" . $row->email . "</td>";
                    print "<td>" . $row->tipo . "</td>";
                    //print "<td>".$row -> qtd_livros."</td>";
                    print "<td>R$" . $row->multa . "</td>";
                    print "<td>
                    <button class='btn btn-primary' onclick=\"location.href='?page=editar-usuario&id=" . $row->id . "';\">
                    Editar
                    </button>
                    <button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?'))
                    {
                        location.href='?page=FUNCOES&acao=excluir&id=" . $row->id . "';
                    }else{

                    }
                    \">Excluir</button>
                    </td>";
                    print "<tr>";
                }
            } else {
                print "<p>Nenhum usuário cadastrado</p>";
            }



            ?>
        </div>
    </div>

</div>