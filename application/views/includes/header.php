<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $pageTitle ?></title>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url().'assets/landingpage/image/favicon-mirota.png'?>">

    <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />

    <link
    href="https://cdn.jsdelivr.net/gh/loadingio/transition.css@v2.0.0/dist/transition.css"
    rel="stylesheet"
    />
    <link
    href="https://cdn.jsdelivr.net/gh/loadingio/transition.css@v2.0.0/dist/transition.min.css"
    rel="stylesheet"
    />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link href="<?= base_url().'assets/landingpage/css/style.css'?>" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Tilt+Warp&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
        <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/landingpage/owlcarousel/css/owl.carousel.min.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/landingpage/owlcarousel/css/owl.theme.default.min.css'?>">


    <style>
    #load{
      width: 100%;
      height: 100%;
      position: fixed;
      text-indent: 100%;
      background: rgba(255,255,255) url('./assets/images/loader.gif') no-repeat center;
      z-index: 1;
      opacity: 0.8;
    }
  </style>

  </head>
  <body style="margin:0;">
  <div id="load"></div>
   <!-- <div id="loader"></div> -->
    <div class="main">
      <nav class="navBar z-3">
         <div class="con">
             <div class="logo ld ld-bounce-in">
               <a href="<?php echo base_url()?>">
                  <img class="img-logo" src="<?php echo base_url().'assets/landingpage/image/logo-mirota.png'?>" alt="" srcset="">
               </a>
                 <!-- <a href="#">Your Logo</a> -->
             </div>
             <div id="mainListDiv" class="main_list">
                 <ul class="navlinks">
                     <li><a href="<?php echo base_url()?>">Home</a></li>
                     <li><a href="<?php echo base_url('tentangkami')?>">Tentang Kami</a></li>
                     <li><a href="<?php echo base_url('produk')?>">Produk</a></li>
                     <li><a href="<?php echo base_url('maklon')?>">Maklon</a></li>
                     <li><a href="<?php echo base_url('kunjunganindustri')?>">Kunjungan Industri</a></li>
                     <li><a href="<?php echo base_url('karir')?>">Karir</a></li>
                     <li><a href="<?php echo base_url('kontakkami')?>">Kontak Kami</a></li>
                 </ul>
             </div>
             <span class="navTrigger">
                 <i></i>
                 <i></i>
                 <i></i>
             </span>
         </div>         
     </nav>   
     <!-- render the button and direct it to wa.me --> 
 