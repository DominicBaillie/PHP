CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    phone VARCHAR(25) NOT NULL,
    address VARCHAR(255) NOT NULL,
    email VARCHAR(150) NOT NULL,
    chaos_croissant INT DEFAULT 0,
    midnight_muffin INT DEFAULT 0,
    existential_eclair INT DEFAULT 0,
    procrastination_cookie INT DEFAULT 0,
    finals_week_brownie INT DEFAULT 0,
    victory_cinnamon_roll INT DEFAULT 0,
    comments TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
