<?php

namespace Lordsling\ApiResponse;

use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\ValidationException;
use Nette\Utils\Callback;
use PhpParser\Node\Expr\Cast\Object_;
use Symfony\Component\HttpFoundation\Response;

class ApiResponse implements Responsable
{
    /**
     * @var \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    protected $errorsConfig;

    /**
     * @var
     */
    protected $httpCode;

    /**
     * @var bool
     */
    protected $success = true;

    /**
     * @var
     */
    protected $payload;

    /**
     * @var array
     */
    protected $headers = [];

    /**
     * @var array
     */
    protected $errors = [];

    /**
     * @var array
     */
    protected $meta = [];

    /**
     * @var null
     */
    protected $trace = null;

    public function __construct()
    {
        $this->errorsConfig = config('api-response.errors');
    }

    /**
     * @param null $payload
     * @return $this
     */
    public function ok($payload = null): ApiResponse
    {
        $this->setHttpCode(Response::HTTP_OK);
        $this->setPayload($payload);
        return $this;
    }

    /**
     * @param null $payload
     * @return $this
     */
    public function error($payload = null): ApiResponse
    {
        $this->setHttpCode(Response::HTTP_OK);
        $this->setSuccess(false);
        return $this->ok($payload);
    }

    /**
     * @param null $payload
     * @return $this
     */
    public function fail($payload = null): ApiResponse
    {
        $this->setHttpCode(Response::HTTP_OK);
        $this->setSuccess(false);
        return $this->ok($payload);
    }

    /**
     * @param null $payload
     * @return $this
     */
    public function created($payload = null): ApiResponse
    {
        $this->setHttpCode(Response::HTTP_CREATED);
        $this->setPayload($payload);
        return $this;
    }

    /**
     * @param null $payload
     * @return $this
     */
    public function accepted($payload = null): ApiResponse
    {
        $this->setHttpCode(Response::HTTP_ACCEPTED);
        $this->setPayload($payload);
        return $this;
    }

    /**
     * @return $this
     */
    public function noContent(): ApiResponse
    {
        $this->setHttpCode(Response::HTTP_NO_CONTENT);
        return $this;
    }

    /**
     * @param $newUrl
     * @return $this
     */
    public function movedPermanently($newUrl): ApiResponse
    {
        $this->setHttpCode(Response::HTTP_MOVED_PERMANENTLY);
        $this->setHeaders(['Location' => $newUrl]);
        $this->setSuccess(false);
        return $this;
    }

    /**
     * @param $url
     * @return $this
     */
    public function found($url): ApiResponse
    {
        $this->setHttpCode(Response::HTTP_FOUND);
        $this->setHeaders(['Location' => $url]);
        $this->setSuccess(false);
        return $this;
    }

    /**
     * @param $newUrl
     * @return $this
     */
    public function seeOther($newUrl): ApiResponse
    {
        $this->setHttpCode(Response::HTTP_SEE_OTHER);
        $this->setHeaders(['Location' => $newUrl]);
        $this->setSuccess(false);
        return $this;
    }

    /**
     * @param $tempUrl
     * @return $this
     */
    public function temporaryRedirect($tempUrl): ApiResponse
    {
        $this->setHttpCode(Response::HTTP_TEMPORARY_REDIRECT);
        $this->setHeaders(['Location' => $tempUrl]);
        $this->setSuccess(false);
        return $this;
    }

    /**
     * @param null $payload
     * @return $this
     */
    public function badRequest($payload = null): ApiResponse
    {
        $this->setHttpCode(Response::HTTP_BAD_REQUEST);
        $this->setPayload($payload);
        $this->setSuccess(false);
        return $this;
    }

    /**
     * @param null $payload
     * @return $this
     */
    public function unauthorized($payload = null): ApiResponse
    {
        $this->setHttpCode(Response::HTTP_UNAUTHORIZED);
        $this->setPayload($payload);
        $this->setSuccess(false);
        return $this;
    }

    /**
     * @param null $payload
     * @return $this
     */
    public function paymentRequired($payload = null): ApiResponse
    {
        $this->setHttpCode(Response::HTTP_PAYMENT_REQUIRED);
        $this->setPayload($payload);
        $this->setSuccess(false);
        return $this;
    }

    /**
     * @param null $payload
     * @return $this
     */
    public function forbidden($payload = null): ApiResponse
    {
        $this->setHttpCode(Response::HTTP_FORBIDDEN);
        $this->setPayload($payload);
        $this->setSuccess(false);
        return $this;
    }

    /**
     * @param null $payload
     * @return $this
     */
    public function notFound($payload = null): ApiResponse
    {
        $this->setHttpCode(Response::HTTP_NOT_FOUND);
        $this->setPayload($payload);
        $this->setSuccess(false);
        return $this;
    }

    /**
     * @param null $payload
     * @return $this
     */
    public function methodNotAllowed($payload = null): ApiResponse
    {
        $this->setHttpCode(Response::HTTP_METHOD_NOT_ALLOWED);
        $this->setPayload($payload);
        $this->setSuccess(false);
        return $this;
    }

    /**
     * @param null $payload
     * @return $this
     */
    public function notAcceptable($payload = null): ApiResponse
    {
        $this->setHttpCode(Response::HTTP_NOT_ACCEPTABLE);
        $this->setPayload($payload);
        $this->setSuccess(false);
        return $this;
    }

    /**
     * @param null $payload
     * @return $this
     */
    public function gone($payload = null): ApiResponse
    {
        $this->setHttpCode(Response::HTTP_GONE);
        $this->setPayload($payload);
        $this->setSuccess(false);
        return $this;
    }

    /**
     * @param null $payload
     * @return $this
     */
    public function payloadTooLarge($payload = null): ApiResponse
    {
        $this->setHttpCode(Response::HTTP_REQUEST_ENTITY_TOO_LARGE);
        $this->setPayload($payload);
        $this->setSuccess(false);
        return $this;
    }

    /**
     * @param null $payload
     * @return $this
     */
    public function unprocessableEntity($payload = null): ApiResponse
    {
        $this->setHttpCode(Response::HTTP_UNPROCESSABLE_ENTITY);
        $this->setPayload($payload);
        $this->setSuccess(false);
        return $this;
    }

    /**
     * @param null $payload
     * @return $this
     */
    public function upgradeRequired($payload = null): ApiResponse
    {
        $this->setHttpCode(Response::HTTP_UPGRADE_REQUIRED);
        $this->setPayload($payload);
        $this->setSuccess(false);
        return $this;
    }

    /**
     * @param null $payload
     * @return $this
     */
    public function tooManyRequests($payload = null): ApiResponse
    {
        $this->setHttpCode(Response::HTTP_TOO_MANY_REQUESTS);
        $this->setPayload($payload);
        $this->setSuccess(false);
        return $this;
    }

    /**
     * @param null $payload
     * @return $this
     */
    public function internalServerError($payload = null): ApiResponse
    {
        $this->setHttpCode(Response::HTTP_INTERNAL_SERVER_ERROR);
        $this->setPayload($payload);
        $this->setSuccess(false);
        return $this;
    }

    /**
     * @param null $payload
     * @return $this
     */
    public function notImplemented($payload = null): ApiResponse
    {
        $this->setHttpCode(Response::HTTP_NOT_IMPLEMENTED);
        $this->setPayload($payload);
        $this->setSuccess(false);
        return $this;
    }

    /**
     * @param null $payload
     * @return $this
     */
    public function badGateway($payload = null): ApiResponse
    {
        $this->setHttpCode(Response::HTTP_BAD_GATEWAY);
        $this->setPayload($payload);
        $this->setSuccess(false);
        return $this;
    }

    /**
     * @param null $payload
     * @return $this
     */
    public function serviceUnavailable($payload = null): ApiResponse
    {
        $this->setHttpCode(Response::HTTP_SERVICE_UNAVAILABLE);
        $this->setPayload($payload);
        $this->setSuccess(false);
        return $this;
    }

    /**
     * @param null $payload
     * @return $this
     */
    public function gatewayTimeout($payload = null): ApiResponse
    {
        $this->setHttpCode(Response::HTTP_GATEWAY_TIMEOUT);
        $this->setPayload($payload);
        $this->setSuccess(false);
        return $this;
    }

    /**
     * @param null $payload
     * @return $this
     */
    public function insufficientStorage($payload = null): ApiResponse
    {
        $this->setHttpCode(Response::HTTP_INSUFFICIENT_STORAGE);
        $this->setPayload($payload);
        $this->setSuccess(false);
        return $this;
    }

    /**
     * @param array $headers
     * @return $this
     */
    public function withHeaders(array $headers): ApiResponse
    {
        $this->setHeaders($headers);
        return $this;
    }

    /**
     * @param array $errors
     * @return $this
     */
    public function withErrors(array $errors): ApiResponse
    {
        $this->errors += $errors;
        return $this;
    }

    /**
     * @param $exception
     * @param string|null $message
     * @return $this
     */
    public function withValidation($exception, ?string $message = null): ApiResponse
    {
        if ($exception instanceof ValidationException) {
            $addMessage = $message !== null ? $message : $exception->getMessage();
            $this->addError(422, $addMessage, [config('api-response.keys.validation.fields') => $exception->errors()]);
        }
        return $this;
    }

    /**
     * @param $request
     * @param null $callback
     * @return $this
     */
    public function withMeta($request, $callback = null)
    {
        if (is_callable($callback)) {
            $meta = $callback($request);
            $this->setMeta($meta);
        }

        return $this;
    }

    /**
     * @param $exception
     * @return $this
     */
    public function withTrace($exception)
    {
        if(method_exists($exception,'getTrace')) {
            $this->trace = $exception->getTrace();
        }

        return $this;
    }

    /**
     * @param array $pagination
     * @return $this
     */
    public function withPagination(array $pagination)
    {
        $this->setMeta([config('api_response.keys.meta.pagination') => $pagination]);

        return $this;
    }

    /**
     * @param $code
     * @param string|null $message
     * @param array|null $details
     * @return $this
     */
    public function addError($code, string $message = null, ?array $details = []): ApiResponse
    {
        $sendMessage = $message;
        if (array_key_exists($code, $this->errorsConfig)) {
            $sendMessage = $this->errorsConfig[$code] ?? '';
        }

        $this->setErrors([
                'code' => $code,
                'message' => $sendMessage !== null ? $sendMessage : ''
            ] + $details);
        return $this;
    }

    /**
     * @param $errors
     * @return $this
     */
    private function setErrors($errors)
    {
        array_push($this->errors, $errors);
        return $this;
    }

    private function setMeta($row)
    {
        $this->meta += $row;
        return $this;
    }

    /**
     * @param $code
     * @return $this
     */
    private function setHttpCode($code)
    {
        $this->httpCode = $code;
        return $this;
    }

    /**
     * @param bool $success
     * @return $this
     */
    private function setSuccess($success = true)
    {
        $this->success = $success;
        return $this;
    }

    /**
     * @param $payload
     * @return $this
     */
    private function setPayload($payload)
    {
        $this->payload = $payload;
        return $this;
    }

    /**
     * @param $headers
     * @return $this
     */
    private function setHeaders($headers)
    {
        $this->headers = array_merge($this->headers, $headers);
        return $this;
    }

//    /**
//     * @param $exception
//     * @param int $code
//     * @param array $headers
//     * @return JsonResponse
//     */
//    public function safeError($exception, int $code = 0, array $headers = []): JsonResponse
//    {
//        $errors = null;
//
//        if (method_exists($exception, 'errors')) {
//            $errors = ['exception' => $exception->errors()];
//        } else if (method_exists($exception, 'getMessage')) {
//            $errors = ['exception' => $exception->getMessage()];
//        }
//
//        if(method_exists($exception, 'getTrace')) {
//            $errors = array_merge($errors, ['trace' => $exception->getTrace()]);
//        }
//
//        return $this->response(null, false, $code, null, $headers, 200, $errors);
//    }

    /**
     * @param ...$errorCodes
     * @return $this
     */
    public function withMergeErrors(...$errorCodes): ApiResponse
    {
        $codes = Arr::flatten($errorCodes);
        foreach ($codes as $code) {
            $message = '';
            if(array_key_exists($code, $this->errorsConfig)) {
                $message = $this->errorsConfig[$code];
            }
            $this->addError($code, $message);
        }

        return $this;
    }

    /**
     * @return mixed
     */
    private function getPayload()
    {
        $displayType = config('api-response.default.payload');
        $returedPayload = $this->payload;
        if ($this->payload === null) {
            switch ($displayType) {
                case 'null':
                    $returedPayload = null;
                    break;
                case 'array':
                    $returedPayload = [];
                    break;
            }
        }
        return $returedPayload;
    }

    /**
     * @return bool
     */
    private function getSuccess()
    {
        return $this->success;
    }

    /**
     * @return array
     */
    private function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @return mixed
     */
    private function getHttpCode()
    {
        return $this->httpCode;
    }

    /**
     * @return \array[][]
     */
    private function getErrors()
    {
        if (config('api-response.default.errors') === true) {
            $returnedErrors = ['errors' => []];
        } else {
            $returnedErrors = [];
        }
        return count($this->errors) > 0 ? ['errors' => $this->errors] : $returnedErrors;
    }

    /**
     * @return array|array[]
     */
    private function getMeta()
    {
        return count($this->meta) > 0 ? [config('api-response.keys.meta.global') => $this->meta] : [];
    }

    /**
     * @return array|null[]
     */
    private function getTrace()
    {
        $trace = config('app.debug') ? ['trace' => $this->trace] : [];
        return $trace;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return JsonResponse|Response
     */
    public function toResponse($request)
    {
        $body = [
                config('api-response.keys.success') => $this->getSuccess(),
                config('api-response.keys.payload') => $this->getPayload()
            ]
            + $this->getErrors()
            + $this->getMeta()
            + $this->getTrace();
        return response()->json($body, $this->getHttpCode(), $this->getHeaders());
    }
}
