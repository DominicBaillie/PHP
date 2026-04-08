CREATE TABLE resumes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    current_position VARCHAR(100) NOT NULL,
    skills TEXT NOT NULL,
    username VARCHAR(50),
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255),
    phone VARCHAR(20),
    bio TEXT,
    image_path VARCHAR(255),
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
