# Locadora de Filmes


## Descrição

Este projeto é um sistema de gerenciamento de locação de filmes, desenvolvido em PHP e JavaScript, que atende às necessidades de uma locadora. 
Ele oferece funcionalidades para cadastro, edição e alteração de status de filmes, usuários e locações, além de permitir que os usuários se cadastrem, 
editem suas informações pessoais e aluguem filmes. O sistema é uma plataforma web que suporta diferentes tipos de usuários, incluindo Administradores, 
Funcionários e Clientes, cada um com diferentes níveis de acesso e permissões.

## Requisitos Funcionais

### Filmes

- **Cadastro:** Os usuários podem cadastrar novos filmes no sistema, fornecendo informações como nome, ano, gênero e unidades disponíveis.
- **Edição:** Os filmes cadastrados podem ser editados a qualquer momento para atualizar suas informações.
- **Alteração de Status:** Os filmes podem ter seu status alterado para ativo ou inativo, refletindo sua disponibilidade.
- **Visualização:** Todos os usuários podem listar os filmes cadastrados no sistema.

### Usuários

- **Cadastro:** Os usuários podem se registrar no sistema, definindo seu tipo (Administrador, Funcionário ou Cliente) e fornecendo informações pessoais.
- **Edição:** Os usuários podem atualizar suas informações pessoais, exceto seu tipo de usuário.
- **Alteração de Status:** Os usuários podem ter seu status alterado para ativo ou inativo.
- **Tipos de Usuário:** O sistema suporta três tipos de usuário: Administrador, Funcionário e Cliente, com diferentes permissões e funcionalidades.
- **Visualização:** Administradores e Funcionários podem listar os usuários cadastrados no sistema.

### Locação

- **Cadastro:** Os usuários podem alugar filmes, registrando a data de aluguel e a data de entrega prevista.
- **Edição:** As locações podem ser editadas para alterar as datas de entrega ou outros detalhes.
- **Alteração de Status:** As locações podem ter seu status alterado para ativo ou inativo.
- **Visualização:** Todos os usuários podem listar as locações de filmes.

## Requisitos Não Funcionais

- **Segurança:** O sistema é projetado para proteger as informações sensíveis dos usuários.
- **Desempenho:** O sistema é capaz de lidar com um grande número de usuários simultaneamente.
- **Usabilidade:** Possui uma interface intuitiva e fácil de usar.
- **Confiabilidade:** Mantém um tempo de inatividade mínimo.
- **Manutenibilidade:** Fácil de manter e atualizar.

## Tecnologias

- **Linguagens de Programação:** PHP e JavaScript
- **Plataforma:** Web

Este projeto visa fornecer uma solução eficiente e segura para gerenciamento de locação de filmes, atendendo às necessidades de uma locadora e oferecendo 
uma experiência de usuário satisfatória. Sinta-se à vontade para contribuir, relatar problemas ou sugerir melhorias para o projeto.

## Instalação

Para configurar o projeto localmente, siga as etapas abaixo:

1. Clone o repositório do GitHub para o seu ambiente de desenvolvimento: `git clone https://github.com/MariaEduardaLeal/Locadora-de-Filmes.git` 
2. Navegue até o diretório do projeto: `cd seudiretorio`
3. Pegue o código que está no arquivo `banco.txt` e execute-o no mysql
4. Mude a senha do banco de dados no arquivo `conexao.php` e mais quaisquer outras informações que tenha alterado
5. Inicie um servidor web local (Apache) para executar o projeto: `php -S localhost:8000`
6. Acesse o projeto em seu navegador, normalmente em `http://localhost:8000` e comece a usar o sistema.

## Contribuição

Agradecemos a contribuição das seguintes pessoas para este projeto:

- [Fernando Nonato](https://github.com/Cyberfn)
- [Jéssica Raissa](https://github.com/jessicaraissapessoa)
- [Patreze Leal](https://github.com/PatrezeLeal)

Se você deseja contribuir para este projeto, sinta-se à vontade para criar um fork, fazer melhorias e enviar um pull request. Estamos abertos a colaborações e melhorias.


 


