<?php

$usuario = $_POST['email'];

$pass= $_POST['pass'];

$salida = exec('py llave.py '.$pass);
echo "<pre>$salida</pre>";

$zip = new ZipArchive();
$filename = "./keys.zip";

if ($zip->open($filename, ZipArchive::CREATE)!==TRUE) {
    exit("cannot open <$filename>\n");
}
$zip->addFile("private" );
$zip->addFile("public.pub");

$fh = fopen('public.pub','r');
while ($line = fgets($fh)) {
  // <... Do your work with the line ...>
  echo($line(0));
}
fclose($fh);




?>






<?php

#$fichero = 'keys.zip';
/*
if (file_exists($fichero)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($fichero).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($fichero));
    readfile($fichero);
    exit;
}
*/


?>