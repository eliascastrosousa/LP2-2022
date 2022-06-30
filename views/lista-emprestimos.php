    <div class="container">
        <div style="height: 100vh">
            <div class="flex-center flex-column">

                <h3 class="mb-5">Biblioteca IFSP - Guarulhos</h3>
                <p class="h4 mb-4">Lista de Emprestimo</p>

                <?php
                $sql = "select e.id, u.nome, u.tipo, l.titulo, e.data_emprestimo 
                        from usuario u
                        INNER JOIN emprestimo e
                        ON u.id = e.usuarioID
                        INNER JOIN livro l
                        ON l.id = e.livroID
                        where u.id = e.usuarioID";

                $res = $conn->query($sql);

                $qtd = $res->num_rows;

                if ($qtd > 0) {
                    print "<table class='mt-4 table table-hover table-striped table bordered'>";
                    print "<tr>";
                    print "<th>ID</th>";
                    print "<th>Titulo</th>";
                    print "<th>Nome do Usuario</th>";
                    print "<th>Data emprestimo</th>";
                    print "<th>Dias Restantes</th>";
                    print "<th>Multa</th>";
                    print "<th>Ação</th>";
                    print "<tr>";
                    while ($row = $res->fetch_object()) {
                        print "<tr>";
                        print "<td>" . $row->id . "</td>";
                        print "<td>" . $row->nome . "</td>";
                        print "<td>" . $row->titulo . "</td>";
                        print "<td>" . $date = date( "d M Y", strtotime($row->data_emprestimo)) . "</td>";
                        $date = date( "d", strtotime($row->data_emprestimo));
                        $dt = $date;
                        if($row->tipo == 'aluno'){
                            $restante = $dt-date('d');
                            $prazo = 21;
                            print "<td>" . $prazo = $prazo - $restante ."</td>";
                        }else if($row->tipo == 'professor'){
                            $restante = $dt-date('d');
                            $prazo = 30;
                            print "<td>" . $prazo = $prazo - $restante ."</td>";
                        }else if($row->tipo == 'funcionario'){
                            $restante = $dt-date('d');
                            $prazo = 14;
                            print "<td>" . $prazo = $prazo - $restante ."</td>";
                        }
                        if($prazo <= 0){
                            
                            print "<td>" . 'Deve Multa' ."</td>";
                        }else {
                            print "<td>" . 'Sem Multa' ."</td>";
                        }
                        
                        


                        print "<td>
                    
                    <button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja Devolver o Livro?'))
                    {
                        location.href='?page=FUNCOES&acao=excluir-emprestimo&id=" . $row->id . "';
                    }else{

                    }
                    \">Devolver</button>
                    </td>";
                        print "<tr>";
                    }
                } else {
                    print "<p>Nenhum Emprestimo cadastrado</p>";
                }



                ?>


            </div>
        </div>


    </div>