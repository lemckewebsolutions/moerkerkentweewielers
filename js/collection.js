$(".js-categories").on("click", ".js-categories-toggle", function()
{
	var parent = $(this).parent();
	if (parent.hasClass("collapsed"))
	{
		parent.find(".category").not(".js-categories-toggle").removeClass("hidden-xs");
		parent.removeClass("collapsed");
	}
	else
	{
		parent.find(".category").not(".js-categories-toggle").addClass("hidden-xs");
		parent.addClass("collapsed");
	}
});