<?php


namespace Mvigor\TradeApi\Requests;


use Mvigor\TradeApi\Contracts\RequestInterface;

class OrderStatus extends AbstractPrivateApiRequest implements RequestInterface
{

    public function getMethodName(): string
    {
        return 'order_status';
    }

    public function getResult(array $response)
    {
        return $response['order'];
    }

    public function getParameters(): array
    {
        return $this->params;
    }

    public function getApiPath()
    {
        return '/order_status';
    }

    public function getRequestMethod(): string
    {
        return 'POST';
    }

    public function setOrderId($orderId): OrderStatus {
        $this->params = [
            'order_id' => $orderId
        ];
        return $this;
    }

}
