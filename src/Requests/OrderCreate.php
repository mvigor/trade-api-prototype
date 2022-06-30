<?php


namespace Mvigor\TradeApi\Requests;


use Mvigor\TradeApi\Contracts\RequestInterface;

class OrderCreate extends AbstractPrivateApiRequest implements RequestInterface
{

    public function getMethodName(): string
    {
        return 'order_create';
    }

    public function getResult(array $response): array
    {
        return $response;
    }

    public function getParameters(): array
    {
        return $this->params;
    }

    public function getApiPath(): string
    {
        return '/order_create';
    }

    public function getRequestMethod(): string
    {
        return 'POST';
    }
}
