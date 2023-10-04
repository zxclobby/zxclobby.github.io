-- create_database.sql
CREATE DATABASE IF NOT EXISTS your_database_name;
USE your_database_name;

CREATE TABLE support_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
