<?php


namespace Mvigor\TradeApi\Requests;


use Mvigor\TradeApi\Contracts\RequestInterface;

class Orders extends AbstractPrivateApiRequest implements RequestInterface
{

    public function getMethodName(): string
    {
        return 'orders';
    }

    public function getResult(array $response)
    {
        return $response['pairs'];
    }

    public function getParameters(): array
    {
        return $this->params;
    }

    public function getApiPath(): string
    {
        return '/orders';
    }

    public function getRequestMethod(): string
    {
        return 'POST';
    }

}
