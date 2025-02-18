<?php

declare(strict_types=1);

namespace Square\Legacy\Utils;

use CoreInterfaces\Core\ContextInterface;
use CoreInterfaces\Core\Request\RequestInterface;
use CoreInterfaces\Core\Response\ResponseInterface;
use CoreInterfaces\Sdk\ConverterInterface;
use Square\Legacy\Exceptions\ApiException;
use Square\Legacy\Http\ApiResponse;
use Square\Legacy\Http\HttpContext;
use Square\Legacy\Http\HttpRequest;
use Square\Legacy\Http\HttpResponse;

class CompatibilityConverter implements ConverterInterface
{
    public function createApiException(
        string $message,
        RequestInterface $request,
        ?ResponseInterface $response
    ): ApiException {
        $response = $response == null ? null : $this->createHttpResponse($response);
        return new ApiException($message, $this->createHttpRequest($request), $response);
    }

    public function createHttpContext(ContextInterface $context): HttpContext
    {
        return new HttpContext(
            $this->createHttpRequest($context->getRequest()),
            $this->createHttpResponse($context->getResponse())
        );
    }

    public function createHttpRequest(RequestInterface $request): HttpRequest
    {
        return new HttpRequest(
            $request->getHttpMethod(),
            $request->getHeaders(),
            $request->getQueryUrl(),
            $request->getParameters()
        );
    }

    public function createHttpResponse(ResponseInterface $response): HttpResponse
    {
        return new HttpResponse($response->getStatusCode(), $response->getHeaders(), $response->getRawBody());
    }

    public function createApiResponse(ContextInterface $context, $deserializedBody): ApiResponse
    {
        return ApiResponse::createFromContext(
            $context->getResponse()->getBody(),
            $deserializedBody,
            $this->createHttpContext($context)
        );
    }

    public function createFileWrapper(string $realFilePath, ?string $mimeType, ?string $filename): FileWrapper
    {
        return FileWrapper::createFromPath($realFilePath, $mimeType, $filename);
    }
}
