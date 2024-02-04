<?php

namespace common\models;

use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "blog".
 *
 * @property int $id
 * @property string $text
 * @property string $date
 */
class Blog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text', 'date'], 'required'],
            [['text'], 'string'],
            [['date'], 'date', 'format' => 'php:Y-m-d'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
            'date' => 'Date',
        ];
    }

    public function fields()
    {
        return [
            'id',
            'date',
            'text' => function () {
                return Html::encode($this->text);
            },
        ];
    }

}
