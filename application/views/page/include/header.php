<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--  -->
    <link rel="icon" href="<?php echo $this->config->base_url("assets/images/logo.png");?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    
    <!-- Bootstraps and JQuery -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Custom CSS files-->
    <link rel="stylesheet" href="<?php echo $this->config->base_url("assets/css/bootstrap.css")?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url('assets/css/Styless.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url('assets/css/analytics.css'); ?>">

    <!-- Custom JS files -->
    <script src="<?php echo $this->config->base_url('assets/js/textToSpeech.js'); ?>"></script>
    <script src="<?php echo $this->config->base_url('assets/js/scrollableTable.js'); ?>"></script>

    <!-- ChartsJS library-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <!-- Title header -->
    <title>VIAMM | <?php echo $title; ?></title>
</head>

<!-- Checks if the user has session data, if not then it will redirect user to login page -->
<?php
    if($this->session->has_userdata('logged_in') == FALSE){
        redirect("login");
    }
?>

<!-- Body tag -->
<body style="font-family: 'Outfit', sans-serif; margin: 0; padding: 0; background-color: hsl(196, 64%, 73%, 0.5);">

    <!-- Navigation Bar -->
    <nav class="navbar navbar-inverse top-cont" style="background-color: hsl(218 53% 65%); border: none; margin-bottom: 0;">
        <div class="container-fluid" style="display: flex; align-items: center; justify-content: space-between;">
            
            <!-- Logo -->
            <div class="navbar-header" style="display: flex; align-items: center;">
                <a href="<?php echo $this->config->base_url("home")?>">
                    <img class="header_img" src='<?php echo $this->config->base_url("assets/images/logo.png");?>' alt="Logo">
                </a>
            </div>
            
            <!-- Voice Selection Dropdown -->
            <div class="header-container" style="flex-grow: 1; text-align: center; visibility: hidden;" >
                <select id='voiceList' class="form-control header-select" style="margin-top: 10px;"></select>
            </div>
            
            <!-- Logout Button -->
            <ul class="nav navbar-nav navbar-right" style="display: flex; align-items: center;">
                    <a href="<?php echo $this->config->base_url("main/logout")?>">
                        <img class="btn logout-btn ttsh logout_img" name="LOGOUT" src='<?php echo $this->config->base_url("assets/images/logout.png");?>' alt="Logout">
                    </a>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container-fluid bg-image" style="margin: 0; background-image: url('<?php echo $this->config->base_url("assets/images/VIAMM.png");?>');">
        <!-- Content goes here -->
