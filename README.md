# Fuel Supervisor

**This package is a wrapper around [indigophp/supervisor](https://github.com/indigophp/supervisor) package.**


## Install

Via Composer

``` json
{
    "require": {
        "indigophp/fuel-supervisor": "@stable"
    }
}
```


## Usage

``` php
\Supervisor::forge('default');
```


## Configuration

``` php
/**
 * Default instance
 */
'default' => 'default',

/**
 * Connector instances
 */
'connector' => array(
    'default' => function() {
        return new Indigo\Supervisor\Connector\SomeConnector;
    },
),
```


## Credits

- [Márk Sági-Kazár](https://github.com/sagikazarmark)
- [All Contributors](https://github.com/indigophp/fuel-supervisor/contributors)


## License

The MIT License (MIT). Please see [License File](https://github.com/indigophp/fuel-supervisor/blob/develop/LICENSE) for more information.