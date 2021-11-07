<?php

namespace Lordsling\ApiResponse\Facade;

use Illuminate\Support\Facades\Facade;
use Lordsling\ApiResponse\ApiResponse as ApiResponseClass;

/**
 * 2xx
 * @method ok($payload = null)
 * @method error($payload = null)
 * @method fail($payload = null)
 * @method created($payload = null)
 * @method accepted($payload = null)
 * @method noContent()
 *
 * 3xx
 * @method movedPermanently($newUrl)
 * @method found($url)
 * @method seeOther($newUrl)
 * @method temporaryRedirect($tempUrl)
 *
 * 4xx
 * @method badRequest($payload = null)
 * @method unauthorized($payload = null)
 * @method paymentRequired($payload = null)
 * @method forbidden($payload = null)
 * @method notFound($payload = null)
 * @method methodNotAllowed($payload = null)
 * @method notAcceptable($payload = null)
 * @method gone($payload = null)
 * @method payloadTooLarge($payload = null)
 * @method unprocessableEntity($payload = null)
 * @method upgradeRequired($payload = null)
 * @method tooManyRequests($payload = null)
 *
 * 5xx
 * @method internalServerError($payload = null)
 * @method notImplemented($payload = null)
 * @method badGateway($payload = null)
 * @method serviceUnavailable($payload = null)
 * @method gatewayTimeout($payload = null)
 * @method insufficientStorage($payload = null)
 *
 * Supporting methods
 * @method withHeaders(array $headers)
 * @method withErrors(array $errors)
 * @method withValidation($exception, ?string $message = null)
 * @method withMeta($request, $callback = null)
 * @method withTrace($exception)
 * @method withPagination(array $pagination)
 * @method withMergeErrors(...$errorCodes)
 * @method addError($code, string $message = null, ?array $details = [])
 *
 * @see ApiResponseClass
 */
class ApiResponse extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'api';
    }
}
