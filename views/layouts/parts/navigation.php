<?php
    use yii\bootstrap\NavBar;
    use yii\helpers\Html;
    use yii\bootstrap\Nav;
    use app\helpers\AppHelper;

    NavBar::begin([
        'brandLabel' => 'Authentication',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    $items = [];

    if (Yii::$app->user->isGuest) {
        $items[] =
            (AppHelper::isCurrent('auth', 'login')) ?
                ['label' => 'Sign up', 'url' => ['/auth/register']] :
                ['label' => 'Sign in', 'url' => ['/auth/login']];
    }

    if (!Yii::$app->user->isGuest) {
        $items[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $items,
    ]);

    NavBar::end();