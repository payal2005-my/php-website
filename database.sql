```sql
CREATE DATABASE IF NOT EXISTS crud;

USE crud;

CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL AUTO_INCREMENT,
    Name VARCHAR(20) NOT NULL,
    Gender ENUM('Male', 'Female', 'Other') NOT NULL,
    Email VARCHAR(30) NOT NULL,
    Mobile VARCHAR(15) NOT NULL,
    Address VARCHAR(50) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB;
```
