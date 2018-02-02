<?php
   function ValidateEmail($email)
   {
      $pattern = '/^([0-9a-z]([-.\w]*[0-9a-z])*@(([0-9a-z])+([-\w]*[0-9a-z])*\.)+[a-z]{2,6})$/i';
      return preg_match($pattern, $email);
   }

   if ($_SERVER['REQUEST_METHOD'] == 'POST')
   {
      $mailto = 'error@tixac.az';
      $mailfrom = isset($_POST['email']) ? $_POST['email'] : $mailto;
      $subject = 'Contact Information';
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
      $body .= 'Content-Type: text/plain; charset=UTF-8'.$eol;
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
<title>Форма-Komek.Me:IT помощь!</title>
<meta name="generator" content="WYSIWYG Web Builder 8 - http://www.wysiwygwebbuilder.com">
<style type="text/css">
div#container
{
   width: 434px;
   position: relative;
   margin-top: 0px;
   margin-left: auto;
   margin-right: auto;
   text-align: left;
}
body
{
   text-align: center;
   margin: 0;
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
   color: #0000FF;
}
a:hover
{
   color: #376BAD;
   text-decoration: underline;
}
</style>
<style type="text/css">
#wb_Form1
{
   background-color: transparent;
   border: 0px #000000 none;
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
#Editbox1
{
   border: 1px #C0C0C0 solid;
   background-color: #FFFFFF;
   color :#000000;
   font-family: Tahoma;
   font-size: 13px;
   text-align: left;
   vertical-align: middle;
   -moz-box-shadow: 0px 0px 2px #000000;
   -webkit-box-shadow: 0px 0px 2px #000000;
   box-shadow: 0px 0px 2px #000000;
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
#Editbox2
{
   border: 1px #C0C0C0 solid;
   background-color: #FFFFFF;
   color :#000000;
   font-family: Tahoma;
   font-size: 13px;
   text-align: left;
   vertical-align: middle;
   -moz-box-shadow: 0px 0px 2px #000000;
   -webkit-box-shadow: 0px 0px 2px #000000;
   box-shadow: 0px 0px 2px #000000;
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
#TextArea1
{
   border: 1px #C0C0C0 solid;
   background-color: #FFFFFF;
   color :#000000;
   font-family: Tahoma;
   font-size: 13px;
   text-align: left   -moz-box-shadow: 0px 0px 2px #000000;
   -webkit-box-shadow: 0px 0px 2px #000000;
   box-shadow: 0px 0px 2px #000000;
;
}
#wb_Text10 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
}
#wb_Text10 div
{
   text-align: left;
}
#Editbox7
{
   border: 1px #C0C0C0 solid;
   background-color: #FFFFFF;
   color :#000000;
   font-family: Tahoma;
   font-size: 13px;
   text-align: left;
   vertical-align: middle;
   -moz-box-shadow: 0px 0px 2px #000000;
   -webkit-box-shadow: 0px 0px 2px #000000;
   box-shadow: 0px 0px 2px #000000;
}
#wb_Text16 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
}
#wb_Text16 div
{
   text-align: left;
}
#wb_Text18 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
}
#wb_Text18 div
{
   text-align: left;
}
#wb_Text19 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
}
#wb_Text19 div
{
   text-align: left;
}
#Button1
{
   color: #000000;
   font-family: Tahoma;
   font-size: 13px;
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
#wb_Text7 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
}
#wb_Text7 div
{
   text-align: left;
}
</style>
</head>
<body>
<div id="container">
<div id="wb_Form1" style="position:absolute;left:31px;top:17px;width:361px;height:416px;z-index:17;">
<form name="contact" method="post" action="<?php echo basename(__FILE__); ?>" enctype="multipart/form-data" accept-charset="UTF-8" id="Form1">
<div id="wb_Text3" style="position:absolute;left:19px;top:8px;width:84px;height:16px;z-index:0;text-align:left;">
<span style="color:#000000;font-family:Tahoma;font-size:13px;">Adi</span><span style="color:#000000;font-family:Arial;font-size:13px;">:</span></div>
<input type="text" id="Editbox1" style="position:absolute;left:139px;top:8px;width:198px;height:23px;line-height:23px;z-index:1;" name="name" value="" required="required" pattern="[A-Za-zÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ]*$">
<div id="wb_Text4" style="position:absolute;left:21px;top:39px;width:84px;height:16px;z-index:2;text-align:left;">
<span style="color:#000000;font-family:Tahoma;font-size:13px;">Email:</span></div>
<input type="email" id="Editbox2" style="position:absolute;left:139px;top:40px;width:198px;height:23px;line-height:23px;z-index:3;" name="email" value="" required="required">
<div id="wb_Text5" style="position:absolute;left:21px;top:79px;width:110px;height:16px;z-index:4;text-align:left;">
<span style="color:#000000;font-family:Tahoma;font-size:13px;">Səhv təsviri:</span></div>
<textarea name="problem" id="TextArea1" style="position:absolute;left:139px;top:81px;width:198px;height:138px;z-index:5;" rows="7" cols="27" required="required" title="&#1055;&#1086;&#1078;&#1072;&#1083;&#1091;&#1081;&#1089;&#1090;&#1072;, &#1082;&#1086;&#1088;&#1086;&#1090;&#1082;&#1086; &#1086;&#1087;&#1080;&#1096;&#1080;&#1090;&#1077; &#1042;&#1072;&#1096;&#1091; &#1087;&#1088;&#1086;&#1073;&#1083;&#1077;&#1084;&#1091;."></textarea>
<div id="wb_Text10" style="position:absolute;left:22px;top:233px;width:98px;height:16px;z-index:6;text-align:left;">
<span style="color:#000000;font-family:Tahoma;font-size:13px;">Mobil nömrə</span></div>
<input type="number" id="Editbox7" style="position:absolute;left:138px;top:235px;width:198px;height:23px;line-height:23px;z-index:7;" name="mobile" value="" autocomplete="off">
<div id="wb_Text16" style="position:absolute;left:28px;top:276px;width:227px;height:16px;z-index:8;text-align:left;">
<span style="color:#000000;font-family:Tahoma;font-size:13px;">Sizinlə necə əlaqə saxlayaq?</span></div>
<div id="wb_Text18" style="position:absolute;left:41px;top:314px;width:84px;height:16px;z-index:9;text-align:left;">
<span style="color:#000000;font-family:Tahoma;font-size:13px;">E-mail</span></div>
<input type="radio" id="RadioButton5" name="q[2]" value="on_E-mail" checked style="position:absolute;left:203px;top:313px;z-index:10;">
<div id="wb_Text19" style="position:absolute;left:40px;top:339px;width:152px;height:18px;z-index:11;text-align:left;">
<span style="color:#000000;font-family:Tahoma;font-size:13px;">Mobil nömrəynə<br></span></div>
<input type="radio" id="RadioButton6" name="q[2]" value="on_Mobile_Phone" style="position:absolute;left:203px;top:338px;z-index:12;">
<input type="submit" id="Button1" name="" value="Göndər" style="position:absolute;left:126px;top:376px;width:96px;height:25px;z-index:13;">
<div id="wb_Text1" style="position:absolute;left:345px;top:7px;width:12px;height:16px;z-index:14;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">*</span></div>
<div id="wb_Text2" style="position:absolute;left:345px;top:40px;width:12px;height:16px;z-index:15;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">*</span></div>
<div id="wb_Text7" style="position:absolute;left:345px;top:79px;width:12px;height:16px;z-index:16;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">*</span></div>
</form>
</div>
</div>
</body>
</html>