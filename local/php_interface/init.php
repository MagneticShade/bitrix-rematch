<?php
require __DIR__ . '/vendor/autoload.php';

use App\ParserHtml;
use App\ParserJson;
\Bitrix\Main\Loader::includeModule('iblock');

function newsAgent()
{
    $parserJson = new ParserJson("https://lenta.ru/search/v2/process?query=McDonalds&from=0&size=10&sort=2&title_only=0&domain=1&modified%2Cformat=yyyy-MM-dd");
    $data = $parserJson->process();
    $main_page=[];

    foreach($data["matches"] as  $value){
        array_push($main_page,array("url"=>$value["url"],"title"=>$value["title"],"image"=>$value["image_url"],"text_preview"=>strip_tags($value["snippet"])));
    }


    foreach($main_page as &$value){
        $parserHtml = new ParserHtml($main_page[0]["url"]);
        $detail =$parserHtml->process();
        $value["detail"] = $detail;
    }

    foreach($main_page as $newEl){
        $el = new CIBlockElement();
        $el->Add(arFields: ["IBLOCK_ID" => 2,
            "ACTIVE" => 'Y',"NAME"=>$newEl["title"],
            "PREVIEW_TEXT"=>$newEl["snippet"],
            "PREVIEW_IMAGE"=>$newEl["image_url"],
            "DETAIL_IMAGE"=>$newEl["image_url"],
            "DETAIL_TEXT"=>$newEl["detail"]]);
    }
    return "newsAgent();";
}

