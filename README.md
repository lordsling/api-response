# Laravel Api Response

> A collection of helpers for returning a response from your API more expressively

[![api-response](https://banners.beyondco.de/Laravel%20Api%20Response.png?theme=dark&packageManager=composer+require&packageName=lordsling%2Fapi-response&pattern=topography&style=style_2&description=Easy+to+consume+REST+API+JSON+responses&md=1&showWatermark=0&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg&widths=300)](https://github.com/lordsling/api-response)

## Installation

Install this package via Composer:
```bash
$ composer require lordsling/api-response
```

No extra setup is required. The helper file is autoloaded via the "autoload" attributes of the `composer.json` file

## Configuration

Publish config file using Artisan command:
```bash
$ php artisan vendor:publish --vendor="Lordsling\ApiResponse\ApiResponseServiceProvider"
```

> Check `config/api-response.php` and read comments there if you need.


#### Sample Response API
```php
{
    "success": true,
    "payload": null,
    "errors": []
}
```

## Usage

### 2xx Success  `"success": true`

#### HTTP 200 OK
```php
/**
 * @param null $payload
 */
return ok($payload);
```

#### HTTP 200 OK
```php
/**
 * @param null $payload
 */
return error($payload);
```

#### HTTP 200 OK
```php
/**
 * @param null $payload
 */
return fail($payload);
```

#### HTTP 201 Created
```php
/**
 * @param null $payload
 */
return created($payload);
```

#### HTTP 202 Accepted
```php
/**
 * @param null $payload
 */
return accepted($payload);
```

#### HTTP 204 No Content
```php
/**
 */
return noContent();
```

---
### 3xx Redirection

#### HTTP 301 Moved Permanently
```php
/**
 * @param $newUrl
 */
return movedPermanently($newUrl);
```

#### HTTP 302 Found
```php
/**
 * @param $url
 */
return found($url);
```

#### HTTP 303 See Other
```php
/**
 * @param $newUrl
 */
return seeOther($newUrl);
```

#### HTTP 307 Temporary Redirect
```php
/**
 * @param $tempUrl
 */
return temporaryRedirect($tempUrl);
```

---
### 4xx Client Errors `"success": false`

#### HTTP 400 Bad Request
```php
/**
 * @param null $payload
 */
return badRequest($payload);
```

#### HTTP 401 Unauthorized
```php
/**
 * @param null $payload
 */
return unauthorized($payload);
```

#### HTTP 402 Payment Required
```php
/**
 * @param null $payload
 */
return paymentRequired($payload);
```

#### HTTP 403 Forbidden
```php
/**
 * @param null $payload
 */
return forbidden($payload);
```

#### HTTP 404 Not Found
```php
/**
 * @param null $payload
 */
return notFound($payload);
```

#### HTTP 405 Method Not Allowed
```php
/**
 * @param null $payload
 */
return methodNotAllowed($payload);
```

#### HTTP 406 Not Acceptable
```php
/**
 * @param null $payload
 */
return notAcceptable($payload);
```

#### HTTP 410 Gone
```php
/**
 * @param null $payload
 */
return gone($payload);
```

#### HTTP 413 Payload Too Large
```php
/**
 * @param null $payload
 */
return payloadTooLarge($payload);
```

#### HTTP 422 Unprocessable Entity
```php
/**
 * @param null $payload
 */
return unprocessableEntity($payload);
```

#### HTTP 426 Upgrade Required
```php
/**
 * @param null $payload
 */
return upgradeRequired($payload);
```

#### HTTP 429 Too Many Requests
```php
/**
 * @param null $payload
 */
return tooManyRequests($payload);
```

---
### 5xx Server Errors `"success": false`

#### HTTP 500 Internal Server Errors
```php
/**
 * @param null $payload
 */
return internalServerError($payload);
```

#### HTTP 501 Not Implemented
```php
/**
 * @param null $payload
 */
return notImplemented($payload);
```

#### HTTP 502 Bad Gateway
```php
/**
 * @param null $payload
 */
return badGateway($payload);
```

#### HTTP 503 Service Unavailable
```php
/**
 * @param null $payload
 */
return serviceUnavailable($payload);
```

#### HTTP 504 Gateway Timeout
```php
/**
 * @param null $payload
 */
return gatewayTimeout($payload);
```

#### HTTP 507 Insufficient Storage
```php
/**
 * @param null $payload
 */
return insufficientStorage($payload);
```

## Available methods

#### withHeaders
```php
/**
 * @param array $headers
 */
->withHeaders([
    ['HeaderName' => 'value'],
    //...
]);
```

#### withErrors
```php
/**
 * @param array $headers
 */
->withErrors([
    [
        'code' => 'code',
        'message' => 'message'
    ],
    //...
]);
```

#### withMeta
```php
/**
 * @param $request
 * @param null $callback
 */
->withMeta($request, function ($request) {
    return ['query' => $request->query()];
});
```

#### withValidation
`App/Exceptions/Handler.php`
```php
public function render($request, Throwable $e)
{
    if ($e instanceof ValidationException) {
        return unprocessableEntity()->withValidation($e);
    }
}
```

#### withTrace
`App/Exceptions/Handler.php`
```php
public function render($request, Throwable $e)
{
    return internalServerError()
    /**
     * @param $exception
     */
    ->withTrace($e);
}
```

#### withMergeErrors
```php
/**
 * @param ...$errorCodes
 */
->withMergeErrors(1000, 1001, 1002, /*...*/);
                    or
->withMergeErrors([1000, 1001, 1002, /*...*/]);
```

#### addError
```php
/**
 * @param $code
 * @param string|null $message
 * @param array|null $details
 */
->addError(1000, 'Custom error message', ['details' => '...', //...]);
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
