<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
?>
<div class="col-xs-offset-3 col-xs-6">
	<h1>category/index</h1>
	<?= Html::a('<i class="glyphicon glyphicon-plus-sign"></i> Create category', Url::to(['category/create']), ['class' => 'btn btn-success', 'style' => 'margin-bottom: 10px']) ?>
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th width="80">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php if (!count($categories)) { ?>
				<tr>
					<td colspan="3"><center>Data not found</center></td>
				</tr>
			<?php } ?>
			<?php foreach ($categories as $category) { ?>
				<tr>
					<td><?= $category->id ?></td>
					<td><?= $category->name ?></td>
					<td>
						<div class="btn-group btn-group-xs">
							<a class="btn btn-warning" href="<?= Url::to(['category/create', 'category_id' => $category->id]) ?>"><i class="glyphicon glyphicon-pencil"></i></a>
							<a class="btn btn-danger" href="<?= Url::to(['category/delete', 'category_id' => $category->id]) ?>"><i class="glyphicon glyphicon-trash"></i></a>
						</div>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
	<?= LinkPager::widget(['pagination' => $pagination]) ?>
</div>
