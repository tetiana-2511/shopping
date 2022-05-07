

	<?php foreach($list as $key => $value) : ?>
		<tr id = "<?= $value["id"] ?>">
			<td class = "itemName"><?= $value["item_name"] ?></td>
			<td class = "itemCategory" data-category="<?= $value["category"] ?>"><?= $value["category_name"] ?></td>
			<td class = "itemStatus"><?= $value["status"] ?></td>
			<td class = "itemDate"><?= $value["date"] ?></td>
			<td class = "editItem" id = "edit<?= $value["id"] ?>">
				<svg  width="16px" height="16px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
					<polygon points="1.75 11.25,1.75 14.25,4.75 14.25,14.25 4.75,11.25 1.75"/>
					<line x1="8.75" y1="4.75" x2="11.25" y2="7.25"/>
				</svg>
			</td>
			<td class = "delItem" id = "del<?= $value["id"] ?>">
				<svg width="16px" height="16px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
					<path  d="m5.75 4.25v-2.5h4.5v2.5m-6.5 1v9h8.5v-9m-9.5-.5h10.5"/>
				</svg>
			</td>
		</tr>
	<?php endforeach; ?>


