<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Главная");
?><?



//        $arSelect = Array("ID", "NAME","PREVIEW_TEXT","DETAIL_PICTURE","DETAIL_TEXT" );
//        $rsResCat = CIBlockElement::GetList(arSelectFields: $arSelect);
//        $arItems = array();
////        print_r($rsResCat);
//        while($arItemCat = $rsResCat->GetNext())
//        {
////            print_r($arItemCat);
//            $arItems[] = $arItemCat;
//        }
//
//        foreach($arItems as $item){
//            CIBlockElement::Delete($item["ID"]);
//        }
//
//$res = CIBlock::GetList(
//    Array(),
//    Array(
//        'SITE_ID'=>"s1",
//        'ACTIVE'=>'Y',
//        "CNT_ACTIVE"=>"Y",
//    ), true
//);
//while($ar_res = $res->Fetch())
//{
//    echo $ar_res['NAME'].': '.$ar_res['ELEMENT_CNT'];
//}
//
//?>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>