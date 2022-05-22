<h1 align="center">Shareposts — Application build using MIMVC PHP Framework</h1>

# Table of Contents

# Introduction

- User Authentication
- Flash Messages
- CRUD Functionality
  - Create Posts
  - Read Posts
  - Update and Delete your own Posts

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

# Instructions

- Create database in MySQL `shareposts`
  - Create `users` table
  - Create `posts` table

```sql
CREATE TABLE `shareposts`.`users` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , `email` VARCHAR(255) NOT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `shareposts`.`posts` ( `id` INT NOT NULL AUTO_INCREMENT , `user_id` INT NOT NULL , `title` VARCHAR(255) NOT NULL , `body` VARCHAR(255) NOT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;
```

- In app/config`config.php`, update the following
  - `DB Parameters`
  - `App Root Parameters`

## Creating a Controller (e.g. Users)

- Create `Users.php` Controller in app/config/controllers
  - Add Constructor and Method(s)
    - URL is now accessable
- Go to app/views and create folder called users and create view `register`
