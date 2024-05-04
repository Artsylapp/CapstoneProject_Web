<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $this->config->base_url("assets/css/bootstrap.css")?>"/>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <title>VIAMM | <?php echo $title; ?></title>
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        /* Firefox */
        input[type=number] {
        -moz-appearance: textfield;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid" style="background-color: #41CDB4;">
        <div class="navbar-header">
            <ul class="nav navbar-nav">
                <li>
                    <div style="margin-right: 10px; width: 75px; height: 75px; background-color: #ccc; border-radius: 50%; display: flex; justify-content: center; align-items: center; font-size: 24px; color: #555; border: 2px solid #aaa;">
                        <!-- Placeholder Circle -->
                        <a href="<?php echo $this->config->base_url("/index.php/home")?>" style="margin: 0; line-height: 75px; font-size:10px">VIAMM ICON</a>
                    </div>
                </li>
            </ul>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li>
                <div style="margin-right: 10px; width: 75px; height: 75px; background-color: #ccc; border-radius: 50%; display: flex; justify-content: center; align-items: center; font-size: 24px; color: #555; border: 2px solid #aaa;">
                    <!-- Placeholder Circle -->
                    <p style="margin: 0; line-height: 75px; font-size:10px">SETTINGS</p>
                </div>
            </li>
            <li>
                <div style="margin-right: 10px; width: 75px; height: 75px; background-color: #ccc; border-radius: 50%; display: flex; justify-content: center; align-items: center; font-size: 24px; color: #555; border: 2px solid #aaa;">
                    <!-- Placeholder Circle -->
                    <a href="<?php echo $this->config->base_url("/index.php/user")?>" style="margin: 0; line-height: 75px; font-size:10px">USER</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
