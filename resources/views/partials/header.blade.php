<!DOCTYPE html>


<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>HISS App</title>

    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>

    <!-- link rel="stylesheet" href="https://fonts.cdnfonts.com/css/bariol-bold" -->
    
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />
    <!-- link rel="stylesheet" href="https://fonts.cdnfonts.com/css/bariol-bold" -->

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <!-- link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" / -->
    <!-- link rel="stylesheet" href="../assets/overlayscrollbars/css/OverlayScrollbars.css"/ -->
    <!-- link rel="stylesheet" href="../assets/overlayscrollbars/css/OverlayScrollbars.min.css"/ -->

    <link href="/assets/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="/assets/fontawesome/css/brands.css" rel="stylesheet">
    <link href="/assets/fontawesome/css/solid.css" rel="stylesheet">    

    <link rel="stylesheet" href="/assets/sweetalert2/css/sweetalert2.min.css">
    <!-- link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" -->
    
    <!-- Page CSS -->
    <link rel="stylesheet" href="../navbar/css/meanmenu/meanmenu.min.css">
    <link rel="stylesheet" href="../navbar/css/notika-custom-icon.css">   
    <link rel="stylesheet" href="../navbar/stylenavbar.css">
    <!-- link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css"/ -->

    <!-- link rel="stylesheet" type="text/css" href="/assets/datatables/css/jquery.dataTables.css" -->
    <!-- link href="/assets/datatables/css/dataTables.bootstrap4.min.css" rel="stylesheet" --> 

    <!-- link href="https://cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet" / -->

    <!-- link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css" -->
    <!-- script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script -->

    <!-- Helpers -->
    <script src="/assets/vendor/js/helpers.js"></script>

    <!-- Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!-- Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <!-- script src="../assets/js/config.js"></script -->
  </head>
  <body style="font-family: 'Nunito';">
    <style>

      @media screen and (min-width: 1020px){
        .custom-menu-content{
        padding-left: 150px;
        }
        .logodmcr{
          margin-right: 50px;
        }
      }
      @media screen and (max-width: 1020px) and (min-width: 700px){
        .mainm{
        width: 50px;
        height: auto;
        }
        .logodmcr{
          width: 60px;
          height: auto;
          margin-right: 10px;

        }
        .logodmcareli{
    
        }
        .account{
          width:60px;

        }
        .subm{
          height: 15px;
        }
        .custom-menu-content ul.notika-main-menu-dropdown li a{
          padding: 3px 10px;
          display: block;
          font-size: 10px;
          margin: 5px;
        }
        .custom-menu-content{
          background-color: #217CAB;
          border-radius:0px 0px 25px 25px; 
          padding-left: 80px;
        }
      }
      @media screen and (max-width: 700px) and (min-width: 507px){
        .mainm{
              
          width: 30px;
          height: auto;
        
        }
        .logodmcr{
          width: 40px;
          height: auto;
          margin-right: 10px;

        }
        .logodmcareli{
        
            }
        .subm{
          height: 10px;
        }
        .custom-menu-content ul.notika-main-menu-dropdown li a{
          padding: 3px;
          display: block;
          font-size: 10px;
          margin: 1px;
        }
        .account{
          width:45px;

        }
        .custom-menu-content{
          background-color: #217CAB;
          border-radius:0px 0px 25px 25px; 
          padding-left: 70px;
        }
      }
      @media screen and (max-width: 507px){
        .mainm{
              
          width: 20px;
          height: auto;
        
        }
        .logodmcr{
          width: 30px;
          height: auto;
          margin-right: 0px;

        }
        .logodmcareli{
        
            }
        .subm{
          height: 10px;
        }
        .custom-menu-content ul.notika-main-menu-dropdown li a{
          padding: 3px;
          display: block;
          font-size: 10px;
          margin: 1px;
        }
        .account{
          width:30px;

        }
        .custom-menu-content{
          background-color: #217CAB;
          border-radius:0px 0px 25px 25px; 
          padding-left: 10px;
        }
       
      }
    </style>
    <!-- Layout wrapper -->   
    <div class="main-menu-area"style="border-radius :0px 0px 25px 25px;background-color:#FFF; width:auto;" >
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"style="" >
                <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                  <li class="logodmcareli"><a href="/dashboard"><img src="../navbar/logod-MCare.png" alt=""class="logodmcr" data-toggle="tooltip" data-placement="top" title="Dashboard"></a>
                  </li>
                  @php 
                    $menud = Session::get('arrmenu');
                    $menu  = $menud['menu'];
                    $sub_menu = $menud['sub_menu'];
                    
                    foreach ($menu as $key => $val) {
                      $menux = $val['menu'];
                      $icon  = $val['icon'];
                      echo " <li class='limainm'> ";
                      echo " <a data-toggle='tab' href='#$key' class='active'><img src='$icon' alt='' class='mainm' data-toggle='tooltip' data-placement='top' title='$menux'></a> ";
                      echo ' </li>';
                    }
                  @endphp
                </ul>
                 <a href="#" data-bs-toggle="modal" data-bs-target="#ModalLogout">
                  <img class="account" style="float: right; top: 2px; margin-right: 10px; position:absolute; right:0px; "src="/navbar/logoutmerah.png " alt="" data-toggle="tooltip" data-placement="top" title="Logout"></a>
                  @include('auth.logout')
                
                <div class="tab-content custom-menu-content"style="background-color: #0c5795;border-radius:0px 0px 10px 10px;">
                    @php
                      // $posisi = Cookies.get('posisi');
                      $posisi = Session::get('posisi');
                      $posisiSub = Session::get('posisiSub');
                      foreach ($menu as $key => $val) {
                        if ($posisi < 1) {
                          $posisi = $key;
                        }
                        if ($posisi == $key) {
                          $active = 'active';
                        } else {
                          $active = '';
                        }
                        $menux = $val['menu'];
                        $icon = $val['icon'];
                        echo "<div id='$key' class='tab-pane $active anima'>";
                        echo " <ul class='notika-main-menu-dropdown' >";
                        foreach ($sub_menu[$key] as $keya => $valuea) {
                          if ($posisiSub == $keya) {
                            $active = 'submenu-active';
                          } else {
                            $active = 'submenu';
                          }
                          $url = $valuea['url'];
                          $submenu = $valuea['sub_menu'];
                          echo "<li><a href='#' class='$active' onclick=load_url('$url','$key','$keya') > $submenu</a>";
                          echo '</li>';
                        }
                    
                        echo '</ul>';
                        echo '</div>';
                      }
                      Session::forget('posisiSub');                        
                    @endphp                    
                </div>
            </div>
        </div>
      </div>
      <!-- Navbar -->
      <!-- / Navbar -->
      <!-- Content wrapper -->