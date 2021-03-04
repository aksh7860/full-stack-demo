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
6. Execute the users.sql query 
7. Create a symlink ln -s /home/theia/full-stack-demo/api /var/www/html/
8. sudo a2enmod rewrite
9. Add the following line in /etc/apache2/sites-available/000-default.conf
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

11.  sudo service apache2 restart



## Setting Up Front End
1. Go to /home/theia/full-stack-demo/angular
2. Run sudo npm install
3. echo fs.inotify.max_user_watches=524288 | sudo tee -a /etc/sysctl.conf && sudo sysctl -p
3. Run ng serve --sourceMap=false
4. Open live preview at http://localhost:4200
