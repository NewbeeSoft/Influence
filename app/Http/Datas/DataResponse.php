<?php

namespace App\Http\Datas;

class DataResponse
{
    public $state;
    public $data;
    public $message;

    public function __construct($state, $data, $message)
    {
        $this->state = $state;
        $this->data = $data;
        $this->message = $message;
    }
}
