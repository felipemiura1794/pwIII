DROP DATABASE interclasse;
CREATE DATABASE interclasse;
USE interclasse;

-- Tabela para jogos tipo Volei, Futebol, etc
CREATE TABLE games (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(63),
    description TEXT
);

-- Papéis que jogadores podem assumir dentro do jogo
CREATE TABLE game_roles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    game_id INT NOT NULL,
    name VARCHAR(31) NOT NULL,
    description TEXT,
    FOREIGN KEY (game_id) REFERENCES games(id)
);

-- Classes (salas)
CREATE TABLE classroom (
    id INT PRIMARY KEY AUTO_INCREMENT,
    year ENUM("1", "2", "3") NOT NULL,
    curso ENUM("DS", "ADM") NOT NULL
);

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(127) NOT NULL,
    email VARCHAR(127) NOT NULL,
    password VARCHAR(127) NOT NULL
);

-- Relação entre usuário e classe
CREATE TABLE user_class (
    user_id INT NOT NULL UNIQUE,
    class_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (class_id) REFERENCES classroom(id)
);

-- Times
CREATE TABLE teams (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(63) NOT NULL,

    class_id INT NOT NULL,
    FOREIGN KEY (class_id) REFERENCES classroom(id)
);

-- Relação entre usuário e time (jogador) 
CREATE TABLE team_players (
    user_id INT NOT NULL,
    team_id INT NOT NULL,
    main_role_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (team_id) REFERENCES teams(id),
    FOREIGN KEY (main_role_id) REFERENCES game_roles(id)
);
