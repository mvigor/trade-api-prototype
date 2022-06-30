<?php


namespace Mvigor\TradeApi\Requests;


use Mvigor\TradeApi\Contracts\RequestInterface;

class MyOrders extends AbstractPrivateApiRequest implements RequestInterface
{

    public function getMethodName(): string
    {
        return 'my_orders';
    }

    public function getResult(array $response)
    {
        return $response['items'];
    }

    public function getParameters(): array
    {
        return $this->params;
    }

    public function getApiPath(): string
    {
        return '/my_orders';
    }

    public function getRequestMethod(): string
    {
        return 'POST';
    }
}
