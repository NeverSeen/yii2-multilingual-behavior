<?php

namespace neverseen\multilingual;

use Yii;
use yii\base\BootstrapInterface;
use yii\base\Application;
use common\models\components\Languages;

class MultilingualBootstrap implements BootstrapInterface
{
    //these eventually should be variables 
    
    public function bootstrap($app)
    {
        $app->on(Application::EVENT_BEFORE_REQUEST, function () {
            
            Yii::$container->set('neverseen\multilingual\MultilingualBehavior', [
                'languages' => Languages::getCodeNamePairs(),
                'languageTableName' => Languages::tableName(),
                'localizedPrefix' => '',
                'requireTranslations' => false,
                'dynamicLangClass' => true,
                'abridge' => false,
                'defaultLanguage' => 'en-US',
                'langForeignKey' => 'slide_id',
            ]);
            
        });
    }
}
