<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatalogBlog */

$this->title = Yii::t('app', 'Update Catalog Blog: {name}', [
    'name' => $model->id_catalog,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Catalog Blogs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_catalog, 'url' => ['view', 'id' => $model->id_catalog]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="catalog-blog-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
