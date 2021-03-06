<?php session_start(); ?>\

<!doctype html>
<html lang="en">

<head>
  <title><?php if (isset($page_title)) echo $page_title; ?></title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  
  <link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

     <!--Slick-->
     <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
</head>