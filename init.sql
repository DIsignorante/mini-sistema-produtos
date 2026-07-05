CREATE TABLE usuarios (
    id SERIAL PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE categorias (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL
);

CREATE TABLE produtos (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10, 2) NOT NULL,
    disponivel BOOLEAN DEFAULT TRUE,
    categoria_id INT NOT NULL,
    FOREIGN KEY (categoria_id) REFERENCES categorias(id) ON DELETE RESTRICT
);

-- Usuário: admin / Senha: 123
INSERT INTO usuarios (username, senha) VALUES ('admin', '$2y$10$e.w2.b6Z1O1x8G.E3F9K.O9y4f.X5E/6/3.7.8.9.0.1.2.3.4.5.6');
INSERT INTO categorias (nome) VALUES ('Eletrônicos'), ('Informática');