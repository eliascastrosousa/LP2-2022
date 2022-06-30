create database projetolp2crud;

use projetolp2crud;

create table usuario (
	id int not null auto_increment,
	nome varchar(255),
	email varchar(255),
	tipo enum('professor', 'aluno', 'funcionario'),
	multa float,
	primary key (id)
);

select * from usuario;

create table livro (
	id int not null auto_increment,
	titulo varchar(255),
	primary key (id)
);


create table emprestimo (
	id int not null auto_increment,
	usuarioID int,
	livroID int,
	data_emprestimo TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	primary key (id),
	foreign key (usuarioID) references usuario (id),
	foreign key (livroID) references livro (id)
);

create table multa (
	id int not null auto_increment,
	emprestimoID int,
    diasRestantes int,
    multa float(10.2),
	primary key (id),
    foreign key (emprestimoID) references emprestimo (ID)
);



/* QUERYS UTEIS



select e.id, u.nome, u.tipo, l.titulo, e.data_emprestimo 
from usuario u
INNER JOIN emprestimo e
ON u.id = e.usuarioID
INNER JOIN livro l
ON l.id = e.livroID
where u.id = e.usuarioID;

select nome from usuario where id >= 1;

insert into emprestimo (usuarioID, livroID ) values ('1', '1');

select nome from emprestimo;

show tables; 

SELECT u.nome, l.livro
FROM usuario u
INNER JOIN livro l
ON A.Key = B.Key
where u.id = '1' ;
*/