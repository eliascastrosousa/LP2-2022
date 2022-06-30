
    <div class="container">
        <div class="row">
            <div class="col mt-5">
                <?php
                include("conexao.php");

                switch (@$_REQUEST["page"]) {
                    case "usuarios":
                        include 'views/usuarios.php';
                        break;
                    case "livros":
                        include("views/livros.php");
                        break;
                    case "lista-usuarios":
                        include("views/lista-usuarios.php");
                        break;
                    case "lista-livros":
                        include("views/lista-livros.php");
                        break;
                    case "FUNCOES":
                        include("models/FUNCOES.php");
                        break;
                    case "editar-usuario":
                        include("views/editar-usuario.php");
                        break;
                    case "editar-livro":
                        include("views/editar-livro.php");
                        break;
                    case "emprestimos":
                        include("views/emprestimos.php");
                        break;
                    case "lista-emprestimos":
                        include("views/lista-emprestimos.php");
                        break;
                    default:
                        include 'views/homepage.php'; 
                    ;
                }
                ?>
            </div>
        </div>
    </div>