<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Admin | ApotekU</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/admin.css')); ?>">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
    
</head>

<body>
    <!-- Left Sidebar -->
    <div class="side-navbar active-nav d-flex justify-content-between flex-wrap flex-column">
        <ul class="nav flex-column text-white w-100 p-3">
            <a href="/" class="text-decoration-none text-dark h4 my-2 p-2 mb-4"><strong>ApotekU</strong></a>
            <li class="nav-item <?php echo e(Request::is('admin') ? 'menu-active' : ''); ?>">
                <a class="nav-link text-dark" aria-current="page" href="<?php echo e(url('admin')); ?>">Dashboard</a>
            </li>
            <li class="nav-item <?php echo e(Request::is('admin/obat') ? 'menu-active' : ''); ?>">
                <a class="nav-link text-dark" href="<?php echo e(url('admin/obat')); ?>">Data Obat</a>
            </li>
            <li class="nav-item <?php echo e(Request::is('admin/kategoriobat') ? 'menu-active' : ''); ?>">
                <a class="nav-link text-dark" href="<?php echo e(url('admin/kategoriobat')); ?>">Data Kategori obat</a>
            </li>
            <li class="nav-item <?php echo e(Request::is('admin/datapembeli') ? 'menu-active' : ''); ?>"> 
                <a class="nav-link text-dark" href="<?php echo e(url('admin/datapembeli')); ?>">Data Pembeli</a>
            </li>
            <li class="nav-item <?php echo e(Request::is('admin/report') ? 'menu-active' : ''); ?>"">
                <a class="nav-link text-dark" href="<?php echo e(url('admin/report')); ?>">Report</a>
            </li>
        </ul>
    </div>
    <!-- End of Left Sidebar -->
    <!-- Container -->
    <div class="my-container active-cont">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <h4 class="my-2 p-3"><?php echo $__env->yieldContent("title"); ?></h4>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <div class="nav-item dropdown">
                        <div class="dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa fa-user mr-1" aria-hidden="true"></i> <?php echo e(Auth::user()->name); ?>

                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/keluar">Logout</a>
                            </div>
                        </div>
                        
                    </div>
                </form>
            </div>
        </nav>
        <!-- End of Navbar -->
        <div class="pl-4 content">
            <?php echo $__env->yieldContent('container'); ?>
        </div>
    </div>
    <!-- End of Container -->
    <br><br><br>
    <?php echo $__env->yieldContent('modal'); ?>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html><?php /**PATH D:\Data Kuliah\Semester 6\Web Framework Programming\UAS\New folder\New folder\UASWFP_GENAP2122_ApotekU\resources\views/layouts/admin.blade.php ENDPATH**/ ?>