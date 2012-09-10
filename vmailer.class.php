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
	public function vmailer($mailsender,$title,$message){

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
	* Set the email address to which the message is sent
	*
	* @param string $mailto
	*/
	public function set_mailto($mailto){
		$this->mailto = $mailto;
	}


	public function get_mail_info($print_info = false,$json_on = false){
		$mail_info = array(
			'mailsender' => $this->mailsender,
			'title'      => $this->title,
			'message'	 => $this->message,
			'mailto'	 => $this->mailto
		);

		if($json_on){
			$mail_info = json_encode($mail_info);
		}

		if(DEBUG){
			$this->printer($mail_info);	
		}
		
		return $mail_info;
	}

	public function print_mail(){
		/*code here*/
	}

	/**
	 * output when error happend,
	 * @param string
	 */
	public function exit_status($str){
		$this->printer(json_encode(array('status'=>$str)));
		exit;
	}

	/**
	 * Status showing status log
	 * @param string
	 */
	public function status($str){
		$status = json_encode(array('status'=>$str));
		if($this->show_status){
			$this->printer($status);
		}
		return $status;		
	}

	private function send_mail(){
		/*code here*/
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

	public function __destruct(){
		return true;
	}

}


?>