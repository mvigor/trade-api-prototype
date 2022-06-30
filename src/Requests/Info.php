<?php


namespace Mvigor\TradeApi\Requests;


use Mvigor\TradeApi\Contracts\RequestInterface;

class Info extends AbstractPublicApiRequest implements RequestInterface

{

    public function setPair(string $pair): Info {
        $this->params = [
            'pair' => $pair
        ];
        return  $this;
    }

    public function getMethodName(): string
    {
        return 'info';
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
        return '/info';
    }

    public function getRequestMethod(): string
    {
        return empty($this->params) ? 'GET' : 'POST';
    }

}
