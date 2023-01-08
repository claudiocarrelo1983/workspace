<?php

use yii\helpers\Html;
use yii\bootstrap4\Modal;
use yii\bootstrap4\ActiveForm;

use common\models\GeneratorJson;

$model = new GeneratorJson(); 
$comments = $model->getLastFileUploaded('comments');

?>

<div id="comments" class="post-block mt-5 post-comments">
    <h4 class="mb-3">Comments (<?= count($comments)?>)</h4>
        <ul class="comments">
            <li>
                <?php foreach ($comments as $key => $details): ?>    
                    <?php                       
                         if(empty($details['parent_id'])){                                                          
                    ?>                   
                    <div class="comment">
                        <div class="img-thumbnail img-thumbnail-no-borders d-none d-sm-block">
                            <img class="avatar" alt="" src="images/blog/avatar.png">
                        </div>
                        <div class="comment-block">
                            <div class="comment-arrow"></div>
                            <span class="comment-by">
                                <strong>
                                    <?= $details['full_name'] ?>
                                </strong>
                                <span class="float-end">
                                    <?php
                                        Modal::begin([
                                            'title' => 'Leave a comment',
                                            'toggleButton' => ['label' => '<span class="float-end "><span><i class="fas fa-reply "></i> Reply  </span></span>','class' => 'btn btn-default'],
                                        ]);

                                        $form = ActiveForm::begin();

                                        echo  $form->field($modelComment,'parent_id')->hiddenInput(['value'=> ($details['comment_id'])])->label(false); 
                                        echo $form->field($modelComment, 'comment_id')->textInput();
                                        echo $form->field($modelComment, 'full_name')->textarea();

                                        echo '
                                            <div class="modal-footer">'.
                                                Html::submitButton('Save', ['class' => 'btn btn-success'])
                                            .'</div>';
                                            
                                        ActiveForm::end();
                                        Modal::end();
                                    ?>   
                                </span>
                            </span>
                            <p>
                                <?= $details['comment'] ?>
                            </p>
                            <span class="date float-end">
                                <?php
                                    $timestamp = strtotime($details['created_date']);
                                ?>
                                 <span class="day">
									<?= date('d', $timestamp) ?>
								</span>
								<span class="month">
									<?= date('M', $timestamp) ?>
									<?= date('Y', $timestamp) ?>
								</span>
                            </span>
                        </div>
                    </div>            
                    <ul class="comments reply">
                      
                            <?php 
                                foreach ($comments as $key => $details2): 
                            ?>  
                            <?php                       
                                if($details['comment_id'] == $details2['parent_id']){                                                          
                             ?>                          
                                <li>
                                    <div class="comment">
                                        <div class="img-thumbnail img-thumbnail-no-borders d-none d-sm-block">
                                            <img class="avatar" alt="" src="images/blog/avatar.png">
                                        </div>
                                        <div class="comment-block">
                                            <div class="comment-arrow"></div>
                                            <span class="comment-by">
                                                <strong>
                                                    <?= $details2['full_name'] ?>
                                                </strong>                                          
                                            </span>
                                            <p>
                                                <?= $details2['comment'] ?>
                                            </p>
                                            <span class="date float-end">
                                                <?php
                                                    $timestamp = strtotime($details2['created_date']);
                                                ?>
                                                <span class="day">
                                                    <?= date('d', $timestamp) ?>
                                                </span>
                                                <span class="month">
                                                    <?= date('M', $timestamp) ?>
                                                    <?= date('Y', $timestamp) ?>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </li>
                                
                            <?php                                 
                                
                            }
                            ?>    
                            <?php endforeach; ?>               
                    </ul>
                    <?php                                 
                        
                        }
                    ?> 
            
                <?php endforeach; ?> 
                
            </li>

    </ul>
</div>

<div class="post-block mt-5 post-leave-comment">
    <?php
        Modal::begin([
            'title' => 'Leave a comment',
            'toggleButton' => ['label' => 'Leave Comment','class' => 'btn btn-primary w-100 mb-2'],
        ]);

        $form = ActiveForm::begin();

        echo  $form->field($modelComment,'parent_id')->hiddenInput(['value'=> ($details['parent_id'])])->label(false); 
        echo $form->field($modelComment, 'comment_id')->textInput();
        echo $form->field($modelComment, 'full_name')->textarea();

        echo '</div>
            <div class="modal-footer">'.
                Html::submitButton('Save', ['class' => 'btn btn-success'])
            .'</div>';
            
        ActiveForm::end();
        Modal::end();
    ?>                     
</div>
</div>

