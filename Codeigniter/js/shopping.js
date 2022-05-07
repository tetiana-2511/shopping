$( document ).ready(function() {
	$( "body" ).on( "click", ".addItem", function() {
		getModalWindow("add", null);
	});
	$( "body" ).on( "click", ".editItem", function() {
		getModalWindow("edit", this.id);
	});
	$( "body" ).on( "click", "#saveShopping", function() {
		saveShoppingItem();
	});
	$( "body" ).on( "click", ".delItem", function() {
		delShoppingItem(this.id);
	});
});


function delShoppingItem (id){
	//$( ".delItem" ).on( "click", function(){
		let currentId = id;
		let itemId = $("#"+currentId+"" ).closest("tr").attr('id');
		let data = {
			'id' : itemId
		}
		console.log(data);
		$.ajax({
			url: "shopping/delItem",
			data: data,
			method: "POST"
		}).done(function() {
			$("#"+currentId+"" ).closest("tr").remove();
		}).fail(function() {
			alert("Something went wrong!");
		});
	//});
}
 //модальне вікно для створення елемента
function addModalWindowRender(data, id) {
	if ($("#win_modalAdd").length == 0){
		$("head").append('<link type="text/css" rel="stylesheet" href="./css/modal.css">');
		$("body").append(data);
	} else{
		$("#win_modalAdd").show();
	}
	$("legend").text('Add new item to your shopping list');

	var span = $(".close");
	span.on( "click", function(){
		hideClearModal();
	});
	$("#saveShopping").attr("data-param", "add");
	$("#saveShopping").attr("data-id", "null");
}
//модальне вікно для редагування елемента
function editModalWindowRender(data, id) {
	if ($("#win_modalAdd").length == 0){
		$("head").append('<link type="text/css" rel="stylesheet" href="./css/modal.css">');
		$("body").append(data);
	} else{
		$("#win_modalAdd").show();
	}
	$("legend").text('Change your shopping list');
	var modal = $("#win_modalAdd");
	var span = $(".close");
	let rowId = $("#"+id+"" ).closest("tr").attr('id');
	let inVal = $("#"+rowId+"").find(".itemName").text();
	$("input#name.form-control").val(""+inVal+"");
	//let categoryVal = $("#"+rowId+"").find(".itemCategory").text();
	let categoryVal = $("#"+rowId+"").find(".itemCategory").attr("data-category");

	$("#category").val(""+ categoryVal +"");
	let statusVal = $("#"+rowId+"").find(".itemStatus").text();
	$("#status").val(""+ statusVal +"");
	span.on( "click", function(){
		hideClearModal();
	});
	$("#saveShopping").attr("data-param", "edit");
	$("#saveShopping").attr("data-id", ""+rowId+"");
}
//збереження елемента зі списку покупок
function saveShoppingItem(){
		if ($("#saveShopping").attr("data-param") == "add"){
			let sendData = {
				'item_name': $("input#name.form-control").val(),
				//'category': $("select#category.form-select").find(":selected").text(),
				'category': $("select#category.form-select").find(":selected").attr("data-category"),
				'status': $("select#status.form-select").find(":selected").text()
			};
			$.ajax({
				url: "shopping/saveItem",
				data: sendData,
				method: "POST"
			}).done(function(data) {
				$("#mainTable > tbody:last-child").append(data.html);
				//editShoppingItemListener();
				//delShoppingItem();
			}).fail(function() {
				alert("Something went wrong!");
			});
			hideClearModal ();
		}
		if ($("#saveShopping").attr("data-param") == "edit"){
			let rowId = $("#saveShopping").attr("data-id");
			let categoryName = $("select#category.form-select").find(":selected").text();
			let sendData = {
				'id': rowId,
				'item_name': $("input#name.form-control").val(),
				//'category': $("select#category.form-select").find(":selected").text(),
				'category': $("select#category.form-select").find(":selected").attr("data-category"),
				'status': $("select#status.form-select").find(":selected").text()
			};
			console.log("sendData", sendData);
			$.ajax({
				url: "shopping/saveEditItem",
				data: sendData,
				method: "POST"
			}).done(function(data) {
				console.log(data);
				if(data.status){
					$("#"+rowId+"").find(".itemName").text(""+sendData.item_name+"");
					//$("#"+rowId+"").find(".itemCategory").text(""+sendData.category+"");
					$("#"+rowId+"").find(".itemCategory").text(""+categoryName+"");
					$("#"+rowId+"").find(".itemStatus").text(""+sendData.status+"");
				} else{
					alert("Something went wrong!");
				}
			}).fail(function() {
				alert("Something went wrong!");
			});
			hideClearModal ();
		}
	//});
}

//приховує модалку і очищає поля
function hideClearModal () {
	$("#win_modalAdd").hide();
	$("input.form-control").val("");
	$("#win_modalAdd").find("option").removeAttr('selected');
	$("select.form-select").val(0);
	$("#saveShopping").removeAttr("data-param");
	$("#saveShopping").removeAttr("data-id");
}
//повертає шаблон модального вікна з бека
function getModalWindow(param, id){
	$.ajax({
		url: "shopping/addModal",
		method: "GET",
	}).done(function(data) {
		if(param == "add"){
			console.log("add window");
			addModalWindowRender(data, null);
		}
		if (param == "edit"){
			console.log("edit window");
			editModalWindowRender(data, id);
		}
	}).fail(function() {
		alert("Something went wrong!");
	});
}
