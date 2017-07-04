<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<?php
    $this->title = '小说下载/上传';
    $this->params['breadcrumbs'][] = $this->title;
?>
<h2><?= Html::encode($this->title) ?></h2>
		
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'imageFile')->fileInput()->label('文件') ?>

    <button>Submit</button>

<?php ActiveForm::end() ?>