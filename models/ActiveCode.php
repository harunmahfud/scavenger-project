<?php

namespace app\models;

use yii\base\Model;

class ActiveCode extends Model
{
    const DISPLAY_INTERVAL_MINUTES = 30;

    /** @var Code[] */
    public array $codes;

    public function __construct($config = [])
    {
        parent::__construct($config);
        $this->populateActiveCodes();
    }

    private function populateActiveCodes()
    {
        $this->codes = Code::find()
            ->where([
                'NOT', ['accessed_at' => null]
            ])
            ->all();
    }
}
