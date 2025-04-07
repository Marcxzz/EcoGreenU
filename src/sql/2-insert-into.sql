INSERT INTO tblpaymentmethods (idPaymentMethod, name) VALUES
(1, 'Bank transfer'),
(2, 'VISA'),
(3, 'MasterCard'),
(4, 'Debit card');

INSERT INTO tblusers (idUser, firstName, lastName, email, phoneNumber, passwordHash) VALUES
(1, 'Mario', 'Rossi', 'mario.rossi@example.com', '+39 347 234 5678', '$2y$10$gf1Xwk8FlL3S9xKn18hs..u3G7jDljXcXAoi9r1AbYABweqPTT3OK'),
(2, 'Luigi', 'Bianchi', 'luigi.bianchi@example.it', NULL, '$2y$10$egWzzRqgoo5fR1mU.1tsHuAaEoncS8Hqgah7c1z7V6t0/sUzXV5ZO'),
(3, 'Ugo', 'Verdi', 'ugo.verdi@test.org', '+39 331 898 2023', '$2y$10$OUjRv6VgJlJ4SAOs8ejxiOuM/eERpLXB0rYx.hr2CZ4M/ApTI55Dq'),
(4, 'John', 'Doe', 'john.doe@gmail.com', NULL, '$2y$10$8/YhhUZ/vBldYa2cbfE1leGsz9KGGPM59FCpuNKUAzZWwbXPr9PHW');

INSERT INTO tblprojects (idProject, title, description, img,  fundraiser, targetAmount, deadline, status) VALUES
(1, 'Forest Restoration Initiative', 'Reforestation project to restore degraded areas and promote biodiversity.', 'project-1.jpg', 1, 50000, '2025-12-31 23:59', '0'),
(2, 'Solar Energy for Rural Areas', 'Project to install solar panels in rural areas, improving access to renewable energy.', 'project-2.jpg', 2, 150000, '2025-06-30 23:59', '1'),
(3, 'Recycling for a Better Future', 'Establishment of a recycling plant to reduce plastic pollution in cities.', 'project-3.jpg', 1, 30000, '2025-09-15 23:59', '0'),
(4, 'Sustainable Urban Agriculture', 'Urban agriculture project using environmentally sustainable farming techniques to feed cities.', 'project-4.jpg', 3, 70000, '2025-08-01 23:59', '2'),
(5, 'Clean Oceans Campaign', 'Project to clean the seas and oceans with the help of environmentally friendly technologies for waste collection.', 'project-5.jpg', 3, 200000, '2025-10-15 23:59', '0');

INSERT INTO tblpayments (idPayment, amount, description, date, projectId, paymentMethod, userId, public) VALUES
(1, 50.00, 'Donation for ecological project', '2025-03-21 10:15:00', 1, 2, 1, 1),
(2, 75.50, 'Support for sustainable innovation', '2025-03-21 11:30:00', 2, 3, 2, 1),
(3, 20.00, 'Small contribution to the cause', '2025-03-21 12:45:00', 3, 1, 3, 1),
(4, 100.00, NULL, '2025-03-21 13:00:00', 4, 4, 1, 0),
(5, 35.75, 'Participation in the social project', '2025-03-21 14:20:00', 5, 2, 2, 1),
(6, 60.00, NULL, '2025-03-21 15:10:00', 1, 3, 3, 0),
(7, 45.30, NULL, '2025-03-21 16:25:00', 2, 1, 1, 1),
(8, 90.00, 'Support for solidarity initiative', '2025-03-21 17:50:00', 3, 4, 2, 1),
(9, 110.50, 'bla bla bla ble ble ble blu blu blu', '2025-03-21 18:30:00', 4, 2, 3, 1),
(10, 55.20, NULL, '2025-03-21 19:15:00', 5, 1, 1, 0),
(11, 1000.00, 'sigma sigma boy sigma boy', '2025-04-05 17:41:31', 3, 4, 4, 0),
(12, 1001.00, NULL, '2025-04-05 17:41:31', 5, 3, 3, 1),
(13, 21.00, NULL, '2025-04-06 15:35:40', 2, 1, 1, 0),
(14, 12.00, 'blib blab 4 glongus. 928fjzlp 😔🌀', '2025-04-06 15:37:20', 1, 4, 1, 0),
(15, 3.00, 'donaton', '2025-04-06 15:37:28', 1, 2, 2, 0),
(16, 31.00, NULL, '2025-04-06 15:38:12', 3, 3, 4, 0),
(17, 49.00, NULL, '2025-04-06 15:41:48', 5, 1, 1, 0),
(18, 4.00, 'hi', '2025-04-06 15:42:08', 4, 1, 4, 0),
(19, 5.00, 'meow meow meow', '2025-04-06 15:45:28', 3, 4, 2, 0),
(20, 124.00, NULL, '2025-04-06 15:46:19', 5, 1, 1, 1),
(21, 2141.00, 'skibidi', '2025-04-06 15:46:31', 5, 2, 3, 0);