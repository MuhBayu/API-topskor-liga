<?php
// ---------------------------------------
// API Cek Top Skor Liga
// Get API-KEy? --> http://bayuu.net/api/
// ---------------------------------------

function customError($errno, $errstr) {
    header('Content-type: application/json');
    $output['status']       = 'Gagal';
    $output['pesan']        = 'Error [' . $errno . ']';
    echo (json_encode($output, JSON_PRETTY_PRINT));
  die();
} 

set_error_handler("customError");
if(isset($_POST['liga'])) {
$host = 'http://bayuu.net'; 
$key  = 'YOUR API-KEY HERE'; // Masukan API KEY yang ada punya
switch ($_POST['liga']) {
	case 'inggris':
		$server	=	$host . "/api/cek-topskor?liga=inggris";
		break;
	case 'spain':
		$server	=	$host . "/api/cek-topskor?liga=spanyol";
		break;
	case 'italia':
		$server	=	$host . "/api/cek-topskor?liga=italia";
		break;
	case 'champions':
		$server	=	$host . "/api/cek-topskor?liga=champions";
		break;
}
  $data = file_get_contents($server . '&apikey=' . $key);
  $hasil = json_decode($data, true);
  if($hasil['status'] == 'Gagal') { echo "<h1>Maaf, terjadi kesalahan..</h1>";}
  foreach ($hasil['top_skor'] as $key => $value) {
 	?>

 	<tr>
 		<th scope="row"><?php echo $value['posisi']; ?></th>
 		<td><?php echo $value['pemain']; ?></td>
 		<th scope="row"><?php echo $value['klub']; ?></th>
 		<td><?php echo $value['gol']; ?></td>
 	</tr>

<?php
  	}
	}
?>
<script>$('#komp').text('<?php echo $hasil['kompetisi']; ?>');</script>
