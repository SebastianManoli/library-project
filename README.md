# library-project
A simple library website I developed for my 2nd Year Web Development assignment, using HTML, CSS, PHP, MySQL

## PHP Page List & Descriptions
>_connection.php_
>_functions.php_
>_index.php_
>_login.php_
>_register.php_
>_search.php_
>_reservations.php_
>_view.php_
>_remove.php_
>_logout.php_

### connection.php
The connection.php page is the file containing information to connect my pages to the PHPMyAdmin SQL Server and the Database I created in PHPMyAdmin. Key information this page contains is the database name, password, and host. This page is included in every page of my website through the line: include("connection.php"); Failure to connect to the server will result in an error.

### functions.php
I created a functions.php page to create two functions that I could include in all my pages for practical use so I could re-use code in every page by simply calling the function instead of re-writing code potentially making it difficult to understand. The two functions I created were: check_login() and random_num(). The check_login() function simply checks if the user is logged in and retrieves the users ID from session. If the check fails, then the user is sent to the login page. The second function is a simple random number generator that generates a random number that I used for each individual user id.

### login.php
The page login.php is the starting page of every user. This page displays a submit form with a username and password input field. Once the fields are entered, it is queried to the database and if it matches the information in the database, a session id is created, and the user is allowed to continue to the rest of the site. I have also included error checking if the username or password is wrong the page displays “Wrong Username or Password”. The user also has the option to register if they do not already have an account. It is a link that redirects them to 



### register.php
My register.php page is also a submit form with all the required input fields. My code first checks if the two passwords entered match, and then checks if all the other input fields are not empty and have been filled in. If all the information is filled out correctly, the account information is submitted to the server and the user is sent to the login page. I included all the relevant error checking such as passwords should have a confirm password field, passwords should not be less than six characters, phone numbers should be 10 characters long and numerical.

### index.php
The index.php page features an easy-to-follow website home page. It includes a nav bar with all the relevant pages: “Home”, “Search”, “Reserve” and “Logout”. It also features a common title welcoming the user, a common footer and come information cards with nice CSS that makes them responsive. 

### search.php
The search.php page features three input fields for the user to search a book from the database; It has a search box to search by title of book, a search box to search by author and a dropdown list search that filters by category of book. Once an option is inputted into any of the input fields; a query is sent to the books table in the database fetching the books matching the information inputted by the user. A table is displayed of the books corresponding to the users search. It also allows users to partially search for example searching “the” would give the user all the books with “the” in their title. If there is no match in the database, a message is displayed letting the user know. In the reservation column I put a check to see if the book is reserved or not (‘Y’ or ‘N’); and display a link to reserve the book if it was not yet reserved, or a placeholder saying ‘Reserved’ if it was reserved.

### reserve.php
The reserve page is reached when a user clicks to reserve a book from the search page. It uses the ISBN of the book selected and displays a message asking the user to confirm if they would like to reserve the book. If they press the button a query is sent to the database, updating the reservation status to ‘Y’ and inserting the name and date of the reservation in the reserved table in my database. Once the queries are executed successfully, a message saying ‘reservation successful’ is displayed on the screen. There is also an option to say no to confirming the reservation which is just a link redirecting the user to the search page.



### view.php
The view page simply displays a table of the current reservations of the user that is currently logged in. It displays the ISBN of the book, the username of the person that reserved the book and the date they reserved it. The last column of the table lets the user remove their reservation on the book of the row. If the user clicks the “remove” link they are brought to a confirmation page which asks them to confirm if they want to remove the reservation. 

### remove.php
The reserve page is reached when a user clicks to remove a book from the view reservations page. It uses the ISBN of the book selected and displays a message asking the user to confirm if they would like to remove the reservation. If they press the button a query is sent to the database, updating the reservation status to ‘N’ and deleting the name and date of the reservation from the reserved table in my database. Once the queries are executed successfully, a message saying ‘reservation successful’ is displayed on the screen. There is also an option to say no to confirming the reservation which is just a link redirecting the user to the View page.

### logout.php
The logout.php page asks the user to confirm if they are sure they want to logout and if ‘Yes’ is clicked then the user is logged out and the session is destroyed. The user is sent back to the login page. If the user selects ‘No’ they are sent to the index page.

# Web Page Screenshots
### Login
![login page](https://github.com/SebastianManoli/library-project/assets/124163339/c4a88b6b-a4f1-43d7-97f8-58bff1360e40)

### Register
![register page](https://github.com/SebastianManoli/library-project/assets/124163339/63ecf817-76da-4810-9b06-18fd6d84dd40)

### Index
![Index Page](https://github.com/SebastianManoli/library-project/assets/124163339/722b35ef-c671-4c8c-923b-3cb6e9715601)

### Search
![Search Page Before Search](https://github.com/SebastianManoli/library-project/assets/124163339/9b4a02e0-eeb3-4094-a106-3432564648c1)
![Search Page After Search](https://github.com/SebastianManoli/library-project/assets/124163339/52d66632-90f4-45c0-9bc0-0c4b40e69f86)

### Reservations
![Reservations](https://github.com/SebastianManoli/library-project/assets/124163339/96d9c2ea-d3a1-475f-b31b-a8adb4a3d908)

### Logout
![Logout page confirming logout](https://github.com/SebastianManoli/library-project/assets/124163339/b984a79c-92d0-4521-b227-21e24c4448cc)




