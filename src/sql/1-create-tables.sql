CREATE DATABASE IF NOT EXISTS dbEcoGreenU;

CREATE TABLE IF NOT EXISTS tblpaymentmethods (
  idPaymentMethod INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name CHAR(50) NOT NULL UNIQUE
);
CREATE TABLE IF NOT EXISTS tblusers (
  idUser INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  firstName CHAR(50) NOT NULL,
  lastName CHAR(50) NOT NULL,
  email CHAR(255) NOT NULL UNIQUE,
  phoneNumber CHAR(20),
  passwordHash CHAR(128) NOT NULL
);
CREATE TABLE IF NOT EXISTS tblprojects (
  idProject INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  title CHAR(30) NOT NULL UNIQUE,
  description CHAR(250) NOT NULL,
  img CHAR(20) UNIQUE,
  fundraiser INT NOT NULL,
  targetAmount DECIMAL(10,2) NOT NULL,
  deadline DATETIME NOT NULL,
  status CHAR(1) NOT NULL,
    FOREIGN KEY (fundraiser) REFERENCES tblusers(iduser)
);
CREATE TABLE IF NOT EXISTS tblPayments (
  idPayment INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  amount DECIMAL(10,2) NOT NULL,
  description CHAR(150),
  date DATETIME NOT NULL,
  projectId INT NOT NULL,
  paymentMethod INT NOT NULL,
  userId INT NOT NULL,
  public BOOLEAN NOT NULL,
  FOREIGN KEY (projectId) REFERENCES tblprojects(idProject),
  FOREIGN KEY (userId) REFERENCES tblusers(iduser),
  FOREIGN KEY (paymentMethod) REFERENCES tblpaymentmethods(idPaymentMethod)
);