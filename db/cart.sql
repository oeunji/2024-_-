USE project;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    image VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL
);

CREATE TABLE cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    quantity INT,
    FOREIGN KEY (product_id) REFERENCES products(id)
);


INSERT INTO products (name, image, price, category) VALUES
('Black Camisole', 'images/item/shirt/black_camisole.png', 11900, 'shirt'),
('Black Long Sleeve', 'images/item/shirt/black_long_sleeve.png', 11000, 'shirt'),
('Black Skull Shirt', 'images/item/shirt/black_skull.png', 17100, 'shirt'),
('Brown and Red', 'images/item/shirt/brown_red.png', 13100, 'shirt'),
('Demon', 'images/item/shirt/demon_black.png', 17600, 'shirt'),
('Womens White', 'images/item/shirt/white_three_women.png', 14500, 'shirt'),
('Black Pocket Pants', 'images\item\pants\balck_pocket.png', 18400, 'pants'),
('Black String Pants', 'images/item/pants/black_string.png', 21000, 'pants'),
('Boots Cut Pants', 'images/item/pants/boots_cut.png', 28000, 'pants'),
('Dirty Washing Pants', 'images/item/pants/dirty_washing.png', 29100, 'pants'),
('Dot Points Pants', 'images/item/pants/dot_point.png', 15700, 'pants'),
('Gray Pocket Pants', 'images/item/pants/gray_pocket.png', 34000, 'pants'),
('Gray Wide Color', 'images/item/pants/gray_wide.png', 28900, 'pants'),
('Pink Pants', 'images/item/pants/pink.png', 21000, 'pants'),
('Point Belts', 'images/item/accessories/belt.png', 9700, 'accessories'),
('Black Star Necklace', 'images/item/accessories/black_star_neck.png', 6400, 'accessories'),
('Bling Bling Ring', 'images/item/accessories/bling_ring.png', 5100, 'accessories'),
('Star Pins', 'images/item/accessories/star_pin_set.png', 2000, 'accessories'),
('White Star Necklace', 'images/item/accessories/white_star_neck.png', 10100, 'accessories'),
('Pins Set', 'images/item/accessories/pins_set.png', 4800, 'accessories');