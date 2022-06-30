<?php


namespace Mvigor\TradeApi\Contracts;


interface RequestInterface
{
    public function getMethodName();
    public function getResult(array $response);
    public function getParameters(): array;
    public function getApiPath();
    public function getRequestMethod();
}
