<?php

declare(strict_types=1);

use sys\modules;


require PM_ROOT . PM_SYS_FOLDER . "/modules/Page.class.module.php";
require_once dirname(dirname(__FILE__), 2) . "/vendor/xlad/formr/class.formr.php";
require_once PM_ROOT . PM_SYS_FOLDER . "/helpers/pmTranslate.fun.php";


$page11 = new Page();
$page11->h(1);

$form21jsfun = "form21jsFun();";



$form21_name = pmTranslate(PM_LANG, "name", false);
$form21_mail = pmTranslate(PM_LANG, "mail", false);
$form21_tel = pmTranslate(PM_LANG, "tel.", false);
$form21_com = pmTranslate(PM_LANG, "comments", false);
$form21_interest = pmTranslate(PM_LANG, "inetersted in", false);
$form21_submit = pmTranslate(PM_LANG, "submit", false);

$form21 = new Formr();
$form21->action = htmlspecialchars("mail.php");

echo $form21->form_open("inscript_form", "inscript_form_1", "", "", "onsubmit='$jsfun'");

$form21->required = "name,mail";
$form21->required_indicator = "*";


echo $form21->input_text("name", $form21_name, "", "", "placeholder='{$form21_name}'");
echo $form21->input_email("mail", $form21_mail, "", "", "placeholder='{$form21_mail}'");
echo $form21->input_tel("tel", $form21_tel, "", "", "placeholder='{$form21_tel}'");

/* $form21r_options = array(
     $inscription_dropdown["logo"][PM_LANG],
    $inscription_dropdown["brand"][PM_LANG],
    $inscription_dropdown["vcard"][PM_LANG],
    $inscription_dropdown["archvise"][PM_LANG],
    $inscription_dropdown["wpage"][PM_LANG],
    $inscription_dropdown["wapp"][PM_LANG],
    $inscription_dropdown["dapp"][PM_LANG],
    $inscription_dropdown["mapp"][PM_LANG],
    $inscription_dropdown["font"][PM_LANG],
    $inscription_dropdown["ui"][PM_LANG],
    $inscription_dropdown["print"][PM_LANG],
    $inscription_dropdown["motion"][PM_LANG],); */

/* echo $form21->input_select("options", $form21_interest, "", "", "", "", "", $form21r_options);
 */
echo $form21->input_textarea("comments", $form21_com, "", "rows='4'", "placeholder='$form21_com'");

$form21->html_purifier = $_SERVER["DOCUMENT_ROOT"] . "vendor/masterjoa/htmlpurifier-standalone/src/HTMLPurifier.php";

echo $form21->input_submit("submitForm", "&nbsp;", "$form21_submit");

echo $form21->form_close();


$page11->close();
