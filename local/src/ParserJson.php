<?php

namespace App;

use App\Parser;

class ParserJson extends Parser
{
    public function __construct($new_target)
    {
        parent::__construct($new_target);
        $this->getData();
    }
    public function process():array
    {
        return json_decode($this->data, true);
    }
}