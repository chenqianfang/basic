<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<?php
    $this->title = '用户注册';
    $this->params['breadcrumbs'][] = $this->title;
?>
<h2><?= Html::encode($this->title) ?></h2>
    <!-- 第一种注册 -->
	<?php $form = ActiveForm::begin([
        'id' => 'signin-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'username')->textInput(['maxlength' => 32])->label("用户名") ?>

        <?= $form->field($model, 'password')->passwordInput(['maxlength' => 32])->label("密码") ?>
        <?= $form->field($model, 'email')->label("邮箱") ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('注册', ['class' => 'btn btn-primary', 'name' => 'signin-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

    <!-- 以下为第二种注册 -->
    <!-- <form>
        <div>
                <table border="1"  bgcolor="#FFFFFF" >
                    <tr>
                        <td>用户名: <input id="username" type="text" name="用户名" value="请输入用户名" onFocus="if(value==defaultValue){value='';this.style.color='#000'}" onBlur="if(!value){value=defaultValue;this.style.color='#999'}" style="color:#999999"</td>
                     </tr>
                    <tr>
                        <td> 密&nbsp;&nbsp;码: <input id="password" type="password" name="password" value="请输入密码" /></td>
                    </tr>
                    <tr> 
                         <td align="center"><input type="button"  value="注册" onclick="register();" style="width:150px;background:#93C" /></td>
                     </tr>
                 </table> 
     </div> 
    </form> -->