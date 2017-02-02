# Skeleton-App

## Installation
You need to have a compatible PHP version (>=5.5) and [Composer](https://getcomposer.org/) installed in order to use this project.

Just clone the repository via git and switch into the newly cloned folder. Make sure you do not fork the repository, as other applicants might be able to see your repository.

Afterwards you need to install the dependencies of the project via Composer with the following commands.

```bash
php composer.phar global require "fxp/composer-asset-plugin:^1.2.0"
php composer.phar install
```

Make sure you have the necessary PHP-modules installed by running the command below. If you are missing modules you will get an error message. Install them.

```bash
php requirements.php
```

If everything worked out, then you can run the application via the commandline, with the command below.

```bash
php yii serve
```

Now you should be able to reach the website in the browser via http://localhost:8080 - if the port is already in use, you can specify another port via the --port flag.

*(If you want to use a server software like Apache or Nginx please look at the respective [Yii2 Documentation](http://www.yiiframework.com/doc-2.0/guide-start-installation.html#configuring-web-servers).)*

## Overview
Your task is to extend the provided skeleton-app (a very simple blog). We already provided the user-login, a basic frontend as well as an admin-panel. We also implemented a simple CRUD-functionality in the admin module.

We also set up the database (it's a simple sqlite file located in the root folder: database.sqlite3). You don't need to run any additional DB-servers for this task. If you want to reset the data in the database you can simply run:
```bash
php yii fixture "*" --namespace="app\\tests\\unit\\fixtures" "*"
```

There are some tests (definitely not exhaustive, but a good example). You are encouraged to add some tests for every functionality you implement. They don't need to be a comprehensive test suite that covers every possible edge case. Just a few simple tests will suffice. To run all the tests available, just run the command below.
```bash
vendor/bin/codecept run
```

## Task
Your task is to implement a simple search function with autosuggest. It should be able to do a full-text-search on the Posts in the sqlite3 database (title is enough, you can add content if you want), with suggestions automatically popping up. The searchbar should be included in the navbar. When submitting the search, the user should get redirected to a search result page, where all the results are listed.

The framework used for this project is Yii2. If you want to find more information and guides about Yii2, please consult the [documentation](http://www.yiiframework.com/doc-2.0/guide-README.html).

You can use anything that Yii2 or the skeleton provides in PHP - but no additional dependencies. If you need a specific JavaScript-Library (e.g. JQuery-UI) for frontend-tasks, then you are free to just include it. Bootstrap and JQuery are already included, so you don't need to include them again.


## Optional Tasks
You may choose to implement additional functions from the list below, but it is not mandatory.

* Add a tagging-system where each Post can have an arbitrary amount of tags, and you can search for Blog-Posts via their tags. You should also be able to add / delete tags from a Post in the admin panel.
* Add a comment-system where visitors can comment on blog posts. The comments should be visible in the detailed view of the blog post. You should be able to view and delete comments of a Post in the admin panel.
* Create a little theme for the current homepage, so it gets a nicer look. You can also rearrange or change some HTML-elements if you feel like it.
* Add infinite Scrolling for Blog-Posts on the homepage.
* Optimize the HTML-code of every user-facing page (homepage, post-archive, post-details) from a SEO point of view.
* Implement a user-registration. No email-activation is necessary, just plain simple user-registration with username and password.
* Expand the Post model with extra fields and reflect those changes in the admin-panel (post-image, content-editor (WYSIWYG), summary, ..)
