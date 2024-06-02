DROP DATABASE IF EXISTS romand_database;
CREATE DATABASE romand_database;
USE romand_database;

CREATE TABLE DETAIL_PRODUK (
    ID_PROD VARCHAR(20) PRIMARY KEY,
    NAMA_PROD VARCHAR(255) NOT NULL,
    SHADE VARCHAR(100) NOT NULL,
    DESKRIPSI TEXT,
    HARGA INT NOT NULL,
    DISKON INT NOT NULL DEFAULT 0,
    KATEGORI VARCHAR(50),
    STOCK INT NOT NULL DEFAULT 0,
    STATUS_DEL VARCHAR(1) DEFAULT '0',
    FOTO_PROD VARCHAR(255),
    IS_WAREHOUSE VARCHAR(1) DEFAULT '0'
);

CREATE TABLE CUSTOMER (
    ID_CUST VARCHAR(20) PRIMARY KEY,
    EMAIL VARCHAR(100),
    NAME VARCHAR(50),
    PHONE VARCHAR(20),
    ADDRESS TEXT,
    PASSWORD_HASH CHAR(64), -- Panjang hash SHA-256 adalah 64 karakter
    STATUS_DEL VARCHAR(1) DEFAULT '0',
    IS_WAREHOUSE VARCHAR(1) DEFAULT '0'
);

CREATE TABLE TRANSAKSI (
    ID_TRANS VARCHAR(20) PRIMARY KEY,
    ID_CUST VARCHAR(20),
    TANGGAL DATE NOT NULL,
    TOTAL INT NOT NULL,
    FOREIGN KEY (ID_CUST) REFERENCES CUSTOMER(ID_CUST),
    STATUS_DEL VARCHAR(1) DEFAULT '0',
    IS_WAREHOUSE VARCHAR(1) DEFAULT '0'
);

CREATE TABLE DETAIL_TRANSAKSI(
    ID_TRANS VARCHAR(20),
    ID_PROD VARCHAR(20),
    HARGA INT NOT NULL,
    QTY INT NOT NULL,
    FOREIGN KEY (ID_PROD) REFERENCES DETAIL_PRODUK(ID_PROD),
    FOREIGN KEY (ID_TRANS) REFERENCES TRANSAKSI(ID_TRANS),
    STATUS_DEL VARCHAR(1) DEFAULT '0',
    IS_WAREHOUSE VARCHAR(1) DEFAULT '0'
    -- PRIMARY KEY (ID_TRANS, ID_PROD)
);

CREATE TABLE KERANJANG (
    ID_KERANJANG INT PRIMARY KEY,
    ID_CUST VARCHAR(20),
    ID_PROD VARCHAR(20),
    NAMA_PROD VARCHAR(255) NOT NULL,
    HARGA INT NOT NULL,
    SHADE VARCHAR(100) NOT NULL,
    QTY INT NOT NULL,
    IS_WAREHOUSE VARCHAR(1) DEFAULT '0',
    FOREIGN KEY (ID_CUST) REFERENCES CUSTOMER(ID_CUST),
    FOREIGN KEY (ID_PROD) REFERENCES DETAIL_PRODUK(ID_PROD)
);

CREATE TABLE WISHLIST (
    ID_WISHLIST INT PRIMARY KEY,
    ID_CUST VARCHAR(20),
    ID_PROD VARCHAR(20),
    NAMA_PROD VARCHAR(255) NOT NULL,
    HARGA INT NOT NULL,
    IS_WAREHOUSE VARCHAR(1) DEFAULT '0',
    FOREIGN KEY (ID_CUST) REFERENCES CUSTOMER(ID_CUST),
    FOREIGN KEY (ID_PROD) REFERENCES DETAIL_PRODUK(ID_PROD)
);

-- DISKON 5% = RM100902 RM101004 RM301008 RM101009
INSERT INTO DETAIL_PRODUK (ID_PROD, NAMA_PROD, SHADE, DESKRIPSI, HARGA, DISKON, KATEGORI, STOCK, STATUS_DEL, FOTO_PROD) VALUES
('RM100101', 'Juicy Lasting Tint', 'Bare Grape', 'Effortlessly achieve plump lips with high pigmented tints offered in fruity shades. Get a glossy look without the heavy or sticky feeling! Lips are lightly tinted after the shine wears off.', 229000, 0, 'Lips', 0, '0', 'img/romand-juicy.jpg'),
('RM200202', 'Juicy Lasting Tint', 'Nucademia', 'Effortlessly achieve plump lips with high pigmented tints offered in fruity shades. Get a glossy look without the heavy or sticky feeling! Lips are lightly tinted after the shine wears off.', 229000, 0, 'Lips', 0, '0', 'img/romand-juicy.jpg'),
('RM300401', 'The Universe Liquid Glitter', 'Mystic Moon', 'Daily point glitter eyeshadow with fine particles for radiant aegyo-sal looks.', 179000, 0, 'Eyes', 0, '0', 'img/romand-universe.jpg'),
('RM300601', 'The Universe Liquid Glitter', 'Minty Way','Daily point glitter eyeshadow with fine particles for radiant aegyo-sal looks.', 179000, 0, 'Eyes', 0, '0', 'img/romand-universe.jpg'),
('RM200801', 'Bare Water Cushion', 'Beige','Long lasting cushion that perfectly hides your textured skin and even pores.', 429000, 0, 'Face', 0, '0', 'img/romand-water.jpg'),
('RM200802', 'Bare Water Cushion', 'Sand', 'Long lasting cushion that perfectly hides your textured skin and even pores.', 429000, 0, 'Face', 0, '0', 'img/romand-water.jpg'),
('RM300901', 'Better Than Palette', 'Secret Garden', 'Secret Garden eyeshadow palettes provide remarkable contrast between dark and light shades for improved layerability. In #Mahogany Garden, you get an impressive spectrum of honey golds ranging from light beige to deep umber in matte and glittery finishes.', 500000, 0, 'Face', 0, '0', 'img/romand-palette.jpg'),
('RM100902', 'See-Through Veil Lighter', 'Moonkissed Veil', 'A new powder highlighter to brighten, draw attention, and stun. This Veilighter contours and reflects light beautifully for a goddess-like glow.', 199000, 5, 'Face', 0, '0', 'img/romand-veil.jpg'),
('RM300903', 'Better Than Cheek', 'Blueberry Chip', 'Featuring pastel colors inspired by dried fruits, this blush series helps to create a “my cheeks but better” look with natural hues and silky finishes. Formulated with sweat and sebum-absorbing powder for a long-lasting, refreshing finish.', 179000, 0, 'Face', 0, '0', 'img/romand-cheek.jpg'),
('RM101004', 'Han All Sharp Brow', 'Gentle Brown', 'A three-pronged attack for gorgeous eyebrows! Design detailed strokes with a 1.5mm tip and shading without flattening your eyebrows texture. Comes with a powder brush tip to minimize product fallout.', 189000, 5, 'Eyes', 0, '0', 'img/romand-sharp.jpg'),
('RM201005', 'Han All Brow Cara', 'Mild Woody', 'Comb, shape, and texturize your eyebrows with rom&nd''s Han All Brow Cara. Leaves a non-greasy, natural-looking matte finish without clumping or stickiness.', 199000, 0, 'Eyes', 0, '0', 'img/romand-brow.jpg'),
('RM301006', 'Zero Sun Clean SPF50+', 'Fresh', 'A daily sun cream that perfectly matches with different kinds of foundation for your changing skin condition every day. Its mild formula provides powerful UV protection (SPF 50+ / PA++++). Free of harmful ingredients such as PEG, BHT.', 169000, 0, 'Face', 0, '0', 'img/romand-sunscreen.jpg'),
('RM101007', 'Glasting Melting Balm', 'Sorbet Balm', 'The Glasting Melting Balm is a moisturizing balm with plant-based moisturizing oil that does not dry out! It provides a transparent and smooth watery glow without feeling stuffy.', 189000, 0, 'Lips', 0, '0', 'img/romand-glasting.jpg'),
('RM301008', 'Dewyful Water Tint', 'In Coral', 'Boost the color with a glossy glow! A dewy-ful & long-lasting lip tint that forms like a welcome rain on my lips.', 189000, 5, 'Lips', 0, '0', 'img/romand-dewyful.jpg'),
('RM101009', 'Blur Fudge Tint', 'Cool Rose Up', 'Fudge spreading on your lips! It''s a completely matte finish without any glow.', 189000, 5, 'Lips', 0, '0', 'img/romand-blur.jpg'),
('RM301010', 'Better Than Shape', 'Walnut Grain', 'A seamless contour with finely ground dried grain features a warm or cool tone shade to help sculpt your face to your desired look! A not-too-dark-or-too-light shade that does not appear shiny or has a dirt-like look.', 199000, 0, 'Face', 0, '0', 'img/romand-shape.jpg');

INSERT INTO CUSTOMER (ID_CUST, EMAIL, NAME, PHONE, ADDRESS, PASSWORD_HASH, STATUS_DEL) 
VALUES
('C001', 'customer1@example.com', 'Minji', '1234567890', '123 La Vare, Seoul, South Korea', SHA2(CONCAT('C001', 'customer1@example.com'), 256), '0'),
('C002', 'customer2@example.com', 'Jihyun', '2345678901', '456 HYBS Building, Seoul, South Korea', SHA2(CONCAT('C002', 'customer2@example.com'), 256), '0'),
('C003', 'customer3@example.com', 'Soojin', '3456789012', '789 Moonsun Apartment, Tokyo, Japan', SHA2(CONCAT('C003', 'customer3@example.com'), 256), '0'),
('C004', 'customer4@example.com', 'Yeonwoo', '4567890123', '012 Huai Palace, Tokyo, Japan', SHA2(CONCAT('C004', 'customer4@example.com'), 256), '0'),
('C005', 'customer5@example.com', 'Sora', '5678901234', 'Venom Boulevard Block 9Q, Kyoto, Japan', SHA2(CONCAT('C005', 'customer5@example.com'), 256), '0'),
('C006', 'customer6@example.com', 'Haneul', '6789012345', 'Cookie Monster Street, Kyoto, Japan', SHA2(CONCAT('C006', 'customer6@example.com'), 256), '0'),
('C007', 'customer7@example.com', 'Jiwoo', '1234567890', 'Luv Street, Bangkok, Thailand', SHA2(CONCAT('C007', 'customer7@example.com'), 256), '0'),
('C008', 'customer8@example.com', 'Eunji', '2345678901', 'Beige Percent Apartment, Bangkok, Thailand', SHA2(CONCAT('C008', 'customer8@example.com'), 256), '0'),
('C009', 'customer9@example.com', 'Hyeonseo', '3456789012', 'Heart Bingo Building, Bangkok, Thailand', SHA2(CONCAT('C009', 'customer9@example.com'), 256), '0'),
('C010', 'customer10@example.com', 'Seunghee', '4567890123', '012 Canggu Street, Bali, Indonesia', SHA2(CONCAT('C010', 'customer10@example.com'), 256), '0'),
('C011', 'customer11@example.com', 'Jiyeon', '5678901234', 'More or Less Apartment, Surabaya, Indonesia', SHA2(CONCAT('C011', 'customer11@example.com'), 256), '0'),
('C012', 'customer12@example.com', 'Hayoon', '6789012345', 'Grand 88 Building, Jakarta, Indonesia', SHA2(CONCAT('C012', 'customer12@example.com'), 256), '0'),
('C013', 'customer13@example.com', 'Choi Ung', '1234567890', 'Double Take Boulevard, Kuala Lumpur, Malaysia', SHA2(CONCAT('C013', 'customer13@example.com'), 256), '0'),
('C014', 'customer14@example.com', 'Bubbi', '2345678901', '456 Biscoff Road, Kuala Lumpur, Malaysia', SHA2(CONCAT('C014', 'customer14@example.com'), 256), '0'),
('C015', 'customer15@example.com', 'Rijji', '3456789012', '789 Yellow Lullaby Road, Kuala Lumpur, Malaysia', SHA2(CONCAT('C015', 'customer15@example.com'), 256), '0');

INSERT INTO TRANSAKSI (ID_TRANS, ID_CUST, TANGGAL, TOTAL, STATUS_DEL) VALUES
('T010424C001001', 'C001', '2024-04-01', 637550, '0'),
('T020424C002002', 'C002', '2024-04-02', 179000, '0'),
('T030424C003003', 'C003', '2024-04-03', 450000, '0'),
('T040424C004004', 'C004', '2024-04-04', 567000, '0'),
('T050424C005005', 'C005', '2024-04-05', 359100, '0'),
('T060424C006006', 'C006', '2024-04-06', 199000, '0'),
('T070424C007007', 'C007', '2024-04-07', 458000, '0'),
('T080424C008008', 'C008', '2024-04-08', 179000, '0'),
('T090424C009009', 'C009', '2024-04-09', 450000, '0'),
('T100424C010010', 'C010', '2024-04-10', 1287000, '0'),
('T110424C011011', 'C011', '2024-04-11', 359100, '0'),
('T120424C012012', 'C012', '2024-04-12', 179000, '0'),
('T130424C013013', 'C013', '2024-04-13', 458000, '0'),
('T140424C014014', 'C014', '2024-04-14', 179000, '0'),
('T150424C015015', 'C015', '2024-04-15', 450000, '0'),
('T160424C002016', 'C002', '2024-04-16', 598000, '0'),
('T170424C003017', 'C003', '2024-04-17', 527050, '0'),
('T180424C004018', 'C004', '2024-04-18', 686550, '0'),
('T190424C005019', 'C005', '2024-04-19', 517550, '0'),
('T200424C006020', 'C006', '2024-04-20', 348550, '0'),
('T210424C007021', 'C007', '2024-04-21', 657000, '0'),
('T220424C008022', 'C008', '2024-04-22', 429000, '0'),
('T230424C009023', 'C009', '2024-04-23', 358000, '0'),
('T240424C010024', 'C010', '2024-04-24', 1716000, '0'),
('T250424C011025', 'C011', '2024-04-25', 699000, '0'),
('T260424C009023', 'C009', '2024-04-26', 358000, '0'),
('T260424C009024', 'C010', '2024-04-26', 179000, '0'),
('T260424C009025', 'C011', '2024-04-26', 429000, '0'),
('T270424C004004', 'C004', '2024-04-27', 169000, '0'),
('T280424C004004', 'C004', '2024-04-28', 199000, '0'),
('T290424C004004', 'C004', '2024-04-29', 189000, '0');

-- DISKON 5% = RM100902 RM101004 RM301008 RM101009 T1 T5 T11
INSERT INTO DETAIL_TRANSAKSI (ID_TRANS, ID_PROD, HARGA, QTY, STATUS_DEL) VALUES
('T010424C001001', 'RM100101', 229000, 2, '0'),
('T010424C001001', 'RM301008', 179550, 1, '0'),
('T020424C002002', 'RM200202', 179000, 1, '0'),
('T030424C003003', 'RM300401', 500000, 1, '0'),
('T040424C004004', 'RM300601', 189000, 3, '0'),
('T050424C005005', 'RM101004', 179550, 2, '0'),
('T060424C006006', 'RM201005', 199000, 1, '0'),
('T070424C007007', 'RM100101', 229000, 2, '0'),
('T080424C008008', 'RM200202', 179000, 1, '0'),
('T090424C009009', 'RM300401', 500000, 1, '0'),
('T100424C010010', 'RM200802', 429000, 3, '0'),
('T110424C011011', 'RM101004', 179550, 2, '0'),
('T120424C012012', 'RM300601', 179000, 1, '0'),
('T130424C013013', 'RM100101', 229000, 2, '0'),
('T140424C014014', 'RM300901', 179000, 1, '0'),
('T150424C015015', 'RM300601', 500000, 1, '0'),
('T160424C002016', 'RM200801', 429000, 1, '0'),
('T160424C002016', 'RM301006', 169000, 1, '0'),
('T170424C003017', 'RM301006', 169000, 2, '0'),
('T170424C003017', 'RM100902', 199000 - (199000 * 0.05), 1, '0'),
('T180424C004018', 'RM301006', 169000, 3, '0'),
('T180424C004018', 'RM101007', 189000 - (189000 * 0.05), 1, '0'),
('T190424C005019', 'RM301006', 169000, 2, '0'),
('T190424C005019', 'RM101007', 189000 - (189000 * 0.05), 1, '0'),
('T200424C006020', 'RM301006', 169000, 1, '0'),
('T200424C006020', 'RM101007', 189000 - (189000 * 0.05), 1, '0'),
('T210424C007021', 'RM100101', 229000, 2, '0'),
('T210424C007021', 'RM301010', 199000, 1, '0'),
('T220424C008022', 'RM200801', 429000, 1, '0'),
('T230424C009023', 'RM300903', 179000, 2, '0'),
('T240424C010024', 'RM200802', 429000, 4, '0'),
('T250424C011025', 'RM300401', 500000, 1, '0'),
('T250424C011025', 'RM301010', 199000, 1, '0'),
('T260424C009023', 'RM300903', 179000, 2, '0'),
('T260424C009024', 'RM300601', 179000, 1, '0'),
('T260424C009025', 'RM200801', 429000, 1, '0'),
('T270424C004004', 'RM301006', 169000, 1, '0'),
('T280424C004004', 'RM301010', 199000, 1, '0'),
('T290424C004004', 'RM101007', 189000, 1, '0');

INSERT INTO KERANJANG (ID_KERANJANG, ID_CUST, ID_PROD, NAMA_PROD, HARGA, SHADE, QTY) VALUES 
(1, 'C001', 'RM101009', 'PINKFLASH 2 IN 1 Dual-ended Liquid Lipstik ombrelips Matte Velvet High Pigment', 35000, 'V01', 1),
(2, 'C001', 'RM100902', 'PINKFLASH 2 IN 1 Dual-ended Liquid Lipstik ombrelips Matte Velvet High Pigment', 35000, 'M01', 2),
(3, 'C002', 'RM300903', 'PINKFLASH Lip Gloss Moisturizing Shine and Shimmer Plumping', 18900, 'G01', 1),
(4, 'C002', 'RM301006', 'PINKFLASH Lip Gloss Moisturizing Shine and Shimmer Plumping', 18900, 'G03', 3);