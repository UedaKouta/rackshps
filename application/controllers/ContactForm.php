<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContactForm extends CI_Controller {

	public function index()
	{
        

        $aaa = '連携されました';

	        $header = $this->load->view('parts/header');

        $this->load->view('contact', $data = array(

	        'header' => $header,
	        	        'aaa' => $aaa,
        
        ));
        $this->load->view('parts/footer');
		//$this->load->view('welcome_message');
	}

	public function sendMail()
	{

	        $header = $this->load->view('parts/header');

			mb_language("Japanese");
			mb_internal_encoding("UTF-8");
 
			$name = $_POST['name'];
			$to ='ueda.racksoscar@pep.ne.jp';
			$title = "お問い合わせメール";
			$address = $_POST['address'];
			$tel = $_POST['tel'];
			$prefectures = $_POST['prefectures'];
		
			$content =  $name."\n";
			$content .= $prefectures.$address."\n";
		
			$content .= $tel."\n";
			$content .= $_POST['content'];

 //mb_send_mail($to, $title, $content, $from);
			
 $header = "MIME-Version: 1.0\n";
 $header .= "Content-Transfer-Encoding: 7bit\n";
 $header .= "Content-Type: text/plain; charset=ISO-2022-JP\n";
 $header .= "Message-Id: <" . md5(uniqid(microtime())) . "@pep.ne.jp>\n";
 $header .= "from: ueda.racksoscar@pep.ne.jp\n";
 $header .= "Reply-To: ueda.racksoscar@pep.ne.jp\n";
 $header .= "Return-Path:ueda.racksoscar@pep.ne.jp\n";
 $header .= "X-Mailer: PHP/". phpversion();
  
//  mb_send_mail(【toのメールアドレス】, $subject, $body, $header, "-f 【メールアドレス】");

 if(mb_send_mail($to, $title, $content, $header, "-f ueda.racksoscar@pep.ne.jp")){
				echo "メールを送信しました";
			} else {
				echo "メールの送信に失敗しました";
			}

        $this->load->view('welcome_message', $data = array(

	        'header' => $header,
	     
        
        ));
        $this->load->view('parts/footer');
		//$this->load->view('welcome_message');

	}


}
