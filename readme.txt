PHP + Apache + MySQL

Major Functions
  1.	Administrators log in and log out. 
  2.	Change password. Change the password of current user. 
  3.	Book Management. Display existing books and can be updated or removed.
  4.	Add New Book. Add new books to the system. 
  5.	Book Search. Search books with title, price, category or ID. 
  6.	Book Statistics. Show the number of different books in different categories.

How to Use
  1. Modify "php.ini", change "error_reporting = E_ALL" to "error_reporting = E_ALL & ~E_NOTICE ".
  2. Add "login.php" to "DirectoryIndex" in "Apache\conf\httpd.conf".
  3. Run "CreateDatabase.php" to initialize MySQL database.
