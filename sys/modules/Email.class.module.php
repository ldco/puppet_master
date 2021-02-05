<?php

declare(strict_types=1);

use sys\Controller\DB;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require PM_ROOT . "vendor/phpmailer/phpmailer/src/Exception.php";
require PM_ROOT . "vendor/phpmailer/phpmailer/src/PHPMailer.php";
require PM_ROOT . "vendor/phpmailer/phpmailer/src/SMTP.php";
require_once PM_SYS . "Model/startup.model.php";
require_once PM_SYS . "Controller/DB.class.ctrl.php";
require_once  PM_HELPER . "path2url.fun.php";

require_once (dirname($_SERVER['DOCUMENT_ROOT'], 1)) . "/config.ini.php";


class Email
{
    public $Username = PM_MAIN_GMAIL_USER; //
    public $Password = PM_MAIN_GMAIL_PASS;
    public $Host = "smtp.gmail.com";
    public $Port = "587"; //465
    public $SMTPDebug = 0;
    public $SMTPAuth = true;
    public $SMTPSecure = "tls";
    public $IsHTML = true;
    public $Subject = "";
    public $Body = "Message";
    public $setFrom = null;  //From who
    public $addAddress = [PM_MAIN_GMAIL_USER]; // Add a recipient
    public $addReplyTo = null;
    public $addCC = null;
    public $addBCC = null;
    public $addAttachment = null; // Add attachments
    private $LocationSuccess = PM_SYS . "SysInfo/mailSuccess.php";
    private $LocationUnSuccess = PM_SYS . "SysInfo/mailUnSuccess.php";

    function make()
    {
        $mail = new PHPMailer(true);

        //debug output
        $mail->SMTPDebug = $this->SMTPDebug;
        //encode
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';
        //Server settings
        $mail->isSMTP(); //Send using SMTP
        $mail->Host = $this->Host;  //Set the SMTP server to send through
        $mail->SMTPAuth = $this->SMTPAuth;  //Enable SMTP authentication
        $mail->SMTPSecure = $this->SMTPSecure; //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port = $this->Port; //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        //sender
        $mail->Username = $this->Username; // SMTP username
        $mail->Password = $this->Password; // SMTP password
        $mail->setFrom($this->Username);
        //Recipients
        foreach ($this->addAddress as $key => $value) {
            $mail->addAddress($value);  // Add a recipient
        }

        $mail->addReplyTo($this->Username);
        if ($this->addCC) {
            $mail->addCC($this->addCC);
        }
        if ($this->addBCC) {
            $mail->addBCC($this->addBCC);
        }
        // Attachments
        if ($this->addAttachment) {
            foreach ($this->addAttachment as $key => $value) {
                $mail->addAttachment($this->addAttachment); // Add attachments
            }
        }

        // Content
        $mail->IsHTML($this->IsHTML); // Set email format to HTML
        $mail->Subject = $this->Subject;
        $mail->Body = $this->Body;
        $mail->AltBody = $this->Body;

        if ($this->SMTPDebug === 0) {

            if ($mail->Send()) {
                require_once $this->LocationUnSuccess;
            } else {
                require_once $this->LocationSuccess;
            }
        } else {
            if (!$mail->Send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
                echo "The mail has been sent successfully";
            }
        }
    }
}
