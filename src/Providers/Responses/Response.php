<?php

namespace DoocaCommerce\Integrator\Providers\Responses;

use Psr\Http\Message\ResponseInterface;

class Response
{
    public mixed $data;

    public function __construct(
        protected ResponseInterface $response
    ) {
        $this->data = $response->getBody();
    }

    public static function from(ResponseInterface $response): self
    {
        return new self($response);
    }
}
