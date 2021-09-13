<?php
 $filename = 'author.doc';
 header("Content-type: application/vnd.ms-word");
 header( "Content-Disposition: attachment; filename=".basename($filename));
 header( "Content-Description: File Transfer");
 @readfile($filename);
 $content = '<html xmlns:v="urn:schemas-microsoft-com:vml" '
 .'xmlns:o="urn:schemas-microsoft-com:office:office" '
 .'xmlns:w="urn:schemas-microsoft-com:office:word" '
 .'xmlns:m="http://schemas.microsoft.com/office/2004/12/omml"= '
 .'xmlns="http://www.w3.org/TR/REC-html40">'
 .'<head><meta http-equiv="ContentType" content="text/html; charset=Windows1252">'
 .'<title></title>'
 .'<!--[if gte mso 9]>'
 .'<xml>'
 .'<w:WordDocument>'
 .'<w:View>Print'
 .'<w:Zoom>100'
 .'<w:DoNotOptimizeForBrowser/>'
 .'</w:WordDocument>'
 .'</xml>'
 .'<![endif]-->'
 .'<style>
 @page
 {
 font-family: Arial;
 size:215.9mm 279.4mm; /* A4 */
39
 margin:14.2mm 17.5mm 14.2mm 16mm; /* Margins: 2.5 cm on each
side */
 }
 h2 { font-family: Arial; font-size: 14px; text-align:center; }
 p.para {font-family: Arial; font-size: 12px; text-align: justify;}
 </style>'
 .'</head>'
 .'<body>'
 .'<h2>Tamara Pavlovic 175/18</h2><br/>'
 .'<p>Mladenovac, Serbia</p>'
 .'<p>Currently I am a student at The ICT College of Applied Studies - Internet Technologies. When I was a little girl I wanted to be many things when I grow up, but when I saw the beauty and creativity of Web Design, I instantly fell in love with it.</p>';
 echo $content;
?>