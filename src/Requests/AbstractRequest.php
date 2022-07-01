<?php


namespace Mvigor\TradeApi\Requests;


use GuzzleHttp\ClientInterface;
use Mvigor\TradeApi\Contracts\RequestInterface;
use Mvigor\TradeApi\Response;

abstract class AbstractRequest implements RequestInterface
{
    protected array $params = [];

    abstract function getHeader(): array;

    public function __construct(protected ClientInterface $httClient, private string $apiUrl ){
    }

    public function getFullPath(): string {
        return $this->apiUrl . $this->getApiPath();
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
