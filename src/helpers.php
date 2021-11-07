<?php

if (!function_exists('api')) {
    /**
     * @return \Lordsling\ApiResponse\ApiResponse
     */
    function api()
    {
        return new \Lordsling\ApiResponse\ApiResponse();
    }
}

if (!function_exists('ok')) {
    /**
     * @param null $payload
     * @return \Lordsling\ApiResponse\ApiResponse
     */
    function ok($payload = null)
    {
        $api = new \Lordsling\ApiResponse\ApiResponse();
        return $api->ok($payload);
    }
}

if (!function_exists('error')) {
    /**
     * @param null $payload
     * @return \Lordsling\ApiResponse\ApiResponse
     */
    function error($payload = null)
    {
        $api = new \Lordsling\ApiResponse\ApiResponse();
        return $api->error($payload);
    }
}

if (!function_exists('fail')) {
    /**
     * @param null $payload
     * @return \Lordsling\ApiResponse\ApiResponse
     */
    function fail($payload = null)
    {
        $api = new \Lordsling\ApiResponse\ApiResponse();
        return $api->fail($payload);
    }
}

if (!function_exists('created')) {
    /**
     * @param null $payload
     * @return \Lordsling\ApiResponse\ApiResponse
     */
    function created($payload = null)
    {
        $api = new \Lordsling\ApiResponse\ApiResponse();
        return $api->created($payload);
    }
}

if (!function_exists('accepted')) {
    /**
     * @param null $payload
     * @return \Lordsling\ApiResponse\ApiResponse
     */
    function accepted($payload = null)
    {
        $api = new \Lordsling\ApiResponse\ApiResponse();
        return $api->accepted($payload);
    }
}

if (!function_exists('noContent')) {
    /**
     * @return \Lordsling\ApiResponse\ApiResponse
     */
    function noContent()
    {
        $api = new \Lordsling\ApiResponse\ApiResponse();
        return $api->noContent();
    }
}

if (!function_exists('movedPermanently')) {
    /**
     * @param $newUrl
     * @return \Lordsling\ApiResponse\ApiResponse
     */
    function movedPermanently($newUrl)
    {
        $api = new \Lordsling\ApiResponse\ApiResponse();
        return $api->movedPermanently($newUrl);
    }
}

if (!function_exists('found')) {
    /**
     * @param $url
     * @return \Lordsling\ApiResponse\ApiResponse
     */
    function found($url)
    {
        $api = new \Lordsling\ApiResponse\ApiResponse();
        return $api->found($url);
    }
}

if (!function_exists('seeOther')) {
    /**
     * @param $newUrl
     * @return \Lordsling\ApiResponse\ApiResponse
     */
    function seeOther($newUrl)
    {
        $api = new \Lordsling\ApiResponse\ApiResponse();
        return $api->seeOther($newUrl);
    }
}

if (!function_exists('temporaryRedirect')) {
    /**
     * @param $tempUrl
     * @return \Lordsling\ApiResponse\ApiResponse
     */
    function temporaryRedirect($tempUrl)
    {
        $api = new \Lordsling\ApiResponse\ApiResponse();
        return $api->temporaryRedirect($tempUrl);
    }
}

if (!function_exists('badRequest')) {
    /**
     * @param null $payload
     * @return \Lordsling\ApiResponse\ApiResponse
     */
    function badRequest($payload = null)
    {
        $api = new \Lordsling\ApiResponse\ApiResponse();
        return $api->badRequest($payload);
    }
}

if (!function_exists('unauthorized')) {
    /**
     * @param null $payload
     * @return \Lordsling\ApiResponse\ApiResponse
     */
    function unauthorized($payload = null)
    {
        $api = new \Lordsling\ApiResponse\ApiResponse();
        return $api->unauthorized($payload);
    }
}

if (!function_exists('paymentRequired')) {
    /**
     * @param null $payload
     * @return \Lordsling\ApiResponse\ApiResponse
     */
    function paymentRequired($payload = null)
    {
        $api = new \Lordsling\ApiResponse\ApiResponse();
        return $api->paymentRequired($payload);
    }
}

if (!function_exists('forbidden')) {
    /**
     * @param null $payload
     * @return \Lordsling\ApiResponse\ApiResponse
     */
    function forbidden($payload = null)
    {
        $api = new \Lordsling\ApiResponse\ApiResponse();
        return $api->forbidden($payload);
    }
}

if (!function_exists('notFound')) {
    /**
     * @param null $payload
     * @return \Lordsling\ApiResponse\ApiResponse
     */
    function notFound($payload = null)
    {
        $api = new \Lordsling\ApiResponse\ApiResponse();
        return $api->notFound($payload);
    }
}

if (!function_exists('methodNotAllowed')) {
    /**
     * @param null $payload
     * @return \Lordsling\ApiResponse\ApiResponse
     */
    function methodNotAllowed($payload = null)
    {
        $api = new \Lordsling\ApiResponse\ApiResponse();
        return $api->methodNotAllowed($payload);
    }
}

if (!function_exists('notAcceptable')) {
    /**
     * @param null $payload
     * @return \Lordsling\ApiResponse\ApiResponse
     */
    function notAcceptable($payload = null)
    {
        $api = new \Lordsling\ApiResponse\ApiResponse();
        return $api->notAcceptable($payload);
    }
}

if (!function_exists('gone')) {
    /**
     * @param null $payload
     * @return \Lordsling\ApiResponse\ApiResponse
     */
    function gone($payload = null)
    {
        $api = new \Lordsling\ApiResponse\ApiResponse();
        return $api->gone($payload);
    }
}

if (!function_exists('payloadTooLarge')) {
    /**
     * @param null $payload
     * @return \Lordsling\ApiResponse\ApiResponse
     */
    function payloadTooLarge($payload = null)
    {
        $api = new \Lordsling\ApiResponse\ApiResponse();
        return $api->payloadTooLarge($payload);
    }
}

if (!function_exists('unprocessableEntity')) {
    /**
     * @param null $payload
     * @return \Lordsling\ApiResponse\ApiResponse
     */
    function unprocessableEntity($payload = null)
    {
        $api = new \Lordsling\ApiResponse\ApiResponse();
        return $api->unprocessableEntity($payload);
    }
}

if (!function_exists('upgradeRequired')) {
    /**
     * @param null $payload
     * @return \Lordsling\ApiResponse\ApiResponse
     */
    function upgradeRequired($payload = null)
    {
        $api = new \Lordsling\ApiResponse\ApiResponse();
        return $api->upgradeRequired($payload);
    }
}

if (!function_exists('tooManyRequests')) {
    /**
     * @param null $payload
     * @return \Lordsling\ApiResponse\ApiResponse
     */
    function tooManyRequests($payload = null)
    {
        $api = new \Lordsling\ApiResponse\ApiResponse();
        return $api->tooManyRequests($payload);
    }
}

if (!function_exists('internalServerError')) {
    /**
     * @param null $payload
     * @return \Lordsling\ApiResponse\ApiResponse
     */
    function internalServerError($payload = null)
    {
        $api = new \Lordsling\ApiResponse\ApiResponse();
        return $api->internalServerError($payload);
    }
}

if (!function_exists('notImplemented')) {
    /**
     * @param null $payload
     * @return \Lordsling\ApiResponse\ApiResponse
     */
    function notImplemented($payload = null)
    {
        $api = new \Lordsling\ApiResponse\ApiResponse();
        return $api->notImplemented($payload);
    }
}

if (!function_exists('badGateway')) {
    /**
     * @param null $payload
     * @return \Lordsling\ApiResponse\ApiResponse
     */
    function badGateway($payload = null)
    {
        $api = new \Lordsling\ApiResponse\ApiResponse();
        return $api->badGateway($payload);
    }
}

if (!function_exists('serviceUnavailable')) {
    /**
     * @param null $payload
     * @return \Lordsling\ApiResponse\ApiResponse
     */
    function serviceUnavailable($payload = null)
    {
        $api = new \Lordsling\ApiResponse\ApiResponse();
        return $api->serviceUnavailable($payload);
    }
}

if (!function_exists('gatewayTimeout')) {
    /**
     * @param null $payload
     * @return \Lordsling\ApiResponse\ApiResponse
     */
    function gatewayTimeout($payload = null)
    {
        $api = new \Lordsling\ApiResponse\ApiResponse();
        return $api->gatewayTimeout($payload);
    }
}

if (!function_exists('insufficientStorage')) {
    /**
     * @param null $payload
     * @return \Lordsling\ApiResponse\ApiResponse
     */
    function insufficientStorage($payload = null)
    {
        $api = new \Lordsling\ApiResponse\ApiResponse();
        return $api->insufficientStorage($payload);
    }
}
