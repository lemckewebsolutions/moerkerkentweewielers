$(".collection").on("click", ".js-filter-toggle", function(event)
{
	event.preventDefault();

	var parent = $(this).parent();
	var filters = parent.parent().find(".categories");
	var removeFilterLink = parent.parent().find(".remove-filters");

	if (window.location.hash === "#filters")
	{
		filters.addClass("hidden-xs");
		filters.removeClass("col-xs-12");
		$(this).text("Filters openen");
		window.location.hash = "";
	}
	else
	{
		filters.removeClass("hidden-xs");
		filters.addClass("col-xs-12");
		$(this).text("Filters sluiten");
		window.location.hash = "#filters";
		removeFilterLink.attr("href", "?#filters");
	}
});

$(document).ready(function (){
	var filters = $(document).find(".categories");
	var removeFilterLink = $(document).find(".remove-filters");

	if (window.location.hash === "#filters")
	{
		filters.removeClass("hidden-xs");
		filters.addClass("col-xs-12");
		$(document).find(".js-filter-toggle").text("Filters sluiten");
		removeFilterLink.attr("href", "?#filters");
	}
});