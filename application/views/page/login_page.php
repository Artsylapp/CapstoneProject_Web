<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>VIAMM | <?php echo $title; ?></title>

    <!-- Login CSS import -->
    <link rel="stylesheet" href="<?php echo $this->config->base_url("assets/css/bootstrap.css") ?>"/>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

    <!-- Login Scripts Import  -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Login CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url('assets/css/Styless.css'); ?>">

    <!-- Login Scripts -->
    <script src="<?php echo $this->config->base_url('assets/js/textToSpeech.js'); ?>"></script>
    <script src="<?php echo $this->config->base_url('assets/js/Utils.js'); ?>"></script>
</head>

<body class="text-center bg-image" style="
    background-image: url('<?php echo $this->config->base_url("assets/images/VIAMM.png") ?>');
    background-color: hsl(196, 64%, 73%, 0.5);">

    <nav class="navbar navbar-inverse" 
        style="
        background-color: hsl(218 53% 65%);
        margin-bottom:0px;
        border-style:none;">
        
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="<?php echo $this->config->base_url("home")?>">
                    <img class="header_img" src='<?php echo $this->config->base_url("assets/images/logo.png");?>' alt="Logo">
                </a>
            </div>
                
                <div class="container-fluid header-container">
                    <select id='voiceList' class="form-control header-select" style="visibility: hidden;"></select>
                </div>

            </div>
        </div>
    </nav>

    <div class="container-fluid" style="margin:0px; padding:0px;">
        <div class="container-fluid">
            <div class="loginform">

                <div class="col-sm-6 col-xs-6" style="margin-top:20vh;">

                    <div class="login-div">

                        <h1 class="overflow-wrap black-txt" style="font-weight: bold;">Welcome To VIAMM</h1>
                        <h3 class="black-txt" style="margin-top: 0px; font-weight: bold;">Login using Company Credentials</h3>

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

                        <div class="form-container">
                            <form class="form-horizontal" action="<?php echo $this->config->base_url("loginAuth") ?>" method="POST">

                                <div class="form-group">
                                    <label class="control-label col-sm-2 black-txt formlabel" for="fullname">Username:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="fullname" placeholder="Company Name" name="com_u" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-2 black-txt formlabel" for="address">Password:</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="address" placeholder="Password" name="com_p" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-8 col-sm-3" style="margin-top:25px;">
                                        <div class="col-sm-12">
                                            <button class="btn lg-bg login-btn ttsh" name="LOG IN TO VIAMM">
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
        </div>
    </div>

    <footer>
        <div class="row" style="padding-top: 2em;">
            <div class="">
                <p class="center-item black-txt">&#169; 2024 VIAMM - Technovative</p>
                
                <p class="center-item black-txt">
                    <i class="fas fa-envelope"></i>
                    Contact Us:
                    <a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=202110913@fit.edu.ph" target="_blank" rel="noopener noreferrer">
                    <!-- <a href="mailto:202110913@fit.edu.ph"> -->
                    <span class="blue-txt">&nbsp;202110913@fit.edu.ph</span>
                    </a>
                </p>  

                <p class="center-item black-txt">
                    <i class="fas fa-map-marker-alt"></i> 
                    FEU Institute of Technology, P. Paredes st, Sampaloc Manila, 1005
                </p>

                </div>
        </div>
    </footer>

</body>
</html>
