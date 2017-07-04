<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <!-- 注释内容为第二种注册需要调用的JS -->
    <!-- <?=Html::jsFile('@web/js/jquery-1.8.3.min.js')?> -->
    <!-- <script>
        var registerUrl = "<?=yii::$app->urlManager->createUrl('site/register')?>";
    </script>
    <?=Html::jsFile('@web/js/register.js')?> -->
    
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    
    <div class="wrap">
         <?php
        NavBar::begin([
            'brandLabel' => '我的网站',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => '首页', 'url' => ['/site/index']],
                ['label' => '下载/上传', 'url' => ['/site/upload']],
                ['label' => '关于我们', 'url' => ['/site/about']],
                ['label' => '联系我们', 'url' => ['/site/contact']],
                ['label' => '注册', 'url' => ['/site/signin']],
                Yii::$app->user->isGuest ?
                    ['label' => '登录', 'url' => ['/site/login']] :
                    [
                        'label' => '退出 (' . Yii::$app->user->identity->username . ')',
                        'url' => ['/site/logout'],
                        'linkOptions' => ['data-method' => 'post']
                    ],
            ],
        ]);
        NavBar::end();
        ?>
        
        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>
    <footer>在阅读中寻找乐趣</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>