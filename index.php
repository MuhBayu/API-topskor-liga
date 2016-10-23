<!DOCTYPE html>
<html>
<head>
	<title>Cek Top-Skor Liga</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta charset="utf-8">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="sha384-2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).on('change','#pilih',function(){
			var pilih = $('#pilih').val();  cek(pilih);
          });
		function cek(liga) {
			$('#load').show();
			$.post('topskor.php', { liga:liga })
             .done(function(data) { $('#load').hide(); $('#isi').html(data);  })
             .error(function() { alert('gagal saat mengambil data..!'); return false;});
		}
	</script>
<style>
@font-face{
   font-family:"HelveticaNeue";
   src:url("http://www.freefontsdownload.net/data/502/h/helveticaneue/HelveticaNeue.ttf");
}
</style>
</head>
<body onload="cek('champions');">

<div class="container" style="margin-top:20px;">

<h4 align="center" class="page-heading">Top Skor Liga</h4>
	<div class="col-md-2">
		<p>Pilih Kompetisi :</p>
	</div>
	<div class="col-md-4">
	<select id="pilih" class="btn-group form-control">
		<option value="champions">Liga Champions</option>
		<option value="inggris">Liga Inggris</option>
		<option value="spain">Liga Spanyol</option>
		<option value="italia">Liga Itali</option>
	</select>
	</div> <br><br>
	<h2 id="komp"></h2>
<table class="table table-striped">
  <thead class="thead-inverse">
    <tr>
      <th>#</th>
      <th>Pemain</th>
      <th>Klub</th>
      <th>Gol</th>
    </tr>
  </thead>
  <tbody id="isi">
  		<span id="load"  style="display: none"> <img src="img/load.gif"> Mengecek data...</span>
  </tbody>
</table>

<footer class="bd-footer text-muted" style="margin-top: 30px; font-size: 9pt;">
	<p>Widget by <a href="//bayyu.me/" target="_blank"> bayyu.me</a></p>
</footer>
</div>
</body>
</html>
