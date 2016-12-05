<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
    $avatarURL = new Typecho_Widget_Helper_Form_Element_Text('avatarURL', NULL, NULL, _t('Avatar URL'), _t(''));
    $form->addInput($avatarURL);
    $analyticsCode = new Typecho_Widget_Helper_Form_Element_Text('analyticsCode', NULL, NULL, _t('Analytics Code'), _t('Showing in footer'));
    $form->addInput($analyticsCode);
    
}