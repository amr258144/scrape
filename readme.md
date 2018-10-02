<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Installation

<strong>Step 1:</strong> Clone the repository using command <a href="https://github.com/amr258144/scrape.git">"git clone https://github.com/amr258144/scrape.git"</a>.

<strong>Step 2:</strong> If you are using ubuntu/linux/mac, give permission to the files.<br>
        <code>cd <project_directory></code><br>
        <code>sudo chmod -R 777 bootstrap/cache</code><br>
        <code>sudo chmod -R 777 storage/</code><br>
       
<strong>Step 3:</strong> Create Database in MySQL with Database Name as <strong>scrape</strong>.

<strong>Step 4:</strong> Edit <strong>.env</strong> file and add Database username and password.<br>
        <code>DB_CONNECTION=mysql</code><br>
        <code>DB_HOST=127.0.0.1</code><br>
        <code>DB_PORT=3306</code><br>
        <code>DB_DATABASE=scrape</code><br>
        <code>DB_USERNAME=<db_user></code><br>
        <code>DB_PASSWORD=<db_password></code><br>
        
<strong>Step 5:</strong> Migrate the database schema using artisan migrate command given below,<br>
        <code>sudo php artisan migrate</code>

<strong>Step 6:</strong> Done. Run project in browser :)

## Description

URL used to scrape india mart data is "https://dir.indiamart.com/impcat/cotton-legging.html"

URL used for wordpres scraping: "https://amrtech4u.wordpress.com/"
