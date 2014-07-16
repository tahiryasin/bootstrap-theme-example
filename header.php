<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Bootstrap, from Twitter</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- stylesheet -->
        <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <?php wp_head(); ?>
    </head>

    <body>

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="<?php echo site_url(); ?>"><?php bloginfo('name'); ?></a>
                    <div class="nav-collapse collapse">
                        <?php wp_nav_menu(array('theme_location' => 'primary', 'items_wrap' => '<ul class="nav">%3$s</ul>', 'container' => false)); ?>
					<form class="navbar-form pull-right" action="<?php echo wp_login_url( ); ?>" method="post">
					  <input class="span2" type="text" placeholder="Email" name="log">
					  <input class="span2" type="password" placeholder="Password" name="pwd">
					  <button type="submit" class="btn">Sign in</button>
					</form>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div class="container">
           