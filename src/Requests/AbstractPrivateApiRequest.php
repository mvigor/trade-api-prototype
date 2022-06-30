<?php


namespace Mvigor\TradeApi\Requests;


use Mvigor\TradeApi\Contracts\RequestInterface;

abstract class AbstractPrivateApiRequest extends AbstractRequest implements RequestInterface
{
    protected $id;
    protected $key;

    public function setAuthData($id, $key){
        $this->id = $id;
        $this->key = $key;
        return $this;
    }

    public function getSerializedParameters(): String {
        $this->params = array_merge( $this->params ?? [],
            [ 'ts' => round(microtime(true) * 1000) ]);
        return json_encode( $this->params );
    }

    public function getSignature(): string
    {
        return hash_hmac('sha256', $this->getMethodName() . $this->getSerializedParameters(), $this->key);
    }

    public function getHeader(): array
    {
        return [
            'API-ID' => $this->id,
            'API-SIGN' => $this->getSignature()
        ];
    }

}
