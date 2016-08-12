# My Recipes Application

[![Build Status](https://img.shields.io/travis/cakephp/app/master.svg?style=flat-square)](https://travis-ci.org/cakephp/app)
[![License](https://img.shields.io/packagist/l/cakephp/app.svg?style=flat-square)](https://packagist.org/packages/cakephp/app)

A simple website used to store recipes. Each recipe has a name, ingredients, instructions, an image, and recipe tags. Knockout JS is used when adding a recipe to see what the view recipe will look like before adding it to your database. You can also view, download, or print a pdf of any recipe. You can also store recipe websites on the site and access them in the nav bar.

This application uses [CakePHP](http://cakephp.org) 3.2.
The framework source code can be found here: [https://github.com/cakephp/cakephp](https://github.com/cakephp/cakephp).

## Features

- You can drag an image from another page into the input box shown below and it will save the file to disk and name it after the recipe:

![alt text](http://s26.photobucket.com/user/Snake312/library/GitHub "Dragging the image")

- You can view a pdf on a recipe.

- You can store bookmarks.

- You can search for recipes.

- You can search by tags by typing tag names as passed parameters in url example: `/search/beef/chicken` will return all recipes that have beef and/or chicken as tags.

- All tags and bookmarks can be edited at once on there page.

## Configuration

Read and edit `config/app.php` and setup the 'Datasources' and any other
configuration relevant for your application.

There is also a sample dp to use in root directory: [recipes_db_backup.sql](https://github.com/MrEx88/recipes-with-cakephp3/blob/master/recipes_db_backup.sql).
