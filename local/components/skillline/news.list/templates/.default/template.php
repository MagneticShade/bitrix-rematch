<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<section class="page-section bg-light" id="team">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase"><?=$arResult["NAME"]?></h2>
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
        <div class="row">
<?foreach($arResult["ITEMS"] as $arItem):?>
    <div class="col-lg-4">
        <div class="team-member">
            <img class="mx-auto rounded-circle" src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="..." />
            <h4><?=$arItem['NAME']?></h4>
            <p class="text-muted"><?=$arItem['PREVIEW_TEXT']?></p>
            <a class="btn btn-dark btn-social mx-2" href="<?=$arItem["DISPLAY_PROPERTIES"]["twitter_url"]["VALUE"]?>" aria-label="Parveen Anand Twitter Profile"><i class="fab fa-twitter"></i></a>
            <a class="btn btn-dark btn-social mx-2" href="<?=$arItem["DISPLAY_PROPERTIES"]["facebook_url"]["VALUE"]?>" aria-label="Parveen Anand Facebook Profile"><i class="fab fa-facebook-f"></i></a>
            <a class="btn btn-dark btn-social mx-2" href="<?=$arItem["DISPLAY_PROPERTIES"]["linkedin_url"]["VALUE"]?>" aria-label="Parveen Anand LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
        </div>
    </div>

<?endforeach;?>
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p></div>
        </div>
    </div>
</section>




