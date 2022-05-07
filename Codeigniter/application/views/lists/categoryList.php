<h2><?= $title ?></h2>
<input class="addCategory" type="button" value="New category" />
<table class = "table" id = "categoryTable">
	<thead>
		<tr>
			<th>#</th>
			<th>Category</th>
		</tr>
	</thead>
	<tbody>
	<?$i=1?>
	<?php foreach($list as $key => $value) : ?>
		<tr id = "<?= $value["id"] ?>">
			<td class = "categoryNumber"><?= $i ?></td>
			<td class = "categoryName"> <?= $value["category"] ?> </td>
		</tr>
		<?$i=$i+1?>
	<?php endforeach; ?>
	</tbody>
</table>
<style>
	.addCategory{
		cursor: pointer;
	}

</style>

