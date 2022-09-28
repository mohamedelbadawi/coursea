
# Coursea

A Learning managment system using Aws s3 to upload videos and lessons

## 🛠 Tools and technologies

![laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)

![javascript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=JavaScript&logoColor=white)

![mysql](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)

![html](https://img.shields.io/badge/HTML-239120?style=for-the-badge&logo=html5&logoColor=white)

![bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)




- Student Dashboard
```
    student register by two methods (email-using github),
    the first ui have a simple todo list for user with tags such as perosnal and important
    user can pay for courses with credit card using paymob gateway 
    and watch courses in Learning section in dashboard.
```
- Instructor Dashboard
````
    Insturctor register by two methods (email-using github),
    the first ui have a simple todo list for user with tags such as perosnal and important
    Instructor can add course and header image ,
    divide course into sections and reorder it using dragable also
    can do that with lessons
    to be a good user experience.
````
### Run the project
Clone the repository

    git clonehttps://github.com/mohamedelbadawi/coursea.git

Switch to the repo folder

    cd coursea

Install all the dependencies using composer

    composer install
    composer update

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate


Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000


**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Database seeding

Run the database seeder and you're done

    php artisan db:seed

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh
    





## to launch the server
```bash
php artisan serve
```
The  project is now up and running! Access it at http://localhost:8000.
