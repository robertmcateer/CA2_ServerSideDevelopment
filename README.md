# CRUD application using PHP and SQL
This repo hosts my toy shop themed CRUD application. The application was built using HTML, SCSS, PHP and MYSQL. The website itself allows users to browse and search the online shop for toys across various categories. It also enables an admin user to add, edit and delete item records or categores as they wish.

Please download and run this application as you wish. Any enquiries reguarding bugs or questions you can contact me on
: @D00233414@student.dkit.ie
---
### Instructions
* Create a MySQL database called ca2_serversidedevelopment in PHP MyAdmin (code to build will be below)
* Download the repo and save into an C:/xampp/htdoc on your local machine. 
*  _
* *You will need to download apache server onto your local machine to run this application through xampp*
* Once saved. Open the file in your code editor. Ensure the application can connect to your database. DB connection code found in database.php file.
* *The code editor I have used it Visial Studios 2019. This can be downloaded at [https://code.visualstudio.com/download]*
---
### Code to create database

CREATE TABLE `categories` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `categories` (`categoryID`, `categoryName`)
 VALUES
(1, 'Action Figures'),
(2, 'Dolls'),
(3, 'Animals'),
(4, 'Console Games');

CREATE TABLE `records` (
  `recordID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` text NOT NULL,
  `manufacturerNumber` varchar(10) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `records` (`recordID`, `categoryID`, `name`, `age`, `manufacturerNumber`, `price`, `image`) 
VALUES
(4, 1, 'Wonder Woman', '10-15', 'PS19', '10.00', '758256.jpg'),
(5, 2, 'Fashion Doll', '3-8', 'LW00', '16.00', '250067.jpg'),
(6, 2, 'Baby Doll', '5-10', 'UY66', '19.00', '819662.jpg'),
(7, 2, 'Barbie', '10-13', 'BB45', '12.00', '847318.png'),
(8, 2, 'Bratz', '4-10', 'BB67', '10.00', '591351.jpg'),
(9, 2, 'Ken Doll', '10-12', 'YT88', '15.00', '87234.jpg'),
(10, 3, 'Cat', '1-4', 'IU00', '13.00', '392476.jpg'),
(11, 3, 'Dog', '1-4', 'BY03', '17.00', '908586.jpg'),
(12, 3, 'T rex', '10-15', 'JU77', '19.00', '168372.jpg'),
(13, 1, 'Captain America', '10-15', 'XC51', '10.00', '742226.jpg'),
(14, 4, 'Call Of Duty ', '18+', 'UI00', '50.00', '870274.jpg'),
(15, 4, 'Call Of Duty ', '18+', 'MQ94', '50.00', '70161.jpg'),
(16, 1, 'Spiderman', '12-15', 'KI88', '23.00', '532155.jpg'),
(19, 1, 'Batman', '18+', 'KI88', '23.00', '592544.jpg'),
(22, 4, 'Apex', '18+', 'GG88', '20.00', '689501.jpg');

---