

	<?php foreach($list as $key => $value) : ?>
		<tr id = "<?= $value["id"] ?>">
			<td class = "categoryNumber"></td>
			<td class = "categoryName"> <?= $value["category"] ?> </td>
		</tr>
	<?php endforeach; ?>


