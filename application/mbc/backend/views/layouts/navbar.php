<?php
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
?>
<?php
    NavBar::begin([
        'brandLabel' => 'MBC - RTS',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse',
        ],
    ]);
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems = [
            ['label' => 'Home', 'url' => ['/site/index']],

            ['label' => 'Manage', 'items' => [
                ['label' => 'User', 'url' => ['/user/index']],
                ['label' => 'Tithe', 'url' => ['/tithe/index']],
                ['label' => 'Events', 'url' => ['/events/index']],
                ['label' => 'Prayer Resquests', 'url' => ['/prayer/index']],
            ]],
        ];
        $menuItems[] = [
            'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right menu-modify'],
        'items' => $menuItems,
    ]);
    NavBar::end();
?>