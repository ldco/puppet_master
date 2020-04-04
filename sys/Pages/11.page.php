<?php

declare(strict_types=1);

use sys\modules;

require PM_ROOT . PM_SYS_FOLDER . "/modules/Page.class.module.php";
require_once dirname(dirname(__FILE__), 2) . "/vendor/xlad/formr/class.formr.php";
require_once PM_ROOT . PM_SYS_FOLDER . "/Controller/DB.class.ctrl.php";


$page11 = new Page();
$page11->h(1);

$jsfun = '';


$form21 = new Formr();
$form21->action = htmlspecialchars('php_modules/mail.php');

echo $form21->form_open('inscript_form', 'inscript_form_1', '', '', 'onsubmit="' . $jsfun . '"');

$form21->required = 'name,mail';
$form21->required_indicator = '*';



$DB = new DB();
$result = $DB->queryRaw("SELECT * FROM pm_loc");

if ($result && ($row = $result->fetch_assoc())) {
} else {
    return;
}


echo $form21->input_text('name', $inscription_form_text['name'][PM_LANG], '', '', 'placeholder="' . $inscription_form_placehold['name'][PM_LANG] . '"');
echo $form21->input_email('mail', $inscription_form_text['mail'][PM_LANG], '', '', 'placeholder="' . $inscription_form_placehold['mail'][PM_LANG] . '"');
echo $form21->input_tel('tel', $inscription_form_text['tel'][PM_LANG], '', '', 'placeholder="' . $inscription_form_placehold['tel'][PM_LANG] . '"');

$form21r_options = array(
    $inscription_dropdown['logo'][PM_LANG],
    $inscription_dropdown['brand'][PM_LANG],
    $inscription_dropdown['vcard'][PM_LANG],
    $inscription_dropdown['archvise'][PM_LANG],
    $inscription_dropdown['wpage'][PM_LANG],
    $inscription_dropdown['wapp'][PM_LANG],
    $inscription_dropdown['dapp'][PM_LANG],
    $inscription_dropdown['mapp'][PM_LANG],
    $inscription_dropdown['font'][PM_LANG],
    $inscription_dropdown['ui'][PM_LANG],
    $inscription_dropdown['print'][PM_LANG],
    $inscription_dropdown['motion'][PM_LANG],
);

echo $form21->input_select('options', $inscription_desired[PM_LANG], '', '', '', '', $inscription_dropdown['brand'][PM_LANG], $form21r_options);

echo $form21->input_textarea('comments', $inscription_form_text['comments'][PM_LANG], '', 'rows="4"', 'placeholder="' . $inscription_form_placehold['comments'][PM_LANG] . '"');

$form21->html_purifier = $_SERVER['DOCUMENT_ROOT'] . 'vendor/masterjoa/htmlpurifier-standalone/src/HTMLPurifier.php';

echo $form21->input_submit('submitForm', '&nbsp;', $inscription_form_text['submit'][PM_LANG]);

echo $form21->form_close();


$page11->close();
