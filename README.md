# case_management-
Server- Xampp
Import lwr.sql to PhpMyAdmin
Please do following configurations of Email Sending funchtion

Php/php.ini :- 
•	SMTP=smtp.gmail.com
•	Smtp_port= 465
•	Sendmail_from= gmail address
•	Sendmail_path = set path of sendmai.exe . ex xampp\sendmail\sendmail.exe

Sendmail/Sendmail.ini
•	smtp_server= smtp.gmail.com
•	smtp_port= 465
•	auth_username= gmail addess
•	auth_password= password of the gmail address
•	force_sender= gmail address
•	restart the xampp server
Enable access  for less secure apps in gmail 
