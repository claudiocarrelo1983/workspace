<?php

/* @var $this yii\web\View */
use common\models\GeneratorJson;

$model = new GeneratorJson(); 
$arrCountries = $model->getLastFileUploaded('countries');

?>

<div class="dropdown d-inline-block">
    <button type="button" class="btn header-item waves-effect"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img id="header-lang-img" src="<?= $arrCountries[0]['img'] ?>" alt="Header Language" height="16">
    </button>
    <div class="dropdown-menu dropdown-menu-end">
        <?php foreach ($arrCountries as $key => $language): ?>     
            <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="<?= $key  ?>">
                <img src="<?= $language['img']  ?>" alt="user-image" class="me-1" height="12"> <span class="align-middle"><?= $language['full_title']  ?></span>
            </a>
        <?php endforeach; ?>
    </div>
</div>