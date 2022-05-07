$( document ).ready(function() {
console.log( "category!" );
	$( "body" ).on( "click", ".addCategory", function() {
		getCategoryModalWindow();
	});
	$( "body" ).on( "click", "#saveCategory", function() {
		saveCategoryItem();
	});

});

 //модальне вікно для створення категорії
function categoryWindowRender(data, id) {
	if ($("#modalCategory").length == 0){
		$("head").append('<link type="text/css" rel="stylesheet" href="./css/modal.css">');
		$("body").append(data);
	} else{
		$("#modalCategory").show();
	}
	var span = $(".close");
	span.on( "click", function(){
		hideClearModalCategory();
	});
}

//збереження нової категорії
function saveCategoryItem(){
	let sendData = {
		'category': $("#categoryName").val()
	};
	$.ajax({
		url: "category/saveCategory",
		data: sendData,
		method: "POST"
	}).done(function(data) {
		let lastNumber = $('#categoryTable tr:last .categoryNumber').text();
		let nextNumber = parseInt(lastNumber)+1;
		$("#categoryTable > tbody:last-child").append(data.html);
		$('#categoryTable tr:last .categoryNumber').text(""+nextNumber+"");
	}).fail(function() {
		alert("Something went wrong!");
	});
	hideClearModalCategory ();
}

//приховує модалку і очищає поля
function hideClearModalCategory () {
	$("#modalCategory").hide();
	$("#categoryName").val("");
	$("#saveCategory").removeAttr("data-param");
	$("#saveCategory").removeAttr("data-id");
}
//повертає шаблон модального вікна з бека
function getCategoryModalWindow(){
	$.ajax({
		url: "category/addModal",
		method: "GET",
	}).done(function(data) {
		categoryWindowRender(data, null);
	}).fail(function() {
		alert("Something went wrong!");
	});
}
