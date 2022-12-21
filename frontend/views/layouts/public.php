<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use frontend\assets\PublicAsset;
use yii\helpers\Url;


PublicAsset::register($this);

?>
<?= $this->render('/layouts/public_header'); ?>

            <?= $content ?>
    </div>

    <?= $this->render('/site/footer'); ?>			

</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
