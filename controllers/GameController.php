<?php

namespace app\controllers;

use app\models\ActiveCode;
use app\models\Code;
use yii\web\Controller;

class GameController extends Controller
{
    public function actionIndex(): string
    {
        $activeCode = new ActiveCode();
        return $this->render('index', ['activeCode' => $activeCode]);
    }

    /**
     * @param string $code
     * @return string|\yii\web\Response
     */
    public function actionSubmit($code = '')
    {
        if (empty($code)) {
            return $this->render('submit');
        }
        $code = Code::findOne(['code' => $code, 'accessed_at' => null]);
        if (empty($code)) {
            return $this->redirect('/game');
        }
        $code->accessed_at = date('Y-m-d H:i:s');
        $code->save();
        return $this->redirect('/game');
    }
}