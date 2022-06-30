<?php

require "./vendor/autoload.php";

use Mvigor\TradeApi\ApiClient;
use PHPUnit\Framework\TestCase;

class ApiTest extends TestCase
{
    const ID = "asdkljfhsdakfjhsdalkjfhsadlkfaas";
    const KEY = "mnbvcxnvbxczjvjhsdagfsdakjfhsdafhsdafkas";
    protected $apiClient;
    protected $stubHttpClient;
    protected function setUp(): void
    {
        $this->apiClient = new ApiClient(
            self::ID,
            self::KEY
        );

        parent::setUp();
    }


    public function testAccountGetMethod() {
        $request = $this->apiClient->Account();
        $this->assertEquals('account',$request->getMethodName());
    }


    public function testAccountAuthData() {
        $request = $this->apiClient->Account();
        $this->assertArrayHasKey('API-SIGN',$request->getHeader());
    }

    public function testCheckParameters() {
        $request = $this->apiClient->OrderStatus()->setOrderId(345);
        $this->assertEquals(['order_id' => 345],$request->getParameters());
    }

    public function testApiSendInfoRequest() {
        $request = $this->apiClient
                    ->Info()
                    ->setPair('BTC_USD');

        $result = $request->execute()->getData();
        $this->assertArrayHasKey('pairs', $result);
    }

    public function testApiSendAccountRequest() {
        $request = $this->apiClient
            ->Account();

        $result = $request->execute()->getData();

        $this->assertArrayHasKey("USD",$result);
    }
}
