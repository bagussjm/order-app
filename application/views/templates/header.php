<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
    <title>Orderlist APP - Aplikasi Pemesanan Logistik Berbasis Website</title>

    <!-- Favicons-->
    <link rel="icon" href="<?= base_url('assets/images/favicon/order-app-logo.png')?>" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="<?= base_url('assets/images/favicon/apple-touch-icon-152x152.png')?>">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->


    <!-- CORE CSS-->
    <link href="<?= base_url('assets/css/materialize.css')?>" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?= base_url('assets/css/style.css')?>" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->
    <link href="<?= base_url('assets/css/custom/custom-style.css')?>" type="text/css" rel="stylesheet" media="screen,projection">


    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="<?= base_url('assets/js/plugins/perfect-scrollbar/perfect-scrollbar.css')?>" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?= base_url('assets/js/plugins/jvectormap/jquery-jvectormap.css')?>" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?= base_url('assets/js/plugins/chartist-js/chartist.min.css')?>" type="text/css" rel="stylesheet" media="screen,projection">


</head>

<body>
<!-- Start Page Loading -->
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<!-- End Page Loading -->

<!-- START HEADER -->
<header id="header" class="page-topbar">
    <!-- start header nav-->
    <div class="navbar-fixed">
        <nav class="navbar-color">
            <div class="nav-wrapper">
                <ul class="left">
                    <li>
                        <?php if ($this->session->userdata('level') === 'sales'):?>
                            <h1 class="logo-wrapper">
                                <a href="<?= base_url('sales/dashboard')?>" class="brand-logo darken-1">
                                    <img src="http://localhost/order-app/assets/images/orderlist-brand.png" alt="materialize logo">
                                </a>
                            </h1>
                        <?php else: ?>
                            <h1 class="logo-wrapper">
                                <a href="<?= base_url()?>" class="brand-logo darken-1">
                                    <img src="http://localhost/order-app/assets/images/orderlist-brand.png" alt="materialize logo">
                                </a>
                            </h1>
                        <?php endif;?>
                    </li>
                </ul>
                <div class="header-search-wrapper hide-on-med-and-down">
                    <i class="mdi-action-search"></i>
                    <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Cari di Aplikasi"/>
                </div>
                <ul class="right hide-on-med-and-down">
                    <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light notification-button" data-activates="notifications-dropdown"><i class="mdi-social-notifications"><small class="notification-badge">5</small></i>

                        </a>
                    </li>
                    <li>
                        <a href="#" data-activates="chat-out" class="waves-effect waves-block waves-light chat-collapse">
                            <i class="mdi-action-assignment"></i>
                        </a>
                    </li>
                </ul>
                <!-- notifications-dropdown -->
                <ul id="notifications-dropdown" class="dropdown-content">
                    <li>
                        <h5>NOTIFICATIONS <span class="new badge">5</span></h5>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#!"><i class="mdi-action-add-shopping-cart"></i> A new order has been placed!</a>
                        <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">2 hours ago</time>
                    </li>
                    <li>
                        <a href="#!"><i class="mdi-action-stars"></i> Completed the task</a>
                        <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">3 days ago</time>
                    </li>
                    <li>
                        <a href="#!"><i class="mdi-action-settings"></i> Settings updated</a>
                        <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">4 days ago</time>
                    </li>
                    <li>
                        <a href="#!"><i class="mdi-editor-insert-invitation"></i> Director meeting started</a>
                        <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">6 days ago</time>
                    </li>
                    <li>
                        <a href="#!"><i class="mdi-action-trending-up"></i> Generate monthly report</a>
                        <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">1 week ago</time>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- end header nav-->
</header>
<!-- END HEADER -->

<!-- //////////////////////////////////////////////////////////////////////////// -->

<!-- START MAIN -->
<div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">

        <!-- START LEFT SIDEBAR NAV-->
        <aside id="left-sidebar-nav">
            <ul id="slide-out" class="side-nav fixed leftside-navigation">
                <!--user profile -->
                <li class="user-details cyan darken-2">
                    <div class="row">
                        <div class="col col s4 m4 l4">
                            <img src="<?= base_url('assets/images/admin.png')?>" alt="" class="circle responsive-img valign profile-image">
                        </div>
                        <div class="col col s8 m8 l8">
                            <a class="btn-flat  waves-effect waves-light white-text profile-btn" href="profil.html" >
                                John Kamal
                            </a>
                            <p class="user-roal">Administrator</p>
                        </div>
                    </div>
                </li>
                <!-- end user profile -->
                <!-- main menu -->
                <li class="bold active">
                    <a href="index.html" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Dashboard</a>
                </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-view-carousel"></i> Layouts</a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="layout-fullscreen.html">Full Screen</a>
                                    </li>
                                    <li><a href="layout-horizontal-menu.html">Horizontal Menu</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="bold">
                    <a href="app-email.html" class="waves-effect waves-cyan"><i class="mdi-communication-email">
                        </i> Mailbox <span class="new badge">4</span>
                    </a>
                </li>
                <!-- sales menus-->
                <li class="bold">
                    <a href="app-email.html" class="waves-effect waves-cyan">
                        <i class="mdi-action-dns"></i> Barang
                    </a>
                </li>
                <li class="bold">
                    <a href="app-email.html" class="waves-effect waves-cyan">
                        <i class="mdi-social-people"></i> Pelanggan
                    </a>
                </li>
                <li class="bold">
                    <a href="app-email.html" class="waves-effect waves-cyan">
                        <i class="mdi-content-content-paste"></i> Daftar Pesanan
                    </a>
                </li>
                <!-- end sales menus-->

                <li class="li-hover"><div class="divider"></div></li>
                <li class="li-hover"><p class="ultra-small margin more-text">Akun</p></li>
                <li>
                    <a href="changelogs.html"><i class="mdi-action-account-circle"></i> Profil</a>
                </li>
                <li>
                    <a href="changelogs.html"><i class="mdi-action-help"></i> Bantuan</a>
                </li>
                <li>
                    <a href="changelogs.html"><i class="mdi-action-settings"></i> Pengaturan</a>
                </li>
                <li>
                    <a href="#logoutModal" class="modal-trigger"><i class="mdi-action-exit-to-app "></i> Keluar</a>
                </li>
                <!-- end main menu -->
            </ul>
            <a href="#" data-activates="slide-out"
               class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only teal"
               style="box-shadow: 0px 0px 0px transparent !important;">
                <i class="mdi-navigation-menu"></i>
            </a>
        </aside>
        <!-- END LEFT SIDEBAR NAV-->

        <!-- //////////////////////////////////////////////////////////////////////////// -->
        <!-- logout modal -->
        <div id="logoutModal" class="modal">
            <div class="modal-content">
                <h5 class="light">Keluar dari aplikasi ?</h5>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Lanjutkan</a>
                <a href="#!" class="modal-close waves-effect waves-red btn-flat ">Batalkan</a>
            </div>
        </div>
        <!-- end logout modal -->

        <!-- START CONTENT -->
        <section id="content">

            <!--start container-->
            <div class="container">
                <!-- //////////////////////////////////////////////////////////////////////////// -->