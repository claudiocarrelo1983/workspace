<?php

use common\models\GeneratorJson;

$model = new GeneratorJson(); 
$arrLanguages = $model->getCountries();

$params =[
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',
    'user.passwordResetTokenExpire' => 3600,
    'user.passwordMinLength' => 8,
];

return array_merge($params, $arrLanguages);

