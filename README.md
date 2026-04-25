# <center>PRESENTING MY LAHTP LEGACY - 3 XSS (Cross-Site Scripting)</center>
## EDUCATIONAL PURPOSES ONLY
## What does this website do?
* This website is for collecting public opinions about recently released (2025) movies.
## Recommended Way to Clone
* `git clone https://github.com/KuberaKrishna/LAHTP-LEGACY-3.git XSS` — don’t change the default name ('XSS'); otherwise, it may not work properly.
## Read this before executing on Linux:
* Move the configuration folder to `/var/www/` (due to file permissions).
* Works perfectly on macOS and Windows.
## Setting Up Database Environment for macOS
* To create a user in Adminer, use `sql/adminer-user.sql`
* To create a database in Adminer, use `sql/adminer-sql.sql`
## Setting Up Database Environment for Windows
* Download Adminer for Windows from the official website `https://www.adminer.org/`.
* Place the downloaded .php file in the htdocs folder and run it in your browser.
* Change the MySQL root password in XAMPP using the Shell:
 - `mysql -u root` (the default password might be either empty or ‘root’). Change the password if this doesn’t work.
 - `ALTER USER 'root'@'localhost' IDENTIFIED BY 'root';`. -- for example :)
* To create a user in Adminer, use `sql/adminer-user.sql`
* To create a database in Adminer, use `sql/adminer-sql-windows.sql`
## STORED XSS
### Information Gathering
* To check whether XSS is possible, enter the following script in the comment section: `Enter your opinion about this movie here! = <p style="color:red">Hello World</p>`. If this code executes as HTML, there is probably an XSS vulnerability.
### Attacking
* To exploit the vulnerability, enter the following script in the comment section: `<script>document.documentElement.innerHTML="<h1 style=font-family:sans-serif;height:100vh;display:flex;align-items:center;justify-content:center>Stored XSS</h1>";</script>`. This JS payload will remove all the content of the website and display 'Stored XSS'.
