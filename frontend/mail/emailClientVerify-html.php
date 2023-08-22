<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['page/verify-email', 'code' => $user->company_code, 'token' => $user->verification_token]);

?>
<div class="verify-email">
    <table width="600" border="0" cellspacing="0" cellpadding="0" class="m_2132625035862130193mobile-shell">
        <tbody>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">                                
                <tbody>
                    <tr>
                        <td style="padding:35px 35px 0">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">                                                
                                <tbody>                               
                                    <tr>
                                        <td style="padding-bottom:30px">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="padding-bottom:42px;border-bottom:2px solid #e5e5e5">
                                                            <div style="color:#0088CC;font-family:Montserrat,Arial,sans-serif;font-size:30px;line-height:48px;text-align:center;font-weight:700">                                                                                   
                                                                Verify your email                                                                                       
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding:0 30px">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="padding-bottom:30px">
                                                                <div style="color:#4c4c4c;font-family:Montserrat,Arial,sans-serif;font-size:14px;line-height:20px;text-align:center">
                                                                    Please verify your email to secure your account.
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                            </table>
                                        </td>
                                    </tr>                               
                                    <tr>
                                        <td style="padding:0 0 30px" align="center">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="color:#fff;border-radius:30px;padding:15px 30px;color:#fff;font-family:Montserrat,Arial,sans-serif;font-size:14px;line-height:18px;text-align:center;letter-spacing:2px;text-transform:uppercase" bgcolor="#0088CC">                                                    
                                                            <?= Html::a('<small style="color:#fff;text-decoration: none;text-decoration-color: #0088CC;">Verify Now</small>',
                                                                $verifyLink
                                                            ) ?>                                                         
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-bottom:30px">
                                            <div style="color:#4c4c4c;font-family:Montserrat,Arial,sans-serif;font-size:14px;line-height:20px;text-align:center">
                                                Or paste this link into your browser: 
                                                <?= Html::a(Html::encode($verifyLink), $verifyLink) ?>
                                            </div>
                                        </td>
                                    </tr>                    
                                    <tr>
                                        <td style="padding-bottom:30px">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="padding-top:30px;border-top:2px solid #e5e5e5" class="m_2166184330731440740pb-20">
                                                            <div style="color:#4c4c4c;font-family:Montserrat,Arial,sans-serif;font-size:14px;line-height:20px;text-align:center">
                                                                If this wasn’t you, please
                                                                    <a href="#"  target="_blank">
                                                                        <span style="color:#0088CC;text-decoration:underline;font-weight:700">click here</span>
                                                                    </a>.
                                                            </div>
                                                            <div style="color:#4c4c4c;font-family:Montserrat,Arial,sans-serif;font-size:14px;line-height:20px;text-align:center;margin-top:5px;padding:13px 0 10px 0">
                                                                    To learn more about our Terms of Use,
                                                                    <a href="#"  target="_blank" >
                                                                        <span style="color:#0088CC;text-decoration:underline;font-weight:700">click here</span>
                                                                    </a>.
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>                    
                                </tbody>
                            </table>
                        </td>
                    </tr>                     
                    <tr>
                        <td>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr>
                                        <td width="15" style="font-size:0;line-height:0;text-align:left"></td>
                                        <td style="padding:0px;color:#7c7c7c;font-family:Montserrat,Arial,sans-serif;font-size:11px;line-height:20px;text-align:center">
                                            This email was sent by 
                                            <a href="#">
                                                My Calendar.
                                            </a>                           
                                        </td>
                                        <td width="15" style="font-size:0;line-height:0;text-align:left"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </tbody>
    </table>
</div>
