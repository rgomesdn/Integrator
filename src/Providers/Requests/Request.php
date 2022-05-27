<?php

namespace DoocaCommerce\Integrator\Providers\Requests;

interface Request
{
    public function getMethod(): string;
    public function getPath(): string;
    public function getBody(): array;
    public function getHeader(): array;
}