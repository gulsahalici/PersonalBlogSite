# Personal Blog Site

I made this project in my internship to learn laravel framework

Registration required to use this blog page. After login posts, categories and tags can be added in this blog site. Posts and tags can be edited and deleted. A category can be selected to a post. Comments and post-related tags can be added to post. Used posts of a tag can be viewed. 


## Installation

Download [Wamp Server](http://www.wampserver.com/en/) or [Laragon](https://laragon.org/download/)

Install Composer using [this page](https://getcomposer.org/) 

Use the following command to download solution
```bash
git clone https://github.com/gulsahalici/PersonalBlogSite.git
```
Open the solution and set following parameters from .env file to connect the database
```python
DB_CONNECTION =
DB_HOST =
DB_PORT =
DB_DATABASE =
DB_USERNAME =
DB_PASSWORD =
```
Run Wamp Server or Laragon

Open Command Prompt

Then open the project folder using the cd command 
```bash
cd file/path/of/the/project/folder
```
Use the following command to create database of project
```bash
php artisan migrate
```
Use the command to start php artisan
```bash
php artisan serve
```
## Usage

You can use the solution with [localhost:8000]() in the browser





<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

