# Gas-Price-History
LAMP (Linux, Apache, MySQL, PHP) stack based app that webscrapes gas prices, turns the data into a graph, and records the graphs in a database. Using a local host, webpages display today's or older records from the database to the site.

To get the appication running on your local machine, you will need Apache and have the .php files stored in /var/www/html on Linux. You will also need the MySQL database. I used a database called "gas" and the table called "imgs" with three columns for the gas type, date, and the img itself.

Another applicaion, tagsoup, is required to format the html into a xhtml however the bash file already will check for it and install it if necessary.

These are the MySQL commands I used:
CREATE DATABASE gas;
CREATE TABLE imgs(gastype VARCHAR(3) NOT NULL, date VARCHAR(10) NOT NULL, img MEDIUMBLOB NOT NULL);
