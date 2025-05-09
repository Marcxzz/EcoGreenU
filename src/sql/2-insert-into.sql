USE dbEcoGreenU;

INSERT INTO tblpaymentmethods (idPaymentMethod, name) VALUES
(1, 'Credit Card'),
(2, 'Debit Card'),
(3, 'PayPal'),
(4, 'Apple Pay'),
(5, 'Google Pay'),
(6, 'Bank Transfer');

INSERT INTO tblusers (idUser, firstName, lastName, email, phoneNumber, passwordHash, isDeleted) VALUES
(1, 'Mario', 'Rossi', 'mario.rossi@example.com', '+39 347 234 5678', '$2y$10$gf1Xwk8FlL3S9xKn18hs..u3G7jDljXcXAoi9r1AbYABweqPTT3OK', 0),
(2, 'Luigi', 'Bianchi', 'luigi.bianchi@example.it', NULL, '$2y$10$egWzzRqgoo5fR1mU.1tsHuAaEoncS8Hqgah7c1z7V6t0/sUzXV5ZO', 0),
(3, 'Ugo', 'Verdi', 'ugo.verdi@test.org', '+39 331 898 2023', '$2y$10$OUjRv6VgJlJ4SAOs8ejxiOuM/eERpLXB0rYx.hr2CZ4M/ApTI55Dq', 0),
(4, 'John', 'Doe', 'john.doe@gmail.com', NULL, '$2y$10$8/YhhUZ/vBldYa2cbfE1leGsz9KGGPM59FCpuNKUAzZWwbXPr9PHW', 1);

INSERT INTO tblprojects (idProject, title, description, img,  fundraiser, targetAmount, deadline, status) VALUES
(1, 'Forest Restoration Initiative', 'Reforestation project to restore degraded areas and promote biodiversity.', 'project-1.jpg', 1, 50000, '2025-12-31 23:59', '0'),
(2, 'Solar Energy for Rural Areas', 'Project to install solar panels in rural areas, improving access to renewable energy.', 'project-2.jpg', 2, 150000, '2025-06-30 23:59', '1'),
(3, 'Recycling for a Better Future', 'Establishment of a recycling plant to reduce plastic pollution in cities.', 'project-3.jpg', 1, 30000, '2025-09-15 23:59', '0'),
(4, 'Sustainable Urban Agriculture', 'Urban agriculture project using environmentally sustainable farming techniques to feed cities.', 'project-4.jpg', 3, 70000, '2025-08-01 23:59', '2'),
(5, 'Clean Oceans Campaign', 'Project to clean the seas and oceans with the help of environmentally friendly technologies for waste collection.', 'project-5.jpg', 3, 200000, '2025-10-15 23:59', '0'),
(6, 'Ocean Plastic Cleanup', 'Developing autonomous marine drones to collect plastic waste from the ocean surface.', 'project-6.jpg', 2, 450000.00, '2027-04-15 00:00:00', '1'),
(7, 'Smart Irrigation System', 'Building an AI-powered irrigation system for sustainable agriculture in arid regions.', 'project-7.png', 3, 320000.00, '2027-06-01 00:00:00', '0'),
(8, 'Solar-Powered Desalination', 'Creating affordable solar-powered desalination units for coastal communities.', 'project-8.jpeg', 4, 600000.00, '2027-09-10 00:00:00', '2'),
(9, 'Green School Initiative', 'Constructing energy-efficient classrooms using recycled materials and solar energy.', 'project-9.jpg', 1, 280000.00, '2027-05-20 00:00:00', '1'),
(10, 'Urban Air Quality Sensors', 'Deploying low-cost air quality sensors in major cities to track pollution in real time.', 'project-10.png', 2, 150000.00, '2027-08-30 00:00:00', '0');

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
(14, 12.00, 'blib blab 4 glongus. 928fjzlp', '2025-04-06 15:37:20', 1, 4, 1, 0),
(15, 3.00, 'donaton', '2025-04-06 15:37:28', 1, 2, 2, 0),
(16, 31.00, NULL, '2025-04-06 15:38:12', 3, 3, 4, 0),
(17, 49.00, NULL, '2025-04-06 15:41:48', 5, 1, 1, 0),
(18, 4.00, 'hi', '2025-04-06 15:42:08', 4, 1, 4, 0),
(19, 5.00, 'meow meow meow', '2025-04-06 15:45:28', 3, 4, 2, 0),
(20, 124.00, NULL, '2025-04-06 15:46:19', 5, 1, 1, 1),
(21, 2141.00, 'skibidi', '2025-04-06 15:46:31', 5, 2, 3, 0),
(22, 49.99, 'Support for eco-transport project', '2025-03-01 09:15:00', 4, 2, 1, 0),
(23, 120.00, NULL, '2025-02-28 17:30:00', 3, 5, 2, 1),
(24, 15.50, 'Glad to contribute!', '2025-04-01 11:10:00', 2, 1, 1, 0),
(25, 3999.99, 'Major donation for solar panels', '2025-03-25 10:00:00', 1, 3, 3, 1),
(26, 70.00, NULL, '2025-03-10 14:20:00', 6, 2, 4, 0),
(27, 135.75, 'Keep up the great work', '2025-01-15 08:45:00', 7, 4, 2, 0),
(28, 18.00, NULL, '2025-03-30 13:30:00', 3, 6, 1, 0),
(29, 5.00, 'Small contribution', '2025-02-02 19:00:00', 5, 3, 3, 0),
(30, 299.99, 'Helping with smart irrigation', '2025-04-05 09:50:00', 7, 1, 4, 1),
(31, 150.00, 'For clean water access', '2025-03-17 12:25:00', 5, 2, 2, 0),
(32, 47.20, NULL, '2025-03-29 16:40:00', 2, 5, 1, 0),
(33, 85.00, 'Hope this helps', '2025-02-20 10:30:00', 9, 6, 4, 1),
(34, 14.99, NULL, '2025-04-09 18:00:00', 8, 2, 3, 0),
(35, 5000.00, 'Large backing for ocean cleanup', '2025-01-10 09:00:00', 6, 3, 2, 1),
(36, 33.33, 'Lets make a difference!', '2025-03-05 07:20:00', 10, 1, 3, 0),
(37, 22.00, NULL, '2025-02-18 15:10:00', 1, 4, 1, 0),
(38, 64.00, 'Investing in green tech', '2025-04-02 14:00:00', 8, 5, 4, 0),
(39, 19.90, NULL, '2025-03-12 13:50:00', 9, 6, 3, 0),
(40, 112.00, 'Great initiative!', '2025-04-07 08:00:00', 10, 1, 2, 0);