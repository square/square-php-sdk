<?php

declare(strict_types=1);

namespace Square;

use InvalidArgumentException;
use JsonSerializable;
use stdClass;

/**
 * API utility class
 */
class ApiHelper
{
    /**
     * Replaces template parameters in the given url
     *
     * @param    string  $url         The query string builder to replace the template parameters
     * @param    array   $parameters  The parameters to replace in the url
     * @param    bool    $encode      Should parameters be URL-encoded?
     *
     * @return   string  The processed url
     */
    public static function appendUrlWithTemplateParameters(string $url, array $parameters, bool $encode = true): string
    {
        foreach ($parameters as $key => $value) {
            $replaceValue = '';

            if (is_null($value)) {
                $replaceValue = '';
            } elseif (is_array($value)) {
                $val = array_map('strval', $value);
                $val = $encode ? array_map('urlencode', $val) : $val;
                $replaceValue = implode("/", $val);
            } else {
                $val = strval($value);
                $replaceValue = $encode ? urlencode($val) : $val;
            }

            $url = str_replace('{' . strval($key) . '}', $replaceValue, $url);
        }

        return $url;
    }

    /**
     * Appends the given set of parameters to the given query string
     *
     * @param    string  $queryBuilder   The query url string to append the parameters
     * @param    array   $parameters     The parameters to append
     */
    public static function appendUrlWithQueryParameters(string &$queryBuilder, array $parameters): void
    {
        //perform parameter validation
        if (is_null($queryBuilder) || !is_string($queryBuilder)) {
            throw new InvalidArgumentException('Given value for parameter "queryBuilder" is invalid.');
        }
        if (is_null($parameters)) {
            return;
        }
        //does the query string already has parameters
        $hasParams = (strrpos($queryBuilder, '?') > 0);

        //if already has parameters, use the &amp; to append new parameters
        $queryBuilder .= (($hasParams) ? '&' : '?');

        //append parameters
        $queryBuilder .= http_build_query($parameters);
    }

    /**
     * Validates and processes the given Url
     *
     * @param    string  $url The given Url to process
     *
     * @return   string       Pre-processed Url as string
     */
    public static function cleanUrl(string $url): string
    {
        //perform parameter validation
        if (is_null($url) || !is_string($url)) {
            throw new InvalidArgumentException('Invalid Url.');
        }
        //ensure that the urls are absolute
        $matchCount = preg_match("#^(https?://[^/]+)#", $url, $matches);
        if ($matchCount == 0) {
            throw new InvalidArgumentException('Invalid Url format.');
        }
        //get the http protocol match
        $protocol = $matches[1];

        //remove redundant forward slashes
        $query = substr($url, strlen($protocol));
        $query = preg_replace("#//+#", "/", $query);

        //return process url
        return $protocol . $query;
    }

    /**
     * Serialize any given mixed value.
     *
     * @param mixed $value Any value to be serialized
     *
     * @return string serialized value
     */
    public static function serialize($value): string
    {
        if (is_string($value)) {
            return $value;
        }
        return json_encode($value);
    }

    /**
     * Deserialize a Json string
     *
     * @param  string   $json       A valid Json string
     * @param  mixed    $instance   Instance of an object to map the json into
     * @param  boolean  $isArray    Is the Json an object array?
     *
     * @return mixed                Decoded Json
     */
    public static function deserialize(
        string $json,
        $instance = null,
        bool $isArray = false
    ) {
        if ($instance == null) {
            return json_decode($json, true);
        } else {
            $mapper = new \apimatic\jsonmapper\JsonMapper();
            if ($isArray) {
                return $mapper->mapArray(json_decode($json), [], $instance);
            } else {
                return $mapper->map(json_decode($json), $instance);
            }
        }
    }

    /**
     * Decodes a valid json string into an array to send in Api calls.
     *
     * @param  mixed  $json         Must be null or array or a valid string json to be translated into a php array.
     * @param  string $name         Name of the argument whose value is being validated in $json parameter.
     * @param  bool   $associative  Should check for associative? Default: true.
     *
     * @return array|null    Returns an array made up of key-value pairs in the provided json string
     *                       or throws exception, if the provided json is not valid.
     * @throws InvalidArgumentException
     */
    public static function decodeJson($json, string $name, bool $associative = true): ?array
    {
        if (is_null($json) || (is_array($json) && (!$associative || self::isAssociative($json)))) {
            return $json;
        }
        if ($json instanceof stdClass) {
            $json = json_encode($json);
        }
        if (is_string($json)) {
            $decoded = json_decode($json, true);
            if (is_array($decoded) && (!$associative || self::isAssociative($decoded))) {
                return $decoded;
            }
        }
        throw new InvalidArgumentException("Invalid json value for argument: '$name'");
    }

    /**
     * Decodes a valid jsonArray string into an array to send in Api calls.
     *
     * @param  mixed  $json   Must be null or array or a valid string jsonArray to be translated into a php array.
     * @param  string $name   Name of the argument whose value is being validated in $json parameter.
     * @param  bool   $asMap  Should decode as map? Default: false.
     *
     * @return array|null    Returns an array made up of key-value pairs in the provided jsonArray string
     *                       or throws exception, if the provided json is not valid.
     * @throws InvalidArgumentException
     */
    public static function decodeJsonArray($json, string $name, bool $asMap = false): ?array
    {
        $decoded = self::decodeJson($json, $name, false);
        if (is_null($decoded)) {
            return null;
        }
        $isAssociative = self::isAssociative($decoded);
        if (($asMap && $isAssociative) || (!$asMap && !$isAssociative)) {
            foreach ($decoded as $value) {
                if (!is_array($value) || !self::isAssociative($value)) {
                    throw new InvalidArgumentException("Invalid json value for argument: '$name'");
                }
            }
            return $decoded;
        }
        $type = $asMap ? 'map' : 'array';
        throw new InvalidArgumentException("Invalid json $type value for argument: '$name'");
    }

    /**
     * Check if an array isAssociative (has string keys)
     *
     * @param  array   $arr   A valid array
     *
     * @return boolean        True if the array is Associative, false if it is Indexed
     */
    private static function isAssociative(array $arr): bool
    {
        foreach ($arr as $key => $value) {
            if (is_string($key)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Prepare a model for form encoding.
     *
     * @param JsonSerializable|null $model  A valid instance of JsonSerializable.
     *
     * @return array|null  The model as a map of key value pairs.
     */
    public static function prepareFormFields(?JsonSerializable $model): ?array
    {
        if ($model == null) {
            return null;
        }
        $arr = $model->jsonSerialize();
        if ($arr instanceof stdClass) {
            return [];
        }
        foreach ($arr as $key => $value) {
            if ($value instanceof JsonSerializable) {
                $arr[$key] = static::prepareFormFields($value);
            } elseif (
                is_array($value) && !empty($value) && !static::isAssociative($value) &&
                $value[0] instanceof JsonSerializable
            ) {
                $temp = [];
                foreach ($value as $k => $v) {
                    $temp[$k] = static::prepareFormFields($v);
                }
                $arr[$key] = $temp;
            }
        }
        return $arr;
    }

    /**
     * Merge headers
     *
     * Header names are compared using case-insensitive comparison. This method
     * preserves the original header name. If the $newHeaders overrides an existing
     * header, then the new header name (with its casing) is used.
     */
    public static function mergeHeaders(array $headers, array $newHeaders): array
    {
        $headerKeys = [];

        // Create a map of lower-cased-header-name to original-header-names
        foreach ($headers as $headerName => $val) {
            $headerKeys[\strtolower($headerName)] = $headerName;
        }

        // Override headers with new values
        foreach ($newHeaders as $headerName => $headerValue) {
            $lowerCasedName = \strtolower($headerName);
            if (isset($headerKeys[$lowerCasedName])) {
                unset($headers[$headerKeys[$lowerCasedName]]);
            }
            $headerKeys[$lowerCasedName] = $headerName;
            $headers[$headerName] = $headerValue;
        }

        return $headers;
    }

    /**
     * Assert headers array is valid
     */
    public static function assertHeaders(array $headers): void
    {
        foreach ($headers as $header => $value) {
            // Validate header name (must be string, must use allowed chars)
            // Ref: https://tools.ietf.org/html/rfc7230#section-3.2
            if (!is_string($header)) {
                throw new \InvalidArgumentException(sprintf(
                    'Header name must be a string but %s provided.',
                    is_object($header) ? get_class($header) : gettype($header)
                ));
            }

            if (preg_match('/^[a-zA-Z0-9\'`#$%&*+.^_|~!-]+$/', $header) !== 1) {
                throw new \InvalidArgumentException(
                    sprintf(
                        '"%s" is not a valid header name.',
                        $header
                    )
                );
            }

            // Validate value (must be scalar)
            if (!is_scalar($value) || null === $value) {
                throw new \InvalidArgumentException(sprintf(
                    'Header value must be scalar but %s provided for header "%s".',
                    is_object($value) ? get_class($value) : gettype($value),
                    $header
                ));
            }
        }
    }
}
