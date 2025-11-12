-- Flavor Junction: database schema (MySQL)
-- Run: CREATE DATABASE flavor_junction; USE flavor_junction;

CREATE DATABASE IF NOT EXISTS flavor_junction;
USE flavor_junction;

-- Users (optional; useful if you want to relate bookings / carts to a user)
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  full_name VARCHAR(120) NOT NULL,
  email VARCHAR(150) UNIQUE,
  phone VARCHAR(30),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Menu / Products table
CREATE TABLE IF NOT EXISTS products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  item_name VARCHAR(150) NOT NULL,
  description TEXT,
  price DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  category VARCHAR(80),
  available TINYINT(1) DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table for bookings (named booked_tables in your screenshot)
CREATE TABLE IF NOT EXISTS booked_tables (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120) NOT NULL,
  email VARCHAR(150),
  phone VARCHAR(30),
  booking_date DATE,
  booking_time TIME,
  number_of_people INT,
  seating_preference VARCHAR(80),
  booked_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Another booking table variant (booktable) to match screenshot names/columns
CREATE TABLE IF NOT EXISTS booktable (
  id INT AUTO_INCREMENT PRIMARY KEY,
  Full_Name VARCHAR(120) NOT NULL,
  Email VARCHAR(150),
  Ph_Number VARCHAR(30),
  Date DATE,
  Time TIME,
  Members INT,
  Seat_pref VARCHAR(80),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Shopping cart table (simple)
CREATE TABLE IF NOT EXISTS cart (
  id INT AUTO_INCREMENT PRIMARY KEY,
  Item_Name VARCHAR(150) NOT NULL,
  Price DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Another cart table with relations (my_cart in screenshot)
CREATE TABLE IF NOT EXISTS my_cart (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,                     -- optional FK to users
  product_id INT,                  -- reference products.id
  quantity INT NOT NULL DEFAULT 1,
  added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
  FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Contact / messages table
CREATE TABLE IF NOT EXISTS contact (
  id INT AUTO_INCREMENT PRIMARY KEY,
  Name VARCHAR(120),
  Email VARCHAR(150),
  Number VARCHAR(30),
  Message TEXT,
  submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Another contact table variant (contact_data)
CREATE TABLE IF NOT EXISTS contact_data (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120),
  email VARCHAR(150),
  phone VARCHAR(30),
  message TEXT,
  submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Optional: index examples (improves lookups)
CREATE INDEX idx_booked_date ON booked_tables(booking_date);
CREATE INDEX idx_products_category ON products(category);
