<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Laravel')); ?></title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    </head>
    <style>
         body{
                margin: 0;
                background-image:url('<?php echo e(asset('images/root_bg.png')); ?>');
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
                opacity:0.7;
            }
            
    </style>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <?php echo e($slot); ?>

            </div>
        </div>
    </body>
</html>
<?php /**PATH D:\xampp_8_2_4\htdocs\user_management_system\resources\views/layouts/guest.blade.php ENDPATH**/ ?>