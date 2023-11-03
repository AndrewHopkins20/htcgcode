DROP TABLE IF EXISTS htcgorderline;
DROP TABLE IF EXISTS htcgorder;
DROP TABLE IF EXISTS htcgproducts;
DROP TABLE IF EXISTS htcgmembers;

CREATE TABLE htcgmembers (
	memberno INT NOT NULL AUTO_INCREMENT,
	forename VARCHAR(20),
    surname VARCHAR(20),
	street VARCHAR(40),
    town VARCHAR(20),
    postcode VARCHAR(10),
    email VARCHAR(50),
    category VARCHAR(10),
    PRIMARY KEY (memberno)
);

CREATE TABLE htcgproducts (
	productno VARCHAR(5) NOT NULL,
    productname VARCHAR(20),
    productabout VARCHAR(40),
    productset VARCHAR(25),
    prodtype VARCHAR (6),
    price DECIMAL (4,2),
    qtyinstock INT,
    PRIMARY KEY (productno)
);

CREATE TABLE htcgorder (
	orderno INT NOT NULL AUTO_INCREMENT,
    memberno INT(6),
    PRIMARY KEY (orderno),
    FOREIGN KEY (memberno) REFERENCES htcgmembers(memberno)
);

CREATE TABLE htcgorderline (
	orderno INT NOT NULL,
    productno VARCHAR(5) NOT NULL,
    quantity INT,
    PRIMARY KEY (orderno,productno),
    FOREIGN KEY (orderno) REFERENCES htcgorder(orderno),
    FOREIGN KEY (productno) REFERENCES htcgproducts(productno)
);




