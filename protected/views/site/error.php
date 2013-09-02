<?php
$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<div class="container">
    
    <div class="row">
        
        <div class="col-xs-1 col-md-12">
            
            <h4>Error <?php echo $code; ?></h4>

            <div class="error">
            <?php echo htmlentities($message); ?>
            </div>
        </div>
        
    </div>
    
</div>
