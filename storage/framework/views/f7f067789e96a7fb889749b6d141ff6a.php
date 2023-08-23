<html>
<head>
     <title><?php echo e(__('messages.title')); ?></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Bootstrap CSS end -->
    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Bootstrap JS and jQuery end-->
    <!-- Ajax start -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Ajax end -->

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
</head>
<body>
    <!--header start-->
        <div id="appheader"><?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
    <!-- header end-->
    <!--content start-->
        <div id="appcontent"><?php echo $__env->make('content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
    <!-- content end-->

    <!--footer start-->

    <!--footer end-->
</body>
</html><?php /**PATH /home/vagrant/code/AH/resources/views/main.blade.php ENDPATH**/ ?>