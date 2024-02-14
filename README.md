# to clone the project
1. run :- git clone https://github.com/talibBijnori/test.git
2. i have also added postman collection to the repo on the root directory called = kanye.postman_collection.json.
import into the post to test the api

# email = user@gmail.com
# password = 123456


1. create the database = kanyetest 
    or change from the .env file

2. dont run php artisan migrate command, just import the database into phpmyadmin
 #          OR
 run php artisan migrate command and insert 
  email = user@gmail.com
  password = 123456 which is    $2y$12$QJy42IWxjuxKufnawVsfoug5R8.Tgt.iG/Gevt6SK10SjMTWvTVVG

4. i have implement token verification 
5. run php artisan test command for feature testing as all the api are in a single file which is ExampleTest.php


