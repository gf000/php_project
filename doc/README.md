
Instruction
1. Install Visual Studio Code. The website is https://code.visualstudio.com/ 
2. Install PHP debug ,modify environment variables to build the PHP environment.
3. Install composer.The website is https://getcomposer.org/ 
4. Install mysql workbench , log in with root in Workbench, password is root .Then create a database php_project_db, create tables under the database  user (id, nickname, email, password) , list (list_id, title, comment, Shared, user_id) ， task (task_id, content, complete, list_id)，friend (id,myid,friend_id),  share(share_id,user_share,list_id,delete_right,complete_right,accept,edit_right),   task(task_id,content,complete,list_id),  list(list_id,title,comment,shared,user_id)
5. Open the folder PHPPROJECT and import the files.Right-click  phpProject  , open it in terminal mode, and enter the command   php artisan serve
6.In terminal ,enter the command  composer jumpautoload   to generate folders vendor
7.Open file routes, open web.php, and view the url,.The login screen is 127.0.0.1:8000/user/login