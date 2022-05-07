
<div id="win_modalAdd" class="win_modal">
  	<div class="outer">
    	<div class="middle">
      		<div class="inner">
        		<div class="content">
					<span class="close">×</span>
           			<form class = "form">
           				<fieldset>
           					<legend>Add new item to your shopping list</legend>
           					<div class="form-group">
								<label for="name" class="form-label mt-4">Name</label>
								<input id="name" type="text" class="form-control" required>
								<label for="category" class="form-label mt-4">Category</label>
								<select class="form-select" id = "category">
									<?php foreach($list as $key => $value) :?>
										<option data-category="<?= $value["id"] ?>" value="<?=$value["id"]?>"><?= $value["category"] ?></option>
									<?php endforeach; ?>
								</select>
								<label for="status" class="form-label mt-4">Status</label>
								<select class="form-select" id = "status">
									<option value="Not bougth" selected>Not bougth</option>
									<option value="Bougth">Bougth</option>
								</select>
							</div>
							<button type = "button" id = "saveShopping" class="btn btn-primary" >Save</button>
						</fieldset>
					</form>
        		</div>
      		</div>
    	</div>
  	</div>
</div>
