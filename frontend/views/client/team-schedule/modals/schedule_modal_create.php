
<div class="modal fade" id="client-create-<?= $inc ?>" tabindex="-1" aria-labelledby="largeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel">
                    <?= Yii::t('app', 'create_booking') ?>
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true">×</button>
            </div>



                <?= $this->render('_form', [
                    'model' => $model, 
                    'type' => 'create',
                    'dayHour' => $dayHour,  
                    'date' => $date,  
                    'inc' => $inc,    
                ]) ?>
        </div>
    </div>
</div>


