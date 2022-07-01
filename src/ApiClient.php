<?php


namespace Mvigor\TradeApi;


use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Mvigor\TradeApi\Requests\{
    Account,
    Info,
    MyOrders,
    OrderCreate,
    Orders,
    OrderStatus
};

class ApiClient
{
    protected ClientInterface $httpClient;
    public function __construct(
        private string $id,
        private string $key,
        private string $apiURL)
    {
        $this->httpClient = new Client();
    }

    public function Info(): Info {
        return new Info($this->httpClient, $this->apiURL);
    }

    public function Account(): Account {
        return (new Account($this->httpClient, $this->apiURL))
            ->setAuthData($this->id, $this->key);
    }

    public function MyOrders(): MyOrders {
        return (new MyOrders($this->httpClient, $this->apiURL))
            ->setAuthData($this->id, $this->key);
    }

    public function OrderCreate(): OrderCreate {
        return (new OrderCreate($this->httpClient, $this->apiURL))
            ->setAuthData($this->id, $this->key);
    }

    public function Orders(): Orders {
        return (new Orders($this->httpClient, $this->apiURL))
            ->setAuthData($this->id, $this->key);
    }

    public function OrderStatus(): OrderStatus {
        return (new OrderStatus($this->httpClient, $this->apiURL))
            ->setAuthData($this->id, $this->key);
    }

}
