<h1 align="center">MIMVC Custom PHP Framework</h1>

# Table of Contents

- [Table of Contents](#table-of-contents)
- [Introduction](#introduction)
- [Project Structure](#project-structure)
- [Understanding the .htaccess file **in the _root_** directory for Apache Web Servers](#understanding-the-htaccess-file-in-the-root-directory-for-apache-web-servers)
- [Understanding the .htaccess file **in the _public_** folder](#understanding-the-htaccess-file-in-the-public-folder)
- [Instructions](#instructions)

---

# Introduction

> As an alternative to Laravel or CodeIgniter, here's the MIMVC, my attempt at a building a custom MVC Framwork.

- PDO -> PHP extension to communicate with the database. [PHP Data Objects](https://www.php.net/manual/en/book.pdo.php). Can be used instead of the MySQLI extension, essentially a class to preform CRUD operations. PDO has the added advantage of being able to work with other databases such as PostGreSQL, MS SQL Server, any relational database.
  - Data Access Layer
  - Object Oriented
  - Prepared statements to prevent sql injection
- htaccess file allows you to rewrite URLS, everything routes through this file
- PHP mod_rewrite Module-> Inside the apache htaccess file of the public folder; direct everything through the index.php (apache directives)

---

# Project Structure

```php
MIMVC
├── app                         # Application, MVC Structure, Libries, Config file
|   ├── config                  # Database Parameters
|   |   └── config.php
|   ├── controllers
|   |   └── Pages.php
|   ├── helpers                  # Redirects, Sessions, Flash Messages
|   |   ├── session_helper.php
|   |   └── url_helper.php
|   ├── libaries
|   |   ├── Controller.php      # Load Models and Views
|   |   ├── Core.php            # URL routing
|   |   └── Database.php        # PDO Class, Database Methods (Model works with this file)
|   ├── models
|   |   └── Post.php            # Post Model -> Example model to get you started with interacting with the Database
|   ├── views
|   |   ├── includes
|   |   |   ├── footer.php
|   |   |   └── header.php
|   |   └── pages
|   |       ├── about.php
|   |       └── index.php
|   ├── .htaccess               # logic to hide files & folders within this directory
│   └── bootstrap.php           # requires all the libaries, config file, helpers etc.
├── public                      # front of the application, index.php, htaccess file rules (routing), static assets (JS,CSS etc)
|   ├── css
|   |   └── style.css
|   ├── controllers
|   |   └── main.js
|   ├── .htaccess               # direct everything through the index.php
│   └── index.php
└── .htaccess

```

# Understanding the .htaccess file **in the _root_** directory for Apache Web Servers

```php
<IfModule mod_rewrite.c>                # Check for the mod_rewrite module and ensuring it is enabled (usually enabled by default on most webservers)
  RewriteEngine on                      # Turning on RewriteEngine
  RewriteRule ^$ public/ [L]               # Rewrite everything from /public to .. the core URL /
  RewriteRule (.*) public/$1 [L]        # Rewrite everything from /public to .. the core URL /
</IfModule>
```

# Understanding the .htaccess file **in the _public_** folder

`.htaccess` in the `public` folder

```php
<IfModule mod_rewrite.c>                            # Check for the mod_rewrite module and ensuring it is enabled (usually enabled by default on most webservers)
  Options -Multiviews                               # -Multiviews -> means Multiviews are disabled; e.g. /test /test.php /randompagethatdoesnotexist.php
  RewriteEngine On                                  # Turning on RewriteEngine
  RewriteBase /MIMVC/public                         # Assign root URL
  RewriteCond %{REQUEST_FILENAME} !-d               # Look in the public directory, if the file (/URL) is not found..
  RewriteCond %{REQUEST_FILENAME} !-f               # Look in the public directory, if the file (/URL) is not found..
  RewriteRule  ^(.+)$ index.php?url=$1 [QSA,L]      # Rewrite rule, route everything through index.php -> everything in the public folder.. attaching the URL parameter with variable
</IfModule>
```

# Instructions

- In app/config`config.php`, update the following
  - `DB Parameters`
  - `App Root Parameters`
- Create a database in MySQL (mimvc)
  - Populate with id, varchar (for starters)
- Inside public/`htaccess` update the `RewriteBase` directory to whatever folder you are working from is
- Framwork is ready to go and build upon
- Post Model is included to get you started with Models
