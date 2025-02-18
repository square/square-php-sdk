<?php

namespace Square\Catalog\Images;

use GuzzleHttp\ClientInterface;
use Square\Core\Client\RawClient;
use Square\Catalog\Images\Requests\CreateImagesRequest;
use Square\Types\CreateCatalogImageResponse;
use Square\Exceptions\SquareException;
use Square\Exceptions\SquareApiException;
use Square\Core\Multipart\MultipartFormData;
use Square\Core\Multipart\MultipartApiRequest;
use Square\Environments;
use Square\Core\Client\HttpMethod;
use JsonException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Client\ClientExceptionInterface;
use Square\Catalog\Images\Requests\UpdateImagesRequest;
use Square\Types\UpdateCatalogImageResponse;

class ImagesClient
{
    /**
     * @var array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    private array $options;

    /**
     * @var RawClient $client
     */
    private RawClient $client;

    /**
     * @param RawClient $client
     * @param ?array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    public function __construct(
        RawClient $client,
        ?array $options = null,
    ) {
        $this->client = $client;
        $this->options = $options ?? [];
    }

    /**
     * Uploads an image file to be represented by a [CatalogImage](entity:CatalogImage) object that can be linked to an existing
     * [CatalogObject](entity:CatalogObject) instance. The resulting `CatalogImage` is unattached to any `CatalogObject` if the `object_id`
     * is not specified.
     *
     * This `CreateCatalogImage` endpoint accepts HTTP multipart/form-data requests with a JSON part and an image file part in
     * JPEG, PJPEG, PNG, or GIF format. The maximum file size is 15MB.
     *
     * @param CreateImagesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     * } $options
     * @return CreateCatalogImageResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function create(CreateImagesRequest $request = new CreateImagesRequest(), ?array $options = null): CreateCatalogImageResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $body = new MultipartFormData();
        if ($request->getRequest() != null) {
            $body->add(
                name: 'request',
                value: $request->getRequest()->toJson(),
                contentType: 'application/json; charset=utf-8',
            );
        }
        if ($request->getImageFile() != null) {
            $body->addPart(
                $request->getImageFile()->toMultipartFormDataPart(
                    name: 'image_file',
                    contentType: 'image/jpeg',
                ),
            );
        }
        try {
            $response = $this->client->sendRequest(
                new MultipartApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/catalog/images",
                    method: HttpMethod::POST,
                    body: $body,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return CreateCatalogImageResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new SquareException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new SquareException(message: $e->getMessage(), previous: $e);
            }
            throw new SquareApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new SquareException(message: $e->getMessage(), previous: $e);
        }
        throw new SquareApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Uploads a new image file to replace the existing one in the specified [CatalogImage](entity:CatalogImage) object.
     *
     * This `UpdateCatalogImage` endpoint accepts HTTP multipart/form-data requests with a JSON part and an image file part in
     * JPEG, PJPEG, PNG, or GIF format. The maximum file size is 15MB.
     *
     * @param UpdateImagesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     * } $options
     * @return UpdateCatalogImageResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function update(UpdateImagesRequest $request, ?array $options = null): UpdateCatalogImageResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $body = new MultipartFormData();
        if ($request->getRequest() != null) {
            $body->add(
                name: 'request',
                value: $request->getRequest()->toJson(),
                contentType: 'application/json; charset=utf-8',
            );
        }
        if ($request->getImageFile() != null) {
            $body->addPart(
                $request->getImageFile()->toMultipartFormDataPart(
                    name: 'image_file',
                    contentType: 'image/jpeg',
                ),
            );
        }
        try {
            $response = $this->client->sendRequest(
                new MultipartApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/catalog/images/{$request->getImageId()}",
                    method: HttpMethod::PUT,
                    body: $body,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return UpdateCatalogImageResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new SquareException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new SquareException(message: $e->getMessage(), previous: $e);
            }
            throw new SquareApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new SquareException(message: $e->getMessage(), previous: $e);
        }
        throw new SquareApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }
}
