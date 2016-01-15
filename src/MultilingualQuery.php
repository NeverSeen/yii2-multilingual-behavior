<?php
namespace neverseen\multilingual;

use Yii;
use yii\db\ActiveQuery;
use common\models\components\Languages;

class MultilingualQuery extends ActiveQuery
{
    use MultilingualTrait;
    
    public function count($q = '*', $db = null) {
        
        $this->joinWith('translation')->andWhere(['languages_id' => Languages::getId()]);
        return parent::count($q, $db);
    }
    
    /*public function all($db = null){
        
        $this->joinWith('translation');
        return parent::all($db);
    }*/
    
    public function jwt(){
        
        return $this->joinWith('translation');
    }
}
