Instruction

1. Install Visual Studio Code. The website is https://code.visualstudio.com/ 
2. Install PHP debug , configure php environment，add environment variables and check the php version from cmd to make sure it is correct.
3. Install composer. Follow the tutorial in the website. The website is https://getcomposer.org/ 
4. Install mysql and configure it set the root user with the password "root", install mysql workbench, login Workbench .Then create a database named php_project_db, and create tables with:
     4.1. user (id , nickname, email, password) ,  id as primary key
     4.2. list (list_id, title, comment, shared, user_id) ， list_id as primary key and user_id as foreign key from user table 
     4.3. task (task_id, content, complete, list_id)，task_id as primary key and list_id as foreign key from list table
     4.4. friend (id,myid,friend_id),  id as primary key and myid as foreign key from user table , list_id as foreign key from list table
     4.5. share(share_id,user_share,list_id,delete_right,complete_right,accept,edit_right),   share_id as primary key and user_share as foreign from user table, list_id as foreign key from list table
     4.6. task(task_id,content,complete,list_id),  list(list_id,title,comment,shared,user_id),  task_id as primary key and list_id as foreign key from list table
5. Install Git Bash, and get clone from the url: " https://github.com/gf000/php_project.git " . Now we get the project floder named php_project
6. Open the VSCode and import the php_project folder . Right-click  the php_Project , open it in terminal mode.
7. In terminal, enter the command " composer install "  to generate vendor and use "cp .env.example .env" to generate .env file, open the .env file to modify the DB_DATABASE as " php_project_db " and password as " root "
8. Use the command " php artisan serve " from project terminal to start the laravel. 
9. Get the web page from web browser. Enther the url: " localhost:8000/user/login"

Now you can register a  new account and login the web page to manage your Todolist!