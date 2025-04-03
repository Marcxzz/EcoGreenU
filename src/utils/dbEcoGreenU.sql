-- queries must be executed in this order

CREATE DATABASE IF NOT EXISTS dbEcoGreenU;


CREATE TABLE IF NOT EXISTS tblpaymentmethods (
  idPaymentMethod INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name CHAR(50) NOT NULL
);
INSERT INTO tblpaymentmethods (idPaymentMethod, name) VALUES
(1, 'Bank transfer'),
(2, 'VISA'),
(3, 'MasterCard'),
(4, 'Debit card');


CREATE TABLE IF NOT EXISTS tblusers (
  idUser INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  firstName CHAR(50) NOT NULL,
  lastName CHAR(50) NOT NULL,
  email CHAR(255) NOT NULL,
  phoneNumber CHAR(20),
  passwordHash CHAR(128) NOT NULL,
  profilePicPath CHAR(100)
);
INSERT INTO tblusers (idUser, firstName, lastName, email, phoneNumber, passwordHash, profilePicPath) VALUES
(1, 'Mario', 'Rossi', 'mario.rossi@example.com', '+39 347 234 5678', '$2y$10$gf1Xwk8FlL3S9xKn18hs..u3G7jDljXcXAoi9r1AbYABweqPTT3OK', NULL),
(2, 'Luigi', 'Bianchi', 'luigi.bianchi@example.it', NULL, '$2y$10$egWzzRqgoo5fR1mU.1tsHuAaEoncS8Hqgah7c1z7V6t0/sUzXV5ZO', NULL),
(3, 'Ugo', 'Verdi', 'ugo.verdi@test.org', '+39 331 898 2023', '$2y$10$OUjRv6VgJlJ4SAOs8ejxiOuM/eERpLXB0rYx.hr2CZ4M/ApTI55Dq', NULL),
(4, 'John', 'Doe', 'john.doe@gmail.com', NULL, '$2y$10$8/YhhUZ/vBldYa2cbfE1leGsz9KGGPM59FCpuNKUAzZWwbXPr9PHW', NULL);


CREATE TABLE IF NOT EXISTS tblprojects (
  idProject INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  title CHAR(30) NOT NULL UNIQUE,
  description CHAR(250) NOT NULL,
  img CHAR(20),
  fundraiser INT NOT NULL,
  targetAmount DECIMAL(10,2) NOT NULL,
  deadline DATETIME NOT NULL,
  status CHAR(1) NOT NULL,
    FOREIGN KEY (fundraiser) REFERENCES tblusers(iduser)
);
INSERT INTO tblprojects (idProject, title, description, img,  fundraiser, targetAmount, deadline, status) VALUES
(1, 'Forest Restoration Initiative', 'Reforestation project to restore degraded areas and promote biodiversity.', 'project-1.jpg', 1, 50000, '2025-12-31 23:59:59', '0'),
(2, 'Solar Energy for Rural Areas', 'Project to install solar panels in rural areas, improving access to renewable energy.', 'project-2.jpg', 2, 150000, '2025-06-30 23:59:59', '1'),
(3, 'Recycling for a Better Future', 'Establishment of a recycling plant to reduce plastic pollution in cities.', 'project-3.jpg', 1, 30000, '2025-09-15 23:59:59', '0'),
(4, 'Sustainable Urban Agriculture', 'Urban agriculture project using environmentally sustainable farming techniques to feed cities.', 'project-4.jpg', 3, 70000, '2025-08-01 23:59:59', '2'),
(5, 'Clean Oceans Campaign', 'Project to clean the seas and oceans with the help of environmentally friendly technologies for waste collection.', 'project-5.jpg', 3, 200000, '2025-10-15 23:59:59', '0');


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
INSERT INTO tblPayments (idPayment, amount, description, date, projectId, paymentMethod, userId, public) VALUES
(1, 50.00, 'Donazione per progetto ecologico', '2025-03-21 10:15:00', 1, 2, 1, TRUE),
(2, 75.50, 'Support for sustainable innovation', '2025-03-21 11:30:00', 2, 3, 2, TRUE),
(3, 20.00, 'Piccolo contributo alla causa', '2025-03-21 12:45:00', 3, 1, 3, TRUE),
(4, 100.00, NULL, '2025-03-21 13:00:00', 4, 4, 1, FALSE),
(5, 35.75, 'Participation in the social project', '2025-03-21 14:20:00', 5, 2, 2, TRUE),
(6, 60.00, NULL, '2025-03-21 15:10:00', 1, 3, 3, FALSE),
(7, 45.30, NULL, '2025-03-21 16:25:00', 2, 1, 1, TRUE),
(8, 90.00, 'Support for solidarity initiative', '2025-03-21 17:50:00', 3, 4, 2, TRUE),
(9, 110.50, 'Donazione per ricerca scientifica', '2025-03-21 18:30:00', 4, 2, 3, TRUE),
(10, 55.20, NULL, '2025-03-21 19:15:00', 5, 1, 1, FALSE);