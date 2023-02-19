<!DOCTYPE html>
<html>

<head>
  <title>Linkera</title>
  <meta charset="utf-8">
  <meta content="ie=edge" http-equiv="x-ua-compatible">
  <meta content="Linkera" name="Linkera">
  <meta content="Linkera" name="description">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <link href="<?= base_url() ?>favicon.png" rel="shortcut icon">
  <link href="apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>template/assets/bower_components/select2/dist/css/select2.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>template/assets/bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
  <link href="<?= base_url() ?>template/assets/bower_components/dropzone/dist/dropzone.css" rel="stylesheet">
  <link href="<?= base_url() ?>template/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>template/assets/bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>template/assets/bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>template/assets/bower_components/slick-carousel/slick/slick.css" rel="stylesheet">
  <link href="<?= base_url() ?>template/assets/css/main.css?version=4.4.0" rel="stylesheet">
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>template/assets/css/custom.css" rel="stylesheet">
  <!-- Toastr -->
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
</head>

<body class="menu-position-side menu-side-left full-screen with-content-panel">
  <div class="all-wrapper with-side-panel solid-bg-all">
    <div class="search-with-suggestions-w">
      <div class="search-with-suggestions-modal">
        <div class="element-search">
          <input class="search-suggest-input" placeholder="Start typing to search..." type="text">
          <div class="close-search-suggestions">
            <i class="os-icon os-icon-x"></i>
          </div>
          </input>
        </div>
        <div class="search-suggestions-group">
          <div class="ssg-header">
            <div class="ssg-icon">
              <div class="os-icon os-icon-box"></div>
            </div>
            <div class="ssg-name">
              Projects
            </div>
            <div class="ssg-info">
              24 Total
            </div>
          </div>
          <div class="ssg-content">
            <div class="ssg-items ssg-items-boxed">
              <a class="ssg-item" href="users_profile_big.html">
                <div class="item-media" style="background-image: url(<?= base_url() ?>template/assets/img/company6.png)"></div>
                <div class="item-name">
                  Integ<span>ration</span> with API
                </div>
              </a><a class="ssg-item" href="users_profile_big.html">
                <div class="item-media" style="background-image: url(<?= base_url() ?>template/assets/img/company7.png)"></div>
                <div class="item-name">
                  Deve<span>lopm</span>ent Project
                </div>
              </a>
            </div>
          </div>
        </div>
        <div class="search-suggestions-group">
          <div class="ssg-header">
            <div class="ssg-icon">
              <div class="os-icon os-icon-users"></div>
            </div>
            <div class="ssg-name">
              Customers
            </div>
            <div class="ssg-info">
              12 Total
            </div>
          </div>
          <div class="ssg-content">
            <div class="ssg-items ssg-items-list">
              <a class="ssg-item" href="users_profile_big.html">
                <div class="item-media" style="background-image: url(<?= base_url() ?>template/assets/img/avatar1.jpg)"></div>
                <div class="item-name">
                  John Ma<span>yer</span>s
                </div>
              </a><a class="ssg-item" href="users_profile_big.html">
                <div class="item-media" style="background-image: url(<?= base_url() ?>template/assets/img/avatar2.jpg)"></div>
                <div class="item-name">
                  Th<span>omas</span> Mullier
                </div>
              </a><a class="ssg-item" href="users_profile_big.html">
                <div class="item-media" style="background-image: url(<?= base_url() ?>template/assets/img/avatar3.jpg)"></div>
                <div class="item-name">
                  Kim C<span>olli</span>ns
                </div>
              </a>
            </div>
          </div>
        </div>
        <div class="search-suggestions-group">
          <div class="ssg-header">
            <div class="ssg-icon">
              <div class="os-icon os-icon-folder"></div>
            </div>
            <div class="ssg-name">
              Files
            </div>
            <div class="ssg-info">
              17 Total
            </div>
          </div>
          <div class="ssg-content">
            <div class="ssg-items ssg-items-blocks">
              <a class="ssg-item" href="#">
                <div class="item-icon">
                  <i class="os-icon os-icon-file-text"></i>
                </div>
                <div class="item-name">
                  Work<span>Not</span>e.txt
                </div>
              </a><a class="ssg-item" href="#">
                <div class="item-icon">
                  <i class="os-icon os-icon-film"></i>
                </div>
                <div class="item-name">
                  V<span>ideo</span>.avi
                </div>
              </a><a class="ssg-item" href="#">
                <div class="item-icon">
                  <i class="os-icon os-icon-database"></i>
                </div>
                <div class="item-name">
                  User<span>Tabl</span>e.sql
                </div>
              </a><a class="ssg-item" href="#">
                <div class="item-icon">
                  <i class="os-icon os-icon-image"></i>
                </div>
                <div class="item-name">
                  wed<span>din</span>g.jpg
                </div>
              </a>
            </div>
            <div class="ssg-nothing-found">
              <div class="icon-w">
                <i class="os-icon os-icon-eye-off"></i>
              </div>
              <span>No files were found. Try changing your query...</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="layout-w">
      <!--------------------
        START - Mobile Menu
        -------------------->
      <div class="menu-mobile menu-activated-on-click color-scheme-dark">
        <div class="mm-logo-buttons-w">
          <a class="mm-logo" href="index.html"><img src="<?= base_url() ?>template/assets/img/logo.png"><span>Clean Admin</span></a>
          <div class="mm-buttons">
            <div class="content-panel-open">
              <div class="os-icon os-icon-grid-circles"></div>
            </div>
            <div class="mobile-menu-trigger">
              <div class="os-icon os-icon-hamburger-menu-1"></div>
            </div>
          </div>
        </div>
        <?php if ($this->session->logged_in) : ?>
          <div class="menu-and-user">
            <div class="logged-user-w">
              <div class="avatar-w">
                <img alt="" src="<?= base_url() ?>template/assets/img/avatar1.jpg">
              </div>
              <div class="logged-user-info-w">
                <div class="logged-user-name">
                  <?php echo $this->session->user_firstname; ?>
                </div>
                <div class="logged-user-role">
                  Administrator
                </div>
              </div>
            </div>
            <!--------------------
            START - Mobile Menu List
            -------------------->
            <ul class="main-menu">
              <li class="has-sub-menu">
                <a href="#">
                  <div class="icon-w">
                    <div class="os-icon os-icon-layout"></div>
                  </div>
                  <span>Dashboard</span>
                </a>
                <ul class="sub-menu">
                  <li>
                  <a href="<?= base_url() . 'dashboard/index' ?>">Dashboard</a>
                  </li>
                </ul>
              </li>
              <li class="has-sub-menu">
                <a href="#">
                  <div class="icon-w">
                    <div class="os-icon os-icon-layers"></div>
                  </div>
                  <span>Catégories</span>
                </a>
                <ul class="sub-menu">
                  <li>
                    <a href="<?= base_url() .'categories/index'?>">Catégories</a>
                  </li>
                </ul>
              </li>
              <li class="has-sub-menu">
                <a href="#">
                  <div class="icon-w">
                    <div class="os-icon os-icon-package"></div>
                  </div>
                  <span>Processus</span>
                </a>
                <ul class="sub-menu">
                  <li>
                    <a href="<?= base_url() .'process/index'?>">Processus</a>
                  </li>
                  <li>
                    <a href="<?= base_url() .'process_check_list/index'?>">check-lists</a>
                  </li>
                </ul>
              </li>
              <li class="has-sub-menu">
                <a href="#">
                  <div class="icon-w">
                    <div class="os-icon os-icon-file-text"></div>
                  </div>
                  <span>Gestion des dossiers</span>
                </a>
                <ul class="sub-menu">
                  <li>
                    <a href="<?= base_url() .'posts/index'?>">Gestion des dossiers</a>
                  </li>
                  <li>
                  <a href="<?= base_url() .'posts_types/index'?>">Types des dossiers</a>
                  </li>
                </ul>
              </li>
              <li class="has-sub-menu">
                <a href="#">
                  <div class="icon-w">
                    <div class="os-icon os-icon-life-buoy"></div>
                  </div>
                  <span>UI Kit</span>
                </a>
                <ul class="sub-menu">
                  <li>
                    <a href="uikit_modals.html">Modals <strong class="badge badge-danger">New</strong></a>
                  </li>
                  <li>
                    <a href="uikit_alerts.html">Alerts</a>
                  </li>
                  <li>
                    <a href="uikit_grid.html">Grid</a>
                  </li>
                  <li>
                    <a href="uikit_progress.html">Progress</a>
                  </li>
                  <li>
                    <a href="uikit_popovers.html">Popover</a>
                  </li>
                  <li>
                    <a href="uikit_tooltips.html">Tooltips</a>
                  </li>
                  <li>
                    <a href="uikit_buttons.html">Buttons</a>
                  </li>
                  <li>
                    <a href="uikit_dropdowns.html">Dropdowns</a>
                  </li>
                  <li>
                    <a href="uikit_typography.html">Typography</a>
                  </li>
                </ul>
              </li>
              <li class="has-sub-menu">
                <a href="#">
                  <div class="icon-w">
                    <div class="os-icon os-icon-mail"></div>
                  </div>
                  <span>Emails</span>
                </a>
                <ul class="sub-menu">
                  <li>
                    <a href="emails_welcome.html">Welcome Email</a>
                  </li>
                  <li>
                    <a href="emails_order.html">Order Confirmation</a>
                  </li>
                  <li>
                    <a href="emails_payment_due.html">Payment Due</a>
                  </li>
                  <li>
                    <a href="emails_forgot.html">Forgot Password</a>
                  </li>
                  <li>
                    <a href="emails_activate.html">Activate Account</a>
                  </li>
                </ul>
              </li>
              <li class="has-sub-menu">
                <a href="#">
                  <div class="icon-w">
                    <div class="os-icon os-icon-users"></div>
                  </div>
                  <span>Utilisateurs</span>
                </a>
                <ul class="sub-menu">
                  <li>
                    <a href="<?= base_url() .'users/index'?>">Utilisateurs </a>
                  </li>
                  <li>
                    <a href="<?= base_url() .'account_type/index'?>">Types Des Comptes</a>
                  </li>
                </ul>
              </li>
              <li class="has-sub-menu">
                <a href="#">
                  <div class="icon-w">
                    <div class="os-icon os-icon-edit-32"></div>
                  </div>
                  <span>Forms</span>
                </a>
                <ul class="sub-menu">
                  <li>
                    <a href="forms_regular.html">Regular Forms</a>
                  </li>
                  <li>
                    <a href="forms_validation.html">Form Validation</a>
                  </li>
                  <li>
                    <a href="forms_wizard.html">Form Wizard</a>
                  </li>
                  <li>
                    <a href="forms_uploads.html">File Uploads</a>
                  </li>
                  <li>
                    <a href="forms_wisiwig.html">Wisiwig Editor</a>
                  </li>
                </ul>
              </li>
              <li class="has-sub-menu">
                <a href="#">
                  <div class="icon-w">
                    <div class="os-icon os-icon-grid"></div>
                  </div>
                  <span>Tables</span>
                </a>
                <ul class="sub-menu">
                  <li>
                    <a href="tables_regular.html">Regular Tables</a>
                  </li>
                  <li>
                    <a href="tables_datatables.html">Data Tables</a>
                  </li>
                  <li>
                    <a href="tables_editable.html">Editable Tables</a>
                  </li>
                </ul>
              </li>
              <li class="has-sub-menu">
                <a href="#">
                  <div class="icon-w">
                    <div class="os-icon os-icon-zap"></div>
                  </div>
                  <span>Icons</span>
                </a>
                <ul class="sub-menu">
                  <li>
                    <a href="icon_fonts_simple_line_icons.html">Simple Line Icons</a>
                  </li>
                  <li>
                    <a href="icon_fonts_feather.html">Feather Icons</a>
                  </li>
                  <li>
                    <a href="icon_fonts_themefy.html">Themefy Icons</a>
                  </li>
                  <li>
                    <a href="icon_fonts_picons_thin.html">Picons Thin</a>
                  </li>
                  <li>
                    <a href="icon_fonts_dripicons.html">Dripicons</a>
                  </li>
                  <li>
                    <a href="icon_fonts_eightyshades.html">Eightyshades</a>
                  </li>
                  <li>
                    <a href="icon_fonts_entypo.html">Entypo</a>
                  </li>
                  <li>
                    <a href="icon_fonts_font_awesome.html">Font Awesome</a>
                  </li>
                  <li>
                    <a href="icon_fonts_foundation_icon_font.html">Foundation Icon Font</a>
                  </li>
                  <li>
                    <a href="icon_fonts_metrize_icons.html">Metrize Icons</a>
                  </li>
                  <li>
                    <a href="icon_fonts_picons_social.html">Picons Social</a>
                  </li>
                  <li>
                    <a href="icon_fonts_batch_icons.html">Batch Icons</a>
                  </li>
                  <li>
                    <a href="icon_fonts_dashicons.html">Dashicons</a>
                  </li>
                  <li>
                    <a href="icon_fonts_typicons.html">Typicons</a>
                  </li>
                  <li>
                    <a href="icon_fonts_weather_icons.html">Weather Icons</a>
                  </li>
                  <li>
                    <a href="icon_fonts_light_admin.html">Light Admin</a>
                  </li>
                </ul>
              </li>
            </ul>
            <!--------------------
            END - Mobile Menu List
            -------------------->
            <div class="mobile-menu-magic">
              <h4>
                Light Admin
              </h4>
              <p>
                Clean Bootstrap 4 Template
              </p>
              <div class="btn-w">
                <a class="btn btn-white btn-rounded" href="https://themeforest.net/item/light-admin-clean-bootstrap-dashboard-html-template/19760124?ref=Osetin" target="_blank">Purchase Now</a>
              </div>
            </div>
          </div>
        <?php endif; ?>
      </div>
      <!--------------------
        END - Mobile Menu
        -------------------->
      <!--------------------
        START - Main Menu
        -------------------->
      <div class="menu-w color-scheme-dark color-style-bright menu-position-side menu-side-left menu-layout-mini sub-menu-style-over sub-menu-color-bright selected-menu-color-light menu-activated-on-hover menu-has-selected-link">
        <div class="logo-w">
          <a class="logo" href="index.html">
            <div class="logo-element"></div>
            <div class="logo-label">
              Clean Admin
            </div>
          </a>
        </div>
        <?php if ($this->session->logged_in) : ?>
          <div class="logged-user-w avatar-inline">
            <div class="logged-user-i">
              <div class="avatar-w">
                <img alt="" src="<?= base_url() ?>template/assets/img/avatar1.jpg">
              </div>
              <div class="logged-user-info-w">
                <div class="logged-user-name">
                  <?php echo $this->session->user_firstname; ?>
                </div>
                <div class="logged-user-role">
                  Administrator
                </div>
              </div>
              <div class="logged-user-toggler-arrow">
                <div class="os-icon os-icon-chevron-down"></div>
              </div>
              <div class="logged-user-menu color-style-bright">
                <div class="logged-user-avatar-info">
                  <div class="avatar-w">
                    <img alt="" src="<?= base_url() ?>template/assets/img/avatar1.jpg">
                  </div>
                  <div class="logged-user-info-w">
                    <div class="logged-user-name">
                      <?php echo $this->session->user_firstname; ?>
                    </div>
                    <div class="logged-user-role">
                      Administrator
                    </div>
                  </div>
                </div>
                <div class="bg-icon">
                  <i class="os-icon os-icon-wallet-loaded"></i>
                </div>
                <ul>
                  <li>
                    <a href="apps_email.html"><i class="os-icon os-icon-mail-01"></i><span>Incoming Mail</span></a>
                  </li>
                  <li>
                    <a href="users_profile_big.html"><i class="os-icon os-icon-user-male-circle2"></i><span>Profile Details</span></a>
                  </li>
                  <li>
                    <a href="users_profile_small.html"><i class="os-icon os-icon-coins-4"></i><span>Billing Details</span></a>
                  </li>
                  <li>
                    <a href="#"><i class="os-icon os-icon-others-43"></i><span>Notifications</span></a>
                  </li>
                  <li>
                    <a href="<?php echo base_url('connect/logout') ?>"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        <?php endif ?>
        <h1 class="menu-page-header">
          Page Header
        </h1>
        <ul class="main-menu">
          <li class="sub-header">
            <span>Layouts</span>
          </li>
          <li class="selected has-sub-menu">
            <a href="#">
              <div class="icon-w">
                <div class="os-icon os-icon-layout"></div>
              </div>
              <span>Dashboard</span>
            </a>
            <div class="sub-menu-w">
              <div class="sub-menu-header">
                Dashboard
              </div>
              <div class="sub-menu-icon">
                <i class="os-icon os-icon-layout"></i>
              </div>
              <div class="sub-menu-i">
                <ul class="sub-menu">
                  <li>
                    <a href="<?= base_url() . 'dashboard/index' ?>">Dashboard</a>
                  </li>
                </ul>
              </div>
            </div>
          </li>
          <li class=" has-sub-menu">
            <a href="#">
              <div class="icon-w">
                <div class="os-icon os-icon-layers"></div>
              </div>
              <span>Catégories</span>
            </a>
            <div class="sub-menu-w">
              <div class="sub-menu-header">
              Catégories
              </div>
              <div class="sub-menu-icon">
                <i class="os-icon os-icon-layers"></i>
              </div>
              <div class="sub-menu-i">
                <ul class="sub-menu">
                  <li>
                  <a href="<?= base_url() .'categories/index'?>">Catégories</a>
                  </li>
                  
                </ul>
               
                
              </div>
            </div>
          </li>
          <li class="sub-header">
            <span>Processus</span>
          </li>
          <li class=" has-sub-menu">
            <a href="#">
              <div class="icon-w">
                <div class="os-icon os-icon-package"></div>
              </div>
              <span>Processus</span>
            </a>
            <div class="sub-menu-w">
              <div class="sub-menu-header">
              Processus
              </div>
              <div class="sub-menu-icon">
                <i class="os-icon os-icon-package"></i>
              </div>
              <div class="sub-menu-i">
                <ul class="sub-menu">
                  <li>
                  <a href="<?= base_url() .'process/index'?>">Processus</a>
                  </li>
                  <li>
                    <a href="<?= base_url() .'process_check_list/index'?>">check-lists</a>
                  </li>
                  
                </ul>
                
              </div>
            </div>
          </li>
          <li class=" has-sub-menu">
            <a href="#">
              <div class="icon-w">
                <div class="os-icon os-icon-file-text"></div>
              </div>
              <span>Gestion des dossiers</span>
            </a>
            <div class="sub-menu-w">
              <div class="sub-menu-header">
              Gestion des dossiers
              </div>
              <div class="sub-menu-icon">
                <i class="os-icon os-icon-file-text"></i>
              </div>
              <div class="sub-menu-i">
                <ul class="sub-menu">
                  <li>
                  <a href="<?= base_url() .'posts/index'?>">Gestion des dossiers</a>
                  </li>
                  <li>
                  <a href="<?= base_url() .'posts_types/index'?>">Types des dossiers</a>
                  </li>                    
                </ul>
              </div>
            </div>
          </li>
          <li class=" has-sub-menu">
            <a href="#">
              <div class="icon-w">
                <div class="os-icon os-icon-users"></div>
              </div>
              <span>Utilisateurs</span>
            </a>
            <div class="sub-menu-w">
              <div class="sub-menu-header">
              Utilisateurs
              </div>
              <div class="sub-menu-icon">
                <i class="os-icon os-icon-users"></i>
              </div>
              <div class="sub-menu-i">
                <ul class="sub-menu">
                  <li>
                  <a href="<?= base_url() .'users/index'?>">Utilisateurs </a>
                  </li>
                  <li>
                  <a href="<?= base_url() .'account_type/index'?>">Types Des Comptes</a>
                  </li>
                </ul>
              </div>
            </div>
          </li>
          <li class=" has-sub-menu">
            <a href="#">
              <div class="icon-w">
                <div class="os-icon os-icon-edit-32"></div>
              </div>
              <span>Attributs</span>
            </a>
            <div class="sub-menu-w">
              <div class="sub-menu-header">
              Attributs
              </div>
              <div class="sub-menu-icon">
                <i class="os-icon os-icon-edit-32"></i>
              </div>
              <div class="sub-menu-i">
                <ul class="sub-menu">
                  <li>
                    <a href="<?= base_url() .'attributes/index'?>">Gestion des attributs</a>
                  </li>
                  <li>
                    <a href="<?= base_url() .'attributes_values/index'?>">Valeurs des attributs</a>
                  </li>
                </ul>
              </div>
            </div>
          </li>
        </ul>
        <div class="side-menu-magic">
          <h4>
            Light Admin
          </h4>
          <p>
            Clean Bootstrap 4 Template
          </p>
          <div class="btn-w">
            <a class="btn btn-white btn-rounded" href="https://themeforest.net/item/light-admin-clean-bootstrap-dashboard-html-template/19760124?ref=Osetin" target="_blank">Purchase Now</a>
          </div>
        </div>
      </div>
      <!--------------------
        END - Main Menu
        -------------------->
      <div class="content-w">
        <!--------------------
          START - Top Bar
          -------------------->
        <div class="top-bar color-scheme-bright">
          <div class="fancy-selector-w">
            <div class="fancy-selector-current">
              <div class="fs-img">
                <img alt="" src="<?= base_url() ?>template/assets/img/card4.png">
              </div>
              <div class="fs-main-info">
                <div class="fs-name">
                  <span>Bitcoin Portfolio</span><strong>BTC</strong>
                </div>
                <div class="fs-sub">
                  <span>Balance:</span><strong>$5,304</strong>
                </div>
              </div>
              <div class="fs-selector-trigger">
                <i class="os-icon os-icon-arrow-down4"></i>
              </div>
            </div>
            <div class="fancy-selector-options">
              <div class="fancy-selector-option">
                <div class="fs-img">
                  <img alt="" src="<?= base_url() ?>template/assets/img/card2.png">
                </div>
                <div class="fs-main-info">
                  <div class="fs-name">
                    <span>Lite Portfolio</span><strong>ETH</strong>
                  </div>
                  <div class="fs-sub">
                    <span>Balance:</span><strong>$5,304</strong>
                  </div>
                </div>
              </div>
              <div class="fancy-selector-option active">
                <div class="fs-img">
                  <img alt="" src="<?= base_url() ?>template/assets/img/card4.png">
                </div>
                <div class="fs-main-info">
                  <div class="fs-name">
                    <span>Bitcoin Portfolio</span><strong>BTC</strong>
                  </div>
                  <div class="fs-sub">
                    <span>Balance:</span><strong>$8,274</strong>
                  </div>
                </div>
              </div>
              <div class="fancy-selector-option">
                <div class="fs-img">
                  <img alt="" src="<?= base_url() ?>template/assets/img/card3.png">
                </div>
                <div class="fs-main-info">
                  <div class="fs-name">
                    <span>Ripple Portfolio</span><strong>RPX</strong>
                  </div>
                  <div class="fs-sub">
                    <span>Balance:</span><strong>$1,202</strong>
                  </div>
                </div>
              </div>
              <div class="fancy-selector-actions text-right">
                <a class="btn btn-primary" href="#"><i class="os-icon os-icon-ui-22"></i><span>Add Account</span></a>
              </div>
            </div>
          </div>
          <!--------------------
            START - Top Menu Controls
            -------------------->
          <div class="top-menu-controls">
            <div class="element-search autosuggest-search-activator">
              <input placeholder="Start typing to search..." type="text">
            </div>
            <!--------------------
              START - Messages Link in secondary top menu
              -------------------->
            <div class="messages-notifications os-dropdown-trigger os-dropdown-position-left">
              <i class="os-icon os-icon-mail-14"></i>
              <div class="new-messages-count">
                12
              </div>
              <div class="os-dropdown light message-list">
                <ul>
                  <li>
                    <a href="#">
                      <div class="user-avatar-w">
                        <img alt="" src="<?= base_url() ?>template/assets/img/avatar1.jpg">
                      </div>
                      <div class="message-content">
                        <h6 class="message-from">
                          John Mayers
                        </h6>
                        <h6 class="message-title">
                          Account Update
                        </h6>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="user-avatar-w">
                        <img alt="" src="<?= base_url() ?>template/assets/img/avatar2.jpg">
                      </div>
                      <div class="message-content">
                        <h6 class="message-from">
                          Phil Jones
                        </h6>
                        <h6 class="message-title">
                          Secutiry Updates
                        </h6>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="user-avatar-w">
                        <img alt="" src="<?= base_url() ?>template/assets/img/avatar3.jpg">
                      </div>
                      <div class="message-content">
                        <h6 class="message-from">
                          Bekky Simpson
                        </h6>
                        <h6 class="message-title">
                          Vacation Rentals
                        </h6>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="user-avatar-w">
                        <img alt="" src="<?= base_url() ?>template/assets/img/avatar4.jpg">
                      </div>
                      <div class="message-content">
                        <h6 class="message-from">
                          Alice Priskon
                        </h6>
                        <h6 class="message-title">
                          Payment Confirmation
                        </h6>
                      </div>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <!--------------------
              END - Messages Link in secondary top menu
              -------------------->
            <!--------------------
              START - Settings Link in secondary top menu
              -------------------->
            <div class="top-icon top-settings os-dropdown-trigger os-dropdown-position-left">
              <i class="os-icon os-icon-ui-46"></i>
              <div class="os-dropdown">
                <div class="icon-w">
                  <i class="os-icon os-icon-ui-46"></i>
                </div>
                <ul>
                  <li>
                    <a href="users_profile_small.html"><i class="os-icon os-icon-ui-49"></i><span>Profile Settings</span></a>
                  </li>
                  <li>
                    <a href="users_profile_small.html"><i class="os-icon os-icon-grid-10"></i><span>Billing Info</span></a>
                  </li>
                  <li>
                    <a href="users_profile_small.html"><i class="os-icon os-icon-ui-44"></i><span>My Invoices</span></a>
                  </li>
                  <li>
                    <a href="users_profile_small.html"><i class="os-icon os-icon-ui-15"></i><span>Cancel Account</span></a>
                  </li>
                </ul>
              </div>
            </div>
            <!--------------------
              END - Settings Link in secondary top menu
              -------------------->
            <!--------------------
              START - User avatar and menu in secondary top menu
              -------------------->
            <?php if ($this->session->logged_in) : ?>
              <div class="logged-user-w">
                <div class="logged-user-i">
                  <div class="avatar-w">
                    <img alt="" src="<?= base_url() ?>template/assets/img/avatar1.jpg">
                  </div>
                  <div class="logged-user-menu color-style-bright">
                    <div class="logged-user-avatar-info">
                      <div class="avatar-w">
                        <img alt="" src="<?= base_url() ?>template/assets/img/avatar1.jpg">
                      </div>
                      <div class="logged-user-info-w">
                        <div class="logged-user-name">
                          <?php echo $this->session->user_firstname ?>
                        </div>
                        <div class="logged-user-role">
                          Administrator
                        </div>
                      </div>
                    </div>
                    <div class="bg-icon">
                      <i class="os-icon os-icon-wallet-loaded"></i>
                    </div>
                    <ul>
                      <li>
                        <a href="apps_email.html"><i class="os-icon os-icon-mail-01"></i><span>Incoming Mail</span></a>
                      </li>
                      <li>
                        <a href="users_profile_big.html"><i class="os-icon os-icon-user-male-circle2"></i><span>Profile Details</span></a>
                      </li>
                      <li>
                        <a href="users_profile_small.html"><i class="os-icon os-icon-coins-4"></i><span>Billing Details</span></a>
                      </li>
                      <li>
                        <a href="#"><i class="os-icon os-icon-others-43"></i><span>Notifications</span></a>
                      </li>
                      <li>
                        <a href="<?php echo base_url('connect/logout') ?>"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            <?php endif; ?>
            <!--------------------
              END - User avatar and menu in secondary top menu
              -------------------->
          </div>
          <!--------------------
            END - Top Menu Controls
            -------------------->
        </div>
        <!--------------------
          END - Top Bar
          -------------------->
        <div class="content-panel-toggler">
          <i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span>
        </div>
        <div class="content-i">
        <div class="content-box">
          
          <?=@$contents;?>
          </div>
          <div class="content-panel compact color-scheme-dark">
            <div class="content-panel-close">
              <i class="os-icon os-icon-close"></i>
            </div>
            <div class="element-wrapper">
              <div class="element-actions actions-only">
                <a class="element-action element-action-fold" href="#"><i class="os-icon os-icon-minus-circle"></i></a>
              </div>
              <h6 class="element-header">
                Quick Conversion
              </h6>
              <div class="element-box-tp">
                <form action="">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="">From</label><select class="form-control">
                          <option>
                            Bitcoins
                          </option>
                          <option>
                            Litecoins
                          </option>
                          <option>
                            Ripple
                          </option>
                          <option>
                            Dogecoin
                          </option>
                        </select>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="">To</label><select class="form-control">
                          <option>
                            USD
                          </option>
                          <option>
                            Litecoins
                          </option>
                          <option>
                            Ripple
                          </option>
                          <option>
                            Dogecoin
                          </option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="">Amount</label>
                        <div class="input-group">
                          <input class="form-control" placeholder="Amount..." type="text" value="1.37">
                          <div class="input-group-append">
                            <div class="input-group-text">
                              BTC
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="">Price per BTC</label>
                        <div class="input-group">
                          <input class="form-control" type="text" value="8,284">
                          <div class="input-group-append">
                            <div class="input-group-text">
                              USD
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <button class="btn btn-primary btn-block btn-lg"><i class="os-icon os-icon-refresh-ccw"></i><span>Transfer Now</span></button>
                </form>
              </div>
            </div>
            <div class="element-wrapper compact">
              <div class="element-actions actions-only">
                <a class="element-action element-action-fold" href="#"><i class="os-icon os-icon-minus-circle"></i></a>
              </div>
              <h6 class="element-header">
                Order History
              </h6>
              <div class="element-box-tp">
                <table class="table table-compact smaller text-faded mb-0">
                  <thead>
                    <tr>
                      <th>
                        Type
                      </th>
                      <th class="text-center">
                        Date
                      </th>
                      <th class="text-right">
                        Amount
                      </th>
                      <th class="text-right">
                        Fee
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <span>BTC</span><i class="os-icon os-icon-repeat icon-separator"></i><span>USD</span>
                      </td>
                      <td class="text-center">
                        01.08
                      </td>
                      <td class="text-right text-bright">
                        $25.38
                      </td>
                      <td class="text-right text-danger">
                        -$1.23
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span>RPX</span><i class="os-icon os-icon-repeat icon-separator"></i><span>ETH</span>
                      </td>
                      <td class="text-center">
                        01.07
                      </td>
                      <td class="text-right text-bright">
                        $15.21
                      </td>
                      <td class="text-right text-danger">
                        -$1.13
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span>LTC</span><i class="os-icon os-icon-repeat icon-separator"></i><span>BTC</span>
                      </td>
                      <td class="text-center">
                        01.05
                      </td>
                      <td class="text-right text-bright">
                        $17.43
                      </td>
                      <td class="text-right text-danger">
                        -$2.14
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span>PRX</span><i class="os-icon os-icon-repeat icon-separator"></i><span>LTC</span>
                      </td>
                      <td class="text-center">
                        01.05
                      </td>
                      <td class="text-right text-bright">
                        $23.18
                      </td>
                      <td class="text-right text-danger">
                        -$3.17
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span>ETH</span><i class="os-icon os-icon-repeat icon-separator"></i><span>USD</span>
                      </td>
                      <td class="text-center">
                        01.04
                      </td>
                      <td class="text-right text-bright">
                        $35.42
                      </td>
                      <td class="text-right text-danger">
                        -$3.12
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span>BTC</span><i class="os-icon os-icon-repeat icon-separator"></i><span>ETH</span>
                      </td>
                      <td class="text-center">
                        01.02
                      </td>
                      <td class="text-right text-bright">
                        $72.62
                      </td>
                      <td class="text-right text-danger">
                        -$4.15
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span>RPX</span><i class="os-icon os-icon-repeat icon-separator"></i><span>USD</span>
                      </td>
                      <td class="text-center">
                        12.29
                      </td>
                      <td class="text-right text-bright">
                        $25.38
                      </td>
                      <td class="text-right text-danger">
                        -$1.23
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span>ETH</span><i class="os-icon os-icon-repeat icon-separator"></i><span>BTC</span>
                      </td>
                      <td class="text-center">
                        12.28
                      </td>
                      <td class="text-right text-bright">
                        $52.11
                      </td>
                      <td class="text-right text-danger">
                        -$4.72
                      </td>
                    </tr>
                  </tbody>
                </table>
                <a class="centered-load-more-link smaller" href="#"><span>Load More Transactions</span></a>
              </div>
            </div>
            <div class="element-wrapper compact">
              <div class="element-actions actions-only">
                <a class="element-action element-action-fold" href="#"><i class="os-icon os-icon-minus-circle"></i></a>
              </div>
              <h6 class="element-header">
                Profile Completion
              </h6>
              <div class="element-box-tp">
                <div class="fancy-progress-with-label">
                  <div class="fpl-label">
                    65%
                  </div>
                  <div class="fpl-progress-w">
                    <div class="fpl-progress-i" style="width: 65%;"></div>
                  </div>
                </div>
                <div class="todo-list">
                  <a class="todo-item complete" href="#">
                    <div class="ti-info">
                      <div class="ti-header">
                        Connect Bank Account
                      </div>
                      <div class="ti-sub-header">
                        You have connected 2 accounts
                      </div>
                    </div>
                    <div class="ti-icon">
                      <i class="os-icon os-icon-check"></i>
                    </div>
                  </a><a class="todo-item complete" href="#">
                    <div class="ti-info">
                      <div class="ti-header">
                        Upload Tax Documents
                      </div>
                      <div class="ti-sub-header">
                        You uploaded W-2 and 1099
                      </div>
                    </div>
                    <div class="ti-icon">
                      <i class="os-icon os-icon-check"></i>
                    </div>
                  </a><a class="todo-item" href="#">
                    <div class="ti-info">
                      <div class="ti-header">
                        Deposit Money
                      </div>
                      <div class="ti-sub-header">
                        You can deposit from your bank
                      </div>
                    </div>
                    <div class="ti-icon">
                      <i class="os-icon os-icon-arrow-right7"></i>
                    </div>
                  </a>
                </div>
              </div>
            </div>
            <div class="d-xxl-none">
              <div class="cta-w orange text-center">
                <div class="cta-content extra-padded">
                  <div class="highlight-header">
                    Bonus
                  </div>
                  <h5 class="cta-header">
                    Invite your friends and make money with referrals
                  </h5>
                  <form action="">
                    <div class="newsletter-field-w">
                      <input placeholder="Email address..." type="text"><button class="btn btn-sm btn-primary">Send</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="display-type"></div>
  </div>
  <script src="<?= base_url() ?>template/assets/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url() ?>template/assets/bower_components/popper.js/dist/umd/popper.min.js"></script>
  <script src="<?= base_url() ?>template/assets/bower_components/moment/moment.js"></script>
  <script src="<?= base_url() ?>template/assets/bower_components/chart.js/dist/Chart.min.js"></script>
  <script src="<?= base_url() ?>template/assets/bower_components/select2/dist/js/select2.full.min.js"></script>
  <script src="<?= base_url() ?>template/assets/bower_components/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
  <script src="<?= base_url() ?>template/assets/bower_components/ckeditor/ckeditor.js"></script>
  <script src="<?= base_url() ?>template/assets/bower_components/bootstrap-validator/dist/validator.min.js"></script>
  <script src="<?= base_url() ?>template/assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="<?= base_url() ?>template/assets/bower_components/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
  <script src="<?= base_url() ?>template/assets/bower_components/dropzone/dist/dropzone.js"></script>
  <script src="<?= base_url() ?>template/assets/bower_components/editable-table/mindmup-editabletable.js"></script>
  <script src="<?= base_url() ?>template/assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>template/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="<?= base_url() ?>template/assets/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
  <script src="<?= base_url() ?>template/assets/bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"></script>
  <script src="<?= base_url() ?>template/assets/bower_components/tether/dist/js/tether.min.js"></script>
  <script src="<?= base_url() ?>template/assets/bower_components/slick-carousel/slick/slick.min.js"></script>
  <script src="<?= base_url() ?>template/assets/bower_components/bootstrap/js/dist/util.js"></script>
  <script src="<?= base_url() ?>template/assets/bower_components/bootstrap/js/dist/alert.js"></script>
  <script src="<?= base_url() ?>template/assets/bower_components/bootstrap/js/dist/button.js"></script>
  <script src="<?= base_url() ?>template/assets/bower_components/bootstrap/js/dist/carousel.js"></script>
  <script src="<?= base_url() ?>template/assets/bower_components/bootstrap/js/dist/collapse.js"></script>
  <script src="<?= base_url() ?>template/assets/bower_components/bootstrap/js/dist/dropdown.js"></script>
  <script src="<?= base_url() ?>template/assets/bower_components/bootstrap/js/dist/modal.js"></script>
  <script src="<?= base_url() ?>template/assets/bower_components/bootstrap/js/dist/tab.js"></script>
  <script src="<?= base_url() ?>template/assets/bower_components/bootstrap/js/dist/tooltip.js"></script>
  <script src="<?= base_url() ?>template/assets/bower_components/bootstrap/js/dist/popover.js"></script>
  <script src="<?= base_url() ?>template/assets/js/demo_customizer.js?version=4.4.0"></script>
  <script src="<?= base_url() ?>template/assets/js/main.js?version=4.4.0"></script>
  <script src="<?= base_url() ?>signin_template/assets/js/users.js?version=<?= rand(); ?>"></script>
  <!-- <script src="<?= base_url() ?>signin_template/assets/js/edit_user.js?version=<?= rand(); ?>"></script> -->
  <script src="<?= base_url() ?>signin_template/assets/js/accountType.js?version=<?= rand(); ?>"></script>
  <script src="<?= base_url() ?>signin_template/assets/js/categories.js?version=<?= rand(); ?>"></script>
  <script src="<?= base_url() ?>signin_template/assets/js/process.js?version=<?= rand(); ?>"></script>
  <script src="<?= base_url() ?>signin_template/assets/js/posts.js?version=<?= rand(); ?>"></script>
  <script src="<?= base_url() ?>signin_template/assets/js/posts_types.js?version=<?= rand(); ?>"></script>
  <script src="<?= base_url() ?>signin_template/assets/js/attributes.js?version=<?= rand(); ?>"></script>
  <script src="<?= base_url() ?>signin_template/assets/js/attributes_values.js?version=<?= rand(); ?>"></script>
  <script src="<?= base_url() ?>signin_template/assets/js/process_check_list.js?version=<?= rand(); ?>"></script>
  <script src="<?= base_url() ?>template/assets/js/dataTables.bootstrap4.min.js"></script>

  <!-- Toastr -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <script>
    (function(i, s, o, g, r, a, m) {
      i['GoogleAnalyticsObject'] = r;
      i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
      }, i[r].l = 1 * new Date();
      a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
      a.async = 1;
      a.src = g;
      m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-XXXXXXX-9', 'auto');
    ga('send', 'pageview');
  </script>
  
</body>

</html>