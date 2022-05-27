<?php

namespace DoocaCommerce\Integrator\Client;

use DoocaCommerce\Integrator\Providers\Requests\Request;
use DoocaCommerce\Integrator\Providers\Responses\Response;
use GuzzleHttp\Client;

class IntegratorClient
{
    private Client $client;

    public function __construct(
    ) {
        $this->client = new Client([
            'headers' => [
                'Content-Type' => 'application/json',
                'dc-source' => 'api',
            ],
            'base_uri' => env('INTEGRATOR_URI'),
        ]);
    }

    public static function create(): self
    {
        return new self();
    }

    public function send(Request $request): Response
    {
        $response = $this->client->request(
            method: $request->getMethod(),
            uri: $request->getPath(),
            options: [
                'body' => json_encode($request->getBody()),
                'headers' => $request->getHeader(),
            ],
        );

        return Response::from($response);
    }
}
