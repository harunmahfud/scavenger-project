<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clue".
 *
 * @property int $id
 * @property int $code_id
 * @property string|null $clue
 *
 * @property Code $code
 */
class Clue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clue';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code_id'], 'required'],
            [['code_id'], 'integer'],
            [['clue'], 'string'],
            [['code_id'], 'exist', 'skipOnError' => true, 'targetClass' => Code::className(), 'targetAttribute' => ['code_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code_id' => 'Code ID',
            'clue' => 'Clue',
        ];
    }

    /**
     * Gets query for [[Code]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCode()
    {
        return $this->hasOne(Code::className(), ['id' => 'code_id']);
    }
}
