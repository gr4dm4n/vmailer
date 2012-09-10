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
	private $mailto;

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

	public function vmailer($mailto,$title,$message){
		if(DEMO_MODE){
			/*code here*/
		}
		else{
			/*code here*/
		}

		if(DEBUG){
			/*code here*/	
		}		

	}

	public function set_mailsender(){
		/*code here*/
	}

	public function get_mail_info(){
		/*code here*/
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