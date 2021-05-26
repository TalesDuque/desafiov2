# Desafio para Desenvolvedor Back-End PHP da Webjump
## Como Rodar o Projeto

1. Clonar este repositório.
2. Utilizando o software de manipulação de banco de dados desejado, no caso foi utilizado o MySQL Workbench, importar o banco de dados ```crud_desafio.sql```. Este banco de dados está vazio.
3. Crie um host para acessar a pasta raiz do repositório, no caso de desenvolvimento, foi utilizado o servidor Apache.
4. Insira informações de: URL e conexão do banco de dados, como host, porta, user e senha no arquivo ```.env```.
5. Certifique-se que o composer está instalado na máquina e instale os pacotes.
5. Acesse utilizando o browser.

## Requisitos

* MySQL 5.7.31 (Instalado com o WAMP)
* PHP 7.x (Instalado com o WAMP)
* Composer 2.0.x

## Composer

Autoload configurado conforme os padrões PSR-4.

Pacotes/Classes:
*"william-costa/dot-env": "^0.1.0" - Gerenciador de Variáveis de Ambiente
*"william-costa/database-manager": "^0.1.0" - Gerenciador de Banco de Dados
*"samayo/bulletproof": "4.0.*" - Upload de Imagens

## Estrutura do Banco de Dados

São duas entidades: a categoria e o produto, cada uma possui sua tabela com as informações. Para relacioná-las, utilizou-se uma terceira tabela, denominada category_products que relaciona os IDs de produto com os IDs de categoria.

![Tabelas](/Tabelas.png)

## Estrutura do Projeto

* Pasta ```app```: Contém todas as pastas principais do projeto e configura o namespace principal.
* Pasta ```Controller```: Todos controladores estão inseridos nesta pasta.
* Pasta ```Http```: Contém classes relacionadas ao protocolo HTTP, como Request, Response e o Router.
* Pasta ```Model```: Contém as classes das entidades anteriormente mencionadas: Product e Category.
* Pasta ```Utils```: Contém a classe responsável pelas Views.
* Pasta ```assets```: Contém os arquivos html e as figuras dos produtos.
* Pasta ```ìncludes```: Configurações iniciais do programa
* Pasta ```routes```: Contém arquivos php que definem as rotas do projeto.
* Pasta ```vendor```: Pasta com os componentes do composer.

Para criar novos produtos e categorias, basta acessar em /products e /categories. É necessário criar uma categoria antes de criar um produto. Após criar um produto, é possível realizar upload de imagens .jpeg para que esta seja exibida na dashboard inicial.

## Autor

Tales Faceroli Duque

E-mail: talesfduque@gmail.com

[LinkedIn](https://www.linkedin.com/in/talesfaceroliduque/)
