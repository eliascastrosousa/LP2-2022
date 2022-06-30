<?php

switch ($_REQUEST["acao"]) {
    case 'cadastrar':
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $tipo = $_POST["tipo"];

        $sql = "INSERT INTO usuario (nome, email, tipo, multa) VALUES ('{$nome}', '{$email}', '{$tipo}', '{0}')";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Cadastrado com sucesso')</script>";
            print "<script>location.href='?page=lista-usuarios';</script>";
        } else {
            print "<script>alert('Não foi possível cadastrar')</script>";
        }

        break;
    case 'editar':
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $tipo = $_POST["tipo"];

        $sql = "UPDATE usuario SET
            nome='{$nome}',
            email='{$email}',
            tipo='{$tipo}'
                WHERE
            id=" . $_REQUEST["id"];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Alterado com sucesso')</script>";
            print "<script>location.href='?page=lista-usuarios';</script>";
        } else {
            print "<script>alert('Não foi possível alterar')</script>";
        }
        break;
    case 'excluir':

        $sql = "DELETE FROM usuario WHERE id=" . $_REQUEST["id"];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Deletado com sucesso')</script>";
            print "<script>location.href='?page=lista-usuarios';</script>";
        } else {
            print "<script>alert('Não foi possível deletar')</script>";
        }

        break;

    case 'cadastrar-livro':
        $titulo = $_POST["titulo"];

        $sql = "INSERT INTO livro (titulo) VALUES ('{$titulo}')";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Cadastrado com sucesso')</script>";
            print "<script>location.href='?page=lista-livros';</script>";
        } else {
            print "<script>alert('Não foi possível cadastrar')</script>";
        }

        break;
    case 'editar-livro':
        $titulo = $_POST["titulo"];

        $sql = "UPDATE livro SET
            titulo='{$titulo}'
                WHERE
            id=" . $_REQUEST["id"];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Alterado com sucesso')</script>";
            print "<script>location.href='?page=lista-livros';</script>";
        } else {
            print "<script>alert('Não foi possível alterar')</script>";
        }
        break;

    case 'excluir-livro':

        $sql = "DELETE FROM livro WHERE id=" . $_REQUEST["id"];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Deletado com sucesso')</script>";
            print "<script>location.href='?page=lista-livros';</script>";
        } else {
            print "<script>alert('Não foi possível deletar')</script>";
        }

        break;

    case 'cadastrar-emprestimo':

        $usuarioID = $_POST["usuarioID"];
        $livroID = $_POST["livroID"];

        $sql = "INSERT INTO emprestimo (usuarioID, livroID ) VALUES ('{$usuarioID}', '{$livroID}')";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Cadastrado com sucesso')</script>";
            print "<script>location.href='?page=lista-emprestimos';</script>";
        } else {
            print "<script>alert('Não foi possível cadastrar')</script>";
        }

        break;

    case 'excluir-emprestimo':

        $sql = "DELETE FROM emprestimo WHERE id=" . $_REQUEST["id"];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Devolvido com sucesso')</script>";
            print "<script>location.href='?page=lista-livros';</script>";
        } else {
            print "<script>alert('Não foi possível deletar')</script>";
        }

        break;
}
