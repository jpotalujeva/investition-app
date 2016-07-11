#Test Investment Application
==========================
Application is written using:
* php 5.6;
* mysql 5.7;
* symfony 2.8.8;

# Steps to reproduce:
====================
First of all, run 
```php
composer update
``` 
to build necessary dependencies;

Secondly, run
```php
php app/console doctrine:schema:update --force
```
to create all necessary databases and tables;


