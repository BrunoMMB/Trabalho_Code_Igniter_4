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
                            /* trecho do preview da imagem */
								img{
									display: block;
									margin-left: auto;
									margin-right: auto;
									width: 63%;
  									background-color: white;
  									box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
								}
							/* trecho do botão submit */
                                input[type=text], select {
									width: 100%;
									font-size: 14px;
									padding: 12px 20px;
									margin: 8px 0;
									display: inline-block;
									border: 1px solid #ccc;
									border-radius: 4px;
									box-sizing: border-box;
								}
								
								input[type=submit] {
									width: 50%;
									background-color: #004F66;
									color: white;
									padding: 14px 20px;
									margin: 8px 0;
									border: none;
									border-radius: 4px;
									cursor: pointer;
								}

								input[type=submit]:hover {
									background-color: #00769A;
								}
                            /* fim do botão submit */

                            input[type="file"] {
								width: 100px;
                                position: absolute;
                                z-index: -1;
                                top: 15px;
                                left: 20px;
                                font-size: 17px;
                                color: #b8b8b8;
                            }
                            .button-wrap {
                                position: relative;
                            }
                            .button {
                                /* display: inline-block; */
                                background-color: #004F66;
                                border-radius: 6px;
                                color: #ffffff;
                                font-size: 14px;
                                padding: 12px 20px;
								margin: 8px 0;
                                width: 100px;
                                transition: all 0.5s;
                                cursor: pointer;
                                margin: 5px;
                            }
                            .button:hover {
                                background-color: #00769A;
                            }
							/* mensagem de aviso */
								@keyframes myAnimation{
									0%{
										opacity: 1;
										transform: rotateX(90deg);
									}
									50%{
										opacity: 0.5;
										transform: rotateX(0deg);
									}
									100%{
										display: none;
										opacity: 0;
										transform: rotateX(90deg);
									}
								}

								p{
									font-weight: bold;
									animation-name: myAnimation;
									animation-duration: 4000ms;
									animation-fill-mode: forwards;
								}
							</style>
							
							<!-- PREVIEW DO ARQUIVO -->
							<script type="text/javascript">
								function readURL(input) {
									if (input.files && input.files[0]) {
										var reader = new FileReader();

										reader.onload = function (e) {
											$('#blah').attr('src', e.target.result);
										}

										reader.readAsDataURL(input.files[0]);
									}
								}
							</script>
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
						<form method="post" enctype="multipart/form-data" action="<?php echo base_url();?>/public/Principal/upload">
							<strong> 
                                <?php   
									echo "<p style='color:#BA0000; font-size:30px'>".
									$msg2. "</p></br>";

									echo "<p style='color:#00769A; font-size:30px'>".
									$msg3. "</p></br>";
								?> 
							</strong>
                            <div class="container">
                                <div class="button-wrap">
                                    <label class="button" for="upload">Escolher</label>
									<img id="blah" src="#" alt="your image" />
                                    <input id="upload" type="file" name="pic" onchange="readURL(this);">
                                    <input type="submit" value="<?php echo "Enviar"?>" style="color:white; ">
                                </div>
                            </div>
						</form>    
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