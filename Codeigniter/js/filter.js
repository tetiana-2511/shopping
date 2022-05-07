$( document ).ready(function() {
	$( "body" ).on( "click", "#filterButton", function() {
		page = 1;
		filterData(page);
	});
});

function filterData(page){
	$("#filterData").html("<div id='loading'></div>div>");
	var category = get_filter('checkboxCategory');
	var status = get_filter('checkboxStatus');
	sendData(category, status, page);
}

function get_filter(className){
	var filter = [];
	$("."+className+":checked").each(function (){
		filter.push($(this).val());
	});
	console.log("filter", filter);
	return filter;
}


//повертає шаблон модального вікна з бека
function sendData(category, status, page){
	data1 = {
		"category":category,
		"status": status
	}
	console.log("data", data1);
	$.ajax({
		url: "filterShopping/filter",
		data:{
			"category":category,
			"status": status
		},
		method: "POST",
	}).done(function(data) {
		console.log(data);
		$(".bodyTable").html(data);

		//$(".filterData").html(data.list);
		//$("#pagination").html(data.pagination);
	}).fail(function() {
		alert("Something went wrong!");
	});
}
