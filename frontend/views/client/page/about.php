<div class="container">  
    <section class="section section-height-1 bg-light position-relative border-0 " id="about">
        <div class="row">
            <div class="col">
                <div class="row text-center">
                    <div class="col-md-9 mx-md-auto">
                        <div class="mb-3">
                        <h2 class="text-color-dark font-weight-bold text-15 mb-2 pt-0 mt-0 appear-animation animated maskUp appear-animation-visible" data-appear-animation="maskUp" data-appear-animation-delay="300" style="animation-delay: 300ms;">
                            <?= (isset($companyArr['company_name']) ? $companyArr['company_name'] : '') ?>
                        </h2>
                        </div>
                        <div class="overflow-hidden my-4">
                            <p class="lead mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200">               
                                <?= ((empty($companyArr['subtitle_pt']) && empty($companyArr['subtitle_en'])) ? '' : Yii::t('app',$companyArr['page_code_subtitle'])) ?>                            
                            </p>
                        </div>
                        <div class="overflow-hidden my-5">
                            <p class="lead mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200">               
                                <?= ((empty($companyArr['text_pt'])) ? '' : Yii::t('app',$companyArr['page_code_text'])) ?>                            
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </section>
</div>


