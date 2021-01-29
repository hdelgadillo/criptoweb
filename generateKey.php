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
$file = file_get_contents('./public.pub');
  // <... Do your work with the line ...>
  $servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO usuarios (usuario, public)
VALUES ('$usuario', '$file')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

fclose($fh);




?>






<?php

$fichero = 'keys.zip';

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



?>