# Wiki Escolpi Informática

## Descrição

Este é um projeto de Wiki desenvolvido com o objetivo de organizar os processos da Escolpi Informática.

## Funcionalidades

A Wiki Escolpi Informática é um modelo **CRUD** (Create, Read, Update, Delete) que oferece as seguintes funcionalidades:

- **Create:** Permite criar novos registros e documentos relacionados aos processos da Escolpi Informática.

- **Read:** Facilita a consulta e a leitura de informações já existentes na Wiki, proporcionando acesso rápido a dados importantes.

- **Update:** Permite a atualização de informações e documentos, mantendo a Wiki sempre atualizada e precisa.

- **Delete:** Possibilita a exclusão de registros ou documentos obsoletos ou irrelevantes.

Este projeto tem como objetivo centralizar e simplificar o acesso e gerenciamento de informações essenciais para a Escolpi Informática.

## Tela de Login
![image](https://github.com/obelucca/wiki_escolpi/assets/106974931/e6df1714-4a93-464c-b52e-f891b44693ec)
## Listagem de Usuários 
![image](https://github.com/obelucca/wiki_escolpi/assets/106974931/b7f6ef63-72be-423a-bc8f-6927cebed73d)
## Criação de Cards
![image](https://github.com/obelucca/wiki_escolpi/assets/106974931/9fe99df4-8b75-4389-a0e0-9c7cd0246237)
## Visualização dos Cards
![image](https://github.com/obelucca/wiki_escolpi/assets/106974931/7816812e-5c29-4770-b87c-51b7bcd28243)



## Desafios 

Esse projeto ainda está em desenvolvimento, e as demandas dele vem de acordo com o que precisamos para nossos processos internos.

 ### 1° desafio:  

 Envio de imagens para o banco de dados: 
 Por meio de pesquisas soube que enviar imagens para o banco de dados não era uma boa prática, então optei por enviar as imagens para uma pasta "PUBLIC", e apenas passar o caminho delas para o banco de dados

 ### 2° Desafio:

 Esquema de paginação de dados:

 Percebi que com o passar do tempo a quantidade de dados registrados no banco de dados poderia comprometer o funcionamento da wiki, por isso inclui o esquema de paginação dentro do codigo, o que limita uma quantidade de registros por página. 

 ### 3° Desafio 

 Arquitetura:

 Ness Projeto pensei em adotar a arquitetura MVC (Model, View, Controller), porém, ainda não estou utilizando uma controler para fazer as funções do CRUD, ainda estou tendo dúvida de como atualizar o projeto para que seja realmente um MVC completo.