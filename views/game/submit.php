<?php
/* @var $this yii\web\View */
/* @var $activeCode app\models\ActiveCode */
?>
<div class="code-index">
    <form method="get" action="<?=\yii\helpers\Url::to('/game/submit')?>">
        <label for="code">CODE</label>
        <input id="code" name="code" autocomplete="off" autofocus>
        <button type="submit">SUBMIT</button>
    </form>
</div><!-- code-index -->
