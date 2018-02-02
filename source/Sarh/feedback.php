<?php
if (session_id() == "")
{
   session_start();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
   if (isset($_POST['captcha_code'],$_SESSION['random_txt']) && md5($_POST['captcha_code']) == $_SESSION['random_txt'])
   {
      unset($_POST['captcha_code'],$_SESSION['random_txt']);
   }
   else
   {
      $errorcode = file_get_contents('./er.html');
      $replace = "##error##";
      $errorcode = str_replace($replace, 'The entered code was wrong.', $errorcode);
      echo $errorcode;
      exit;
   }
}
?>
<?php
   function ValidateEmail($email)
   {
      $pattern = '/^([0-9a-z]([-.\w]*[0-9a-z])*@(([0-9a-z])+([-\w]*[0-9a-z])*\.)+[a-z]{2,6})$/i';
      return preg_match($pattern, $email);
   }

   if ($_SERVER['REQUEST_METHOD'] == 'POST')
   {
      $mailto = 'feedback@tixac.az';
      $mailfrom = isset($_POST['email']) ? $_POST['email'] : $mailto;
      $subject = 'Web Feedback';
      $message = 'Values submitted from web site form:';
      $success_url = './suc.html';
      $error_url = './er.html';
      $error = '';
      $eol = "\n";
      $max_filesize = isset($_POST['filesize']) ? $_POST['filesize'] * 1024 : 1024000;
      $boundary = md5(uniqid(time()));

      $header  = 'From: '.$mailfrom.$eol;
      $header .= 'Reply-To: '.$mailfrom.$eol;
      $header .= 'MIME-Version: 1.0'.$eol;
      $header .= 'Content-Type: multipart/mixed; boundary="'.$boundary.'"'.$eol;
      $header .= 'X-Mailer: PHP v'.phpversion().$eol;
      if (!ValidateEmail($mailfrom))
      {
         $error .= "The specified email address is invalid!\n<br>";
      }

      if (!empty($error))
      {
         $errorcode = file_get_contents($error_url);
         $replace = "##error##";
         $errorcode = str_replace($replace, $error, $errorcode);
         echo $errorcode;
         exit;
      }

      $internalfields = array ("submit", "reset", "send", "captcha_code");
      $message .= $eol;
      $message .= "IP Address : ";
      $message .= $_SERVER['REMOTE_ADDR'];
      $message .= $eol;
      foreach ($_POST as $key => $value)
      {
         if (!in_array(strtolower($key), $internalfields))
         {
            if (!is_array($value))
            {
               $message .= ucwords(str_replace("_", " ", $key)) . " : " . $value . $eol;
            }
            else
            {
               $message .= ucwords(str_replace("_", " ", $key)) . " : " . implode(",", $value) . $eol;
            }
         }
      }

      $body  = 'This is a multi-part message in MIME format.'.$eol.$eol;
      $body .= '--'.$boundary.$eol;
      $body .= 'Content-Type: text/plain; charset=ISO-8859-1'.$eol;
      $body .= 'Content-Transfer-Encoding: 8bit'.$eol;
      $body .= $eol.stripslashes($message).$eol;
      if (!empty($_FILES))
      {
          foreach ($_FILES as $key => $value)
          {
             if ($_FILES[$key]['error'] == 0 && $_FILES[$key]['size'] <= $max_filesize)
             {
                $body .= '--'.$boundary.$eol;
                $body .= 'Content-Type: '.$_FILES[$key]['type'].'; name='.$_FILES[$key]['name'].$eol;
                $body .= 'Content-Transfer-Encoding: base64'.$eol;
                $body .= 'Content-Disposition: attachment; filename='.$_FILES[$key]['name'].$eol;
                $body .= $eol.chunk_split(base64_encode(file_get_contents($_FILES[$key]['tmp_name']))).$eol;
             }
         }
      }
      $body .= '--'.$boundary.'--'.$eol;
      mail($mailto, $subject, $body, $header);
      header('Location: '.$success_url);
      exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Untitled Page</title>
<meta name="generator" content="WYSIWYG Web Builder 8 - http://www.wysiwygwebbuilder.com">
<style type="text/css">
body
{
   background-color: transparent;
   color: #000000;
}
</style>
<style type="text/css">
a
{
   color: #0000FF;
   text-decoration: underline;
}
a:visited
{
   color: #800080;
}
a:active
{
   color: #FF0000;
}
a:hover
{
   color: #0000FF;
   text-decoration: underline;
}
</style>
<style type="text/css">
#wb_Form1
{
   background-color: transparent;
   border: 0px #000000 none;
}
#wb_Text1 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
}
#wb_Text1 div
{
   text-align: left;
}
#Editbox1
{
   border: 1px #C0C0C0 solid;
   background-color: #FFFFFF;
   color :#000000;
   font-family: Arial;
   font-size: 13px;
   text-align: left;
   vertical-align: middle;
}
#wb_Text2 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
}
#wb_Text2 div
{
   text-align: left;
}
#Editbox2
{
   border: 1px #C0C0C0 solid;
   background-color: #FFFFFF;
   color :#000000;
   font-family: Arial;
   font-size: 13px;
   text-align: left;
   vertical-align: middle;
}
#wb_Text3 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
}
#wb_Text3 div
{
   text-align: left;
}
#Editbox3
{
   border: 1px #C0C0C0 solid;
   background-color: #FFFFFF;
   color :#000000;
   font-family: Arial;
   font-size: 13px;
   text-align: left;
   vertical-align: middle;
}
#wb_Text4 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
}
#wb_Text4 div
{
   text-align: left;
}
#TextArea1
{
   border: 1px #C0C0C0 solid;
   background-color: #FFFFFF;
   color :#000000;
   font-family: Arial;
   font-size: 13px;
   text-align: left;
}
#wb_Text5 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
}
#wb_Text5 div
{
   text-align: left;
}
#Captcha1Edit
{
   border: 1px #C0C0C0 solid;
   background-color: #FFFFFF;
   color :#000000;
   font-family: Arial;
   font-size: 13px;
   text-align: left;
   vertical-align: middle;
}
#Button1
{
   color: #000000;
   font-family: Tahoma;
   font-size: 13px;
}
</style>
</head>
<body>
<div id="wb_Form1" style="position:absolute;left:17px;top:30px;width:395px;height:311px;z-index:10;">
<form name="contact" method="post" action="<?php echo basename(__FILE__); ?>" enctype="multipart/form-data" id="Form1">
<div id="wb_Text1" style="position:absolute;left:10px;top:15px;width:87px;height:16px;z-index:0;text-align:left;">
<span style="color:#000000;font-family:Tahoma;font-size:13px;">Adi:</span></div>
<input type="text" id="Editbox1" style="position:absolute;left:107px;top:15px;width:198px;height:23px;line-height:23px;z-index:1;" name="name" value="">
<div id="wb_Text2" style="position:absolute;left:10px;top:45px;width:87px;height:16px;z-index:2;text-align:left;">
<span style="color:#000000;font-family:Tahoma;font-size:13px;">Email:</span></div>
<input type="text" id="Editbox2" style="position:absolute;left:107px;top:45px;width:198px;height:23px;line-height:23px;z-index:3;" name="email" value="">
<div id="wb_Text3" style="position:absolute;left:10px;top:75px;width:87px;height:16px;z-index:4;text-align:left;">
<span style="color:#000000;font-family:Tahoma;font-size:13px;">Mövzu:</span></div>
<input type="text" id="Editbox3" style="position:absolute;left:107px;top:75px;width:198px;height:23px;line-height:23px;z-index:5;" name="topic" value="">
<div id="wb_Text4" style="position:absolute;left:10px;top:105px;width:87px;height:16px;z-index:6;text-align:left;">
<span style="color:#000000;font-family:Tahoma;font-size:13px;">İsmarıc</span><span style="color:#000000;font-family:Arial;font-size:13px;">:</span></div>
<div id="wb_Text5" style="position:absolute;left:10px;top:222px;width:87px;height:32px;z-index:7;text-align:left;">
<span style="color:#000000;font-family:Tahoma;font-size:13px;">Məktublar daxil edin</span></div>
<div id="wb_Captcha1" style="position:absolute;left:105px;top:214px;width:198px;height:36px;z-index:8;">
<img src="captcha1.php" alt="Click for new image" title="Click for new image" style="cursor:pointer;width:100px;height:38px;" onclick="this.src='captcha1.php?'+Math.random()">
<input type="text" id="Captcha1Edit" style="position:absolute;left:105px;top:16px;width:98px;height:20px;line-height:20px;;" name="captcha_code" value=""></div>
<input type="submit" id="Button1" name="" value="Göndər" style="position:absolute;left:108px;top:272px;width:96px;height:25px;z-index:9;">
</form>
</div>
<textarea name="comments" id="TextArea1" style="position:absolute;left:124px;top:135px;width:277px;height:98px;z-index:11;" rows="5" cols="40"></textarea>
</body>
</html>