DROP DATABASE IF EXISTS CONSULTORIO;
CREATE DATABASE CONSULTORIO;
USE CONSULTORIO;

CREATE TABLE USUARIO(
	idUsuario NVARCHAR(12) UNIQUE,
    PRIMARY KEY(idUsuario),
    nombreUsuario NVARCHAR(50) NOT NULL,
    apellidoUsuario NVARCHAR(50) NOT NULL,
    correoUsuario NVARCHAR(50) NOT NULL,
    telefonoUsuario NVARCHAR(20) NOT NULL,
    direccionUsuario NVARCHAR(50) NOT NULL,
    passwordUsuario NVARCHAR(20) NOT NULL,
    rolUsuario NVARCHAR(20) NOT NULL,
    estadoUsuario BIT NOT NULL
);
CREATE TABLE MEDICO(
	idMedico NVARCHAR(12) UNIQUE,
    PRIMARY KEY(idMedico),
    nombreMedico NVARCHAR(50) NOT NULL,
    apellidoMedico NVARCHAR(50) NOT NULL,
    telefonoMedico NVARCHAR(20) NOT NULL,
    correoMedico NVARCHAR(100) NOT NULL,
    especialidadMedico NVARCHAR(50) NOT NULL,
    tarjetaProfesional NVARCHAR(50) NOT NULL,
    estadoMedico BIT NOT NULL,
    idUsuarioFK NVARCHAR(12) UNIQUE,
    FOREIGN KEY (idUsuarioFK) REFERENCES USUARIO(idUSuario)
);
CREATE TABLE PACIENTE(
	idPaciente NVARCHAR(12) UNIQUE,
    PRIMARY KEY(idPaciente),
    nombrePaciente NVARCHAR(50) NOT NULL,
    apellidoPaciente NVARCHAR(50) NOT NULL,
    direccionPaciente NVARCHAR(100) NOT NULL,
    telefonoPaciente NVARCHAR(20) NOT NULL,
    fechaNacimiento DATE NOT NULL,
    estadoPaciente BIT NOT NULL,
    idUsuarioFK NVARCHAR(12) UNIQUE,
    FOREIGN KEY(idUsuarioFK) REFERENCES USUARIO(idUsuario)
);
CREATE TABLE HISTORIA_CLINICA(
	idHistoria INT AUTO_INCREMENT,
    PRIMARY KEY(idHistoria),
    estatura DOUBLE NOT NULL,
    peso DOUBLE NOT NULL,
    antecedentesFamiliares TEXT NOT NULL,
    alergias TEXT NOT NULL,
    idPacienteFK NVARCHAR(12) UNIQUE,
    FOREIGN KEY(idPacienteFK) REFERENCES PACIENTE(idPaciente)
);
CREATE TABLE CONSULTA_MEDICA(
	idConsulta INT AUTO_INCREMENT,
    PRIMARY KEY(idConsulta),
    horaConsulta DATETIME NOT NULL,
    motivoConsulta TEXT NOT NULL,
    enfermedad TEXT NOT NULL,
    idHistoriaFK INT NOT NULL,
    FOREIGN KEY(idHistoriaFK) REFERENCES HISTORIA_CLINICA(idHistoria)
);
CREATE TABLE DIAGNOSTICO(
	idDiagnostico NVARCHAR(20) UNIQUE,
    PRIMARY KEY(idDiagnostico),
    descripcion TEXT NOT NULL,
    idConsultaFK INT,
    FOREIGN KEY(idConsultaFK) REFERENCES CONSULTA_MEDICA(idConsulta)
);
CREATE TABLE EXAMEN(
	idExamen INT AUTO_INCREMENT,
    PRIMARY KEY(idExamen),
    valor NUMERIC NOT NULL,
    fechaExamen DATE NOT NULL,
    tipoExamen NVARCHAR(50) NOT NULL,
    idHistoriaFK INT NOT NULL,
    FOREIGN KEY(idHistoriaFK) REFERENCES HISTORIA_CLINICA(idHistoria)
);
CREATE TABLE AGENDA(
	idAgenda INT AUTO_INCREMENT,
    PRIMARY KEY(idAgenda),
    fechaAgenda DATE NOT NULL,
    horaAgenda DATETIME NOT NULL,
    consultorio NVARCHAR(2) NOT NULL,
    estadoAgenda BIT NOT NULL,
    idMedicoFK NVARCHAR(12),
    FOREIGN KEY(idMedicoFK) REFERENCES MEDICO(idMedico),
    idPacienteFK NVARCHAR(12),
    FOREIGN KEY(idPacienteFK) REFERENCES PACIENTE(idPaciente)
);

/*Registros de ejemplo*/

-- Usuarios
INSERT INTO USUARIO(idUsuario,nombreUsuario,apellidoUsuario,correoUsuario,telefonoUsuario,direccionUsuario,passwordUsuario,rolUsuario,estadoUsuario)
VALUES (1193116959,'Carlos','Ramirez','cadavid4003@gmail.com',3002146746,'Carrera 87 #48-50 Sur',12345,'Paciente',true),
(896579845,'Julian','Contreras','justanemail@gmail.com',3256589784,'Carrera 57 #89-51',988648,'Medico',true),
(659268459,'Sofia','Hernandez','hanna245@gmail.com',3125692458,'Carrera 85 #35-59','mypass','Paciente',true),
(986539647,'Juan','Ramirez','jacar@gmail.com',3112584658,'Carrera 87 #48-50 Sur',12345,'Paciente',true),
(658296595,'Ramiro','Villanueva','9884.ville@gmail.com',3112584658,'Carrera 6 Bis #98-65','df887g2','Medico',true),
(854239528,'Leyla','Munevar','ui.9883634@outlook.com',3695875964,'Carrera 2D #34-65','limon','Paciente',false),
(659326587,'Juan','Paz','juan5871@gmail.com',3215689787,'Carrera 42 Bis #98-65','empanadafrita','Paciente',true),
(125987691,'Luz','Muñoz','lmunoz@cafam.com.co',3256985747,'Carrera 87 Bis #98-65','allyouneedislove','Medico',true),
(695834795,'Juan','Ramirez','juanitpp1234@misena.edu.co',9872955962,'Carrera 72 Bis #82-65','barca213','Paciente',true),
(985674827,'Transito','Robayo','jesusislove1@gmail.com',3257886598,'Calle 12 #41-98','poers','Paciente',true);

-- Medicos en USUARIO
INSERT INTO USUARIO(idUsuario,nombreUsuario,apellidoUsuario,correoUsuario,telefonoUsuario,direccionUsuario,passwordUsuario,rolUsuario,estadoUsuario)
VALUES (985687400,'Pepito','Alcachofa','pau@medic.com',3103109283,'Carrera 65 #52-43 D','turtle','Medico',true),
(325987658,'Dario','Hernandez','thebestmedic@medic.com',3018976598,'Calle 13 #23-43','9568','Medico',true),
(546378912,'Angie','Martinez','no2324@medic.com',3269587845,'Carrera 45 #34-13','iooij','Medico',true),
(658957246,'Matilda','Martinez','notouchingmove@medic.com',3297865489,'Carrera 96 #23-43','9895.oj','Medico',true),
(215478365,'Angela','Ocampo','iu2392@medic.com',6598726589,'Carrera 34 #23-94','98996','Medico',true),
(698214573,'Carolina','Rincon','carolina.losw@medic.com',3245698715,'Carrera 6 #21-43','2055120','Medico',true),
(650138984,'Allison','Lampreda','myadmin4@medic.com',3259876598,'Carrera 87 #43-56','657896410','Medico',true),
(200459678,'Leidy','Ceballos','coder23121@medic.com',4986287810,'Carrera 23 #56-98','lj6230','Medico',true),
(397548628,'Valeria','Orozco','edge23@medic.com',3885596487,'Calle 43 #98-33','j7uj5632','Medico',true),
(659226598,'Laura','Castillo','potato23421@medic.com',3336985748,'Carrera 44 #11-53','54k25','Medico',true),
(179498639,'Felipe','Caro','chillhopper@gmail.com',3256948759,'Calle 87 #29-37','perowe','Paciente',true),
(975684102,'Mariano','Caicedo','123asd@gmail.com',6565598784,'Carrera 98 #75-99','patare22','Medico',true),
(377895685,'Marta','Hernandez','martica07@gmail.com',2235569898,'Calle 24C #45-33','sadwe23','Medico',true),
(689117559,'Morales','Garzon','cycling231@outlook.com',1245454784,'Carrera 34 #54-87','12lodfp','Medico',true),
(359684447,'Luciano','Rodriguez','Lefrance23@gmail.com',9874655641,'Carrera 87d #87-98','notatime23','Medico',true),
(223565578,'Luz','Pachon','Partnoch.23@gmail.com',3365784578,'Calle 87 #34-99','inspiredbt2','Medico',false),
(248756278,'Esteban','Quintana','losdwa@gmail.com',1245556987,'Carrera 23 #12-23','peaseant','Medico',true),
(336597845,'Demetrio','Montenegro','notMino@gmail.com',2021546310,'Calle 66 #33-54','defe23','Medico',true),
(659888745,'Julia','Paz','Liebre23@gmail.com',9878856988,'Carrera 54 #54-99','justmytype','Medico',false),
(669858897,'Ramiro','Osorio','Lowbeatbox@gmail.com',2455487895,'Calle 24 #69-98','fallingdep','Medico',true),
(223365987,'Camilo','Lampreda','passionwriter@gmail.com',23555478784,'Carrera 12 #54-95','badpassword','Medico',true),
(112121547,'Julian','Newton','shrodingerSro@gmail.com',5548896536,'Calle 42 #55-98','arepaRellena','Medico',true),
(454587896,'Nilen','Pastrana','weirdguy@gmail.com',6569887545,'Carrera 23 #25-74','Empanadas123','Medico',true),
(235565779,'Violeta','Contreras','pianotheme@gmail.com',8985564578,'Calle 54 #98-87','Limones','Medico',true),
(685487895,'Daniela','Gomez','sweetDeadly@gmail.com',6988545487,'Carrera 45B #98-52','assa3r3','Medico',true),
(655884798,'Carlitos','Jimenez','colombian233@gmail.com',2325655475,'Carrera 98B #42-02','LuiS2e','Medico',true);

-- select * FROM USUARIO ORDER BY nombreUsuario;

-- MEDICOS
INSERT INTO MEDICO(idMedico,nombreMedico,apellidoMedico,telefonoMedico,correoMedico,especialidadMedico,tarjetaProfesional,estadoMedico,idUsuarioFK)
VALUES (985687400,'Pepito','Alcachofa',3103109283,'pau@medic.com','Ortodoncista','548326978',true,985687400),
(325987658,'Dario','Hernandez',3018976598,'thebestmedic@medic.com','Medico General','175896128',true,325987658),
(546378912,'Angie','Martinez',3269587845,'no2324@medic.com','Medico General','341687986',true,546378912),
(658957246,'Matilda','Martinez',3297865489,'notouchingmove@medic.com','Medico General','316876865',true,658957246),
(215478365,'Angela','Ocampo',6598726589,'iu2392@medic.com','Enfermera','656748646',true,215478365),
(698214573,'Carolina','Rincon',3245698715,'carolina.losw@medic.com','Medico General','316746854135',true,698214573),
(650138984,'Allison','Lampreda',3259876598,'myadmin4@medic.com','Medica General','6564798645-t',true,650138984),
(200459678,'Leidy','Ceballos',4986287810,'coder23121@medic.com','Supervisora Medico','654657984653',true,200459678),
(397548628,'Valeria','Orozco',3885596487,'edge23@medic.com','Cirujana','321357054',true,397548628),
(659226598,'Laura','Castillo',3336985748,'potato23421@medic.com','Medica General','5453413204',true,659226598),
('975684102', 'Mariano', 'Caicedo', '6565598784', '123asd@gmail.com', 'Ortopedista','5646532',true, '975684102'),
('377895685', 'Marta', 'Hernandez', '2235569898', 'martica07@gmail.com','Medica General','5645534',true, '377895685'),
('689117559', 'Morales', 'Garzon', '1245454784', 'cycling231@outlook.com','Medico General','5165465',true,'689117559'),
('359684447', 'Luciano', 'Rodriguez', '9874655641', 'Lefrance23@gmail.com','Medico General','6546468',true,'359684447'),
('223565578', 'Luz', 'Pachon', '3365784578', 'Partnoch.23@gmail.com','Medico General','2424',true,'223565578'),
('248756278', 'Esteban', 'Quintana', '1245556987', 'losdwa@gmail.com','Medico General','3545465',true,'248756278'),
('336597845', 'Demetrio', 'Montenegro', '2021546310', 'notMino@gmail.com','Medico General','546868',true,'336597845'),
('659888745', 'Julia', 'Paz', '9878856988', 'Liebre23@gmail.com','Medico General','56456665',true,'659888745'),
('669858897', 'Ramiro', 'Osorio', '2455487895', 'Lowbeatbox@gmail.com','Medico General','5886684',true,'669858897'),
('223365987', 'Camilo', 'Lampreda', '23555478784', 'passionwriter@gmail.com','Medico General','845322',true,'223365987'),
('112121547', 'Julian', 'Sambrano', '5548896536', 'shrodingerSro@gmail.com','Medico General','54566654',true,'112121547'),
('454587896', 'Nilen', 'Pastrana', '6569887545', 'weirdguy@gmail.com','Medico General','5511114',true,'454587896'),
('235565779', 'Violeta', 'Contreras', '8985564578', 'pianotheme@gmail.com','Medico General','6112154',true,'235565779'),
('685487895', 'Daniela', 'Gomez', '6988545487', 'sweetDeadly@gmail.com','Medico General','6622478',true, '685487895'),
('655884798', 'Carlitos', 'Jimenez', '2325655475', 'colombian233@gmail.com','Medico General','656554448',true,'655884798');

-- PACIENTES EN USUARIO
INSERT INTO usuario(idUsuario,nombreUsuario,apellidoUsuario,correoUsuario,telefonoUsuario,direccionUsuario,passwordUsuario,rolUsuario,estadoUsuario)
VALUES (116598748,'Laura','Callejo','google2331@gmail.com',3596895748,'Carrera 67 #18-50B',568465,'Paciente',true),
(225698359,'Camilo','Ramirez','unicae3@gmail.com',3269896599,'Carrera 2 #53-50 Sur','sdfsdf34','Paciente',true),
(332165452,'Kant','Castiblanco','sad_as@gmail.com',23156153,'Cll 75 D','a234ds','Paciente',true),
(489879846,'Obama','Simbaqueba','limon@gmail.com',98645126,'Carrera 98 #09-33','asda234','Paciente',true),
(651321324,'Vin','Messi','vin.messi@gmail.com',665465468,'Cll 55D #86-98','ffth5553','Paciente',true),
(331321211,'Joe','Tesla','elect@gmail.com',3215484841,'Carrera 11 #03-32','rrasfr12','Paciente',true),
(532135453,'Raquel','Hawking','black@gmail.com',513513518,'Cll 52 #55-97','not231d','Paciente',true),
(654154544,'Lu','Crespo','cdeciencia@gmail.com',65655464,'Cra 32 #23-34','asff2','Paciente',true),
(210101175,'Andrew','Rutherford','rappenation@gmail.com',655465486,'Clle 58-84','2effe4','Paciente',true),
(343545557,'Natalia','Curie','activit34@gmail.com',8818171,'Cra 88 #87-98','dfdf33','Paciente',true),
(213213544,'Daniela','Vega','learningmotion@gmail.com',5150071,'Cll 98 #55-48','asffr3','Paciente',true),
(546546787,'Henry','Suarez','striker231@gmail.com',56568784,'Cra 58 #88-77','gfgre3','Paciente',true),
(212114775,'David','Coca','killerju2@gmail.com',31508048,'Cll 99 #40-89','dsfsfd3','Paciente',true),
(531124545,'Liseth','Paredes','lover231@gmail.com',21210505,'Cra 19 #34-12','ffas1','Paciente',true),
(132135458,'Ken','Cadena','21256por@gmail.com',515431531,'Cll 55 #88-71','kaoe2','Paciente',false),
(223165456,'Merry','Perez','rato2342@gmail.com',54211242,'Cra 14 #45-12','carl24r','Paciente',true),
(324544458,'Daniel','Blandon','limonisf@gmail.com',4256564,'Cll 58 #46-13','asf31','Paciente',true);

-- PACIENTES
INSERT INTO PACIENTE(idPaciente,nombrePaciente,apellidoPaciente,direccionPaciente,telefonoPaciente,fechaNacimiento,estadoPaciente,idUsuarioFK)
VALUES('116598748','Laura','Callejo','Carrera 67 #18-50B',3596895748,'2004-01-29',true,116598748),
('225698359','Camilo','Ramirez','Carrera 2 #53-50 Sur','3269896599','1967-10-28',true,'225698359'),
('1193116959','Carlos','Ramirez','Carrera 87 #48-50 Sur','3002146746','2003-07-15',true,'1193116959'),
('179498639','Felipe','Caro','Calle 87 #29-37','3256948759','2012-08-20',true,'179498639'),
('659268459','Sofia','Hernandez','Carrera 85 #35-59','3125692458','2004-04-16',true,'659268459'),
('659326587', 'Juan', 'Paz', 'Carrera 42 Bis #98-65', '3215689787','1999-12-31',true,'659326587'),
('695834795', 'Juan', 'Ramirez', 'Carrera 72 Bis #82-65', '9872955962','1980-01-18',true, '695834795'),
('854239528', 'Leyla', 'Munevar', 'Carrera 2D #34-65', '3695875964','1990-05-24',true, '854239528'),
('985674827', 'Transito', 'Robayo', 'Calle 12 #41-98', '3257886598','1960-08-08',true, '985674827'),
('986539647', 'Juan', 'Ramirez', 'Carrera 87 #48-50 Sur', '3112584658','1989-07-24',true,'986539647'),
(332165452,'Kant','Castiblanco','Cll 75 D',23156153,'1980-04-17',true,332165452),
(489879846,'Obama','Simbaqueba','Carrera 98 #09-33',98645126,'1990-05-20',true,489879846),
(651321324,'Vin','Messi','Cll 55D #86-98',665465468,'2004-04-27',true,651321324),
(331321211,'Joe','Tesla','Carrera 11 #03-32',3215484841,'2001-11-30',true,331321211),
(532135453,'Raquel','Hawking','Cll 52 #55-97',513513518,'1998-01-11',true,532135453),
(654154544,'Lu','Crespo','Cra 32 #23-34',65655464,'2007-07-26',true,654154544),
(210101175,'Andrew','Rutherford','Clle 58-84',655465486,'1920-05-28',true,210101175),
(343545557,'Natalia','Curie','Cra 88 #87-98',8818171,'1970-04-14',true,343545557),
(213213544,'Daniela','Vega','Cll 98 #55-48',5150071,'1960-12-31',true,213213544),
(546546787,'Henry','Suarez','Cra 58 #88-77',56568784,'1980-11-20',true,546546787),
(212114775,'David','Coca','Cll 99 #40-89',31508048,'2020-03-12',true,212114775),
(531124545,'Liseth','Paredes','Cra 19 #34-12',21210505,'2017-10-01',true,531124545),
(132135458,'Ken','Cadena','Cll 55 #88-71',515431531,'2010-09-10',false,132135458),
(223165456,'Merry','Perez','Cra 14 #45-12',54211242,'2007-04-25',true,223165456),
(324544458,'Daniel','Blandon','Cll 58 #46-13',4256564,'2004-07-14',true,324544458);

-- HISTORIA CLINICA
INSERT INTO HISTORIA_CLINICA(idHistoria,estatura,peso,antecedentesFamiliares,alergias,idPacienteFK) VALUES
(1,1.8,65,'Ninguno','Polvo',116598748),
(2,1.56,70,'Valvula bicuspide','Miel',1193116959),
(3,1.54,50,'Ansiedad','Aceite vegetal',132135458),
(4,1.90,55.6,'Ninguno','Comida de gato',179498639),
(5,1.15,40,'Depresión','Ninguna',210101175),
(6,1.50,80,'Ceguera','Ninguna',212114775),
(7,1.69,65,'Cancer pulmonar','Ninguna',213213544),
(8,1.25,62.5,'Linfomas','Ninguna',223165456),
(9,1.70,50,'Miopia','Aceite Vegetal',225698359),
(10,1.75,69,'Tuberculosis','Mantequilla',324544458),
(11,1.67,84,'Ninguno','Splenda',331321211),
(12,1.25,54,'Esclerosis','Ninguno',332165452),
(13,1.58,52,'Ninguno','Ninguno',343545557),
(14,1.69,68,'Ninguno','Ninguno',489879846),
(15,1.24,69,'Ninguno','Ninguno',531124545),
(16,1.57,40,'Respiracion dificultosa','Caramelos',532135453),
(17,1.78,50,'Taquicardia','Ninguno',546546787),
(18,1.87,101,'Insomnio','Ninguno',651321324),
(19,1.47,40,'Ansiedad','Mani',654154544),
(20,1.47,50,'Ninguno','Mani',659268459),
(21,1.78,69,'Deficit de atencion','Grasa',659326587),
(22,1.90,100,'Ninguno','Mermelada',695834795),
(23,1.80,80,'Ninguno','Ninguno',854239528),
(24,1.4,40,'Ninguno','Ninguno',985674827),
(25,1.8,98,'Ninguno','Ninguno',986539647);

-- CONSULTA MEDICA
INSERT INTO CONSULTA_MEDICA(idConsulta,horaConsulta,motivoConsulta,enfermedad,idHistoriaFK) VALUES
(1,'2008-11-11 13:23:44','Control General','Ninguna',1),
(2,'2020-12-25 14:24:59','Ortodoncia','Ninguna',2),
(3,'2019-04-14 08:05:15','Ortodoncia','Ninguna',3),
(4,'2017-10-15 22:30:14','Ortodoncia','Ninguna',4),
(5,'2017-10-15 20:35:52','Ortodoncia','Ninguna',5),
(6,'2017-01-30 14:34:14','Ortodoncia','Ninguna',6),
(7,'2014-08-23 10:04:56','Ortodoncia','Ninguna',7),
(8,'2017-05-14 08:50:24','Ortodoncia','Ninguna',8),
(9,'2018-04-18 17:10:14','Ortodoncia','Ninguna',9),
(10,'2020-08-05 10:01:29','Ortodoncia','Ninguna',10),
(11,'2014-04-07 09:00:50','Ortodoncia','Ninguna',11),
(12,'2020-05-08 07:54:47','Ortodoncia','Ninguna',12),
(13,'2017-10-25 13:14:14','Ortodoncia','Ninguna',13),
(14,'2014-04-11 14:41:25','Ortodoncia','Ninguna',14),
(15,'2010-01-12 17:14:14','Ortodoncia','Ninguna',15),
(16,'2018-03-12 20:10:47','Ortodoncia','Ninguna',16),
(17,'2014-09-27 19:50:36','Ortodoncia','Ninguna',17),
(18,'2019-10-20 20:40:28','Ortodoncia','Ninguna',18),
(19,'2018-11-14 11:20:36','Ortodoncia','Ninguna',19),
(20,'2017-08-10 15:40:54','Ortodoncia','Ninguna',20),
(21,'2015-07-09 14:41:40','Ortodoncia','Ninguna',21),
(22,'2010-09-08 13:04:15','Ortodoncia','Ninguna',22),
(23,'2004-07-17 09:40:58','Ortodoncia','Ninguna',23),
(24,'2007-12-20 07:20:10','Ortodoncia','Ninguna',24),
(25,'2014-11-14 17:50:23','Ortodoncia','Ninguna',25);

-- DIAGNOSTICO
INSERT INTO DIAGNOSTICO(idDiagnostico,descripcion,idConsultaFK) VALUES
(1,'Mitosis Cronica',1),
(2,'Ortodoncia completa',2),
(3,'Molares sup extraidos',3),
(4,'Caries',4),
(5,'Caries',5),
(6,'Caries',6),
(7,'Caries',7),
(8,'Caries',8),
(9,'Caries',9),
(10,'Caries',10),
(11,'Dentadura postiza adaptada',11),
(12,'Mandibula desplazada',12),
(13,'Ansiedad',13),
(14,'Depresion',14),
(15,'Indeterminado',15),
(16,'Caries',16),
(17,'Encia maltratada',17),
(18,'Cordales',18),
(19,'Cordales Extraidos',19),
(20,'Caries',20),
(21,'Caries',21),
(22,'Malnutricion',22),
(23,'Caries',23),
(24,'Caries',24),
(25,'Caries',25);

-- EXAMEN
INSERT INTO EXAMEN(idExamen,valor,fechaExamen,tipoExamen,idHistoriaFK) VALUES
(1,5000,'2004-01-29','Diagnostico Ortodoncia',1),
(2,5000,'2003-07-15','Diagnostico Ortodoncia',2),
(3,15000,'2010-09-10','Diagnostico Ortodoncia',3),
(4,0,'2012-08-20','Diagnostico Ortodoncia',4),
(5,54000,'1920-05-28','Diagnostico Ortodoncia',5),
(6,40000,'2020-03-12','Diagnostico Ortodoncia',6),
(7,1000000,'1960-12-31','Extraccion molares',7),
(8,400000,'2007-04-25','Dientes postizos',8),
(9,0,'1967-10-28','Diagnostico Ortodoncia',9),
(10,0,'2004-07-14','Diagnostico Ortodoncia',10),
(11,0,'2001-11-30','Diagnostico Ortodoncia',11),
(12,0,'1980-04-17','Diagnostico Ortodoncia',12),
(13,0,'1970-04-14','Diagnostico Ortodoncia',13),
(14,10000,'1990-05-20','Diagnostico Ortodoncia',14),
(15,7000,'2017-10-01','Diagnostico Ortodoncia',15),
(16,5400,'1998-01-11','Diagnostico Ortodoncia',16),
(17,6000,'1980-11-20','Radiografia',17),
(18,4000,'2004-04-27','Extraccion Cordales',18),
(19,5000,'2007-07-26','Diagnostico Ortodoncia',19),
(20,8000,'2004-04-16','Diagnostico Ortodoncia',20),
(21,4000,'1999-12-31','Diagnostico Ortodoncia',21),
(22,7500,'1980-01-18','Extraccion Cordales',22),
(23,9000,'1990-05-24','Diagnostico Ortodoncia',23),
(24,4000,'1960-08-08','Extraccion Cordales',24),
(25,5000,'1989-07-24','Diagnostico Ortodoncia',25);

-- Agenda
INSERT INTO AGENDA(idAgenda,fechaAgenda,horaAgenda,consultorio,estadoAgenda,idMedicoFK,idPacienteFK)VALUES
(1,'2004-01-29','2004-01-29 13:23:44','20',true,112121547,116598748),
(2,'2003-07-15','2003-07-15 10:01:29','14',true,200459678,1193116959),
(3,'2010-09-10','2010-09-10 09:00:50','01',true,215478365,null),
(4,'2012-08-20','2012-08-20 07:54:47','12',true,223365987,179498639),
(5,'1920-05-28','1920-05-28 13:14:14','25',true,223565578,210101175),
(6,'2020-03-12','2020-03-12 14:41:25','01',true,235565779,null),
(7,'1960-12-31','1960-12-31 17:14:14','02',true,248756278,213213544),
(8,'2007-04-25','2007-04-25 20:10:47','25',true,325987658,223165456),
(9,'1967-10-28','1967-10-28 19:50:36','40',true,336597845,225698359),
(10,'2004-07-14','2004-07-14 20:40:28','20',true,359684447,324544458),
(11,'2001-11-30','2001-11-30 11:20:36','01',true,377895685,null),
(12,'1980-04-17','1980-04-17 14:24:59','02',true,397548628,332165452),
(13,'1970-04-14','1970-04-14 15:40:54','03',true,454587896,343545557),
(14,'1990-05-20','1990-05-20 14:41:40','05',true,546378912,489879846),
(15,'2017-10-01','2017-10-01 13:04:15','06',true,650138984,531124545),
(16,'1998-01-11','1998-01-11 09:40:58','08',true,655884798,532135453),
(17,'1980-11-20','1980-11-20 07:20:10','09',true,658957246,null),
(18,'2004-04-27','2004-04-27 17:50:23','10',true,659226598,651321324),
(19,'2007-07-26','2007-07-26 08:05:15','05',true,659888745,654154544),
(20,'2004-04-16','2004-04-16 22:30:14','15',true,669858897,659268459),
(21,'1999-12-31','1999-12-31 20:35:52','28',true,685487895,659326587),
(22,'1980-01-18','1980-01-18 14:34:14','15',true,689117559,695834795),
(23,'1990-05-24','1990-05-24 10:04:56','12',true,698214573,854239528),
(24,'1960-08-08','1960-08-08 08:50:24','18',true,975684102,985674827),
(25,'1989-07-24','1989-07-24 17:10:14','20',true,985687400,986539647);

-- Registros para realizar pruebas

INSERT INTO `consultorio`.`USUARIO` (`idUsuario`, `nombreUsuario`, `apellidoUsuario`, `correoUsuario`, `telefonoUsuario`, `direccionUsuario`, `passwordUsuario`, `rolUsuario`, `estadoUsuario`) VALUES ('0', 'Admin', 'Admin', 'administrador@gmail.com', '324234324234', 'Carrera 34 #43-23 S', '12345', 'Admin', true);
INSERT INTO `consultorio`.`USUARIO` (`idUsuario`, `nombreUsuario`, `apellidoUsuario`, `correoUsuario`, `telefonoUsuario`, `direccionUsuario`, `passwordUsuario`, `rolUsuario`, `estadoUsuario`) VALUES ('1', 'Secretaria', 'Alcachofa', 'secretaria@gmail.com', '3564984808', 'Calle 24', '12345', 'Secretaria', true);
INSERT INTO `consultorio`.`USUARIO` (`idUsuario`, `nombreUsuario`, `apellidoUsuario`, `correoUsuario`, `telefonoUsuario`, `direccionUsuario`, `passwordUsuario`, `rolUsuario`, `estadoUsuario`) VALUES ('2', 'Medico', 'Caicedo', 'medico@gmail.com', '3265488945', 'Calle 24', '12345', 'Medico', true);
INSERT INTO `consultorio`.`MEDICO` (`idMedico`, `nombreMedico`, `apellidoMedico`, `telefonoMedico`, `correoMedico`, `especialidadMedico`, `tarjetaProfesional`, `estadoMedico`, `idUsuarioFK`) VALUES ('2', 'Medico', 'Caicedo', '3265488945', 'medico@gmail.com', 'Ortodoncista', '23423423', true, '2');
INSERT INTO `consultorio`.`USUARIO` (`idUsuario`, `nombreUsuario`, `apellidoUsuario`, `correoUsuario`, `telefonoUsuario`, `direccionUsuario`, `passwordUsuario`, `rolUsuario`, `estadoUsuario`) VALUES ('3', 'Paciente', 'David', 'paciente@gmail.com', '2645646598', 'Calle 24', '12345', 'Paciente', true);
INSERT INTO `consultorio`.`PACIENTE` (`idPaciente`, `nombrePaciente`, `apellidoPaciente`, `direccionPaciente`, `telefonoPaciente`, `fechaNacimiento`, `estadoPaciente`, `idUsuarioFK`) VALUES ('3', 'Paciente', 'David', 'paciente@gmail.com', '2645646598', '2003-12-30', true, '3');
INSERT INTO `consultorio`.`historia_clinica` (`estatura`, `peso`, `antecedentesFamiliares`, `alergias`, `idPacienteFK`) VALUES ('1.4', '49', 'Ninguno', 'Ninguno ', '3');


-- CONSULTA DE NÚMERO DE REGISTROS (COUNT)
SELECT COUNT(idUsuario) AS "CANTIDAD DE USUARIOS" FROM USUARIO; 
SELECT COUNT(idMedico) AS "CANTIDAD DE MÉDICOS" FROM MEDICO;
SELECT COUNT(idPaciente) AS "CANTIDAD DE PACIENTES" FROM PACIENTE;
SELECT COUNT(idHistoria) AS "CANTIDAD DE HISTORIAS CLÍNICAS" FROM HISTORIA_CLINICA;
SELECT COUNT(idDiagnostico) AS "CANTIDAD DE DIAGNÓSTICOS" FROM DIAGNOSTICO;
SELECT COUNT(idExamen) AS "CANTIDAD DE EXÁMENES" FROM EXAMEN;
SELECT COUNT(idAgenda) AS "CANTIDAD DE AGENDAS" FROM AGENDA;

-- REPLACE
SELECT REPLACE('Carlos','C','P');
SELECT REPLACE('Daniel','l','la');
SELECT REPLACE('Julio','o','a');

-- SELECT
SELECT * FROM USUARIO;
SELECT * FROM PACIENTE;
SELECT * FROM MEDICO;
SELECT * FROM CONSULTA_MEDICA;
SELECT * FROM EXAMEN;
SELECT * FROM AGENDA;

SELECT * FROM USUARIO WHERE nombreUsuario = 'Carlos' AND apellidoUsuario = 'Ramirez';
SELECT * FROM USUARIO WHERE nombreUsuario = 'Luz' AND apellidoUsuario = 'Muñoz';
SELECT * FROM PACIENTE WHERE nombrePaciente LIKE 'Dan%'; 
SELECT * FROM DIAGNOSTICO WHERE idDiagnostico = 5;
SELECT * FROM AGENDA WHERE idAgenda = 25;
SELECT * FROM AGENDA WHERE consultorio = 01;
SELECT * FROM USUARIO WHERE rolUsuario = 'Medico';
SELECT * FROM USUARIO WHERE rolUsuario = 'Paciente';
SELECT * FROM AGENDA WHERE fechaAgenda > '2019-12-31';
SELECT * FROM EXAMEN WHERE valor = 0 ORDER BY idExamen ASC;
SELECT * FROM MEDICO WHERE especialidadMedico = 'Medico General';
SELECT correoUsuario FROM USUARIO WHERE correoUsuario LIKE '%.com%';
SELECT peso FROM HISTORIA_CLINICA WHERE peso < 50;
SELECT valor FROM EXAMEN WHERE tipoExamen LIKE '%DIAGNOSTICO%';
SELECT idDiagnostico, descripcion FROM DIAGNOSTICO where idDiagnostico = 1;

-- OPERADORES LÓGICOS
SELECT idUsuario, nombreUsuario FROM USUARIO WHERE correoUsuario NOT LIKE '%medic%' AND rolUsuario = 'Medico';
SELECT idExamen,tipoExamen FROM EXAMEN WHERE valor > 50000 OR tipoExamen LIKE '%Extraccion%';
SELECT nombreMedico, especialidadMedico FROM MEDICO WHERE especialidadMedico NOT LIKE '%General%' AND especialidadMedico NOT LIKE '%ortopedista%';
SELECT COUNT(idMedico) as 'Ortopedistas' FROM MEDICO WHERE especialidadMedico LIKE '%Ortopedista%' AND nombreMedico != 'Omar';
SELECT COUNT(idUsuario) FROM USUARIO WHERE NOT estadoUsuario = true AND nombreUsuario != 'Julian';
SELECT nombreMedico FROM MEDICO WHERE nombreMedico LIKE '%d%' OR nombreMedico LIKE '%s%';
SELECT idUsuario, nombreUsuario FROM USUARIO WHERE rolUsuario = 'Paciente' AND nombreUsuario = 'Juan';

-- COLUMNAS CALCULADAS
SELECT SUM(valor) as 'Total Examenes' FROM EXAMEN;
SELECT AVG(peso) as 'Peso Promedio' FROM HISTORIA_CLINICA;
SELECT AVG(estatura) as 'Altura Promedio' FROM HISTORIA_CLINICA;
SELECT * FROM HISTORIA_CLINICA WHERE PESO >= all(SELECT MAX(PESO) FROM HISTORIA_CLINICA);

-- LIKE y NOT LIKE
SELECT * FROM EXAMEN WHERE tipoExamen LIKE '%Radiografia%';
SELECT * FROM HISTORIA_CLINICA WHERE antecedentesFamiliares LIKE '%Ansiedad%';
SELECT estatura,peso FROM HISTORIA_CLINICA WHERE alergias LIKE '%Aceite%';
SELECT * FROM USUARIO WHERE rolUsuario NOT LIKE 'Medico';

-- HAVING 
SELECT COUNT(idMedico) as 'Número de Medicos',especialidadMedico FROM MEDICO GROUP BY especialidadMedico HAVING COUNT(idMedico) <= 3 ORDER BY COUNT(idMedico) DESC;
SELECT COUNT(idUsuario) as 'Número de Usuarios', nombreUsuario FROM USUARIO GROUP BY nombreUsuario HAVING COUNT(idUsuario) > 1 ORDER BY COUNT(idUsuario) DESC;
SELECT COUNT(idExamen) as 'Número de Exámenes', tipoExamen FROM EXAMEN GROUP BY tipoExamen HAVING COUNT(idExamen) > 1 ORDER BY COUNT(idExamen) DESC;
SELECT COUNT(idUsuario) as 'Número de Usuarios', apellidoUsuario FROM USUARIO GROUP BY apellidoUsuario HAVING COUNT(idUsuario) > 1 ORDER BY COUNT(idUsuario) DESC;
SELECT COUNT(idHistoria) as 'Número de antecedentes',antecedentesFamiliares FROM HISTORIA_CLINICA GROUP BY antecedentesFamiliares HAVING COUNT(idHistoria) > 1 ORDER BY COUNT(idHistoria) DESC;
SELECT COUNT(idUsuario), rolUsuario FROM USUARIO GROUP BY rolUsuario HAVING COUNT(idUsuario) >= 2;

-- GROUP BY
SELECT count(especialidadMedico), especialidadMedico FROM MEDICO GROUP BY especialidadMedico ORDER BY especialidadMedico;
SELECT nombreUsuario as 'Nombres de usuarios' FROM USUARIO GROUP BY nombreUsuario ORDER BY nombreUsuario;
SELECT alergias FROM HISTORIA_CLINICA GROUP BY alergias ORDER BY alergias;
SELECT descripcion FROM DIAGNOSTICO GROUP BY descripcion ORDER BY descripcion;
SELECT apellidoUsuario FROM USUARIO GROUP BY apellidoUsuario ORDER BY apellidoUsuario;

-- UPDATE
UPDATE USUARIO SET nombreUsuario = 'Carlitos' WHERE nombreUsuario = 'Carlos';
UPDATE USUARIO SET telefonoUsuario = '3522659865' WHERE idUsuario = 896579845;
UPDATE PACIENTE SET estadoPaciente = true WHERE nombrePaciente LIKE 'Ken%';
UPDATE PACIENTE SET direccionPaciente = 'Cra 85D #45-45' WHERE nombrePaciente LIKE 'Sofia%' AND apellidoPaciente LIKE 'Hern%';
UPDATE MEDICO SET especialidadMedico = 'Medic@ General' WHERE especialidadMedico = 'Medico General' OR especialidadMedico = 'Medica General';

-- DELETE
SET foreign_key_checks = 0; 
DELETE FROM PACIENTE WHERE nombrePaciente LIKE 'Obama%';
DELETE FROM USUARIO WHERE nombreUsuario = 'Obama';
DELETE FROM EXAMEN WHERE idExamen = 1;
DELETE FROM DIAGNOSTICO WHERE idConsultaFK = 22;
DELETE FROM CONSULTA_MEDICA WHERE motivoConsulta = 'Control General';

-- ORDERNE LOS DATOS
SELECT * FROM USUARIO ORDER BY nombreUsuario;
SELECT * FROM PACIENTE ORDER BY nombrePaciente;
SELECT * FROM MEDICO ORDER BY nombreMedico;
SELECT * FROM DIAGNOSTICO ORDER BY idDiagnostico;
SELECT * FROM EXAMEN ORDER BY idExamen;
SELECT * FROM HISTORIA_CLINICA ORDER BY idHistoria;
SELECT * FROM AGENDA ORDER BY fechaAgenda DESC;
SELECT nombrePaciente as Nombre, apellidoPaciente as Apellido, fechaNacimiento as 'Fecha de Nacimiento', TIMESTAMPDIFF(YEAR, fechaNacimiento, NOW()) as Edad FROM PACIENTE;

-- SUBCONSULTAS

-- Muestra los pacientes cuyo peso es mayor a el peso promedio de las personas sin enfermedades
SELECT * FROM HISTORIA_CLINICA WHERE peso > (SELECT avg(peso) FROM HISTORIA_CLINICA  where antecedentesFamiliares = 'Ninguno') ORDER BY peso DESC; 
-- Selecciona los pacientes cuya estatura es mayor a todos los pacientes sin alergias 
SELECT * FROM HISTORIA_CLINICA WHERE estatura > ALL(SELECT estatura FROM HISTORIA_CLINICA WHERE alergias = 'Ninguno'); 
-- Selecciona los examenes cuya fecha es más reciente a todos los exámenes gratuitos
SELECT * FROM EXAMEN WHERE fechaExamen > ALL(SELECT fechaExamen FROM EXAMEN WHERE valor = 0); 
-- Muestra correos y edades de los pacientes
SELECT u.correoUsuario AS Correo, subconsulta.Edad FROM USUARIO as u INNER JOIN (SELECT idPaciente, TIMESTAMPDIFF(YEAR, fechaNacimiento, now()) as Edad, nombrePaciente AS Nombre FROM PACIENTE) as subconsulta ON u.idUsuario = subconsulta.idPaciente;
-- Muestra nombre del medico y las horas y fechas de sus consultas
SELECT subconsulta.nombreMedico as Nombre,a.fechaAgenda as Fecha, a.horaAgenda as Hora FROM AGENDA AS a INNER JOIN (SELECT idMedico,nombreMedico FROM MEDICO) as subconsulta ON subconsulta.idMedico = a.idMedicoFK ORDER BY Fecha DESC;
-- Muestra direccion y nombre de los médicos
SELECT Direccion, m.nombreMedico as Nombre FROM Medico as m INNER JOIN (SELECT idUsuario, direccionUsuario as Direccion FROM USUARIO) as subconsulta ON subconsulta.idUsuario = m.idMedico;

-- CONSULTAS MULTITABLA

-- Une las tablas Paciente e historia clinica, en tal caso que el paciente no tenga historia clínica, apareceran unicamente los datos del paciente
SELECT p.nombrePaciente as Nombre,p.apellidoPaciente as Apellido,h.estatura as Altura,h.peso as Peso FROM PACIENTE as p LEFT JOIN HISTORIA_CLINICA as h ON p.idPaciente = h.idPacienteFK;
-- Muestra el nombre de los pacientes y el tipo de exámenes que se les ha realizado
SELECT subconsulta.nombre,e.tipoExamen as Tipo FROM EXAMEN as e INNER JOIN (SELECT h.idHistoria, p.nombrePaciente as Nombre FROM PACIENTE as p INNER JOIN HISTORIA_CLINICA as h ON p.idPaciente = h.idPacienteFK) as subconsulta ON subconsulta.idHistoria = e.idHistoriaFK; 
-- Muestra el id y el motivo de la consulta, ligado al diagnostico generado. Si no existe diagnostico, se muestran solo los datos de la consulta
SELECT c.idConsulta,c.motivoConsulta, d.descripcion FROM CONSULTA_MEDICA as c RIGHT JOIN DIAGNOSTICO AS d ON d.idConsultaFK = c.idConsulta;
-- Muestra el nombre y el rol del medico
SELECT u.rolUsuario AS Rol,m.nombreMedico AS Nombre FROM USUARIO as u, MEDICO as m WHERE u.idUsuario = m.idMedico;

-- Se crea una tabla de nuevos usuarios para unir datos con operador UNION
CREATE TABLE NUEVOS_USUARIOS(
	idUsuario NVARCHAR(12) UNIQUE,
    PRIMARY KEY(idUsuario),
    nombreUsuario NVARCHAR(50) NOT NULL,
    apellidoUsuario NVARCHAR(50) NOT NULL,
    correoUsuario NVARCHAR(50) NOT NULL,
    telefonoUsuario NVARCHAR(20) NOT NULL,
    direccionUsuario NVARCHAR(50) NOT NULL,
    passwordUsuario NVARCHAR(20) NOT NULL,
    rolUsuario NVARCHAR(20) NOT NULL,
    estadoUsuario BIT NOT NULL
);
INSERT INTO `consultorio`.`nuevos_usuarios` (`idUsuario`, `nombreUsuario`, `apellidoUsuario`, `correoUsuario`, `telefonoUsuario`, `direccionUsuario`, `passwordUsuario`, `rolUsuario`, `estadoUsuario`) VALUES ('114554589', 'Nose', 'Acuna', 'sce@gmail.com', '3055552', 'Calle 324', '23235', 'Paciente', true);
INSERT INTO `consultorio`.`nuevos_usuarios` (`idUsuario`, `nombreUsuario`, `apellidoUsuario`, `correoUsuario`, `telefonoUsuario`, `direccionUsuario`, `passwordUsuario`, `rolUsuario`, `estadoUsuario`) VALUES ('1155468668', 'Alen', 'Dylan', '22321dasd@gmail.com', '4052268', 'Carrera 23', '232nkml', 'Paciente', true);

-- Agrega los datos de la tabla creada anteriormente a la tabla usuarios
SELECT * FROM USUARIO UNION ALL SELECT * FROM NUEVOS_USUARIOS;
DROP TABLE NUEVOS_USUARIOS;

-- VISTAS
CREATE OR REPLACE VIEW VISTA_MEDICO_PACIENTES AS
SELECT p.idPaciente as ID, p.nombrePaciente as Nombre, p.apellidoPaciente as apellido, p.telefonoPaciente as Telefono, p.fechaNacimiento as 'Fecha de Nacimiento', TIMESTAMPDIFF(YEAR,p.fechaNacimiento,NOW()) AS "EDAD", h.peso AS Peso, h.estatura AS Estatura, h.antecedentesFamiliares AS 'Antecedentes Familiares', h.alergias as Alergias FROM PACIENTE as p 
INNER JOIN HISTORIA_CLINICA AS h ON p.idPaciente = h.idPacienteFK;

SELECT * FROM VISTA_MEDICO_PACIENTES;

CREATE OR REPLACE VIEW VISTA_ADMINISTRADOR AS
SELECT idUsuario as ID, nombreUsuario as Nombre, apellidoUsuario as Apellido, correoUsuario as Correo, direccionUsuario as Direccion, rolUsuario as Rol, estadoUsuario as Estado FROM USUARIO;

SELECT * FROM VISTA_ADMINISTRADOR;

CREATE OR REPLACE VIEW VISTA_MEDICO_215478365 AS
SELECT fechaAgenda as Fecha, horaAgenda as Hora, consultorio AS Consultorio FROM AGENDA WHERE estadoAgenda = true AND idMedicoFK = 215478365;

SELECT * FROM VISTA_MEDICO_215478365;

CREATE OR REPLACE VIEW AGENDA_MEDICA AS
SELECT idAgenda, horaAgenda as "Fecha y hora agenda", fechaAgenda, TIME(horaAgenda) as horaAgenda, consultorio, estadoAgenda, idPaciente, nombrePaciente, idMedico, nombreMedico FROM (SELECT A.idAgenda, A.fechaAgenda,A.horaAgenda,A.consultorio,A.estadoAgenda,P.idPaciente,CONCAT(P.nombrePaciente," ",P.apellidoPaciente) AS nombrePaciente, idMedicoFK FROM AGENDA as A LEFT JOIN PACIENTE as P ON A.idPacienteFK = P.idPaciente) AS AGENDA_PACIENTE LEFT JOIN (SELECT idMedico,CONCAT(nombreMedico, " ",apellidoMedico) as "nombreMedico" FROM MEDICO) AS MEDICO ON AGENDA_PACIENTE.idMedicoFK = MEDICO.idMedico;

CREATE OR REPLACE VIEW VISTA_EXAMEN AS
SELECT SUBCONSULTA.*, CONCAT(PACIENTE.nombrePaciente," ",PACIENTE.apellidoPaciente) as nombrePaciente FROM (SELECT EXAMEN.*,HISTORIA_CLINICA.idPacienteFK FROM EXAMEN INNER JOIN HISTORIA_CLINICA ON EXAMEN.idHistoriaFK = HISTORIA_CLINICA.idHistoria) AS SUBCONSULTA INNER JOIN PACIENTE ON SUBCONSULTA.idPacienteFK = PACIENTE.idPaciente;

CREATE OR REPLACE VIEW VISTA_CONSULTA_MEDICA AS
SELECT SUBCONSULTA.*,CONCAT(nombrePaciente," ", apellidoPaciente) as nombrePaciente FROM (SELECT CONSULTA_MEDICA.*, HISTORIA_CLINICA.idPacienteFK FROM CONSULTA_MEDICA INNER JOIN HISTORIA_CLINICA ON CONSULTA_MEDICA.idHistoriaFK = HISTORIA_CLINICA.idHistoria) AS SUBCONSULTA INNER JOIN PACIENTE ON SUBCONSULTA.idPacienteFK = PACIENTE.idPaciente;

SELECT * FROM VISTA_EXAMEN;
SELECT * FROM MEDICO;
SELECT * FROM PACIENTE;
SELECT * FROM VISTA_CONSULTA_MEDICA;	
SELECT * FROM AGENDA;
SELECT * FROM AGENDA_MEDICA;
SELECT * FROM USUARIO WHERE idUsuario = '2' AND rolUsuario = 'Paciente';

-- Procedimientos almacenados

-- REGISTRAR USUARIO
DELIMITER //
CREATE PROCEDURE REGISTRAR_USUARIO(
    IN nuevoIdUsuario NVARCHAR(12),IN nuevoNombreUsuario NVARCHAR(50),IN nuevoApellidoUsuario NVARCHAR(50),IN nuevoCorreoUsuario NVARCHAR(50),
    IN nuevoTelefonoUsuario NVARCHAR(20),IN nuevoDireccionUsuario NVARCHAR(50),IN nuevoPasswordUsuario NVARCHAR(20),IN nuevoRolUsuario NVARCHAR(20),
    IN nuevoEstadoUsuario BIT
)
BEGIN
    INSERT INTO usuario(idUsuario,nombreUsuario,apellidoUsuario,correoUsuario,telefonoUsuario,direccionUsuario,passwordUsuario,rolUsuario,estadoUsuario)
    VALUES (nuevoIdUsuario,nuevoNombreUsuario,nuevoApellidoUsuario,nuevoCorreoUsuario,nuevoTelefonoUsuario,nuevoDireccionUsuario,nuevoPasswordUsuario,nuevoRolUsuario,nuevoEstadoUsuario);
END //
DELIMITER ;

call REGISTRAR_USUARIO(65156554780,'Hob','Delpiero','riedoffelling@gmail.com','62621589','Cll 34 #45-34','124luo','Paciente',true);

-- ACTUALIZAR USUARIO
DELIMITER //
CREATE PROCEDURE ACTUALIZAR_USUARIO(
    IN nuevoIdUsuario NVARCHAR(12),IN nuevoNombreUsuario NVARCHAR(50),IN nuevoApellidoUsuario NVARCHAR(50),IN nuevoCorreoUsuario NVARCHAR(50),
    IN nuevoTelefonoUsuario NVARCHAR(20),IN nuevoDireccionUsuario NVARCHAR(50),IN nuevoPasswordUsuario NVARCHAR(20),IN nuevoRolUsuario NVARCHAR(20),
    IN nuevoEstadoUsuario BIT
)
BEGIN
    UPDATE USUARIO SET nombreUsuario = nuevoNombreUsuario,apellidoUsuario = nuevoApellidoUsuario,correoUsuario = nuevoCorreoUsuario,telefonoUsuario = nuevoTelefonoUsuario,direccionUsuario = nuevoDireccionUsuario,passwordUsuario = nuevoPasswordUsuario,rolUsuario = nuevoRolUsuario,estadoUsuario = nuevoEstadoUsuario WHERE idUsuario = nuevoIdUsuario;
END //
DELIMITER ;
-- CALL ACTUALIZAR_USUARIO('1193116959','Carl0s','xd','fdf@gmail','324324','C3','1234','Paciente',true);
-- SELECT * FROM USUARIO WHERE idUsuario = '1193116959';

-- REGISTRAR MÉDICO
DELIMITER //
CREATE PROCEDURE REGISTRAR_MEDICO(
    IN nuevoIdMedico NVARCHAR(12),IN nuevoNombreMedico NVARCHAR(50),IN nuevoApellidoMedico NVARCHAR(50),IN nuevoTelefonoMedico NVARCHAR(20), 
    IN nuevoCorreoMedico NVARCHAR(100), IN nuevoEspecialidadMedico NVARCHAR(50),IN nuevoTarjetaProfesional NVARCHAR(50),IN nuevoEstadoMedico BIT
)
BEGIN
    INSERT INTO MEDICO(idMedico,nombreMedico,apellidoMedico,telefonoMedico,correoMedico,especialidadMedico,tarjetaProfesional,estadoMedico,idUsuarioFK)
    VALUES (nuevoIdMedico,nuevoNombreMedico,nuevoApellidoMedico,nuevoTelefonoMedico,nuevoCorreoMedico,nuevoEspecialidadMedico,nuevoTarjetaProfesional,
    nuevoEstadoMedico,nuevoIdMedico);
END //
DELIMITER ;
CALL REGISTRAR_MEDICO(65156554780,'Hob','Delpiero',62621589,'riedoffelling@gmail.com','Medico general',15568965,true);

-- REGISTRAR PACIENTE
DELIMITER //
CREATE PROCEDURE REGISTRAR_PACIENTE(
    IN nuevoIdPaciente NVARCHAR(12), IN nuevoNombrePaciente NVARCHAR(50),IN nuevoApellidoPaciente NVARCHAR(50), IN nuevoDireccionPaciente NVARCHAR(100),
    IN nuevoTelefonoPaciente NVARCHAR(20), IN nuevoFechaNacimiento DATE, IN nuevoEstadoPaciente BIT
)
BEGIN
    INSERT INTO PACIENTE(idPaciente,nombrePaciente,apellidoPaciente,direccionPaciente,telefonoPaciente,fechaNacimiento,estadoPaciente,idUsuarioFK)
    VALUES (nuevoIdPaciente,nuevoNombrePaciente,nuevoApellidoPaciente,nuevoDireccionPaciente,nuevoTelefonoPaciente,nuevoFechaNacimiento,
    nuevoEstadoPaciente,nuevoIdPaciente);
END //
DELIMITER ;
CALL REGISTRAR_USUARIO(564568874,'Nach','Juglar','anotherpoet@gmail.com',2054861,'Cll 4','lzma','Paciente',true);
CALL REGISTRAR_PACIENTE(564568874,'Nach','Juglar','Cll 4',2054861,'2003-04-15',true);

CREATE TABLE USUARIO_INACTIVO(
	idUsuario NVARCHAR(12) UNIQUE,
    PRIMARY KEY(idUsuario),
    nombreUsuario NVARCHAR(50) NOT NULL,
    apellidoUsuario NVARCHAR(50) NOT NULL,
    correoUsuario NVARCHAR(50) NOT NULL,
    telefonoUsuario NVARCHAR(20) NOT NULL,
    direccionUsuario NVARCHAR(50) NOT NULL,
    passwordUsuario NVARCHAR(20) NOT NULL,
    rolUsuario NVARCHAR(20) NOT NULL,
    estadoUsuario BIT NOT NULL DEFAULT false
);

CREATE TABLE PACIENTE_INACTIVO(
	idPaciente NVARCHAR(12) UNIQUE,
    PRIMARY KEY(idPaciente),
    nombrePaciente NVARCHAR(50) NOT NULL,
    apellidoPaciente NVARCHAR(50) NOT NULL,
    direccionPaciente NVARCHAR(100) NOT NULL,
    telefonoPaciente NVARCHAR(20) NOT NULL,
    fechaNacimiento DATE NOT NULL,
    estadoPaciente BIT NOT NULL
);
CREATE TABLE MEDICO_INACTIVO(
	idMedico NVARCHAR(12) UNIQUE,
    PRIMARY KEY(idMedico),
    nombreMedico NVARCHAR(50) NOT NULL,
    apellidoMedico NVARCHAR(50) NOT NULL,
    telefonoMedico NVARCHAR(20) NOT NULL,
    correoMedico NVARCHAR(100) NOT NULL,
    especialidadMedico NVARCHAR(50) NOT NULL,
    tarjetaProfesional NVARCHAR(50) NOT NULL,
    estadoMedico BIT NOT NULL
);

DELIMITER //
CREATE TRIGGER USUARIO_BD
BEFORE DELETE ON USUARIO
FOR EACH ROW
BEGIN
    INSERT INTO USUARIO_INACTIVO(idUsuario,nombreUsuario,apellidoUsuario,correoUsuario,telefonoUsuario,direccionUsuario,passwordUsuario,
    rolUsuario,estadoUsuario)
    VALUES(old.idUsuario,old.nombreUsuario,old.apellidoUsuario,old.correoUsuario,old.telefonoUsuario,old.direccionUsuario,old.passwordUsuario,
    old.rolUsuario,old.estadoUsuario);
END //
DELIMITER ;
DELETE FROM PACIENTE WHERE nombrePaciente = 'Nach';
DELETE FROM USUARIO WHERE nombreUsuario = 'Nach';
SELECT * FROM USUARIO_INACTIVO;
DROP TRIGGER USUARIO_BD;

DELIMITER //
CREATE TRIGGER PACIENTE_BD
BEFORE DELETE ON PACIENTE
FOR EACH ROW
BEGIN
    INSERT INTO PACIENTE_INACTIVO(idPaciente,nombrePaciente,apellidoPaciente,direccionPaciente,telefonoPaciente,fechaNacimiento,estadoPaciente)
    VALUES(old.idPaciente,old.nombrePaciente,old.apellidoPaciente,old.direccionPaciente,old.telefonoPaciente,old.fechaNacimiento,old.estadoPaciente);
END //
DELIMITER ;
DROP TRIGGER PACIENTE_BD;

DELIMITER //
CREATE TRIGGER MEDICO_BD
BEFORE DELETE ON MEDICO
FOR EACH ROW
BEGIN
    INSERT INTO MEDICO_INACTIVO(idMedico,nombreMedico,apellidoMedico,telefonoMedico,correoMedico,especialidadMedico,tarjetaProfesional,estadoMedico)
    VALUES(old.idMedico,old.nombreMedico,old.apellidoMedico,old.telefonoMedico,old.correoMedico,old.especialidadMedico,old.tarjetaProfesional,
    old.estadoMedico);
END //
DELIMITER ;
DROP TRIGGER MEDICO_BD;

DROP TABLE PACIENTE_INACTIVO;
DROP TABLE MEDICO_INACTIVO;
DROP TABLE USUARIO_INACTIVO;