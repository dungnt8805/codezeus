<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Code Zeus</title>
    <link rel="stylesheet" href="/third-party/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Telex' rel='stylesheet' type='text/css'>
    <script src="/third-party/angular/js/angular-1.3.min.js"></script>
    <script src="/third-party/jquery/js/jquery-2.1.0.min.js"></script>
    <script src="/third-party/bootstrap/js/bootstrap.min.js"></script>
    
    
</head>
<body>

<div id="header">

<div class="navbar" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo $this->url->get(); ?>">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-responsive-collapse">
                
            </div><!-- /navbar-collapse -->
        </div>
    </div>
</div>



<div class="container container-fluid">
    <div class="col-md-12">
        <?php echo $this->flash->output(); ?>
    </div>
</div>

<div class="container container-fluid">
    <div class="col-md-12">
        

<div class="temp">
    <img src="/img/logo.jpg" alt="Code Zeus" />


    <p class="saying"><em>"Develop to please the code gods."</em></p>
    <hr />

    <p>Sackett</p>
    <p>Fauveau</p>
    <p>Boyer</p>

    <hr />

    <p><a href="http://github.com/codezeus">GitHub</a></p>
</div>


    </div>
</div>



</body>
</html>
