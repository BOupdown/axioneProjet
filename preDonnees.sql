USE projet;

-- USER

INSERT INTO User (prenom, nom, tauxHoraire)
VALUES ('Kevin', 'Sebie', 13.19);

INSERT INTO User (prenom, nom, tauxHoraire)
VALUES ('Alban', 'Lamberty', 16.49);

INSERT INTO User (prenom, nom, tauxHoraire)
VALUES ('Tristan', 'Jadas', 13.19);

INSERT INTO User (prenom, nom, tauxHoraire)
VALUES ('Josue', 'Balma', 9.89);

-- INTERVENTION

INSERT INTO Ticket (libelleMainNumTicket, defintion, idUser, libelleMail, numTicket, dateTicket, tempsDebut, tempsFin, tempsIntervention, statut, categorie, coeff)
VALUES ("2528499-L23-[CRITICAL] - ELK Cluster es-cluster-prdpau Health red-L[CRITICAL] - ELK Cluster es-cluster-prdpau Health red-2528499", "2528499-L23-[CRITICAL] - ELK Cluster es-cluster-prdpau Health red", 1, "[CRITICAL] - ELK Cluster es-cluster-prdpau Health red", 2528499, STR_TO_DATE('02-10-2022', '%d-%m-%Y'), "12:00", "16:50", 290, "A traiter", "Jour_Double", "100");

INSERT INTO Ticket (libelleMainNumTicket, defintion, idUser, libelleMail, numTicket, dateTicket, tempsDebut, tempsFin, tempsIntervention, statut, categorie, coeff)
VALUES ("2536453-L57--L-2536453", "2536453-L57-", 2, '', 2536453, STR_TO_DATE('10-10-2022', '%d-%m-%Y'), "18:45", "19:51", 66, "A traiter", "Jour_Std", 0);

INSERT INTO Ticket (libelleMainNumTicket, defintion, idUser, libelleMail, numTicket, dateTicket, tempsDebut, tempsFin, tempsIntervention, statut, categorie, coeff)
VALUES ("2587706-L83-2587706-L2587706-2587706", "2587706-L83-2587706", 3, '2587706', 2536453, STR_TO_DATE('28-11-2022', '%d-%m-%Y'), "23:30", "23:45", 15, "A traiter", "Nuit_Std", 100);

INSERT INTO Ticket (libelleMainNumTicket, defintion, idUser, libelleMail, numTicket, dateTicket, tempsDebut, tempsFin, tempsIntervention, statut, categorie, coeff)
VALUES ("2559422-L195-[CRITICAL] - query-exporter missing instance 10.1.18.131:9560-L[CRITICAL] - query-exporter missing instance 10.1.18.131:9560-2559422", "2559422-L195-[CRITICAL] - query-exporter missing instance 10.1.18.131:9560", 4, '[CRITICAL] - query-exporter missing instance 10.1.18.131:9560', 2559422, STR_TO_DATE('31-10-2022', '%d-%m-%Y'), "22:33", "23:05", 32, "A traiter", "Nuit_Std", 100);

SELECT * FROM User;