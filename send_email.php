<?php 
require_once "vendor/autoload.php";

    class SendEmail{

        public static function Sendmail($to, $subject, $content){
            $key = "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";
            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("namaronpc@gmail.com","Namar Ghani");
            $email->setSubject($subject);
            $email->addTo($to);
            $email->addContent($content);
            
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