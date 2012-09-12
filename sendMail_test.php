<?php 
/*
vmailer test
*/
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

include_once 'vmailer.class.php';
$error = 2; 

if(isset($_REQUEST['send_ok'])){

  $mailto = "vachavarro@gmail.com";


  $mailsender = $_REQUEST['email'];
  $title = $_REQUEST['subject'];
  $message = $_POST['fullText'];


  
  $response_vmailer = new vmailer($mailto,$mailsender,$title,$message);
  if((!$response_vmailer->return) || ($response_vmailer->return == 0))
  {
    $error = 1;
  }
  else{
    $error = 0;
  }
}
?>
<html>
<head>
<title>Test form</title>
<script type="text/javascript">
  
</script>
</head>
<body>
<div id="content-about">
<div id="contact_area">

  <div id="error_area">
    <?php 
      switch ($error) {
        case 0:
          echo "se envio el correo";
          break;
        case 1:
          echo "Error al enviar el mail";
          break;
        default:
          echo "Entro al formulario";
          break;
      }
 
    ?>
  </div>

         <div id="form-area">
           <form method="post" action="sendMail_test.php">
             <div id="form-area2">
               <input type="text" name="email" id="email" class="input_box" value="<* type your Email>" />
               <br />
               <input type="text" name="subject" id="subject" class="input_box" value="<Subject>"  />
               <br />
               <textarea name="fullText" rows="20" cols="20" id="fullText" class="textarea"  > <* Message ></textarea>
               <br />
               <input type="submit" class="submit_mail_buttom" value="ENVIAR" id="submit" name="submit" />
              <br />
              <label class="label-contact">Must fill all the spaces with *</label>
               <input type="hidden" value="1" id="send_ok" name="send_ok" />
              </div>
           </form>
        </div>
   </div>
</div>

</body>
</html>