# full-stack-demo
Full Stack Demo

## Take a clone of repo on /home/theia folder
	sudo apt-get install git
	git clone https://github.com/aksh7860/full-stack-demo.git

## Setting up Backend
1. sudo service mysql restart
3. sudo apt-get update
4. sudo apt install vim
5. Create a database 'test'(command: create database test)
6. Login to Mysql console and execute the below commands
7. CREATE USER 'temp'@'localhost' IDENTIFIED BY 'redhat';
8. GRANT ALL PRIVILEGES ON * . * TO 'temp'@'localhost';
10. use mysql;
11. UPDATE user SET plugin='mysql_native_password' WHERE User='root';
12. UPDATE mysql.user SET authentication_string = PASSWORD('redhat') WHERE user = 'root';
13. FLUSH PRIVILEGES;
14. sudo service mysql restart
15. Change creds in /home/theia/full-stack-demo/api/config/database.php
16. Execute the users.sql query 
17. Create a symlink ln -s /home/theia/full-stack-demo/api/ /var/www/html/
18. sudo a2enmod rewrite
19. Add the following line in /etc/apache2/sites-available/000-default.conf
	```
	<Directory /var/www/html>
        Options All -Indexes
        Options +FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
    ```
10. Create a .htaccess file on /var/www/html and add the following content
	```
	RewriteEngine On
	RewriteCond %{REQUEST_FILENAME} !-d
	RewriteCond %{REQUEST_FILENAME} !-f
	RewriteCond %{REQUEST_FILENAME}.php -f
	RewriteRule (.*) $1.php [L]
	```
11.  sudo apt-get install php7.2-mysql
12.  sudo service apache2 restart
13.  Curl Request for post 
  	```
	curl --header "Content-Type: application/json" --request POST --data '{"name":"Abhishek","contact_no":"9650056823","email":"abhi.kumar793@gmail.com"}'      http://localhost/api/user/create
	```
14. Curl Request for get  
	```
	   curl -i -H "Accept: application/json" -H "Content-Type: application/json" http://localhost/api/user/read
	```




## Setting Up Front End
1. Go to /home/theia/full-stack-demo/angular
2. Run sudo npm install
3. Run ng serve
4. Open live preview at http://localhost:4200
