<?php
//Third Working
 require 'PHPMailer/vendor/autoload.php'; // Include PHPMailer autoloader

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //echo "<pre>"; print_r($_POST); die;

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $prjct = $_POST['PROJECT'];
    $lcton = $_POST['LOCATION'];
      
    // Set the recipient EMAIL address
    // by akaskumar17@gmail.com
    $to = 'dedharohit46@gmail.com';
    

    // Set the email subject

   $email_content .= "<html><body><table width='400' border='1'>

  <tr>

    <td width='122'>Name</td>

    <td width='239'>".$name."</td>

  </tr>

  <tr>

    <td>Email</td>

    <td>".$email."</td>

  </tr>

    <tr>

    <td>Mobile</td>

    <td>".$phone."</td>

  </tr>

  <tr>

    <td>Project</td>

    <td>".$prjct."</td>

  </tr>

   <tr>

    <td>Location</td>

    <td>".$lcton."</td>

  </tr>

</table></body></html>
";

    try {

    $mail->SMTPSecure = "ssl";  
    $mail->Host='smtp.gmail.com';  
    $mail->Port='465';   
    $mail->Username   = 'fdrhomes7@gmail.com'; // SMTP account username
    $mail->Password   = 'ymzuxfloaglkmmuf';  
    $mail->SMTPKeepAlive = true;  
    $mail->Mailer = "smtp"; 
    $mail->IsSMTP(); // telling the class to use SMTP  
    $mail->SMTPAuth   = true;                  // enable SMTP authentication  
    $mail->CharSet = 'utf-8';  
    $mail->SMTPDebug  = 0;
    $mail->setFrom($email, $name);
    $mail->addAddress($to);
    $mail->isHTML(true);     
    $mail->Subject = $prjct;
    $mail->Body = $email_content;

    $mail->send();
     ?>
     <script language="javascript">
  alert('Thank you for inquiring with us.We will get back to you shortly!');
  document.location="thanks.html";
</script>
<?php } catch (Exception $e) {
  ?>
   <script language="javascript">

  alert("Invalid Information !");
  document.location="http://newlaunch-gurgaon.com";
</script>
  <?php
}
}




?>