<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $this->config->base_url("assets/css/bootstrap.css") ?>"/>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>VIAMM | <?php echo $title; ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url('assets/css/Styless.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url('assets/css/Stylesacc.css'); ?>">
    <script src="<?php echo $this->config->base_url('assets/js/textToSpeech.js'); ?>"></script>
    <script src="<?php echo $this->config->base_url('assets/js/Utils.js'); ?>"></script>
</head>
<body class="text-center" style="
    background-image: url('<?php echo $this->config->base_url("assets/images/background.avif") ?>'); 
    background-size: cover;
    background-repeat: no-repeat;">
    <nav class="navbar navbar-inverse" 
        style="
        background-color: hsla(22, 61%, 31%, 1);
        margin-bottom:0px;
        border-style:none;">
        
        <div class="container-fluid">
            <div class="navbar-header">

                <a href="<?php echo $this->config->base_url("home") ?>" style="margin: 0; line-height: 75px; font-size:10px">
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
    
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-offset-3 col-xs-offset-3 col-sm-6 col-xs-6" style="margin-top:10vh;">

                    <h1 class="overflow-wrap">Welcome To VIAMM</h1>
                    <h3 style="margin-top: 0px;">Login using Company Credentials</h3>

                    <!-- Flash message div -->
                    <div class="row" style="margin-bottom: 20px;">
                            <!-- Error message alert display -->
                            <?php if ($this->session->flashdata('status')) { ?>
                                <div class="alert alert-success">
                                    <?php echo $this->session->flashdata('status'); ?>
                                </div>
                            <?php } elseif ($this->session->flashdata('invalid')) { ?>
                                <div class="alert alert-danger">
                                    <?php echo $this->session->flashdata('invalid'); ?>
                                </div>
                            <?php } ?>

                    </div>

                    <form class="form-horizontal" action="<?php echo $this->config->base_url("loginAuth") ?>" method="POST">

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="fullname">Company Username:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fullname" placeholder="Company Name" name="com_u" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="address">Password:</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="address" placeholder="Password" name="com_p" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-8 col-sm-3" style="margin-top:25px;">
                                <div class="col-sm-12">
                                    <button class="btn green-bg menu-btn-m ttsh" name="LOG IN">
                                        <h4>LOGIN</h4>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
