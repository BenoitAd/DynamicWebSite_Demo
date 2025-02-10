-- Create the 'products' table to store product details
CREATE TABLE products (
                          id SERIAL PRIMARY KEY,         -- Unique product ID (auto-incremented)
                          name VARCHAR(255) NOT NULL,    -- Product name (required)
                          price DECIMAL(10, 2) NOT NULL, -- Product price with two decimal places
                          description TEXT,              -- Optional product description
                          image_url VARCHAR(255)         -- URL for the product image
);

-- Insert sample products into the 'products' table
INSERT INTO products (name, price, description, image_url)
VALUES
    ('Wireless Earbuds', 49.99, 'High-quality wireless earbuds with noise cancellation.', 'product_image'),
    ('Gaming Mouse', 29.99, 'Ergonomic gaming mouse with customizable RGB lighting.', 'product_image'),
    ('Bluetooth Speaker', 39.99, 'Portable Bluetooth speaker with powerful sound.', 'product_image'),
    ('4K Monitor', 299.99, 'Ultra HD 4K monitor with vibrant colors and crisp visuals.', 'product_image'),
    ('Smartwatch', 199.99, 'Advanced smartwatch with fitness tracking and notifications.', 'product_image'),
    ('Laptop Stand', 24.99, 'Adjustable laptop stand with ergonomic design.', 'product_image'),
    ('Mechanical Keyboard', 79.99, 'Tactile mechanical keyboard with customizable keycaps.', 'product_image'),
    ('USB-C Hub', 19.99, 'Multi-port USB-C hub with HDMI and card reader support.', 'product_image'),
    ('External Hard Drive', 89.99, '1TB external hard drive for backup and file storage.', 'product_image'),
    ('Wireless Charger', 14.99, 'Fast wireless charger for Qi-enabled devices.', 'product_image'),
    ('Fitness Tracker', 59.99, 'Waterproof fitness tracker with heart rate monitoring.', 'product_image'),
    ('Noise Cancelling Headphones', 149.99, 'Over-ear headphones with active noise cancelling.', 'product_image'),
    ('Gaming Chair', 199.99, 'Comfortable gaming chair with adjustable armrests.', 'product_image'),
    ('Smart Home Camera', 69.99, '1080p smart home security camera with night vision.', 'product_image'),
    ('Electric Toothbrush', 49.99, 'Rechargeable electric toothbrush with multiple modes.', 'product_image');