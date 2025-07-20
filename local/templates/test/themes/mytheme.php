<?php
$eventManager = \Bitrix\Main\EventManager::getInstance();
$eventManager->addEventHandler('landing', 'onGetThemeColors',
    function(\Bitrix\Main\Event $event)
    {
        $result = new \Bitrix\Main\Entity\EventResult;
        $colors = $event->getParameter('colors');
        $colors['mytheme'] = array(
            'name' => 'Моя тема',
            'color' => '#cdcdcd',
            'base' => true
        );
        $result->modifyFields(array(
            'colors' => $colors
        ));
        return $result;
    }
);
?>