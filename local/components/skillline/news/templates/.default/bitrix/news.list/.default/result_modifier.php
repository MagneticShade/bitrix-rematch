<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
{
	die();
}
/** @var array $arResult */

if(count($arResult["ITEMS"])>0){
  foreach ($arResult["ITEMS"] as &$arItem){
      if (strlen($arItem["DETAIL_TEXT"])>130){
          $arItem["DETAIL_TEXT_SHORT"] = mb_substr($arItem["DETAIL_TEXT"], 0, 130);
          $arItem["DETAIL_TEXT_SHORT"].='...';
      }
  }
}
?>
