<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link rel="shortcut icon" href="<?= base_url() ?>front_assets/images/favicon.png">
        <title>Virtual Conference & Trade Show</title>
        <!-- Bootstrap Core CSS -->
        <link href="<?= base_url() ?>front_assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>front_assets/vendor/fontawesome/css/font-awesome.min.css" type="text/css" rel="stylesheet">
        <link href="<?= base_url() ?>front_assets/vendor/animateit/animate.min.css" rel="stylesheet">

        <!-- Vendor css -->
        <link href="<?= base_url() ?>front_assets/vendor/owlcarousel/owl.carousel.css" rel="stylesheet">
        <link href="<?= base_url() ?>front_assets/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

        <!-- Template base -->
        <link href="<?= base_url() ?>front_assets/css/theme-base.css" rel="stylesheet">

        <!-- Template elements -->
        <link href="<?= base_url() ?>front_assets/css/theme-elements.css" rel="stylesheet">

        <!-- Responsive classes -->
        <link href="<?= base_url() ?>front_assets/css/responsive.css" rel="stylesheet">

        <!--[if lt IE 9]>
                <script src="https://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <![endif]-->

        <!-- Template color -->
        <link href="<?= base_url() ?>front_assets/css/color-variations/blue.css" rel="stylesheet" type="text/css" media="screen" title="blue">

        <!-- LOAD GOOGLE FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,800,700,600%7CRaleway:100,300,600,700,800" rel="stylesheet" type="text/css" />

        <!-- CSS CUSTOM STYLE -->
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>front_assets/css/custom.css" media="screen" />
        <!--VENDOR SCRIPT-->
        <script src="<?= base_url() ?>front_assets/vendor/jquery/jquery-1.11.2.min.js"></script>
        <script src="<?= base_url() ?>front_assets/vendor/plugins-compressed.js"></script>

        <link href="<?= base_url() ?>assets/alertify/alertify.core.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>assets/alertify/alertify.default.css" rel="stylesheet" type="text/css" />
        <style>
            @media (min-width: 1200px){
                .container {
                    width: 1300px;
                }
            }
            @media (min-width: 1400px){
                .container {
                    width: 1450px;
                }
            }
            @media (min-width: 1600px){
                .container {
                    width: 1600px;
                }
            }
            @media (min-width: 1800px){
                .container {
                    width: 1700px;
                }
            }

            @media (min-width: 1900px){
                .container {
                    width: 1850px;
                }
            }
            @media (min-width: 2200px){
                .container {
                    width: 2400px;
                }
            }

            .button.black-light {
                border-color: #ae0201;
            }
        </style> 
        <?php if ($this->uri->segment(1) == "home" && $this->uri->segment(2) != "notes") { ?>
            <style>
                #header, #header-wrap, #logo img, #header.header-sticky:not(.header-static) nav#mainMenu ul.main-menu, #mainMenu > ul, #header .side-panel-button {
                    height: 0px;
                }
                #header.header-sticky:not(.header-static) #header-wrap{
                    height: 0px;
                }
                .header-sticky{
                    height: 0px;
                }
                #header.header-sticky:not(.header-static){
                    height: 0px;  
                }
                #main_menu_top_bar{
                    display: none;
                }
            </style>  
        <?php } ?>
    </head>
    <body class="wide">
        <!-- WRAPPER -->
        <div class="wrapper">
            <header id="header" class="header-transparent">
                <div id="header-wrap">
                    <div class="container">
                        <!--LOGO-->
                        <?php if ($this->uri->segment(1) != "home" || $this->uri->segment(2) != "") { ?>
                            <?php
                            if ($this->session->userdata('cid') != "") {
                                $profile_data = $this->common->get_user_details($this->session->userdata('cid'));
                                ?>
                                <div id="logo">
                                    <a href="<?= base_url() ?>home" class="logo" data-dark-logo="<?= base_url() ?>front_assets/images/logo_new.png">
                                        <img src="<?= base_url() ?>front_assets/images/logo_new.png" alt="Polo Logo">
                                    </a>
                                </div>
                            <?php } else { ?>
                                <div id="logo">
                                    <a href="<?= base_url() ?>" class="logo" data-dark-logo="<?= base_url() ?>front_assets/images/logo_new.png">
                                        <img src="<?= base_url() ?>front_assets/images/logo_new.png" alt="Polo Logo">
                                    </a>
                                </div>
                                <?php
                            }
                        }
                        ?>
                        <!--END: LOGO-->
                        <!--MOBILE MENU -->
                        <div class="nav-main-menu-responsive">
                            <button class="lines-button x" type="button" data-toggle="collapse" data-target=".main-menu-collapse">
                                <span class="lines"></span>
                            </button>
                        </div>
                        <!--END: MOBILE MENU -->

                        <!--NAVIGATION-->
                        <div class="navbar-collapse collapse main-menu-collapse navigation-wrap">
                            <div class="container">
                                <nav id="mainMenu" class="main-menu mega-menu">
                                    <ul class="main-menu nav nav-pills navbar-left" id="main_menu_top_bar" style="margin-right: 50px;">
                                        <li><a href="https://tiadaannualconference.com/agenda/" target="_blank" style="color: #ae0201">AGENDA</a></li>
                                        <li><a href="<?= base_url() ?>home" style="color: #ae0201">MAIN HALL</a></li>
                                        <?php
                                        if ($this->session->userdata('cid') != "") {
                                            $check_authenticate_result = $this->common->check_authenticate($this->session->userdata("cid"));
                                            $user_detias = $this->common->get_user_details($this->session->userdata("cid"));
                                            if ($check_authenticate_result != "noaccess") {
                                                if ($user_detias->customer_type == "Dummy users" || $user_detias->customer_type == "full_conference_no_roundtables" || $user_detias->customer_type == "Associate - Full Payment" || $user_detias->customer_type == "Associate Branch" || $user_detias->customer_type == "Associate - Monthly") {
                                                    ?>
                                                    <li><a href="<?= base_url()?>sessions" style="color: #ae0201">Sessions On Demand</a></li>
                                                    <li><a href="#" style="color: #ae0201">EXPO now closed</a></li>
                                                <?php } else if ($user_detias->customer_type == "expo_only") { ?> 
                                                  
                                                    <li><a href="#" style="color: #ae0201">EXPO now closed</a></li>
                                                <?php } else { ?>  
                                                    <li><a href="<?= base_url()?>sessions" style="color: #ae0201">Sessions On Demand</a></li>
                                                    <li><a href="#" style="color: #ae0201">EXPO now closed</a></li>
                                                <?php } ?>
                                            <?php } else { ?>
                                                <li><a href="#" style="color: #ae0201">EXPO now closed</a></li>
                                            <?php }
                                            ?>
                                        <?php } else {
                                            ?>  
                                            <li><a href="<?= base_url()?>sessions" style="color: #ae0201">Sessions On Demand</a></li>
                                            <li><a href="#" style="color: #ae0201">EXPO now closed</a></li>
                                        <?php } ?>
                                        <li class="nav-item avatar dropdown">
                                            <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <span class="unread-msg-count badge badge-notify" style="font-size:10px;">0</span>
                                                <i class="fa fa-envelope" style="color:#8286C5;font-size: 25px;"></i>
                                            </a>
                                            <div class="unread-msgs-list dropdown-menu dropdown-menu-lg-right dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-5" style="overflow: hidden;"><a target="_blank" class="dropdown-item waves-effect waves-light" href="#">Message from TIADA</a>
                                            </div>
                                        </li>
                                    </ul>

                                    <style>
                                        .badge-notify{
                                            background:#727272;
                                            position:relative;
                                            top: 7px;
                                            left: 52px;
                                        }
                                    </style>
                                    <ul id="mainMenuItems" class="main-menu nav nav-pills navbar-left">
                                    </ul>
                                    <?php
                                    if ($this->session->userdata('cid') != "") {
                                        $profile_data = $this->common->get_user_details($this->session->userdata('cid'));
                                        ?>
                                        <ul class="main-menu nav navbar-right">
                                            <li class="dropdown">
                                                <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    <?php if ($profile_data->profile != "") { ?>
                                                        <img src="<?= base_url() ?>uploads/customer_profile/<?= $profile_data->profile ?>" class="img-circle" style="height: 50px; width: 50px; border: 6px solid #342e2e;">
                                                    <?php } else { ?>
                                                        <img src="<?= base_url() ?>assets/images/Avatar.png" class="img-circle" style="height: 50px; width: 50px; border: 6px solid #342e2e;">
                                                    <?php } ?>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <b style="padding: 10px 20px 10px 18px; color:#A9A9A9;"><?= $profile_data->first_name . ' ' . $profile_data->last_name ?></b>
                                                    </li>
                                                    <li>
                                                        <b style="padding: 10px 20px 10px 18px; color:#A9A9A9;"><?= $profile_data->email ?></b>
                                                    </li>
                                                    <li>
                                                        <a href="<?= base_url() ?>register/user_profile/<?= $profile_data->cust_id ?>">
                                                            EDIT PROFILE
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="<?= base_url() ?>home/notes">
                                                            My Backpack
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="<?= base_url() ?>login/logout">
                                                            Log Out
                                                        </a>
                                                    </li>

                                                </ul>
                                            </li>
                                        </ul>
                                    <?php } ?>
                                </nav>
                            </div>
                        </div>

                        <!--END: NAVIGATION-->
                    </div>
                </div>
            </header>
            <!-- END: HEADER -->













