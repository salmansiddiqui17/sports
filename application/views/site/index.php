<!DOCTYPE html>
<html>
<head>
<title>effective application form a Flat Responsive Widget Template :: w3layouts</title>
<!-- metatags-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<link href="<?php base_url() ?>assets/site/css/style.css" rel="stylesheet" type="text/css" media="all"/><!--style_sheet-->
<!-- <link href="//fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Raleway" rel="stylesheet"> -->
</head>
<body>
<a href="<?= base_url() ?>user" style="display:block;position:absolute;right:20px;color:#fff;border:1px solid #000;padding:5px 20px;border-radius:3px;background: #8a2d24;">Login</a>

<h1><span>s</span>ports <span>c</span>lub</h1>
<div class="w3ls-main">
<div class="w3ls-form">
<form action="<?= base_url() ?>site/save" method="post">
<ul class="fields">
	<li>	
		<label class="w3ls-opt">Applicant name<span class="w3ls-star"> * </span></label>
		<div class="w3ls-name">	
			<input type="text" name="name"  placeholder="first name" required=" "/>
		</div>
	</li>
	<li>
		<label class="w3ls-opt">Father name<span class="w3ls-star"> * </span></label>
		<div class="w3ls-name">
			<input type="text" name="f_name" placeholder="father name" required=""/>
		</div>
	</li>
	<li>
		<label class="w3ls-opt">CNIC<span class="w3ls-star"> * </span></label>
		<div class="w3ls-name">
			<input type="text" name="cnic" placeholder="CNIC #" required=""/>
		</div>
	</li>
	<li>
		<label class="w3ls-opt">Age / Gender <span class="w3ls-star"> * </span> </label>
		<div class="adderss">
			<span class="text">
				<input type="text" name="age" placeholder="age" required=" "/>
			</span>
			<span class="w3ls-text w3ls-name" style="width:49%">
				<select type="text" name="gender" required=" ">
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select>
			</span>
		</div>
	</li>
	<li>	
		<label class="w3ls-opt">Player Strength<span class="w3ls-star"> * </span></label>
		<div class="w3ls-name">	
			<input type="text" name="type"  placeholder="e.g: Bowler, Batsman" required=" "/>
		</div>
	</li>
	<li>
		<div class="mail">
			<label class="w3ls-opt">Sports Club<span class="w3ls-star"> * </span></label>
			<span class="w3ls-text w3ls-name">
				<select name="club" required=" ">
					<option value="">Select Club</option>
					<?php
					   foreach ($clubs as $key => $value) {
						  echo "<option value='$value[name]'>$value[name]</option>";
					   }
					?>
				</select>
			</span>
		</div>
	</li>
	<li>	
		<label class="w3ls-opt">Contact #<span class="w3ls-star"> * </span></label>
		<div class="w3ls-name">	
			<input type="text" name="contact"  placeholder="Contact no" required=" "/>
		</div>
	</li>
	
</ul>
<div class="clear"></div>
	<div class="w3ls-btn">
		<input type="submit" value="submit">
	</div>
</form>
</div>
</div>
<footer>&copy; 2017 Sports Club Management. All Rights Reserved</a></footer>
</body>
</html>