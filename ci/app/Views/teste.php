<?php
	$session = \Config\Services::session();         
	if($session->get('login')){
		$msg = $session->get('login');
	}else{
		$msg = "Login";
	}
?>
<!DOCTYPE html>
<html lang="pt_BR">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="<?php echo base_url();?>/lattes-master/favicon.ico">
		<title>Lattes - Onepage Multipurpose Bootstrap HTML</title>
		<!-- Bootstrap core CSS -->
		<link href="<?php echo base_url();?>/lattesmaster/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!-- Custom styles for this template -->
		<link href="<?php echo base_url();?>/lattesmaster/css/owl.carousel.css" rel="stylesheet">
		<link href="<?php echo base_url();?>/lattesmaster/css/owl.theme.default.min.css"  rel="stylesheet">
		<link href="<?php echo base_url();?>/lattesmaster/css/style.css" rel="stylesheet">
		<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
		<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
		<script src="<?php echo base_url();?>/lattesmaster/js/ie-emulation-modes-warning.js"></script>
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
			<style>
				table {
				border-collapse: collapse;
				width: 100%;
				}

				th, td {
				text-align: left;
				padding: 8px;
				color:black;
				}

				tr:nth-child(even){background-color: #f2f2f2}

				th {
				background-color: #4CAF50;
				color: white;
				}
				input[type=submit]:hover {
				background-color: #45a049;
				}
				table {
				border-radius: 5px;
				background-color: #f2f2f2;
				padding: 20px;
				}
			</style>
	</head>
	<body id="page-top">
		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header page-scroll">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand page-scroll" href="<?php echo base_url();?>/public/Principal/index">Trabalho DAW 1</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li class="hidden">
							<a href="#page-top"></a>
						</li>
						<li>
							<a class="page-scroll" href="./insert">Insert</a>
						</li>
						<li>
							<a class="page-scroll" href="./select">Read</a>
						</li>
						<li>
							<a class="page-scroll" href="./update">Update</a>
						</li>
						<li>
							<a class="page-scroll" href="./delete">Delete</a>
						</li>
						<li>
							<a class="page-scroll" href="./prov">Upload</a>
						</li>
						<li>
							<a class="page-scroll" href="./page_login"><?php echo $msg; ?></a>
						</li>
						<li>
							<a class="page-scroll" href="<?php echo base_url();?>/public/Principal/logout">Logout</a>
						</li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
		</nav>
		<!-- Header -->
		<header>
			<div class="container">
				<div class="slider-container">
					<div class="intro-text">
						<table>
						<tr>
							<th>Nome</th>
							<th>ID</th>
						</tr>
							<?php foreach ($query->getResult() as $row) : ?>
									<tr>
										<td><?php echo $row->login ?></td>
										<td><?php echo $row->senha ?></td>
									</tr>
							<?php endforeach ?>
						</table>   
					</div>
				</div>
			</div>
		</header>
		
		<!-- Bootstrap core JavaScript
			================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
		<script src="<?php echo base_url();?>/lattesmaster/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>/lattesmaster/js/owl.carousel.min.js"></script>
		<script src="<?php echo base_url();?>/lattesmaster/js/cbpAnimatedHeader.js"></script>
		<script src="<?php echo base_url();?>/lattesmaster/js/theme-scripts.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="<?php echo base_url();?>/lattesmaster/js/ie10-viewport-bug-workaround.js"></script>
	</body>
</html>