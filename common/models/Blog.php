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
     * @return string
     */
    public static function tableName(): string
    {
        return 'blog';
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            [['text', 'date'], 'required'],
            [['text'], 'string'],
            [['date'], 'date', 'format' => 'php:Y-m-d'],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
            'date' => 'Date',
        ];
    }

    /**
     * @return array
     */
    public function fields(): array
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
