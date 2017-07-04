<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
?>
<?php
    $this->title = '联系我们';
    $this->params['breadcrumbs'][] = $this->title;
?>
<h2><?= Html::encode($this->title) ?></h2>
<h3>如果你有业务查询或其他问题，请填写以下：</h3>

<div class="site-contact">

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

    <?php else: ?>
        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'name')->label('姓名') ?>

                    <?= $form->field($model, 'email')->label('邮箱')->label('姓名') ?>

                    <?= $form->field($model, 'subject')->label('类型') ?>

                    <?= $form->field($model, 'body')->textArea(['rows' => 6])->label('内容') ?>

                    <?= $form->field($model, 'verifyCode')->label('验证码')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('提交', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>
