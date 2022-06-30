<?php


namespace Mvigor\TradeApi\Requests;


use GuzzleHttp\ClientInterface;
use Mvigor\TradeApi\Contracts\RequestInterface;
use Mvigor\TradeApi\Response;

abstract class AbstractRequest implements RequestInterface
{
    protected array $params = [];
    const API_URL = "https://payeer.com/api/trade";

    abstract function getHeader(): array;

    public function __construct(protected ClientInterface $httClient){
    }

    public function getFullPath(): string {
        return self::API_URL . $this->getApiPath();
    }

    public function execute(): Response {
        $response = $this->httClient->request(
            $this->getRequestMethod(),
            $this->getFullPath(),
            [
                'headers' => $this->getHeader(),
                'json' => $this->getParameters(),
            ]
        );
        return new Response($response->getBody()->getContents(), $this);
    }

}
