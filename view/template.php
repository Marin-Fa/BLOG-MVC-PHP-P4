<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <!-- Tiny -->
    <script src="https://cdn.tiny.cloud/1/srhkiqvonn5wda7a0350imoal8zs3grvln3eetetzvo3ktnb/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#adminform'
        });
    </script>

    <link rel="stylesheet" href="public/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="public/css/animate.css">

    <link rel="stylesheet" href="public/css/owl.carousel.min.css">
    <link rel="stylesheet" href="public/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="public/css/magnific-popup.css">

    <link rel="stylesheet" href="public/css/aos.css">

    <link rel="stylesheet" href="public/css/ionicons.min.css">

    <link rel="stylesheet" href="public/css/flaticon.css">
    <link rel="stylesheet" href="public/css/icomoon.css">
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
    <nav class="navbar px-md-0 navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.php">Single ticket for<i> Alaska</i>.</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="index.php?action=showContactPage" class="nav-link">Contact</a></li>
<!--                    <li class="nav-item active"><a href="index.php?action=showLoginAdminPanel" class="nav-link">Admin</a></li>-->
                    <?php if (!$_SESSION) { ?>
                        <li class="nav-item"><a href="index.php?action=showRegisterPage" class="nav-link">Login</a></li>
                    <?php } elseif ($_SESSION['username']) { ?>
                        <li class="nav-item"><a href="index.php?action=logOut" class="nav-link">Logout</a></li>
                    <?php } ?>

                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->
    <?= $content ?>
    <!-- END content -->
    <footer class="ftco-footer ftco-bg-dark ftco-section">
        <div class="container">
            <div class="row mb-12">
                <div class="col-md-12 text-center">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="logo"><a href="#">Follow<span>Me</span>.</a></h2>
                        <ul class="ftco-footer-social list-unstyled">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>



            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved by Jean Forteroche</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- END footer -->

    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="public/js/popper.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/jquery.easing.1.3.js"></script>
    <script src="public/js/jquery.waypoints.min.js"></script>
    <script src="public/js/jquery.stellar.min.js"></script>
    <script src="public/js/owl.carousel.min.js"></script>
    <script src="public/js/jquery.magnific-popup.min.js"></script>
    <script src="public/js/aos.js"></script>
    <script src="public/js/jquery.animateNumber.min.js"></script>
    <script src="public/js/scrollax.min.js"></script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script> -->
    <!-- <script src="public/js/google-map.js"></script> -->
    <script src="public/js/main.js"></script>
    <script src="public/js/contact.js"></script>
</body>

</html>