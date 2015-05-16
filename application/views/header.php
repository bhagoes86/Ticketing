<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet" media="screen">
    <!-- <link href="css/custom.css" rel="stylesheet" media="screen"> -->
    <!-- <link rel="stylesheet" href="assets/awesome/css/font-awesome.min.css">   -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/indexcss.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="title" content="Seminar Entrepreneurship - Ticketing Hai Unair" />
	<meta name="description" content="Mau beli tiket seminar di Seminar Entrepreneurship? Beli tiket seminar gak perlu repot lagi sekarang. Semua bisa dilakukan melalui Hai Unair Ticketing. Lansung klik aja motivpreneur.haiunair.com" />
	<meta property="og:title" content="Seminar Entrepreneurship - Ticketing Hai Unair" />
	<meta property="og:description" content="Mau beli tiket seminar di Seminar Entrepreneurship? Beli tiket seminar gak perlu repot lagi sekarang. Semua bisa dilakukan melalui Hai Unair Ticketing. Lansung klik aja motivpreneur.haiunair.com" />
	<meta property="og:site_name" content="Hai Unair Ticketing" />
	<meta property="og:url" content="http://motivpreneur.haiunair.com" />
	<meta property="og:image" content="http://www.haiunair.com/assets/img/fk_dk.jpg" />
    <link rel="icon" href="http://www.haiunair.com/assets/favicon.ico" type="image/x-icon">
    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css'>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/baru.css">

	<style type="text/css">
	      body::-webkit-scrollbar {
	          width: 0.7em;
	      }
	       
	      body::-webkit-scrollbar-track {
	          -webkit-box-shadow: inset 0 0 3px rgba(0,0,0,0.3);
	      }
	       
	      body::-webkit-scrollbar-thumb {
	        background-color: #58AED7;
	        outline: 1px solid slategrey;
	      }

	      /*ini css untuk header baru*/
	      .intro-header {
		    /*padding-top: 50px;*/
		    /* If you're making other pages, make sure there is 50px of padding to make sure the navbar doesn't overlap content! */
		    
		    padding-bottom: 50px;

		    */ height: 550px;
		    text-align: center;
		    color: #f8f8f8;
		    background: url(http://www.clear.co.id/resources/images/base/ini-dia-teaser-klip-gajah-milik-tulus-sudah-lihat-d7d75ab.jpg) no-repeat center center;
		    background-size: cover;
		}

	    </style>
	
    <?php 
	if (isset($meta)) {
        echo meta($meta);
	}
    ?>
</head>
<body>
	<?php if ($fb==true): ?>
	<!-- Facebook plugin -->
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.0";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<?php endif ?>
	<?php if ($tw==true): ?>
	<!-- twitter share button -->
	<script>
	window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));
	</script>
	<?php endif ?>
	<!-- header -->
	<nav class="navbar navbar-default">
	  <div class="container">
	    <div class="navbar-header">
	      <button type="button" style="margin-top: 30px;" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" style="height: 100%;" href="http://www.haiunair.com"><img src="<?php echo base_url();?>assets/img/haiunair_logo.jpg" width="150"></a>
	    </div>
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav navbar-right">
	        <li class="signup"><a href="#akun">Online Ticketing</a></li>
	        <?php if (isSesiLoggedIn()): ?>
	        	<li><a href="<?php echo base_url(); ?>dashboard/logout">Log out</a></li>
	        <?php endif ?>
	      </ul>
	    </div>
	  </div>
	</nav>