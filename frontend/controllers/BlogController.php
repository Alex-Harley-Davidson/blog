<?php

namespace frontend\controllers;

use common\models\Blog;
use yii\data\ActiveDataProvider;

class BlogController extends \yii\rest\ActiveController
{
    public $modelClass = "common\models\Blog";

    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

    /**
     * @return array
     */
    public function actions(): array
    {
        $actions = parent::actions();

        unset($actions['index']);

        return $actions;
    }

    /**
     * @return ActiveDataProvider
     */
    public function actionIndex(): ActiveDataProvider
    {
        return new ActiveDataProvider([
            'query' => Blog::find(),
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'defaultOrder' => [
                    'date' => SORT_DESC,
                ]
            ],
        ]);
    }

}
