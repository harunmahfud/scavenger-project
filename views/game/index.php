<?php
/* @var $this yii\web\View */
/* @var $activeCode app\models\ActiveCode */
?>
<div class="code-index">

    <?php if (!empty($activeCode->codes)): ?>
        <?php
        $code = end($activeCode->codes);
        echo \yii\widgets\DetailView::widget([
            'model' => $code,
            'attributes' => ['code', 'accessed_at']
        ]);
        foreach ($code->getActiveClues() as $clue) {
            Yii::debug(\yii\helpers\ArrayHelper::toArray($clue));
            echo \yii\widgets\DetailView::widget([
                'model' => $clue,
                'attributes' => ['clue']
            ]);
        }
        ?>

    <?php endif; ?>

</div><!-- code-index -->
