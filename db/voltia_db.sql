-- =====================================================
-- VOLTIA Motors · MySQL 8+
-- Base: voltia_db (utf8mb4)
-- =====================================================
CREATE DATABASE IF NOT EXISTS voltia_db
  CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE voltia_db;

CREATE TABLE IF NOT EXISTS modelos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(80) NOT NULL,
  tipo ENUM('electrico','hibrido') NOT NULL,
  precio VARCHAR(20) NOT NULL,
  autonomia_km INT NOT NULL,
  cero_cien DECIMAL(3,1) NOT NULL,
  carga_min INT NOT NULL,
  foto_url VARCHAR(255) NOT NULL,
  foto_alt VARCHAR(150) NOT NULL,
  destacado TINYINT(1) DEFAULT 0
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS pruebas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(120) NOT NULL,
  telefono VARCHAR(40) NOT NULL,
  modelo VARCHAR(80) NOT NULL,
  estado ENUM('nueva','contactada','agendada','vendida') DEFAULT 'nueva',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  INDEX idx_estado (estado)
) ENGINE=InnoDB;

INSERT INTO modelos (nombre, tipo, precio, autonomia_km, cero_cien, carga_min, foto_url, foto_alt, destacado) VALUES
('Voltia-One ⚡','electrico','$34.990',520,3.9,18,'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?q=80&w=900&auto=format&fit=crop','Deportivo azul en el desierto',1),
('Pulse Híbrido 🌿','hibrido','$24.990',900,7.2,0,'https://images.unsplash.com/photo-1503376780353-7e6692767b70?q=80&w=900&auto=format&fit=crop','Sedán negro en movimiento en carretera',0),
('Terra 4x4 ⚡','electrico','$42.990',480,5.4,22,'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?q=80&w=900&auto=format&fit=crop','SUV blanca todoterreno',0)
ON DUPLICATE KEY UPDATE nombre = VALUES(nombre);
