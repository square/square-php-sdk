<?php
namespace Square\Tests\Integration;

use PHPUnit\Framework\TestCase;
use Square\Exceptions\SquareApiException;
use Square\Types\Error;
use Square\Types\ErrorCategory;
use Square\Types\ErrorCode;

class SquareApiExceptionTest extends TestCase
{
    public function testExceptionWithoutBody(): void
    {
        $exception = new SquareApiException('Message', 400, null);

        $this->assertEquals("Message\nStatus code: 400", $exception->getMessage());
        $this->assertEquals(400, $exception->getStatusCode());
        $this->assertCount(1, $exception->getErrors());
        $this->assertInstanceOf(Error::class, $exception->getErrors()[0]);
        $this->assertEquals('Unknown', $exception->getErrors()[0]->getCode());
        $this->assertEquals('API_ERROR', $exception->getErrors()[0]->getCategory());
        $this->assertEquals(null, $exception->getErrors()[0]->getField());
        $this->assertEquals(null, $exception->getErrors()[0]->getDetail());
    }

    public function testExceptionWithV1Error(): void
    {
        $errorString = '{
            "type": "INVALID_REQUEST",
            "message": "Invalid field value",
            "field": "customer_id"
        }';
        $exception = new SquareApiException('Message', 400, $errorString);

        $this->assertEquals("Message\nStatus code: 400\nBody: $errorString", $exception->getMessage());
        $this->assertEquals(400, $exception->getStatusCode());
        $this->assertCount(1, $exception->getErrors());
        $this->assertInstanceOf(Error::class, $exception->getErrors()[0]);
        $this->assertEquals('INVALID_REQUEST', $exception->getErrors()[0]->getCode());
        $this->assertEquals('API_ERROR', $exception->getErrors()[0]->getCategory());
        $this->assertEquals('customer_id', $exception->getErrors()[0]->getField());
        $this->assertEquals('Invalid field value', $exception->getErrors()[0]->getDetail());
    }

    public function testExceptionWithV1ErrorWithoutType(): void
    {
        $errorString = '{
            "message": "Invalid field value",
            "field": "customer_id"
        }';
        $exception = new SquareApiException('Message', 400, $errorString);

        $this->assertEquals("Message\nStatus code: 400\nBody: $errorString", $exception->getMessage());
        $this->assertEquals(400, $exception->getStatusCode());
        $this->assertCount(1, $exception->getErrors());
        $this->assertInstanceOf(Error::class, $exception->getErrors()[0]);
        $this->assertEquals('Unknown', $exception->getErrors()[0]->getCode());
        $this->assertEquals('API_ERROR', $exception->getErrors()[0]->getCategory());
        $this->assertEquals('customer_id', $exception->getErrors()[0]->getField());
        $this->assertEquals('Invalid field value', $exception->getErrors()[0]->getDetail());
    }

    public function testExceptionWithV2Error(): void
    {
        $errorString = '{ "errors": [{
            "category": "'.  ErrorCategory::ApiError->value .'",
            "code": "'. ErrorCode::BadRequest->value .'",
            "detail": "Invalid input",
            "field": "email"
        }]}';
        $exception = new SquareApiException('Message', 400, $errorString);

        $this->assertEquals("Message\nStatus code: 400\nBody: $errorString", $exception->getMessage());
        $this->assertEquals(400, $exception->getStatusCode());
        $this->assertCount(1, $exception->getErrors());
        $this->assertInstanceOf(Error::class, $exception->getErrors()[0]);
        $this->assertEquals(ErrorCategory::ApiError->value, $exception->getErrors()[0]->getCategory());
        $this->assertEquals(ErrorCode::BadRequest->value, $exception->getErrors()[0]->getCode());
        $this->assertEquals('Invalid input', $exception->getErrors()[0]->getDetail());
        $this->assertEquals('email', $exception->getErrors()[0]->getField());
    }

    public function testExceptionWithV2ErrorAsArray(): void
    {
        $errors = [
            'errors' => [[
                'category' => ErrorCategory::ApiError->value,
                'code' => ErrorCode::BadRequest->value,
                'detail' => 'Invalid input',
                'field' => 'email'
            ]]
        ];
        $exception = new SquareApiException('Message', 400,  $errors);

        $this->assertEquals("Message\nStatus code: 400\nBody: {" . '
    "errors": [
        {
            "category": "API_ERROR",
            "code": "BAD_REQUEST",
            "detail": "Invalid input",
            "field": "email"
        }
    ]
}', $exception->getMessage());

        $this->assertEquals(400, $exception->getStatusCode());
        $this->assertCount(1, $exception->getErrors());
        $this->assertInstanceOf(Error::class, $exception->getErrors()[0]);
        $this->assertEquals(ErrorCategory::ApiError->value, $exception->getErrors()[0]->getCategory());
        $this->assertEquals(ErrorCode::BadRequest->value, $exception->getErrors()[0]->getCode());
        $this->assertEquals('Invalid input', $exception->getErrors()[0]->getDetail());
        $this->assertEquals('email', $exception->getErrors()[0]->getField());
    }

    public function testExceptionWithV2ErrorAsObject(): void
    {
        $errors = (object)[
            'errors' => [(object)[
                'category' => ErrorCategory::ApiError->value,
                'code' => ErrorCode::BadRequest->value,
                'detail' => 'Invalid input',
                'field' => 'email'
            ]]
        ];
        $exception = new SquareApiException('Message', 400,  $errors);

        $this->assertEquals("Message\nStatus code: 400\nBody: {" . '
    "errors": [
        {
            "category": "API_ERROR",
            "code": "BAD_REQUEST",
            "detail": "Invalid input",
            "field": "email"
        }
    ]
}', $exception->getMessage());

        $this->assertEquals(400, $exception->getStatusCode());
        $this->assertCount(1, $exception->getErrors());
        $this->assertInstanceOf(Error::class, $exception->getErrors()[0]);
        $this->assertEquals(ErrorCategory::ApiError->value, $exception->getErrors()[0]->getCategory());
        $this->assertEquals(ErrorCode::BadRequest->value, $exception->getErrors()[0]->getCode());
        $this->assertEquals('Invalid input', $exception->getErrors()[0]->getDetail());
        $this->assertEquals('email', $exception->getErrors()[0]->getField());
    }
}