[![Build Status](https://travis-ci.org/pavlakis/slim-cli.svg)](https://travis-ci.org/pavlakis/slim-cli)

# Slim 3 Framework CLI Request Middleware

This middleware will transform a CLI call into a GET Request.

### Add it with composer
```
composer require teraone/slim-cli
```

### Pass the parameters in this order
`route / query string`
```php
php public/index.php /status event=true
```

### Add it in the middleware section of your application
```
$app->add(new \Teraone\SlimCli\CliRequest());
```

### Pass a route to test it with

```php

$app->get('/status', 'YourNameSpace\YourController:yourMethod')
    ->setName('status');

```

### Check you're only using a CLI call

```php
final class YourController
{
    ...

    public function yourMethod(Request $request, Response $response, $args)
    {

        // ONLY WHEN CALLED THROUGH CLI
        if (PHP_SAPI !== 'cli') {
            return $response->withStatus(404)->withHeader('Location', '/404');
        }

        if (!$request->getParam('event')) {
            return $response->withStatus(404)->withHeader('Location', '/404');
        }

        ...

    }

}
```


### Credits

Based on Bobby DeVeaux's ([@bobbyjason](https://twitter.com/bobbyjason)) [Gulp Skeleton](https://github.com/dvomedia/gulp-skeleton/blob/master/web/index.php)
