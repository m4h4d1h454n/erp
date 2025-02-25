# Business ERP Solution
=========================
How to ERP project deploy
=========================
1. dnf install httpd
2. dnf install php*
3. dnf install mysql*
4. Import project file to apachee.
5. Import db.
create database erp;
mysql erp < erp_v2_20241217.sql
6. Create user in db.
CREATE USER 'erp'@'localhost' IDENTIFIED BY '*********';
GRANT ALL PRIVILEGES ON `erp`.* TO  'erp'@'localhost';
FLUSH PRIVILEGES
7. dnf install python39
8. pip3.9 install flask
9. pip3.9 install mysql.connector
10. pip3.9 install requests
11. run python api (api/erp_api.py)

![image](https://github.com/user-attachments/assets/f664a1e4-ff2d-4565-8da7-1d9592f7011c)

![image](https://github.com/user-attachments/assets/c7f0a034-62fd-48e5-99da-bccd55f97be1)
