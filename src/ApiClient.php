<?php


namespace Mvigor\TradeApi;


use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Mvigor\TradeApi\Requests\Account;
use Mvigor\TradeApi\Requests\Info;
use Mvigor\TradeApi\Requests\MyOrders;
use Mvigor\TradeApi\Requests\OrderCreate;
use Mvigor\TradeApi\Requests\Orders;
use Mvigor\TradeApi\Requests\OrderStatus;

class ApiClient
{
    protected ClientInterface $httpClient;
    public function __construct(protected String $id, protected String $key)
    {
        $this->httpClient = new Client();
    }

    public function Info(): Info {
        return new Info($this->httpClient);
    }

    public function Account(): Account {
        return (new Account($this->httpClient))
            ->setAuthData($this->id, $this->key);
    }

    public function MyOrders(): MyOrders {
        return (new MyOrders($this->httpClient))
            ->setAuthData($this->id, $this->key);
    }

    public function OrderCreate(): OrderCreate {
        return (new OrderCreate($this->httpClient))
            ->setAuthData($this->id, $this->key);
    }

    public function Orders(): Orders {
        return (new Orders($this->httpClient))
            ->setAuthData($this->id, $this->key);
    }

    public function OrderStatus(): OrderStatus {
        return (new OrderStatus($this->httpClient))
            ->setAuthData($this->id, $this->key);
    }

}
