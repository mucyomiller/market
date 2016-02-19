<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Market</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/one-page-wonder.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
       @include('clients.header')
    <!-- Full Width Image Header -->
    <header class="header-image">
        <div class="headline">
            <div class="container">
                <h2>Want you like to know the price in any market in Rwanda</h2>
                <h3>Here you are.. only name and one click!</h3>
            </div>
        </div>
    </header>

    <!-- Page Content -->
    <div class="container">

        <hr class="featurette-divider">

        <!-- First Featurette -->
        <div class="featurette" id="about">
            <img class="featurette-image img-circle img-responsive pull-right" src="img/10.PNG">
            <h2 class="featurette-heading">Pay and Get Info
                <span class="text-muted">Search products here:</span>
            </h2>
             @yield('content')</p>
        </div>

        <hr class="featurette-divider">

        <!-- Second Featurette -->
        <div class="featurette" id="services">
            <img class="featurette-image img-circle img-responsive pull-left" src="img/11.PNG">
            <h2 class="featurette-heading">You may even get any reports you want
                <span class="text-muted">Is Pretty Cool Too.</span>
            </h2>
            <p class="lead">Don't hesitate to contact us <br>the price is affordable.</p>
        </div>

        <hr class="featurette-divider">

        <!-- Third Featurette -->
        <div class="featurette" id="contact">
            <img class="featurette-image img-circle img-responsive pull-right" src="img/10.PNG">
            <h2 class="featurette-heading">Our services
                <span class="text-muted">will make you aware easily.</span>
            </h2>
            <p class="lead">No more travel and no more expenses only spent few and get more<br></p>
        </div>

        <hr class="featurette-divider">
   @include('clients.footer')
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jQuery-2.1.4.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
