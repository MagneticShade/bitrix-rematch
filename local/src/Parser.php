<?php

namespace App;

class Parser{

    protected string $data;
    private string $url;

    public function __construct(private string $target)
    {
        $this->url = $this->target;
    }

    protected function getData()
    {
        $cr = curl_init($this->url);
        curl_setopt($cr, CURLOPT_RETURNTRANSFER, true);
        $received = curl_exec($cr);
        curl_close($cr);
        $this->data = $received;
    }
}