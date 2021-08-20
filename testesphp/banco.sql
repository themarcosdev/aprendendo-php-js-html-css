Create table usuarios (
ID Int UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
login Varchar(30),
senha Varchar(40),
Primary Key (ID));

INSERT INTO usuarios (ID, login,senha)
VALUES (1, "marcos",123456);