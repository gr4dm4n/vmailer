<?php
/**
 * VIANCH SEND MAILS  Class
 *
 * @author Victor Chavarro {@link http://www.vianch.com Victor Chavarro (victor@vianch.com)}
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */


/**
 * if is active will print progress or errors
 */
define('DEBUG',false);

/* demo mode if is true simulates file uploads */
define('DEMO_MODE', false);

/*Regular expretion email validation*/
define( 'RE_MAIL' , '^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$' );

class vmailer{
   
   /**
	* mail who is sending the email
	* @access private
	* @var string
	*/
	private $mailsender;

   /**
	* mail address where the message arrives
	* @access private
	* @var string
	*/
	private $mailto = '';

   /**
	* Email title
	* @access private
	* @var string
	*/
	private $title;

   /**
	* Body of the access
	* @access private
	* @var string
	*/
	private $message;

	/**
     * print status on the Screen
     * @var bool
     * @access private
     */
	private $show_status = true;

	/**
	* Create a new class instance,
	* the params are $mailsender (mail who send the email),
	* $title (email title), $message (email message)
	*
	* @param string $mailsender
	* @param string $title
	* @param string $message
	*
	* @return bool
	*
	* @see __destruct()
	*/
	public function vmailer($mailto,$mailsender,$title,$message){

		$this->mailto = $mailto;
		$this->mailsender = $mailsender;
		$this->title = $title;
		$this->$message = $message;

		if(DEMO_MODE){
			$this->print_mail();
			$return_send = true;
		}
		else{
			$return_send = $this->send_mail();
		}	
		
		return $return_send;
	}

	/**
	* get mail info configuration
	* @param string json_on if is true return JSON if is false return ARRAY
	* @return json|array
	*/
	public function get_mail_info($json_on = false){
		$mail_info = array(
			'mailsender' => $this->mailsender,
			'title'      => $this->title,
			'message'	 => $this->message,
			'mailto'	 => $this->mailto
		);

		if($json_on){
			$mail_info = json_encode($mail_info);
		}
		
		return $mail_info;
	}
	/* Print mail info configuration */
	public function print_mail(){
			$mail_info = $this->get_mail_info(true);
			$this->printer($mail_info);	
	}

	private function send_mail(){

		if( ( $this->is_mail( $this->mailto ) ) && ( $this->is_mail( $this->mailto ) ) ){
			$information = "From: <".$this->mailsender.">";
			$send_mail = mail($this->mailto,$this->title,$this->message,$information);

			if(DEBUG){
				$this->print_mail();
		    }
		}
		else{
			$send_mail = false;
		}
		
		return $send_mail;
	}

	/**
	 * print any file on the screen
	 */
	private function printer($info){
		if(is_array($info)){
			print_r($info);	
		}
		else{
			echo $info;
		}
	}

	/**
	* Verify if a string is an email
	* @param string $email
	* @return bool
	*/
	private function is_mail($email){
		if(preg_match(RE_MAIL, $email))
		{
			return true;
		}
		else{
			return false;
		}
	}

	public function __destruct(){
		return true;
	}

}


?>