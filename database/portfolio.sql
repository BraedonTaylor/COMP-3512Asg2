

--
-- Table structure for table `portfolio`
--

DROP TABLE IF EXISTS `portfolio`;

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `userId` varchar(2) DEFAULT NULL,
  `symbol` varchar(8) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
);


--
-- Dumping data for table `portfolio`
--

LOCK TABLES `portfolio` WRITE;

INSERT INTO `portfolio` VALUES (1,'4','C',104);
INSERT INTO `portfolio` VALUES (2,'3','AAPL',132);
INSERT INTO `portfolio` VALUES (3,'1','GOOG',10);
INSERT INTO `portfolio` VALUES (4,'9','HAL',100);
INSERT INTO `portfolio` VALUES (5,'5','ETR',101);
INSERT INTO `portfolio` VALUES (7,'5','EBAY',90);
INSERT INTO `portfolio` VALUES (8,'4','ECL',8);
INSERT INTO `portfolio` VALUES (9,'8','AAPL',30);
INSERT INTO `portfolio` VALUES (10,'9','AAPL',92);
INSERT INTO `portfolio` VALUES (11,'10','AAPL',37);
INSERT INTO `portfolio` VALUES (12,'5','WFC',118);
INSERT INTO `portfolio` VALUES (13,'7','AAPL',95);
INSERT INTO `portfolio` VALUES (14,'4','WYNN',120);
INSERT INTO `portfolio` VALUES (15,'9','BA',169);
INSERT INTO `portfolio` VALUES (16,'2','AMAT',10);
INSERT INTO `portfolio` VALUES (17,'5','CSCO',129);
INSERT INTO `portfolio` VALUES (18,'2','AES',136);
INSERT INTO `portfolio` VALUES (19,'3','CNC',120);
INSERT INTO `portfolio` VALUES (20,'2','EIX',27);
INSERT INTO `portfolio` VALUES (21,'7','XEL',113);
INSERT INTO `portfolio` VALUES (22,'3','FFIV',136);
INSERT INTO `portfolio` VALUES (23,'5','FDX',76);
INSERT INTO `portfolio` VALUES (24,'7','QCOM',201);
INSERT INTO `portfolio` VALUES (25,'5','NFLX',47);
INSERT INTO `portfolio` VALUES (26,'5','DIS',5);
INSERT INTO `portfolio` VALUES (27,'3','GOOG',5);
INSERT INTO `portfolio` VALUES (28,'2','ORLY',129);
INSERT INTO `portfolio` VALUES (29,'2','GOOG',93);
INSERT INTO `portfolio` VALUES (30,'7','V',119);
INSERT INTO `portfolio` VALUES (31,'4','CAT',70);
INSERT INTO `portfolio` VALUES (32,'10','ABT',146);
INSERT INTO `portfolio` VALUES (33,'2','HAL',85);
INSERT INTO `portfolio` VALUES (34,'6','AWK',3);
INSERT INTO `portfolio` VALUES (35,'1','EFX',87);
INSERT INTO `portfolio` VALUES (36,'3','GOOG',127);
INSERT INTO `portfolio` VALUES (37,'6','BMY',2);
INSERT INTO `portfolio` VALUES (38,'1','NFLX',75);
INSERT INTO `portfolio` VALUES (39,'4','ADM',101);
INSERT INTO `portfolio` VALUES (40,'8','UA',54);
INSERT INTO `portfolio` VALUES (41,'4','KMX',155);
INSERT INTO `portfolio` VALUES (42,'8','MCD',5);
INSERT INTO `portfolio` VALUES (43,'8','MSFT',56);
INSERT INTO `portfolio` VALUES (44,'10','GE',112);
INSERT INTO `portfolio` VALUES (45,'9','MU',129);
INSERT INTO `portfolio` VALUES (46,'8','EBAY',46);
INSERT INTO `portfolio` VALUES (47,'2','C',108);
INSERT INTO `portfolio` VALUES (49,'10','MAR',173);
INSERT INTO `portfolio` VALUES (50,'7','WM',93);
INSERT INTO `portfolio` VALUES (51,'5','GOOG',104);
INSERT INTO `portfolio` VALUES (52,'8','GOOG',100);
INSERT INTO `portfolio` VALUES (53,'1','SHW',88);
INSERT INTO `portfolio` VALUES (54,'4','C',143);
INSERT INTO `portfolio` VALUES (55,'6','PEP',161);
INSERT INTO `portfolio` VALUES (56,'7','WY',86);
INSERT INTO `portfolio` VALUES (57,'5','ROK',71);
INSERT INTO `portfolio` VALUES (58,'1','NFLX',109);
INSERT INTO `portfolio` VALUES (59,'1','NFLX',10);
INSERT INTO `portfolio` VALUES (60,'6','BWA',61);
INSERT INTO `portfolio` VALUES (61,'8','F',57);
INSERT INTO `portfolio` VALUES (62,'6','PSX',155);
INSERT INTO `portfolio` VALUES (63,'10','HAL',175);
INSERT INTO `portfolio` VALUES (64,'7','AVGO',148);
INSERT INTO `portfolio` VALUES (65,'10','CPB',2);
INSERT INTO `portfolio` VALUES (66,'6','NFLX',176);
INSERT INTO `portfolio` VALUES (67,'2','STI',60);
INSERT INTO `portfolio` VALUES (68,'2','PGR',55);
INSERT INTO `portfolio` VALUES (69,'7','ED',60);
INSERT INTO `portfolio` VALUES (70,'5','UA',142);
INSERT INTO `portfolio` VALUES (71,'4','HD',70);
INSERT INTO `portfolio` VALUES (72,'9','IBM',116);
INSERT INTO `portfolio` VALUES (73,'10','IBM',88);
INSERT INTO `portfolio` VALUES (74,'9','GOOG',69);
INSERT INTO `portfolio` VALUES (75,'9','F',54);
INSERT INTO `portfolio` VALUES (76,'7','ED',140);
INSERT INTO `portfolio` VALUES (77,'8','FL',300);
INSERT INTO `portfolio` VALUES (78,'9','INTC',81);
INSERT INTO `portfolio` VALUES (79,'4','UTX',96);
INSERT INTO `portfolio` VALUES (81,'7','FIS',112);
INSERT INTO `portfolio` VALUES (82,'6','SO',30);
INSERT INTO `portfolio` VALUES (83,'4','TGT',172);
INSERT INTO `portfolio` VALUES (84,'6','ACN',160);
INSERT INTO `portfolio` VALUES (85,'10','F',10);
INSERT INTO `portfolio` VALUES (86,'2','GM',20);
INSERT INTO `portfolio` VALUES (87,'4','FB',55);
INSERT INTO `portfolio` VALUES (88,'2','GOOG',93);
INSERT INTO `portfolio` VALUES (89,'2','EXC',11);
INSERT INTO `portfolio` VALUES (90,'3','EMN',58);
INSERT INTO `portfolio` VALUES (91,'3','FIS',5);
INSERT INTO `portfolio` VALUES (92,'3','AMZN',97);
INSERT INTO `portfolio` VALUES (93,'4','ED',58);
INSERT INTO `portfolio` VALUES (94,'10','KMX',103);
INSERT INTO `portfolio` VALUES (95,'10','GM',137);
INSERT INTO `portfolio` VALUES (96,'6','EMN',83);
INSERT INTO `portfolio` VALUES (97,'2','FB',82);
INSERT INTO `portfolio` VALUES (98,'8','EFX',73);
INSERT INTO `portfolio` VALUES (100,'7','PGR',155);

UNLOCK TABLES;
