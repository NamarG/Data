<?php 
require_once "vendor/autoload.php";

    class SendEmail{

        public static function Sendmail($to, $subject, $content){
            $key = "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";
            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("namaronpc@gmail.com","Namar Ghani");
            $email->setSubject($subject);
            $email->addTo($to);
            $email->addContent("text/plain", $content);
            
            $sendgrid = new \SendGrid($key);

            try{
                $response = $sendgrid->send($email);
                return $response;
            }catch(Exception $e){
                echo "Email Exception Caught: ". $e->getMessage()."\n";
                return false;
            }
        }


    }

?>