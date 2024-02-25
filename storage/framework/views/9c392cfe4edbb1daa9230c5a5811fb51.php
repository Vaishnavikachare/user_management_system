<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="shortcut icon" href="assests/images/logo/favicon.ico">
        <!-- Styles -->
        <style>
            * {
                box-sizing: border-box;
            }
            body{
                margin: 0;
                background-image:url('<?php echo e(asset('images/root_bg.png')); ?>');
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
            }
            .menu{
                float: right;
                overflow: hidden;
            }
            a {
                display: block;
                color: white;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }
            a:hover {
                background-color: purple;
                color:white;
            }
            footer {
                position: absolute;
                bottom: 0;
                text-align: center;
                padding: 3px;
                background-color: purple;
                color: white;
                width:100%;
            }
            .heading h2{
                color:white;
                text-align: center;
                padding-top:40vh;            }
        </style>
    </head>
    <body>
        <div class="topbar">
            <?php if(Route::has('login')): ?>
                <div>
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(url('/dashboard')); ?>" class="menu">Dashboard</a>
                    <?php else: ?>
                        <?php if(Route::has('register')): ?>
                            <a href="<?php echo e(route('register')); ?>" class="menu">Register</a>
                        <?php endif; ?>
                        <a href="<?php echo e(route('login')); ?>" class="menu">Log in</a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="heading" >
        <h2>User Management System</h2>
        </div>

        <footer>
        © 2024 - vaishnavi-kachare
        </footer>


    </body>
</html>
<?php /**PATH D:\xampp_8_2_4\htdocs\user_management_system\resources\views/welcome.blade.php ENDPATH**/ ?>