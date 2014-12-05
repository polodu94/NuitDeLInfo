<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
		<?php echo $this->Html->css('bootstrap.min'); ?>
		<?php echo $this->Html->css('font-awesome.min.css'); ?>
		<?php echo $this->Html->css('ionicons.min.css'); ?>
		<?php echo $this->Html->css('morris/morris.css'); ?>
		<?php echo $this->Html->css('jvectormap/jquery-jvectormap-1.2.2.css'); ?>
		<?php echo $this->Html->css('daterangepicker/daterangepicker-bs3.css'); ?>
		<?php echo $this->Html->css('bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'); ?>
		<?php echo $this->Html->css('AdminLTE.css'); ?>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.html" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                AdminLTE
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="img/avatar3.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, Jane</p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <?php echo $this->element('menu'); ?>
                </section>
                <!-- /.sidebar -->
            </aside>

		<?php echo $this->Session->flash(); ?>
		<aside class="right-side">

                <!-- Main content -->
                <section class="content">
					<?php echo $this->fetch('content'); ?>
				</section>
		</aside>
	</div>
	        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- jQuery UI 1.10.3 -->
		<?php echo $this->Html->script('jquery-ui-1.10.3.min.js'); ?>
		<?php echo $this->Html->script('bootstrap.min.js'); ?>
		<?php echo $this->Html->script('plugins/morris/morris.min.j'); ?>
		<?php echo $this->Html->script('plugins/sparkline/jquery.sparkline.min.js'); ?>
		<?php echo $this->Html->script('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'); ?>
		<?php echo $this->Html->script('plugins/jvectormap/jquery-jvectormap-world-mill-en.js'); ?>
		<?php echo $this->Html->script('plugins/fullcalendar/fullcalendar.min.jss'); ?>
		<?php echo $this->Html->script('plugins/jqueryKnob/jquery.knob.js'); ?>
		<?php echo $this->Html->script('plugins/daterangepicker/daterangepicker.js'); ?>
		<?php echo $this->Html->script('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>
		<?php echo $this->Html->script('plugins/iCheck/icheck.min.js'); ?>
		<?php echo $this->Html->script('AdminLTE/app.js'); ?>
		<?php echo $this->Html->script('AdminLTE/dashboard.js'); ?>
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>    
</body>
</html>