<?php

namespace common\models;
use yii\base\Modl;
use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "blogs".
 *
 * @property int $id
 * @property string $image
 * @property string $title
 * @property string $subtitle
 * @property string $alt
 * @property string $url
 * @property string $text
 * @property string|null $date
 * @property string $username
 * @property string $tags
 * @property string|null $created_date
 */
class Blogs extends \yii\db\ActiveRecord
{

    public $imageFile;

    public $generate;

    public $tagsArr;

 

      /**
     *
     * @var UploadedFile
     */


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blogs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {     

        return [    
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['country_code','title', 'subtitle', 'alt', 'text', 'username','tags','active'], 'required'],
            [['created_date'], 'safe'],
            [['country_code','title', 'subtitle', 'generate','alt', 'image', 'username','tags'], 'string', 'max' => 255],
            [['text'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'imageFile' => 'Image2',
            'title' => 'Title',
            'subtitle' => 'Subtitle',
            'alt' => 'Alt',      
            'text' => 'Text',    
            'generate' => 'Generate',    
            'username' => 'Username',
            'tags' => 'Tags',
            'created_date' => 'Created Date',
        ];
    }

    public function imgUrl(){
        return '/images/blog/';
    }

    public function upload()
    {      
        $model = new Model();
  
        if ($model->validate()) {   
         
            if(isset($this->imageFile)){             

                $fileName = $this->imageFile->baseName. date('YmdHis');;      

                $this->image = $this->imgUrl() .$fileName.'.'.$this->imageFile->extension;                

                $this->imageFile->saveAs('@frontend/web/images/blog/' . $fileName . '.' . $this->imageFile->extension, false);

                $this->created_date = date('Y-m-d H:i:s');
                
                return true;
            }else{
                return false;
            }       

        } else {
            return false;
        }
    }

    public function validate($attributeNames = null, $clearErrors = true)
    {
        if ($clearErrors) {
            $this->clearErrors();
        }

        if (!$this->beforeValidate()) {
            return false;
        }

        $scenarios = $this->scenarios();
        $scenario = $this->getScenario();
        if (!isset($scenarios[$scenario])) {
            throw new InvalidArgumentException("Unknown scenario: $scenario");
        }

        if ($attributeNames === null) {
            $attributeNames = $this->activeAttributes();
        }

        $attributeNames = (array)$attributeNames;

        foreach ($this->getActiveValidators() as $validator) {
            $validator->validateAttributes($this, $attributeNames);
        }
        $this->afterValidate();

        return !$this->hasErrors();
    }

    public static function getWords($sentence, $count = 190) {
        return substr($sentence,0, $count);      
    }

    public static function blogTags($arrTags){

        $arr =  array();

        foreach($arrTags as $values){

            if(empty($values['tag_parent_id'])){    
                $values['submenu'] = Blogs::blogTagsHelper($arrTags, $values);   
                $arr[] = $values;
            }         
        }
  
        return  $arr;

    }

    public static function blogTagsHelper($arrTags, $values){

        $arr =  array();  
     
        foreach($arrTags as $tag){             
    
            if(!empty($tag['tag_parent_id'])){
                if(trim($tag['tag_parent_id']) == trim($values['tag'])){
                    $arr[] =  $tag;
                }      
            }
           
            /*
            if(isset($tag['tag_parent_id'])){
                print"<pre>";
                print_r($values);
                if($tag['tag_parent_id'] == $values['tag']){                  
                    $values = Blogs::blogTagsHelper($tag, $values);      
                    $arr[] = $values;
                }
             
            }    
            */      
             
        }    
    
        return  $arr;
    }
}
