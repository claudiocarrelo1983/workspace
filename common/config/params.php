<?php

use common\models\GeneratorJson;

$model = new GeneratorJson(); 
$arrLanguages = $model->getCountries();

$params =[
    'bsVersion' => '4.x',
    'adminEmail' => 'info@myspecialgym.com',
    'supportEmail' => 'info@myspecialgym.com',
    'senderEmail' => 'info@myspecialgym.com',
    'senderName' => 'myspecialgym.com mailer',
    'user.passwordResetTokenExpire' => 3600,
    'user.passwordMinLength' => 8,
];

return array_merge($params, $arrLanguages);

