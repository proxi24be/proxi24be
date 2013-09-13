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
        Yii::app()->clientScript->registerPackage('angularjs');
        Yii::app()->clientScript->registerPackage('jquery');
        Yii::app()->clientScript->registerPackage('bootstrap');
        Yii::app()->clientScript->registerPackage('main-css');
        Yii::app()->clientScript->registerPackage('helper');
    ?>
  </head>
  <body>
    
    <div id="main_content" style="min-height:700px;">

        <?php echo $content; ?>

    </div>
  </body>
</html>