<h1 align="center">MIMVC Custom PHP Framework</h1>

<p align="center"><img src="images/"  height="auto" width="100%"></p>

---

# Table of Contents

- [Table of Contents](#table-of-contents)
- [Introduction](#introduction)
- [Understanding the .htaccess file **in the _root_** directory for Apache Web Servers](#understanding-the-htaccess-file-in-the-root-directory-for-apache-web-servers)
- [Understanding the .htaccess file **in the _public_** folder](#understanding-the-htaccess-file-in-the-public-folder)

---

# Introduction

> As an alternative to Laravel or CodeIgniter, here's the MIMVC, my attempt at a building a custom MVC Framwork.

- PDO -> PHP extension to communicate with the database
- htaccess file allows you to rewrite URLS, everything routes through this file
- PHP mod_rewrite Module-> Inside the apache htaccess file of the public folder; direct everything through the index.php (apache directives)

---

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
