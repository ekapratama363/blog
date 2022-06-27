<!DOCTYPE html>
<html>

<head>
	<title>My Blog</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
	<style>
		body,
		h1,
		h2,
		h3,
		h4,
		h5,
		h6 {
			font-family: "Karma", sans-serif
		}

		.w3-bar-block .w3-bar-item {
			padding: 20px
		}
	</style>
</head>

<body>

	<!-- Sidebar (hidden by default) -->
	<nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left"
		style="display:none;z-index:2;width:40%;min-width:300px" id="mySidebar">
		<a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button">Close Menu</a>
		<a href="<?php echo base_url(); ?>" onclick="w3_close()" class="w3-bar-item w3-button">Home</a>
	</nav>

	<!-- Top menu -->
	<div class="w3-top">
		<div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
			<div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
			<div class="w3-center w3-padding-16"><a href="<?php echo base_url(); ?>">My Blog</a></div>
		</div>
	</div>

	<!-- !PAGE CONTENT! -->
	<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">

    	<?php $this->load->view("{$filePage}") ?>

		<hr id="about">

		<!-- Footer -->
		<footer class="w3-center">
			<h3>FOOTER</h3>
			<p>Copyright <?php echo date('Y') ?></p>
		</footer>
	</div>

	<script>
		// Script to open and close sidebar
		function w3_open() {
			document.getElementById("mySidebar").style.display = "block";
		}

		function w3_close() {
			document.getElementById("mySidebar").style.display = "none";
		}
	</script>

</body>

</html>