<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <?php echo $this->tag->getTitle(); ?>
    <link rel="stylesheet" href="/third-party/bootstrap/css/bootstrap.min.css">
    
    
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
                    CodeZeus
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-responsive-collapse">
                <ul>
    <li>Link</li>
    <li>Link</li>
    <li>Link</li>
</ul>
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
        
<h1>CodeZues</h1>

<p>Muahaha</p>

    </div>
</div>



</body>
</html>
