<?php 

namespace App\utils;

class ResponseMessage {
    public string $message;
    public string $type;
    public string $code;
    public Object $obj;

    public function __construct(
        $message = null, 
        $type = null, 
        $code = null, 
        $obj = null){

            $this->message = $message;
            $this->type = $type;
            $this->code = $code;
            $this->obj = $obj;
    }
}