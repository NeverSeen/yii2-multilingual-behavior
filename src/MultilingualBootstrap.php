<?php

namespace neverseen\multilingual;

use Yii;
use yii\base\BootstrapInterface;
use yii\base\Application;
use common\models\components\Languages; //this should eventually be under vendor namespace

class MultilingualBootstrap implements BootstrapInterface
{
    //these eventually should be variables 
    
    public function bootstrap($app)
    {
        $app->on(Application::EVENT_BEFORE_REQUEST, function () {
            
            Yii::$container->set('neverseen\multilingual\MultilingualBehavior', [
                'languages' => Languages::getCodeNamePairs(),
                'languageTableName' => Languages::tableName(),
                'languageField' => 'iso639',
                'localizedPrefix' => '',
                'requireTranslations' => false,
                'dynamicLangClass' => true,
                'abridge' => false,
                'defaultLanguage' => 'en-US',
            ]);
            
        });
    }
}
