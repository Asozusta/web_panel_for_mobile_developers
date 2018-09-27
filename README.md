# Web panel for mobile developers
Server &amp; Client side of an mobile application . you can manage posts and users and use api to get them

# Usefulness
Think you want to create an application for blogging or advertisment or show picture and videos . ( resume , news or ... ) . You should write server side . should'nt you ? So , it is useful for you . Download it , config it , upload it on your host ( even free ) and use api of it

# Info 
- Code Language : PURE PHP 
- Theme Language : Persian ( فارسی )


# How to use it :
- Clone or download project
- Install xampp or somethings like that [( Download Link )](http://p30download.com/fa/entry/37583)
- Copy files in your project folder in localhost
- Run localhost and phpmyadmin ( mysql )
- Create database with name ( weband ) and enter it
- Import **database.sql** to your database
- Open **app/config.php** file and change your localhost address and database infos 
- Run your project in browser ( localhost:port/yourfolder )
- Login with **username** : **admin** and **password** : **admin**
- Use api to get data in your application

# API
- your api address is : Localhost/YourProjectName/api/api.php
- first post a key-value with key : `api_function` and say what do you want from api ?
- available api functions : 

| Function name | Description |
| ------ | ------ |
| get_posts | it's clear :) give you an array of all posts |
| get_post | get a post . you should send `id` and you can send `type` |
| post_number | get all posts number , you can send `type` for specialize |

- type are : `text` or `video`
- your files addresses : localhost/YourProjectName/upload/files/ADDRESS

i hope you enjoy :)
