<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;

$path2 = 'login';

?>

<?= $this->render('@frontend/views/site/banner',['path1' => 'Menu','path2' => $path2]); ?>

<?= $this->render('@frontend/views/client/login/login_client',['model' => $model]); ?>

<!-- Sub Footer -->
<?= $this->render('@frontend/views/site/subfooter',['path2' => $path2]); ?>
<!-- Sub Footer -->

<?= $this->render('/site/footer', ['modelSubscriber' => $modelSubscriber]); ?>