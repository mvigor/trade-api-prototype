<?php

namespace Mvigor\TradeApi;


use Exception;
use JsonException;
use Mvigor\TradeApi\Contracts\RequestInterface;

class Response
{
    private $result;
    private $error = null;

    public function __construct(string $data, protected RequestInterface $request){

        try {
            $this->result = json_decode($data, true, flags: JSON_THROW_ON_ERROR);
        } catch (JsonException $exception) {
            $this->error = $exception->getMessage();
            throw new Exception($exception->getMessage());
        }

        if( ( $this->result['success'] ?? false )  === false ){
            $this->error = $this->result['error']['code'];
            throw new Exception($this->result['error']['code']);
        }
    }

    public function hasError(){
        return $this->error !== null;
    }

    public function getError(){
        return $this->error;
    }

    public function getData(){
        if($this->hasError()) return null;
        return $this->request->getResult( $this->result );
    }

}
