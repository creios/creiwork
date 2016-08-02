![Creiwork Logo](image/creiwork.png?raw=true)

# Creiwork

[![GitHub license](https://img.shields.io/github/license/creios/creiwork.svg)]()

A PHP Framework built upon awesome packages

## Install

Composer Create-Project enables you to create a new project based on creiwork. Composer will install Creiwork and all of it's server-side dependencies.

```sh
composer create-project creios/creiwork my-new-project
```

Creiwork uses bower to install client-side dependencies.

```sh
bower install
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
- PlainTextResult
- StreamResult
- StringBufferResult



## Start

Creiwork is built to work with docker.

```sh
docker-compose up
```

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
