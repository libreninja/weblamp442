use weblamp442;
DROP TABLE Post;

CREATE TABLE Post (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    post TEXT,
    author_id INT NOT NULL,
    FOREIGN KEY (author_id) REFERENCES User(id)
);
