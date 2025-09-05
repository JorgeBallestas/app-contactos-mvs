-- ================================
-- ARCHIVO: database.sql
-- ================================

-- Crear base de datos
CREATE DATABASE IF NOT EXISTS agenda 
CHARACTER SET utf8mb4 
COLLATE utf8mb4_unicode_ci;

USE agenda;

-- Tabla de usuarios
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    last_login TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tabla de contactos
CREATE TABLE IF NOT EXISTS contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    celular VARCHAR(20) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    INDEX idx_user_contacts (user_id),
    INDEX idx_contact_search (user_id, nombre, apellido, correo)
);

-- Insertar datos de prueba (opcional)
INSERT INTO users (nombre, email, password) VALUES
('Administrador', 'admin@agenda.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'), -- password: password
('Usuario Demo', 'demo@agenda.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

-- Contactos de ejemplo para el usuario demo (ID 2)
INSERT INTO contacts (user_id, nombre, apellido, celular, correo) VALUES
(2, 'María', 'García', '+57 300 123 4567', 'maria.garcia@email.com'),
(2, 'Carlos', 'López', '+57 301 234 5678', 'carlos.lopez@email.com'),
(2, 'Ana', 'Martínez', '+57 302 345 6789', 'ana.martinez@email.com'),
(2, 'Luis', 'Rodríguez', '+57 303 456 7890', 'luis.rodriguez@email.com'),
(2, 'Carmen', 'Fernández', '+57 304 567 8901', 'carmen.fernandez@email.com');

-- ================================
-- ARCHIVO: .htaccess (opcional)
-- ================================
RewriteEngine On

# Redirect to HTTPS (uncomment in production)
# RewriteCond %{HTTPS} off
# RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

# Security headers
<IfModule mod_headers.c>
    Header always set X-Content-Type-Options nosniff
    Header always set X-Frame-Options DENY
    Header always set X-XSS-Protection "1; mode=block"
    Header always set Strict-Transport-Security "max-age=63072000; includeSubDomains; preload"
    Header always set Content-Security-Policy "default-src 'self'; style-src 'self' 'unsafe-inline'; script-src 'self' 'unsafe-inline'"
</IfModule>

# Block access to sensitive files
<Files ~ "^\.">
    Order allow,deny
    Deny from all
</Files>

<FilesMatch "\.(sql|log|conf|ini|env)$">
    Order allow,deny
    Deny from all
</FilesMatch>

# Pretty URLs (optional - redirect all to index.php)
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php [QSA,L]

# Cache static assets
<IfModule mod_expires.c>
    ExpiresActive on
    ExpiresByType text/css "access plus 1 year"
    ExpiresByType application/javascript "access plus 1 year"
    ExpiresByType image/png "access plus 1 year"
    ExpiresByType image/jpg "access plus 1 year"
    ExpiresByType image/jpeg "access plus 1 year"
    ExpiresByType image/gif "access plus 1 year"
    ExpiresByType image/svg+xml "access plus 1 year"
</IfModule>

-- ================================
-- ARCHIVO: config.example.php (opcional)
-- ================================
<?php
// Ejemplo de archivo de configuración
// Copia este archivo como config.php y ajusta los valores

return
