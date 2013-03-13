use weblamp442;

CREATE TABLE Post (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    post TEXT,
    author_id INT NOT NULL,
    FOREIGN KEY (author_id) REFERENCES User(id)
);
