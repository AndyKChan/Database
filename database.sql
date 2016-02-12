-- first drop tables 
drop table Branch cascade constraints;
drop table Employee cascade constraints;
drop table EmployeeWorksFor cascade constraints;
drop table ProductPrice cascade constraints;
drop table ProductBarcode cascade constraints;
drop table Customer cascade constraints;
drop table Receipt cascade constraints;
drop table ReturnQuantity cascade constraints;
drop table Member cascade constraints;
drop table PurchaseQuantity cascade constraints;
drop table PurchaseExpDate cascade constraints;
drop table PurchaseTracks cascade constraints;
drop table ReturnBarcode cascade constraints;
drop table Game cascade constraints;
drop table console cascade constraints;
drop table PlayedOn cascade constraints;
drop table Accessory cascade constraints;
drop table Has cascade constraints;


-- Now Add Tables

CREATE TABLE Branch
(bID integer,
City varchar(100),
Address varchar(100),
PRIMARY KEY (bID));

CREATE TABLE Employee
(FirstName varchar (50),
LastName varchar(50),
eID integer,
PRIMARY KEY (eID));

CREATE TABLE EmployeeWorksFor
(eID integer,
bID integer,
PRIMARY KEY (eID, bID),
FOREIGN KEY (eID) references Employee(eID),
FOREIGN KEY (bID) references Branch(bID));

CREATE TABLE ProductPrice
(Name varchar(100),
Quantity integer,
PRIMARY KEY(Name));

CREATE TABLE ProductBarcode
(Barcode integer,
Name varchar(100),
PRIMARY KEY (Barcode),
FOREIGN KEY (Name) references ProductPrice(Name));

CREATE TABLE Customer
(cID integer,
Name Varchar (50),
Address Varchar(100),
PhoneNo Integer,
PRIMARY KEY (cID));

CREATE TABLE Receipt
(ReceiptNumber integer,
totalCost integer,
PRIMARY KEY (ReceiptNumber));


CREATE TABLE ReturnQuantity
(ReceiptNumber integer,
Quantity integer,
PRIMARY KEY (ReceiptNumber),
FOREIGN KEY (ReceiptNumber) references Receipt(ReceiptNumber));

CREATE TABLE Member
(cID integer,
points integer,
PRIMARY KEY (cID),
FOREIGN KEY (cID) references Customer (cID));

CREATE TABLE  PurchaseQuantity
(ReceiptNumber integer,
Quantity integer,
PRIMARY KEY (ReceiptNumber),
FOREIGN KEY (ReceiptNumber) references Receipt(ReceiptNumber));

CREATE TABLE PurchaseExpDate
(ReceiptNumber integer,
Until Date not null,
PRIMARY KEY (ReceiptNumber),
FOREIGN KEY (ReceiptNumber) references Receipt(ReceiptNumber));

CREATE TABLE PurchaseTracks
	(ReceiptNumber integer not null,
	Barcode integer not null,
	cID integer not null,
	PRIMARY KEY (ReceiptNumber, Barcode),
	FOREIGN KEY (cID) references Customer(cID),
	FOREIGN KEY (Barcode) references ProductBarcode(Barcode),
	FOREIGN KEY (ReceiptNumber) references Receipt(ReceiptNumber));

CREATE TABLE ReturnBarcode
(Barcode integer,
	ReceiptNumber integer not null,
	PRIMARY KEY (ReceiptNumber),
	FOREIGN KEY (ReceiptNumber) references ReturnQuantity(ReceiptNumber));

CREATE TABLE Game
	(Barcode integer,
	ESRB varchar(1),
	numPlayers integer,
	PRIMARY KEY (Barcode),
	FOREIGN KEY (Barcode) references ProductBarcode(Barcode));
 

CREATE TABLE Console
	(Barcode integer,
	PRIMARY KEY (Barcode),
	FOREIGN KEY (Barcode) references ProductBarcode(Barcode));

CREATE TABLE PlayedOn
	(GameBarcode integer,
	ConsoleBarcode integer,
	PRIMARY KEY (GameBarcode, ConsoleBarcode),
	FOREIGN KEY (GameBarcode) references Game(Barcode),
	FOREIGN KEY (ConsoleBarcode) references Console(Barcode));

CREATE TABLE Accessory
	(Barcode integer,
	PRIMARY KEY (Barcode),
	FOREIGN KEY (Barcode) references ProductBarcode(Barcode));

CREATE TABLE Has
        	(bID integer not null,
        	Barcode integer not null,
        	Quantity integer,
        	PRIMARY KEY (bID, Barcode),
FOREIGN KEY (bID) references Branch(bID),
FOREIGN KEY (Barcode) references ProductBarcode(Barcode));

--branch
insert into Branch values(01234567,'Vancouver','1608 Main Mall');
insert into Branch values(11234567,'Vancouver','1609 Main Mall');
insert into Branch values(21234567,'Vancouver','1610 Main Mall');
insert into Branch values(31234567,'Burnaby','1611 Main Mall');
insert into Branch values(41234567,'Burnaby','1612 Main Mall');

--employee
insert into Employee values('Andy','Chan',01234567);
insert into Employee values('Natchar','Long',12345678);
insert into Employee values('Ayuush','Long',23456789);
insert into Employee values('Kevin','Chan',34567890);
insert into Employee values('Path','Exile',45678901);

--EmployeeWorksFor
insert into EmployeeWorksFor values(01234567, 01234567);
insert into EmployeeWorksFor values(12345678, 11234567);
insert into EmployeeWorksFor values(23456789, 21234567);
insert into EmployeeWorksFor values(34567890, 31234567);
insert into EmployeeWorksFor values(45678901, 41234567); 

--productprice
insert into ProductPrice values('Xbox One', 10);
insert into ProductPrice values('Xbox 360', 11);
insert into ProductPrice values('Playstation 3', 12);
insert into ProductPrice values('Playstation 4', 13);
insert into ProductPrice values('Wii U', 14);
insert into ProductPrice values('Halo 3', 9);
insert into ProductPrice values('Halo 4', 8);
insert into ProductPrice values('Super Mario Bros. 1', 7);
insert into ProductPrice values('Super Mario Bros. 2', 6);
insert into ProductPrice values('Super Mario Bros. 3', 5);
insert into ProductPrice values('Wii Remote', 5);
insert into ProductPrice values('Xbox Kinect', 6);
insert into ProductPrice values('Playstation Controller', 7);
insert into ProductPrice values('Wii Balance Board', 8);
insert into ProductPrice values('Racing Wheel', 9);

--productbarcode
insert into ProductBarcode values(012345678912, 'Xbox One');
insert into ProductBarcode values(112345678912, 'Xbox 360');
insert into ProductBarcode values(212345678912, 'Playstation 3');
insert into ProductBarcode values(312345678912, 'Playstation 4');
insert into ProductBarcode values(412345678912, 'Wii U');
insert into ProductBarcode values(512345678912, 'Halo 3');
insert into ProductBarcode values(612345678912, 'Halo 4');
insert into ProductBarcode values(712345678912, 'Super Mario Bros. 1');
insert into ProductBarcode values(812345678912, 'Super Mario Bros. 2');
insert into ProductBarcode values(912345678912, 'Super Mario Bros. 3');
insert into ProductBarcode values(922345678912, 'Wii Remote');
insert into ProductBarcode values(932345678912, 'Xbox Kinect');
insert into ProductBarcode values(942345678912, 'Playstation Controller');
insert into ProductBarcode values(952345678912, 'Wii Balance Board');
insert into ProductBarcode values(962345678912, 'Racing Wheel');

--customer
insert into Customer values(09876543, 'Bob', '1908 Main St.', 7783208838);
insert into Customer values(19876543, 'Bobby', '1909 Main St.', 7783208839);
insert into Customer values(29876543, 'Ben', '1910 Main St.', 7783208830);
insert into Customer values(39876543, 'Benji', '1911 Main St.', 7783208831);
insert into Customer values(49876543, 'Benjamin', '1912 Main St.', 7783208832);
insert into Customer values(59876543, 'Bean', '1913 Main St.', 7783208833);
insert into Customer values(69876543, 'Beanie', '1914 Main St.', 7783208834);
insert into Customer values(79876543, 'Bop', '1915 Main St.', 7783208835);
insert into Customer values(89876543, 'Bun', '1916 Main St.', 7783208836);
insert into Customer values(99876543, 'Bunny', '1917 Main St.', 7783208837);
insert into Customer values(90876543, 'Bill', '1918 Main St.', 7783208847);
insert into Customer values(91876543, 'Billy', '1919 Main St.', 7783208857);
insert into Customer values(92876543, 'Bonny', '1920 Main St.', 7783208867);
insert into Customer values(93876543, 'Bonnie', '1921 Main St.', 7783208877);
insert into Customer values(94876543, 'Hassan', '1922 Main St.', 7783208887);

--receipt
insert into Receipt values(067890123456, 200);
insert into Receipt values(167890123456, 150);
insert into Receipt values(267890123456, 150);
insert into Receipt values(367890123456, 200);
insert into Receipt values(467890123456, 200);
insert into Receipt values(567890123456, 50);
insert into Receipt values(667890123456, 60);
insert into Receipt values(767890123456, 30);
insert into Receipt values(867890123456, 30);
insert into Receipt values(967890123456, 60);
insert into Receipt values(977890123456, 70);
insert into Receipt values(987890123456, 150);
insert into Receipt values(997890123456, 70);
insert into Receipt values(998890123456, 70);
insert into Receipt values(999890123456, 70);

--returnquantity
insert into ReturnQuantity values(067890123456, 1);
insert into ReturnQuantity values(167890123456, 1);
insert into ReturnQuantity values(267890123456, 1);
insert into ReturnQuantity values(367890123456, 1);
insert into ReturnQuantity values(467890123456, 1);
insert into ReturnQuantity values(567890123456, 1);
insert into ReturnQuantity values(667890123456, 9);
insert into ReturnQuantity values(767890123456, 8);
insert into ReturnQuantity values(867890123456, 7);
insert into ReturnQuantity values(967890123456, 6);
insert into ReturnQuantity values(977890123456, 1);
insert into ReturnQuantity values(987890123456, 1);
insert into ReturnQuantity values(997890123456, 1);
insert into ReturnQuantity values(998890123456, 1);
insert into ReturnQuantity values(999890123456, 1);

--member
insert into Member values(09876543, 1000);
insert into Member values(19876543, 2000);
insert into Member values(29876543, 3000);
insert into Member values(39876543, 4000);
insert into Member values(49876543, 5000);
insert into Member values(59876543, 6000);
insert into Member values(69876543, 7000);
insert into Member values(79876543, 8000);
insert into Member values(89876543, 9000);
insert into Member values(99876543, 10000);
insert into Member values(90876543, 11000);
insert into Member values(91876543, 12000);
insert into Member values(92876543, 13000);
insert into Member values(93876543, 14000);
insert into Member values(94876543, 15000);

--purchasequantity
insert into PurchaseQuantity values(067890123456, 1);
insert into PurchaseQuantity values(167890123456, 1);
insert into PurchaseQuantity values(267890123456, 1);
insert into PurchaseQuantity values(367890123456, 1);
insert into PurchaseQuantity values(467890123456, 1);
insert into PurchaseQuantity values(567890123456, 1);
insert into PurchaseQuantity values(667890123456, 9);
insert into PurchaseQuantity values(767890123456, 8);
insert into PurchaseQuantity values(867890123456, 7);
insert into PurchaseQuantity values(967890123456, 6);
insert into PurchaseQuantity values(977890123456, 1);
insert into PurchaseQuantity values(987890123456, 1);
insert into PurchaseQuantity values(997890123456, 1);
insert into PurchaseQuantity values(998890123456, 1);
insert into PurchaseQuantity values(999890123456, 1);

--purchaseexpdate
insert into PurchaseExpDate values(067890123456, '2014-06-04');
insert into PurchaseExpDate values(167890123456, '2014-06-05');
insert into PurchaseExpDate values(267890123456, '2014-06-06');
insert into PurchaseExpDate values(367890123456, '2014-06-07');
insert into PurchaseExpDate values(467890123456, '2014-06-08');
insert into PurchaseExpDate values(567890123456, '2014-06-09');
insert into PurchaseExpDate values(667890123456, '2014-06-10');
insert into PurchaseExpDate values(767890123456, '2014-06-11');
insert into PurchaseExpDate values(867890123456, '2014-06-12');
insert into PurchaseExpDate values(967890123456, '2014-06-13');
insert into PurchaseExpDate values(977890123456, '2014-06-14');
insert into PurchaseExpDate values(987890123456, '2014-06-15');
insert into PurchaseExpDate values(997890123456, '2014-06-16');
insert into PurchaseExpDate values(998890123456, '2014-06-17');
insert into PurchaseExpDate values(999890123456, '2014-06-18');

--purchasetracks
insert into PurchaseTracks values(067890123456, 512345678912, 59876543);
insert into PurchaseTracks values(167890123456, 612345678912, 69876543);
insert into PurchaseTracks values(267890123456, 712345678912, 79876543);
insert into PurchaseTracks values(367890123456, 812345678912, 89876543);
insert into PurchaseTracks values(467890123456, 912345678912, 99876543);
insert into PurchaseTracks values(567890123456, 012345678912, 09876543);
insert into PurchaseTracks values(667890123456, 112345678912, 19876543);
insert into PurchaseTracks values(767890123456, 212345678912, 29876543);
insert into PurchaseTracks values(867890123456, 312345678912, 39876543);
insert into PurchaseTracks values(967890123456, 412345678912, 49876543);
insert into PurchaseTracks values(977890123456, 922345678912, 90876543);
insert into PurchaseTracks values(987890123456, 932345678912, 91876543);
insert into PurchaseTracks values(997890123456, 942345678912, 92876543);
insert into PurchaseTracks values(998890123456, 952345678912, 93876543);
insert into PurchaseTracks values(999890123456, 962345678912, 94876543);

--returnbarcode
insert into ReturnBarcode values(012345678912, 567890123456);
insert into ReturnBarcode values(112345678912, 667890123456);
insert into ReturnBarcode values(212345678912, 767890123456);
insert into ReturnBarcode values(312345678912, 867890123456);
insert into ReturnBarcode values(412345678912, 967890123456);
insert into ReturnBarcode values(512345678912, 067890123456);
insert into ReturnBarcode values(612345678912, 167890123456);
insert into ReturnBarcode values(712345678912, 267890123456);
insert into ReturnBarcode values(812345678912, 367890123456);
insert into ReturnBarcode values(912345678912, 467890123456);
insert into ReturnBarcode values(922345678912, 977890123456);
insert into ReturnBarcode values(932345678912, 987890123456);
insert into ReturnBarcode values(942345678912, 997890123456);
insert into ReturnBarcode values(952345678912, 998890123456);
insert into ReturnBarcode values(962345678912, 999890123456);

--game
insert into Game values(512345678912, 'M', 4);
insert into Game values(612345678912, 'M', 4);
insert into Game values(712345678912, 'E', 2);
insert into Game values(812345678912, 'E', 2);
insert into Game values(912345678912, 'E', 2);

--console
insert into Console values(012345678912);
insert into Console values(112345678912);
insert into Console values(212345678912);
insert into Console values(312345678912);
insert into Console values(412345678912);	

--playedon
insert into PlayedOn values(512345678912, 012345678912);
insert into PlayedOn values(612345678912, 112345678912);
insert into PlayedOn values(712345678912, 212345678912);
insert into PlayedOn values(812345678912, 312345678912);
insert into PlayedOn values(912345678912, 412345678912);

--accessory
insert into Accessory values(922345678912);
insert into Accessory values(932345678912);
insert into Accessory values(942345678912);
insert into Accessory values(952345678912);
insert into Accessory values(962345678912);

--has
insert into Has values(01234567, 012345678912, 10);
insert into Has values(11234567, 112345678912, 11);
insert into Has values(21234567, 212345678912, 12);
insert into Has values(31234567, 312345678912, 13);
insert into Has values(41234567, 412345678912, 14);
insert into Has values(01234567, 512345678912, 9);
insert into Has values(11234567, 612345678912, 8);
insert into Has values(21234567, 712345678912, 7);
insert into Has values(31234567, 812345678912, 6);
insert into Has values(41234567, 912345678912, 5);
insert into Has values(01234567, 922345678912, 5);
insert into Has values(11234567, 932345678912, 6);
insert into Has values(21234567, 942345678912, 7);
insert into Has values(31234567, 952345678912, 8);
insert into Has values(41234567, 962345678912, 9); 

