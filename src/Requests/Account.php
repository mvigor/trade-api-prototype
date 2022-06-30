<?php


namespace Mvigor\TradeApi\Requests;


use Mvigor\TradeApi\Contracts\RequestInterface;

class Account extends AbstractPrivateApiRequest implements RequestInterface
{

    public function getMethodName(): string
    {
        return 'account';
    }

    public function getApiPath(): string
    {
        return '/account';
    }

    public function getResult(array $response): array
    {
        return $response['balances'];
    }

    public function getParameters(): array
    {
        return $this->params;
    }

    public function getRequestMethod(): string
    {
        return 'POST';
    }
}
