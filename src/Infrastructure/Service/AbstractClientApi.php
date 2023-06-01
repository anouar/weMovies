<?php

namespace App\Infrastructure\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class AbstractClientApi implements AbstractClientApiInterface
{
    public function __construct(
        private readonly HttpClientInterface $abstractApiClient
    ) {
    }


    public function getResponseData(string $uri, array $requestedData = []): array
    {
        return $this->abstractApiClient->request('GET', $uri, ['query' => $requestedData])->toArray();
    }


    public function postData(string $uri, array $requestedData): array
    {
        return $this->abstractApiClient->request('POST', $uri, ['query' => $requestedData])->toArray();
    }
}
