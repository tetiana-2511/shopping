<h2><?= $title ?></h2>

<input class="addItem" type="button" value="New item" />

<div class = "shoppingData">
	<div class="filters">
		<div class = "category-group">
			<h4> Category </h4>
			<?php foreach($category as $key => $value) : ?>
				<div class = "list-group-item checkbox">
					<label for="checkboxCategory">
						<input class = "checkboxCategory" type="checkbox" value="<?= $value["id"] ?>"><?= $value["category"] ?>
					</label>
				</div>
			<?php endforeach; ?>
		</div>
		<div class = "status-group">
			<h4> Status </h4>
			<?php foreach($status as $key => $value) : ?>
				<div class = "list-group-item checkbox">
					<label for="checkboxStatus">
						<input class = "checkboxStatus" type="checkbox" value="<?= $value["status"] ?>"><?= $value["status"] ?>
					</label>
				</div>
			<?php endforeach; ?>
		</div>
		<input id="filterButton" class="filter" type="button" value="Filter" />
	</div>


	<div class = "containerTable">
		<table class = "table" id = "mainTable">
			<thead>
			<tr>
				<th>Item name</th>
				<th>Category</th>
				<th>Status</th>
				<th>Add date</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			</thead>
			<tbody class = "bodyTable">
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
			</tbody>
		</table>
	</div>


</div>

<style>
	.editItem, .delItem{
		cursor: pointer;
	}
</style>
