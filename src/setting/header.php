<?php  

use Futurelink\Main\lib\helper;
@session_start();

$help = new helper;
$help->checkLogin();
    
if(isset($_POST['logout'])){
    helper::logout();
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="/assets/images/icon.png"/>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/assets/dist/css/adminlte.css">
  <link rel="stylesheet" href="/assets/dist/css/main.css">
  <script src="/assets/plugins/jquery/jquery.min.js"></script>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">الصفحة الرئيسية</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/orders" class="nav-link">طلبات الصيانة</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/clients" class="nav-link">العملاء</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/payments/orders" class="nav-link">تحصيلات الطلبات</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/payments/" class="nav-link">المصروفات الاساسية</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/payments/notmain" class="nav-link">المصروفات الغير اساسية</a>
      </li>

    </ul>

    <!-- Right navbar links -->
   
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link text-center">
      <img src="/assets/images/Group 5.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Future Link</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel my-3 pb-3  text-center">
        <div class="image px-0">
        <i class="fas fa-user " style="color: #C2C7D0; font-size:24px; margin-right:15px;"></i>
          <!-- <img src="/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
        </div>
        <div class="info pb-0 pt-2 ">
          <a href="/user/" class="d-block"><?= $_SESSION['name'] ?></a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fas fa-cog"></i>
              <p>
                إدارة طلبات الصيانة
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/orders/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>عرض الطلبات المفتوحة</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/orders/closed" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>عرض الطلبات المغلقة</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/orders/add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>إضافة طلب</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/orders/closeview" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>تقفيل طلب</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
  
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fas fa-user-friends"></i>
              <p>
                إدارة العملاء
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/clients/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>عرض كل العملاء</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/clients/add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>إضافة عميل</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fas fa-users-cog"></i>
              <p>
                إدارة الموظفيين
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/employees/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>عرض كل الموظفيين</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/employees/add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>إضافة موظف</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fas fa-money-bill-wave"></i>
              <p>
                الامور المالية
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/payments/orders" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>عرض تحصيلات الطلبات</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/payments/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>المصروفات الاساسية</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/payments/notmain" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>المصروفات الغير اساسية</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/payments/add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>إضافة </p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fas fa-toolbox"></i>
              <p>
                قطع الغيار
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/parts/add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>إضافة قطعة</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/parts/edit" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>تعديل قطعة</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-desktop"></i>
              <p>
                انواع الأجهزة
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/devicesType/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>عرض كل الأجهزة</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/devicesType/add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>إضافة جهاز</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fas fa-layer-group"></i>
              <p>
              جميع البراند
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/devicesBrand/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>عرض كل البراند</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/devicesBrand/add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>إضافة براند</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fas fa-tools"></i>
              <p>
              اعطال الصيانة
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/problems/add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>إضافة عطل</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/problems/edit" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>تعديل عطل</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item mt-3">
            <form action="#" method="post"><a><button type="submit" class="btn btn-block btn-info  btn-sm" style="white-space: break-spaces;" name="logout">تسجيل الخروج</button></a></form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
