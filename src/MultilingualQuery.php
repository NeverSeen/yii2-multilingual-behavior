<?php
namespace neverseen\multilingual;

use yii\db\ActiveQuery;

class MultilingualQuery extends ActiveQuery
{
    use MultilingualTrait;
    
    public function count($q = '*', $db = null) {
        
        $this->joinWith('translation')->andWhere(['languages_id' => Languages::getId()]);
        return parent::count($q, $db);
    }
    
    public function all($db = null){
        
        $this->joinWith('translation');
        return parent::all($db);
    }
}
