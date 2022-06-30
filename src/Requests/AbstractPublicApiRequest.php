<?php


namespace Mvigor\TradeApi\Requests;

use Mvigor\TradeApi\Contracts\RequestInterface;

abstract class AbstractPublicApiRequest extends AbstractRequest implements RequestInterface
{
    public function getHeader(): array {
        return [];
    }
}
