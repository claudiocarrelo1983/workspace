<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">   
    <?= Html::img(
        '/images/team/user_icon.png',
        [
            'class' => 'rounded-circle header-profile-user'
        ]);
    ?>
    <span class="d-none d-xl-inline-block ms-1">    
        <?= Yii::$app->user->identity->full_name ?> 
    </span>
    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
</button>
<div class="dropdown-menu dropdown-menu-end">
    <!-- item-->
    <a class="dropdown-item" href="<?= Url::toRoute('/profile') ?>">
        <i class="bx bx-user font-size-16 align-middle me-1"></i> 
        <span key="t-profile">
            <?= Yii::t('app','menu_admin_settings_profile') ?>            
        </span>
    </a>
    <a class="dropdown-item d-block" href="<?= Url::toRoute('/definitions/index') ?>">
        <i class="bx bx-cog  font-size-16 align-middle me-1"></i> 
        <span key="t-settings">
        <?= Yii::t('app','menu_admin_settings_definitions') ?>   
    </span>
    </a>
    <a class="dropdown-item" href="<?= Url::toRoute('/faqs/index') ?>">
        <i class="bx bx-question-mark font-size-16 align-middle me-1"></i> 
        <span key="t-profile">
            <?= Yii::t('app','menu_faqs') ?>              
        </span>
    </a>
    <div class="dropdown-divider"></div>
    <?=
            Html::beginForm(        
                str_replace('/frontend/web', '',Url::toRoute('site/logout')), 
                'post', ['class' => 'form-inline'])
                . Html::submitButton(
                '<i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> '.Yii::t('app', 'login_logout'),
                ['class' => 'dropdown-item text-danger']
            )
            . Html::endForm()
    ?>  
    
</div>
