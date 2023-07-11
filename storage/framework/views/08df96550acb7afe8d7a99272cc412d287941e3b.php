<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>ApotekU</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/main.css')); ?>">

    

    <!-- Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>

    

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
        <!-- style="min-height: 70px;" -->
        <div class="container">
            <a class="navbar-brand" href="<?php echo e(url('/')); ?>">ApotekU</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item <?php echo e(Request::is('/') ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(url('/')); ?>">Produk</a>
                    </li>
                    
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <div class="dropdown">
                        <button type="button" class="btn mr-sm-2" data-toggle="dropdown">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i><span
                                class="badge badge-pill badge-danger"></span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" style="width: 260px; padding: 10px;">
                            <?php if(session('cart')): ?>
                                <?php $total = 0; ?>
                                <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $total += $details['price'] * $details['quantity']; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="row total-header-section">
                                    <div class="col-lg-6 col-sm-6 col-6">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i><span
                                            class="badge badge-pill badge-danger"></span>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                                        <p>Total: <span class="text-info"><?php echo e($total); ?></span></p>
                                    </div>
                                </div>
                                <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="row cart-detail">
                                        <div class="col-lg-3 col-sm-3 col-3 cart-detail-img">
                                            <img src="<?php echo e(asset('images/' . $details['photo'])); ?>" width="60"
                                                height="60">
                                        </div>
                                        <div class="col-lg-9 col-sm-9 col-9 cart-detail-product">
                                            <p><?php echo e($details['name']); ?></p>
                                            <span class="price text-info">Rp. <?php echo e($details['price']); ?></span><span
                                                class="count" style="float:right;"><?php echo e($details['quantity']); ?>x</span>
                                        </div>
                                    </div>
                                    <hr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                        <a href="<?php echo e(url('cart')); ?>" class="btn btn-dark btn-block">Lihat Semuanya</a>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-12 text-center checkout mt-3">
                                        <p>Keranjang Anda kosong</p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if(auth()->guard()->guest()): ?>
                        
                        <a class="btn btn-outline-dark mr-sm-2" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                        
                        <?php if(Route::has('register')): ?>
                            <a class="btn btn-dark mr-sm-2" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                        <?php endif; ?>
                    <?php else: ?>
                        <div class="dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <?php echo e(Auth::user()->name); ?>

                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo e(url('/transaksi')); ?>">Riwayat Pembelian</a>
                                <hr>
                                <a class="dropdown-item" href="/keluar">Logout</a>
                                

                            </div>
                        </div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        <?php echo $__env->yieldContent('container'); ?>
    </div>

    <br><br><br>
    <?php echo $__env->yieldContent('modal'); ?>

    <?php echo $__env->yieldContent('scripts'); ?>
</body>

</html>
<?php /**PATH D:\Data Kuliah\Semester 6\Web Framework Programming\UAS\New folder\New folder\UASWFP_GENAP2122_ApotekU\resources\views/layouts/index.blade.php ENDPATH**/ ?>