<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}

use Bitrix\Landing\Assets;
use Bitrix\Main\Loader;
use Bitrix\Main\UI\Extension;

/** @var \CMain $APPLICATION */

if (!Loader::includeModule('landing'))
{
	return;
}

$assets = Assets\Manager::getInstance();
$assets->addAsset('landing_auto_font_scale');

$APPLICATION->ShowProperty('FooterJS');
?>

</main>
<?php $APPLICATION->ShowProperty('BeforeBodyClose');?>

<?php if (\Bitrix\Landing\Connector\Mobile::isMobileHit()):
	Extension::load(['mobile_tools']);
	?>
<script>

	if (typeof BXMPage !== 'undefined')
	{
		BXMPage.TopBar.title.setText('<?= htmlspecialcharsback($APPLICATION->getTitle());?>');
		BXMPage.TopBar.title.show();
	}

	document.addEventListener('DOMContentLoaded', function ()
	{
		BX.bindDelegate(document.body, 'click', {tagName: 'A'}, function (event)
		{
			if (this.hostname === document.location.hostname)
			{
				let func = BX.MobileTools.resolveOpenFunction(this.href);

				if (func)
				{
					func();
					return BX.PreventDefault(event);
				}
			}
		});
	}, false);
</script>
<?php endif?>
<footer class="footer py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2023</div>
            <div class="col-lg-4 my-3 my-lg-0">
                <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
            </div>
        </div>
    </div>
</footer>
<script src="<?=SITE_TEMPLATE_PATH?>/js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>
