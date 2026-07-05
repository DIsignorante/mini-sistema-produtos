# Sistema de Gestão Web (PHP + PostgreSQL + Docker)

Um mini sistema web responsivo para gerenciamento de produtos e categorias, desenvolvido com foco em boas práticas, segurança (PDO contra SQL Injection) e modularização de código. Todo o ambiente é conteinerizado utilizando Docker para facilitar a execução e o deploy.

## Tecnologias Utilizadas

* **Backend:** PHP 8.2
* **Banco de Dados:** PostgreSQL 15
* **Infraestrutura:** Docker e Docker Compose
* **Frontend:** HTML5, CSS3 (Customizado via variáveis CSS) e Bootstrap 5
* **Segurança:** Hashes de senha (`password_hash`) e Consultas Parametrizadas (PDO)

## Funcionalidades

1. **Autenticação de Usuário:**
   * Tela de login segura com bloqueio rigoroso de páginas protegidas (via controle de sessões e cabeçalhos).
   * Redirecionamento automático para usuários não autenticados.
2. **Gerenciamento de Categorias (CRUD):**
   * Cadastro, listagem, edição e exclusão de categorias.
   * Validação para impedir exclusão de categorias vinculadas a produtos (integridade relacional).
3. **Gerenciamento de Produtos (CRUD):**
   * Cadastro completo com Nome, Descrição, Preço, Disponibilidade e vínculo com a Categoria.
   * Interface otimizada dividindo formulário e listagem na mesma tela.
4. **Arquitetura Modular:**
   * Separação de regras de negócio e interface através da inclusão inteligente de arquivos (`require_once` e `include`).

## Estrutura do Projeto

O projeto está organizado da seguinte maneira:

```text
/
├── docker-compose.yml       # Configuração dos containers (Web e Banco de Dados)
├── Dockerfile               # Configuração da imagem do PHP com extensões PDO
├── init.sql                 # Script de criação das tabelas e usuário padrão
└── /src                     # Código-fonte da aplicação
    ├── config.php           # Conexão com o banco de dados
    ├── auth.php             # Barreira de segurança e controle de sessão
    ├── header.php           # Cabeçalho HTML e importação do CSS/Bootstrap
    ├── footer.php           # Rodapé HTML e scripts
    ├── style.css            # Estilização customizada (Material Design)
    ├── login.php            # Interface e lógica de autenticação
    ├── logout.php           # Destruição de sessão
    ├── index.php            # Dashboard principal
    ├── categorias.php       # Módulo de Categorias
    ├── produtos.php         # Módulo de Produtos
    └── /includes            # Fragmentos de interface modularizados
        ├── form_produto.php
        └── lista_produto.php

Como Executar o Projeto
Para rodar este projeto localmente, você precisará ter o Docker e o Docker Compose instalados na sua máquina.

Clone o repositório:

Bash
git clone [https://github.com/SEU-USUARIO/nome-do-repositorio.git](https://github.com/SEU-USUARIO/nome-do-repositorio.git)
cd nome-do-repositorio
Suba os containers do Docker:
Execute o comando abaixo na raiz do projeto (onde está o docker-compose.yml):

Bash
docker-compose up -d --build
Acesse a aplicação:
Abra o seu navegador e acesse:

Plaintext
http://localhost:8080
Credenciais de Acesso Padrão:

Usuário: admin

Senha: 123

Segurança Aplicada
Bloqueio de renderização forçado no topo dos arquivos usando exit; e headers_sent().

Uso de PDO para interações com o banco, blindando a aplicação contra ataques de SQL Injection.

As senhas não são armazenadas em texto puro no banco de dados.
