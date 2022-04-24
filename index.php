<html lang="en"><head>
	<title>FileHost - LINK CHECKER</title>
	<link rel="SHORTCUT ICON" href="images/favicon.ico" type="image/x-icon">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Welcome to LAZENES's Link Checker">
	<meta name="keywords" content="check link, lazenes">
	<link rel="stylesheet" href="css/bootstrap.min.css?v=4.4.1" type="text/css">
	<style>
		@media only screen and (min-width: 991px) {
			.navbar {
				height: 70px;
			}
		}

		@media only screen and (max-width: 991px) {
			.navbar-nav {
				margin-top: 30px;
			}
		}

		.navbar-brand {
			width: 130px;
		}

		.logo-header {
			position: absolute;
			margin-top: -30px;
		}

		.form_check_link {
			margin-top: 100px;
			padding: 1.5rem;
		}

		.table {
			margin-bottom: 0;
			overflow-x: auto;
		}

		.table-header {
			font-weight: bold;
		}

		.card {
			margin-bottom: 70px;
		}

		.footer {
			background-color: #333333;
			border-color: #222222;
			position: fixed;
			bottom: 0px;
			overflow: hidden;
			width: 100%;
			color: white;
			z-index: 9999;
		}

		@media (max-width: 767px) {
			.text-mobile-center {
				text-align: center;
			}

			.clear-mobile-float {
				float: none !important;
			}
		}
	</style>
</head>

<body style="background:url('images/background.jpg'), #111111 repeat-y fixed; background-size:cover;">
	<div class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
		<div class="container">
			<a href="#" class="navbar-brand"><img class="logo-header" alt="Logo" title="LAZENES - Link Checker" style="height:88px" src="images/logo.png"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<nav class="navbar navbar-expand navbar-light">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a class="nav-link" href="#">Ana Sayfa</a>
						</li>
						<li class="nav-item active">
							<a class="nav-link" href="#">Link Konrolcü <span class="sr-only">(burdasınız)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="https://www.enesbiber.com.tr/">İletişim</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="jumbotron form_check_link">
			<form class="form-horizontal" action="javascript:check(document.getElementsByTagName(&quot;input&quot;));">
				<fieldset>
					<div id="inputlinks">
						<div class="row" id="showlink1">
							<div class="col-lg-9">
								<input type="text" class="form-control" id="link1" placeholder="Dosya Bağlantınızı  Buraya Yapıştırın" autocomplete="off">
								<div style="display: none;" id="status1"></div><br>
							</div>
							<div class="col-lg-3">
								<input type="text" class="form-control" id="pass1" placeholder="Şifre (isteğe Göre)" autocomplete="off">
								<div style="display: none;" id="sttpass1"></div><br>
							</div>
							<div class="col-lg-12" style="display:none;" id="result1"></div>
						</div>
					</div>
					<button type="submit" id="submit" class="btn btn-primary" name="button">Kontrol Et!</button>&nbsp;&nbsp;&nbsp;<img style="display:none" id="waiting" src="./images/loading.gif">
				</fieldset>
			</form>
		</div>

		<div class="card bg-light">
			<div class="card-header text-center">
				<?php
				include("hosts.php");	
				$List=array();			
				foreach ($host as $var){
$List[]= $var["site"];
    //$ClassList=$var["class"];					
}
$cleanList = array_unique($List);
?>
				<span class="table-header"><?php echo count($cleanList);?> Desteklenen Sunucu</span>
<div class="float-right">
  	<input type="checkbox" name="ackapat" checked data-toggle="toggle"  data-size="sm">

</div>
			</div>
						

			<div class="table-responsive">
				
				<table  id="table" class="table table-bordered table-striped  text-center">
	<tbody>
		<tr>
			<td><b>Sunucu</b></td>		
			<td><b>Durum</b></td>
		</tr>

			<?php			
		foreach ($cleanList as $tabloListe){
			
				echo '<tr><td>
			<img src="https://www.google.com/s2/favicons?domain='.$tabloListe.'">'.$tabloListe.'</td>
						<td><img style="height:16px" src="https://pngimage.net/wp-content/uploads/2018/06/ye%C5%9Fil-tik-png-4.png">
						</td></tr>';					
		}
			?>
			</tbody>
</table>
			
			</div>
		</div>
	</div>

	<div class="footer text-mobile-center">
		<span class="float-left clear-mobile-float">Copyright ©2013-2022 <a href="https://enesbiber.com.tr" target="_blank"> Enes BİBER</a> Tüm hakları saklıdır</span>
		<span class="float-right clear-mobile-float">Created by LAZENES FileHost LinkChecker V2 &nbsp;</span>
	</div>

	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js?v=4.4.1"></script>
	<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
	<script type="text/javascript" src="js/ajax_load.js?v=4.4.1"></script>


</body></html>