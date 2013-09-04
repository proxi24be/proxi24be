<style>
    .nav a 
    {
        font-weight: bold;
        text-transform: uppercase;
        font-size: 80%;
    }
</style>

<nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">Proxy24 logo</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <form class="navbar-form navbar-left" role="search">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="<?= Yii::t('navbar','search');?>" required>
      </div>
      <input type="submit" class="btn btn-default" value="<?= Yii::t('navbar','submit');?>"/>
    </form>
    <ul class="nav navbar-nav navbar-right">
      <li><a data-toggle="modal" href="#myLoginForm"><?= Yii::t('navbar', 'login');?></a></li>
      <li><a data-toggle="modal" href="#myRegisterForm"><?= Yii::t('navbar', 'sign_up');?></a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="glyphicon glyphicon-globe"></span> <?= Yii::t('navbar', 'languages');?> <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <?php $urlLang = Yii::app()->createAbsoluteUrl('site/setLanguage');?>
          <li><a href="<?= $urlLang. '?lang=en'; ?>">English</a></li>
          <li><a href="<?= $urlLang. '?lang=fr'; ?>"><?= htmlentities('Français');?></a></li>
          <li><a href="<?= $urlLang. '?lang=nl'; ?>">Nederlands</a></li>
        </ul>
      </li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>