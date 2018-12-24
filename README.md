# laravel_blog

Use Laravel 5.7

Blog Sample:
http://localhost:8000/blogs

Blog:
http://localhost:8000/posts

Ref:
https://itsolutionstuff.com/post/laravel-57-crud-create-read-update-delete-tutorial-example-example.html

Task List:
http://localhost:8000/tasks

Ref:
https://laravel.com/docs/5.1/quickstart
https://github.com/laravel/quickstart-basic


Login:
http://localhost:8000/home

Ref:
https://sujipthapa.co/blog/laravel-56-register-login-activation-with-username-or-email-support


中英字典:
http://localhost:8000/dicts

step 1:
$ php artisan make:migration create_dicts_table --create=dicts

step 2:
update xxxx_xx_xx_xxxxxx_create_dicts_table.php

step 3:
$ php artisan migrate

step 4:
update routes/web.php

step 5:
$ php artisan make:controller DictController --resource --model=Dict

step 6:
update app/Dict.php

step 7:
update app/Http/Controllers/Dictcontroller.php

step 8:
generate blade files. resources/views/dicts/...
create.blade.php, edit.blade.php, index.blade.php, layout.blade.php, show.blade.php

