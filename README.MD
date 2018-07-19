![Creiwork Logo](image/creiwork.png?raw=true)

# Creiwork

[![GitHub license](https://img.shields.io/github/license/creios/creiwork.svg)]()

A PHP Framework built upon awesome packages

## Install

Composer Create-Project enables you to create a new project based on creiwork. Composer will install Creiwork and all of it's server-side dependencies.

```sh
composer create-project creios/creiwork my-new-project
```

Creiwork uses yar to install client-side dependencies.

```sh
yarn
```

Creiwork uses the directory ```cache``` to store often uses values. This directory needs permissions to be written by the webserver process. 

```sh
chown www-data:www-data cache 
```

Creiwork uses flyway for database migrationes. Follow these commands to install flyway under Linux:

Download and untar it to ```/opt```. (Note: you might want to check for a newer version)
```sh
https://repo1.maven.org/maven2/org/flywaydb/flyway-commandline/5.1.4/flyway-commandline-5.1.4-linux-x64.tar.gz
```
Create symlink to make it accessible from the command line:
```sh
sudo ln -s /opt/flyway-5.1.4/flyway /usr/local/bin/flyway
```
Make it executable:
```sh
sudo chmod +X /usr/local/bin/flyway
```
## Usage

Creiwork is based on the Model-View-Controller architectural pattern. But one of the major goals of creiwork is to decouple these three layers.

### Results

Results should be yield by a controller. They represent an abstract response.

- TemplateResult
- FileResult
- RedirectResult
- JsonResult
- JsonRawResult
- HtmlRawResult
- XmlRawResult
- CsvResult
- PlainTextResult
- StreamResult
- StringBufferResult
- ApacheFileResult
- NginxFileResult

## Start

Creiwork is built to work with [Docker](https://www.docker.com/what-docker) and comes with a preconfigured Docker-Setup
to get your development up running as fast as possible.

To start Creiwork's Docker containers, just run:

```sh
docker-compose up
```
This will start The following services:
- LEMP Stack
    - PHP 7.2 FPM
    - Nginx - Port: 8080 (HTTP) and 8443 (HTTPS)
    - MariaDB - Port: 3306
- Dev Tools:
    - Mailcatcher - Port: 1080
- Profiling and Performance
    - Webgrind - Port: 8081
    - xhgui - Port: 8082

If you want to install custom PHP Extension use the provided `Dockerfile`.

## Debugging and Profiling

The Creiwork's Docker-Setup is configured to enable debugging and profiling out of the box.
PHP Xdebug as well as Tideways (a modern XHProf fork) are installed inside the PHP Image.

#### Xdebug
Xdebug can be configured through the `docker/php/creiwork.ini` which holds the configuration for PHP.

To start a debugging session configure your IDE to listen for connections and use a a Browseraddon to inform the webserver
that debugging/profiling should be enabled.

Xdebug profiling snapshots are stored to the `tmp/xdebug` folder inside the PHP container which is mounted the the folder
`docker/xdebug/profiling` inside your project's folder on your machine.
You can simply use your IDE or a third party tool to analyze the snapshots.
For convenience purpose the Docker-Setup also provides a Webgrind container wich provides a webappication at `127.0.0.1:8081`
to enable fast analysis of your snapshots.

#### Tideways (XHProf)
XHProf is a light-weight hierarchical and instrumentation based profiler. During the data collection phase, it keeps track of call counts and inclusive metrics for arcs in the dynamic callgraph of a program. It computes exclusive metrics in the reporting/post processing phase, such as wall (elapsed) time, CPU time and memory usage. A functions profile can be broken down by callers or callees.

To enable XHProf in development context with the provided Docker-Setup just go to `public/index.php` and uncomment the following lines:
```php
if (file_exists('/xhgui-service/external/header.php')) {
require_once '/xhgui-service/external/header.php';
}
```
XHProof should then start collecting metrics of your application. You can conveniently access the collected data through the provided xhgui Docker container.
Accessible under `127.0.0.1:8082`.
The configuration can be found in `docker/xhgui/config/config.php`.

XHProf is built to run in production to give you real-world data. If you want to use it in production just change the path
inside the `index.php`.

## Awesome Packages

- [Aura.Session](https://github.com/auraphp/aura.session): Tools for managing sessions, including session segments and read-once messages
- [Bootstrap](https://github.com/twbs/bootstrap): The most popular HTML, CSS, and JavaScript framework for developing responsive, mobile first projects on the web
- [Bower](https://github.com/bower/bower): A package manager for the web
- [Guzzle PSR-7](https://github.com/guzzle/psr7): PSR-7 HTTP message library
- [Monolog](https://github.com/Seldaek/monolog): Sends your logs to files, sockets, inboxes, databases and various web services
- [PHP-DI](https://github.com/PHP-DI/PHP-DI): The dependency injection container for humans
- [Phpunit](https://github.com/sebastianbergmann/phpunit): The PHP Unit Testing framework
- [Plates](https://github.com/thephpleague/plates): Native PHP template system
- [Robo](https://github.com/Codegyre/Robo): Modern task runner for PHP
- [Routerunner](https://github.com/timtegeler/routerunner): Router for HTTP-request written in PHP
- [Whoops](https://github.com/filp/whoops): PHP errors for cool kids
