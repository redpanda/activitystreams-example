Example
=======

An example wich use ActivityStreams.


## Usage

Build Model classes, SQL, and the configuration:

    bin/bootstrap


Configure a database:

    mysql -uroot -e 'CREATE DATABASE activitystreams_blog_example'

    mysql -uroot activitystreams_blog_example < config/sql/Blog.Model.schema.sql


Load fixtures:

    php fixtures.php

You're done!


## Configuration

All the configuration is located in the `config/` directory.

* `runtime-conf.xml` contains the database configuration, if you modify it, don't forget to rebuild things by using the previous command;
* `config.php` you should **not** edit this file, except to turn on/off debugging stuffs.

