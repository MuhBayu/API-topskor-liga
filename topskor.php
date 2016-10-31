<?php
// ---------------------------------------
// API Cek Top Skor Liga
// Get API-KEy? --> http://bayuu.net/api/
// ---------------------------------------

function customError($errno, $errstr) {
    header('Content-type: application/json');
    $output['status']       = 'Gagal';
    $output['pesan']        = 'Error [' . $errno . ']';
    print (json_encode($output, JSON_PRETTY_PRINT));
  die();
} 

set_error_handler("customError");
if(isset($_POST['liga'])) {
//** --
$host = 'http://bayuu.net';
$stat = 'topskor'; // STATISTIK : topskor / assist
$key  = 'YOUR API-KEY HERE'; // Masukan API KEY yang ada punya
//**
	
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
  $data = file_get_contents($server . '&stat=' . $stat . '&apikey=' . $key);
  $hasil = json_decode($data, true);
  if($hasil['status'] != 'Success') { echo "<h5>Maaf, terjadi kesalahan..</h5>
  	<h5>Pesan Error: <b>" . $hasil['pesan'] . "</b>"; exit;}
  foreach ($hasil['data'] as $key => $value) :
 	?>

 	<tr>
 		<th scope="row"><?php echo $value['posisi']; ?></th>
 		<td><?php echo $value['pemain']; ?></td>
 		<th scope="row"><?php echo $value['klub']; ?></th>
 		<td><?php echo $value['gol']; ?></td>
 	</tr>

<?php
  	endforeach;
}
?>
<script>$('#komp').text('<?php echo $hasil['kompetisi']; ?>');</script>
