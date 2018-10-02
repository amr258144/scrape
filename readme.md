<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Installation

Step 1: Clone the repository using command "git clone https://github.com/amr258144/scrape.git".

Step 2: If you are using ubuntu/linux/mac, give permission to the files.
        cd <project_directory>
        sudo chmod -R 777 bootstrap/cache
        sudo chmod -R 777 storage/
       
Step 3: Create Database in MySQL with Database Name as "scrape".

Step 4: Edit .env file and add Database username and password.
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=scrape
        DB_USERNAME=<db_user>
        DB_PASSWORD=<db_password>
        
Step 5: Migrate the database schema using artisan migrate command given below,
        sudo php artisan migrate

Step 6: Done. Run project in browser :)

## Description

URL used to scrape india mart data is "https://dir.indiamart.com/impcat/cotton-legging.html"

URL used for wordpres scraping: "https://amrtech4u.wordpress.com/"
