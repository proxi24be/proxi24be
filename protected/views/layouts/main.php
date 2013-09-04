<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->

    <?php 
        Yii::app()->clientScript->registerPackage('jquery');
        Yii::app()->clientScript->registerPackage('bootstrap');
        Yii::app()->clientScript->registerPackage('main-css');
    ?>
  </head>
  <body>
    <?php
        // navigation bar by default.
        if($this->beginCache('navbar-default', array('duration'=>3600)))
        {
          include('navbar.inc.php');
          $this->endCache();  
        }
        
    ?>

    <div id="main_content" style="min-height:700px;">

        <?php echo $content; ?>

    </div>
    <?php 
        if(Yii::app()->user->isGuest)
        {
          if($this->beginCache('modal-form-user', array('duration' => 3600)))
          {
            include('login.inc.php');
            include('register.inc.php');
            $this->endCache();
          }
        }
    ?>
  </body>
</html>
