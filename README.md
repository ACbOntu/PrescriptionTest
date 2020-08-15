# Prescription_Generation
Used Technology:
	Laravel
	MySQL Database
	Bootstrap
	JavaScript
Installation: Laravel utilizes Composer to manage its dependencies. So, before using Laravel, make sure you have Composer installed on your machine. Your php version need to be greater than >= 7.2.5. You should have internet connection to run the bootstrap CDN properly. Please import the database “prescription.sql”  which is in the project root directory and change the related fields in .env file.
User Manual:
Please import the database “prescription.sql”  which is in the project root directory. 
Login: The very first way to enter the website is through login. No anonymous users are not allowed. If anyone try to go by typing url without login, he/she will be redirected to login page. Two users have been already created in database. For login:
1. E-mail         : acbontu@gmail.com
    Password      : 123456
1. E-mail         : ontu12@cse.pstu.ac.bd
    Password      : 123456
Homepage: After login successfully, user will be directed to the home page. 
Firstly, all prescriptions of  the current month will be shown. There is a filter by which one can get the prescriptions of the given date range. 
Also, there is a button named “All prescriptions”, by clicking this, user would be able to see the all prescriptions of database. 
All information related to each prescription will be shown in tabular form. Each prescription can be edited and deleted. Each prescription contains Prescription date, Patient name, Patient age, gender, diagnosis, medicines and next visit date.
A modal will ask for confirmation before deleting any prescription entry. 
Add Prescription: All information of a prescription would be collected by user. Some conditions may restrict to send the data to server.
Age range is given here in between 1 and 150. So age can’t be less than 1(negative) and greater than 150. Next visit date must be greater than prescription date. 
Prescription date, Patient name, Patient age, gender, diagnosis, medicines field need to be filled.
This form validation on client side is done by Javascript. After fulfilling these conditions, data can be sent to the server and save to database.
Report: In this page, a report will be created according to the given date  which will also count the prescriptions of the given date. There is a button “data from API” which will fetch data from https://rxnav.nlm.nih.gov/REST/interaction/interaction.json?rxcui=341248 
Another button is for showing the JSON prescription list data.
User can logout by clicking logout from the dropdown of menubar.
