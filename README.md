# full-stack-demo
Full Stack Demo

## Take a clone of repo on /home/theia folder
	git clone https://github.com/aksh7860/full-stack-demo.git

## Setting up Backend
1. Create a database 'test'
2. Execute the users.sql query 
3. Create a symlink ln -s /home/theia/full-stack-demo/api /var/www/html/
4. sudo a2enmod rewrite
5. Add the following line in /etc/apache2/sites-available/000-default.conf
	```
	<Directory /var/www/html>
        Options All -Indexes
        Options +FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
    ```
6. Create a .htaccess file on /var/www/html and add the following content
	```
	RewriteEngine On
	RewriteCond %{REQUEST_FILENAME} !-d
	RewriteCond %{REQUEST_FILENAME} !-f
	RewriteCond %{REQUEST_FILENAME}.php -f
	RewriteRule (.*) $1.php [L]
	```

7. sudo service apache2 restart





## Setting Up Front End
1. Go to /home/theia/full-stack-demo/angular
2. Run sudo npm install
3. Run ng serve
4. Open live preview at http://localhost:4200

