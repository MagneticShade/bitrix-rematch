<?php

namespace App;

use App\Parser;
use PHPHtmlParser\Dom;
class ParserHtml extends Parser
{
    public function __construct($new_target)
    {
        parent::__construct($new_target);
        $this->getData();
    }
    public function process():string
    {
        $dom = New Dom();
        $dom->loadStr($this->data);
        $domElements = $dom->find('.topic-body__content-text');
        $detail='';
        foreach($domElements as $element){
            $strippedText = strip_tags($element->innertext());
            $detail.= $strippedText;
        }
        return $detail;

    }
}