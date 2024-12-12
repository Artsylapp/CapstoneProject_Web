<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- imports -->
    <link rel="icon" href="<?php echo $this->config->base_url("assets/images/logo.png");?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Bootstraps and JQuery -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    

    <?php 
        if($this->uri->segment(1) == 'analytics'){
            echo '<!-- Only loads when in analytics page, cuz bootstrap 5 causes error in other pages -->';
            echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">';
            echo '<link type="text/css" href="' . base_url('assets/css/analytics.css') . '" rel="stylesheet">';
        }
    ?>

    <!-- Custom CSS files-->
    <link rel="stylesheet" href="<?php echo $this->config->base_url("assets/css/bootstrap.css")?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url('assets/css/Styless.css'); ?>">

    <!-- Custom JS files -->
    <script src="<?php echo $this->config->base_url('assets/js/textToSpeech.js'); ?>"></script>
    <script src="<?php echo $this->config->base_url('assets/js/scrollableTable.js'); ?>"></script>

    <!-- ChartsJS library-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- JsPDF library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.0.0/jspdf.umd.min.js"></script>

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
    <div class="container-fluid bg-image" style="margin: 0;">
        <!-- Content goes here -->
