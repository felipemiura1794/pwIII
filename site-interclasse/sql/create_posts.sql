CREATE TABLE posts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    author_id INT NOT NULL,
    title VARCHAR(63) NOT NULL,
    content TEXT,
    FOREIGN KEY (author_id) REFERENCES users(id)
);

CREATE TABLE event (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(63) NOT NULL,
    description TEXT NOT NULL
);

-- Usuários que colaboraram com a organização do evento
CREATE TABLE event_collaborator (
    event_id INT NOT NULL,
    user_id INT NOT NULL,
    description TEXT, -- Descrição do que a pessoa fez, se tiver.
    
    FOREIGN KEY (event_id) REFERENCES events(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Salas que vão poder ver esse evento
CREATE TABLE event_targets (
    event_id INT NOT NULL,
    class_id INT NOT NULL,
    FOREIGN KEY (event_id) REFERENCES events(id),
    FOREIGN KEY (class_id) REFERENCES classroom(id)
);

CREATE TABLE announcement_post (
    post_id INT NOT NULL,
    event_id INT NOT NULL,
    banner_url VARCHAR(255),
    FOREIGN KEY (post_id) REFERENCES posts(id),
    FOREIGN KEY (event_id) REFERENCES events(id)
);
