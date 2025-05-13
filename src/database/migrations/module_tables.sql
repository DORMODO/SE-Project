-- Add role management tables
CREATE TABLE IF NOT EXISTS user_roles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL UNIQUE,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Add permissions table
CREATE TABLE IF NOT EXISTS permissions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL UNIQUE,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Add role permissions mapping
CREATE TABLE IF NOT EXISTS role_permissions (
    role_id INT,
    permission_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (role_id, permission_id),
    FOREIGN KEY (role_id) REFERENCES user_roles(id),
    FOREIGN KEY (permission_id) REFERENCES permissions(id)
);

-- Add event resources table
CREATE TABLE IF NOT EXISTS event_resources (
    id INT PRIMARY KEY AUTO_INCREMENT,
    event_id INT,
    resource_type VARCHAR(50),
    quantity INT,
    status VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (event_id) REFERENCES events(id)
);

-- Add campaign resources table
CREATE TABLE IF NOT EXISTS campaign_resources (
    id INT PRIMARY KEY AUTO_INCREMENT,
    campaign_id INT,
    resource_type VARCHAR(50),
    quantity INT,
    status VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (campaign_id) REFERENCES campaigns(id)
);

-- Add volunteer assignments table
CREATE TABLE IF NOT EXISTS volunteer_assignments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    event_id INT,
    volunteer_id INT,
    status VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (event_id) REFERENCES events(id),
    FOREIGN KEY (volunteer_id) REFERENCES users(id)
);

-- Modify existing users table
ALTER TABLE users
ADD COLUMN role VARCHAR(50) AFTER email,
ADD COLUMN status VARCHAR(20) DEFAULT 'active' AFTER role,
ADD COLUMN deleted_at TIMESTAMP NULL AFTER updated_at;
