<?php

namespace frontend\controllers;

use yii\web\Controller;
use common\models\LoginForm;
use yii\db\Query;
use yii\helpers\Url;
use common\models\Clients;

use Yii;
//Yii::$app->language = 'en-EN';

class ClientController extends Controller
{
    
    public function actionStats()
    {
        $this->layout = 'training';
        
        return $this->render('stats');
    }

    public function actionWeight()
    {
        $this->layout = 'training';
        
        return $this->render('weight');
    }

    public function actionNutricion()
    {
        $this->layout = 'training';
        
        return $this->render('nutricion');
    }

    public function actionNewClient()
    {
        $this->layout = 'clientLayout';
        
        return $this->render('new-client');
    }

    public function actionClientMenu()
    {
        $this->layout = 'publicLayoutDark';
        
        return $this->render('client-menu');
    }

    public function actionRegistration()
    {
        $this->layout = 'registration';

        $blogQuery = new Query;
        $request = Yii::$app->request;

        $companyArr = $blogQuery->select([
            'team_code',
                   
       
            'description',
            'address',      
            'postcode',
            'location',
            'nif',
            'logo',      
            'website',
            'facebook',
            'pinterest',
            'instagram',
            'twitter',
            'tiktok',
            'linkedin',
            'youtube',  
            'active'

        ])
        ->from(['companies'])
        ->where(['team_code' => $request->get('code')]) 
        ->one();
 
        if(empty($companyArr)){
            return Yii::$app->response->redirect(Url::to(['clients/index'], true));
        }
      

        $company = array_merge(
            array(
                'id' => '',
                'code' => '',
                'type'=> '',           
                'name'=> '',
                'description'=> '',
                'address'=> '',    
                'postcode'=> '',
                'location'=> '',
                'nif' => '',
                'logo' => '',     
                'website' => '',
                'facebook' => '',
                'pinterest'=> '',
                'instagram'=> '',
                'twitter' => '',
                'tiktok' => '',
                'linkedin' => '',
                'youtube' => '',
                'active' => ''
            ),
            $companyArr);    

        $model = new Clients();     

        if ($this->request->isPost) {          

            $data = Yii::$app->request->post();     

            $model->name = $data['Clients']['first_name'].' '.$data['Clients']['last_name'];
            $model->company = Yii::$app->user->identity->company;
            $model->level = 'student';

            $model->created_date = date('Y-m-d H:i:s');

            if ($model->load($this->request->post()) && $model->save()) { 
               
                return $this->redirect(['registration', 'code' => $request->get('code')]);
            }
        } else {
            $model->loadDefaultValues();
        }


        return $this->render('registration', [
            'company' => $company,
            'model' => $model,
            'code' => $request->get('code')
        ]);
    }    


    public function actionIndex()
    {
        
        $this->layout = 'training';

        $categorySteps = [
            '0' => [
                'title' => 'Aquecimento',
                'icon' => 'bx bx-receipt nav-icon'
            ],
            '1' => [
                'title' => 'Exercicios Principal',
                'icon' => 'bx bx-receipt nav-icon'
            ],
            '2' => [
                'title' => 'Cardio',
                'icon' => 'bx bx-receipt nav-icon'
            ],
            '3' => [
                'title' => 'Alongamento',
                'icon' => 'bx bx-receipt nav-icon'
            ]
            ];

        $arrTraining = [
            '0' => [
                
                    'title' => 'Aquecimento', 
                    'code' => 'bicicleta_estatica',  
                    'training' => [
                                        [

                                                'title' => 'Press Inclinada', 
                                                'code' => 'bicicleta_estatica',                                    
                                                'maquina' => 'Bicicleta estatica',
                                                'image' => '/web/img/equipament/bicicleta.jpg',
                                                'type' => 'reps',
                                                'data' => '21-10-2021',
                                                'lastvalues'=>  [
                                                        [
                                                            'id_treino' => '2',
                                                            'reps' => '10',
                                                            'type' => 'Kg',
                                                            'week' => '30',
                                                            'value' => '30'   
                                                        ],
                                                        [
                                                            'id_treino' => '2',
                                                            'reps' => '10',
                                                            'type' => 'Kg',
                                                            'week' => '30',
                                                            'value' => '30'   
                                                        ],

                                                ],
                                                'currentValues' =>   [
                                                [
                                                    'id_treino' => '2',
                                                    'reps' => '10',
                                                    'type' => 'Kg',
                                                    'week' => '30',
                                                    'value' => '30'   
                                                ]  

                                            ]
                                                                                                        
                                        ],

                                        
                                        [

                                            'title' => 'Peck Deck', 
                                            'code' => 'bicicleta_estatica',                                    
                                            'maquina' => 'Bicicleta estatica',
                                            'image' => 'equipament/bicicleta.jpg',
                                            'type' => 'time',
                                            'data' => '21-10-2021',
                                            'lastvalues'=>  [
                                                    [
                                                        'id_treino' => '2',
                                                        'reps' => '10',
                                                        'type' => 'Kg',
                                                        'week' => '30',
                                                        'value' => '30'   
                                                    ]                                                                 
                                            ],
                                            'currentValues' =>   [
                                            [
                                                'id_treino' => '2',
                                                'reps' => '10',
                                                'type' => 'Kg',
                                                'week' => '30',
                                                'value' => '30'   
                                            ]  

                                        ]
                                                                                                    
                                    ],
                                ]

                    ],
            '1' => [
                                    'title' => 'Aquecimento 2',                                             
                                    'maquina' => 'Cadeira extensora',
                                    'image' => 'equipament/IMG_20211116_200214.jpg',
                                    'type' => 'reps',
                                    'data' => '21-10-2021',
                                     'lastvalues'=>  [
                                            [
                                                        'id_treino' => '2',
                                                        'reps' => '10',
                                                        'type' => 'Kg',
                                                        'week' => '30',
                                                        'value' => '30'   
                                                    ]                                                                 
                                            ],
                                            'currentValues' =>   [
                                            [
                                                'id_treino' => '2',
                                                'reps' => '10',
                                                'type' => 'Kg',
                                                'week' => '30',
                                                'value' => '30'   
                                            ]  
                                    ]  
                                ],
            '2' => 	[
                                    'title' => 'Press Perna',                                
                                    'maquina' => 'Maquina',
                                    'image' => 'bicicleta.jpg',
                                    'type' => 'reps',
                                    'data' => '21-10-2021',
                                    'lastvalues'=>  [
                                        [
                                                    'id_treino' => '2',
                                                    'reps' => '10',
                                                    'type' => 'Kg',
                                                    'week' => '30',
                                                    'value' => '30'   
                                                ]                                                                 
                                        ],
                                        'currentValues' =>   [
                                        [
                                            'id_treino' => '2',
                                            'reps' => '10',
                                            'type' => 'Kg',
                                            'week' => '30',
                                            'value' => '30'   
                                        ]  
                                    ]  
                                ]
        ];

  
      
        //$arrTraining = $model->getTreinos();       
            

        return $this->render('my-training', [
            'traininglist' => $arrTraining,
            'categorysteps' => $categorySteps
         
        ]);

        
  
    }

    

}
