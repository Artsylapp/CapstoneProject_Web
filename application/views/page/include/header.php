<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $this->config->base_url("assets/css/bootstrap.css")?>"/>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>VIAMM | <?php echo $title; ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url('assets/css/Styless.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url('assets/css/Stylesacc.css'); ?>">
    <script src="<?php echo $this->config->base_url('assets/js/textToSpeech.js'); ?>"></script>
</head>

<?php
    if($this->session->has_userdata('logged_in') == FALSE){
        redirect("login");
    }
?>

<body style="font-family: 'Outfit', sans-serif;">
    <nav class="navbar navbar-inverse" style="background-color: hsla(22, 61%, 31%, 1); border-style:none; margin-bottom:0px;">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="<?php echo $this->config->base_url("home")?>" style="margin: 0; line-height: 75px; font-size:10px">
                    <button type="button" class="btn btn-image">
                        <img src="" alt="">
                    </button>
                </a>
                <div class="container-fluid header-container">
                    <select id='voiceList' class="form-control header-select"></select>
                </div>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <div class="container-fluid">
                        <a href="<?php echo $this->config->base_url("main/logout")?>">
                            <button class="btn logout-btn ttsh" name="LOGOUT" style="margin:0px; padding:0px; background-image: url('<?php echo $this->config->base_url("assets/images/logout.png")?>'); background-size: cover; background-repeat: no-repeat;">
                                
                            </button>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid" style="margin:0px; padding:0px; background-image: url('<?php echo $this->config->base_url("assets/images/background.avif")?>'); background-size: cover; background-repeat: no-repeat;">