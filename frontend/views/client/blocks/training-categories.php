<?php

/* @var $this yii\web\View */

use yii\helpers\Html;


?>

<?php 
$i = 0;
foreach($categorysteps as $key => $value){
?>
<a class="nav-link <?= (($key == 0) ? 'active' : '') ?>" id="v-pills-gen-ques-tab" data-bs-toggle="pill" href="#v-pills-<?= $key ?>" role="tab" aria-selected="true">
 
    <p class="fw-bold mb-0"><?= $value['title'] ?></p>
</a>

<?php
}
?>
