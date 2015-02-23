# svpernova09/phergie-irc-plugin-react-showbot

[Phergie](http://github.com/phergie/phergie-irc-bot-react/) plugin for Supporting a live event in an irc channel.

[![Build Status](https://secure.travis-ci.org/svpernova09/phergie-irc-plugin-react-showbot.png?branch=master)](http://travis-ci.org/svpernova09/phergie-irc-plugin-react-showbot)

## Install

The recommended method of installation is [through composer](http://getcomposer.org).

```JSON
{
    "require": {
        "svpernova09/phergie-irc-plugin-react-showbot": "dev-master"
    }
}
```

See Phergie documentation for more information on
[installing and enabling plugins](https://github.com/phergie/phergie-irc-bot-react/wiki/Usage#plugins).

## Configuration

```php
new \Phergie\Irc\Plugin\React\Showbot\Plugin(array(



))
```

## Tests

To run the unit test suite:

```
curl -s https://getcomposer.org/installer | php
php composer.phar install
./vendor/bin/phpunit
```

## License

Released under the BSD License. See `LICENSE`.
