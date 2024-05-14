<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $this->config->base_url("assets/css/bootstrap.css")?>"/>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>VIAMM | <?php echo $title; ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url('assets/css/Styless.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url('assets/css/Stylesacc.css'); ?>">
    <script src="<?php echo $this->config->base_url('assets/js/textToSpeech.js'); ?>"></script>
</head>
<body class="text-center">
    <nav class="navbar navbar-inverse" 
        style="
        background-color: #41CDB4;
        margin-bottom:0px;
        border-color: #41CDB4;
        ">
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
            </div>
    </nav>

    <div class="container-fluid" style="margin:0px; padding:0px;">
