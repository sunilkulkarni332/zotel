#PHP 8.1 version
#DB Name: - zotel
#Project Name:-  Zotel
#Local Check:- http://127.0.0.1:8000
#Installed to get holiday list as https://calendarific.com/api/v2/holidays
#API Key  as : 4U7uBSRJyq6loXlAJzCR2zU3f9AHapkz


Flow: 
1. Once you Download application in your local xampp folder
2. Then extract it and run composer update
3. Once it updated you can run for test this,but it will say already installed,if not install again below link.
   composer require guzzlehttp/guzzle
4. Run below command to migrate data on Db
   1. php artisan migrate
   2. it will pull all tables. if it not create holiday table,Then please use these command to create Holiday table
      1. php artisan make:migration create_holidays_table
      2.  Add on up function on holiday migration db
            $table->id();
            $table->string('name');
            $table->string('date');
            $table->string('type');
            $table->timestamps();
5. Run php artisan serv
6. On browser run http://127.0.0.1:8000 this url
7. it will redirect to Home screen
  1. in home screen you can find all holidays in table formate
  2. thier is a option to insert all data on DB as name: Create Data On Table
  3. after clicking that above link, it will insert all data on db.
  4. Then you can see at calender on same by clicking view calender
  5. Thier is a option to view back to home screen
