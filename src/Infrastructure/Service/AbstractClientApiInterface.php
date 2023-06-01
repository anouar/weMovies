<?php

namespace App\Infrastructure\Service;

interface AbstractClientApiInterface
{
    public function getResponseData(string $uri, array $requestedData): array;

    public function postData(string $uri, array $requestedData): array;
}
