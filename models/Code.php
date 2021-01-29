<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "code".
 *
 * @property int $id
 * @property string $code
 * @property string|null $accessed_at
 *
 * @property Clue[] $clues
 */
class Code extends \yii\db\ActiveRecord
{
    const DISPLAY_INTERVAL_MINUTES = 30;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'code';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code'], 'required'],
            [['accessed_at'], 'safe'],
            [['code'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'accessed_at' => 'Accessed At',
        ];
    }

    /**
     * Gets query for [[Clues]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClues()
    {
        return $this->hasMany(Clue::className(), ['code_id' => 'id']);
    }

    public function getActiveClues()
    {
        $activeClues = [];
        $accessTime = strtotime($this->accessed_at);
        $currentTime = time();
        foreach ($this->clues as $clueIdx => $clue) {
            $shownAfter = $clueIdx * self::DISPLAY_INTERVAL_MINUTES * 60;
            if ($accessTime + $shownAfter > $currentTime) {
                $clue->clue = '';
            }
            $activeClues[] = $clue;
        }
        return $activeClues;
    }
}
