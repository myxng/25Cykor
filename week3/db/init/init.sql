CREATE TABLE users
{
    id VARCHAR(50) PRIMARY KEY,
    pw TEXT NOT NULL
};

CREATE TABLE posts
{
    id INT AUTO_INCREMENT PRIMARY KEY,
    title TEXT NOT NULL,
    content TEXT NOT NULL,
    author VARCHAR(50),
    FOREIGN KEY (author) REFERENCES users(id)
};