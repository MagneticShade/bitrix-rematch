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
        $parserHtml = new ParserHtml($value["url"]);
        $detail =$parserHtml->process();
        $value["detail"] = $detail;
    }
        foreach($main_page as $newEl){
            $params = Array(
                "max_len" => "75", // обрезает символьный код до 75 символов
                "change_case" => "L", // буквы преобразуются к нижнему регистру
                "replace_space" => "-", // меняем пробелы на нижнее подчеркивание
                "replace_other" => "-", // меняем левые символы на нижнее подчеркивание
                "delete_repeat_replace" => "true", // удаляем повторяющиеся нижние подчеркивания
            );
            $code = CUtil::translit($newEl["title"],"ru",$params);
            $el = new CIBlockElement();
            $el->Add(arFields: [
                "IBLOCK_ID" => 5,
                "ACTIVE" => 'Y',
                "NAME"=>$newEl["title"],
                "CODE" => $code,
                "PREVIEW_TEXT"=>$newEl["text_preview"],
                "DETAIL_PICTURE"=> CFile::MakeFileArray($newEl["image"]),
                "PREVIEW_PICTURE"=>CFile::MakeFileArray($newEl["image"]),
                "DETAIL_TEXT"=>$newEl["detail"],
                "PROPERTY_VALUES"=>array("SOURCE"=>$newEl["url"])
            ]);
            echo ($el->getLastError());
        }

    return "newsAgent();";
}

