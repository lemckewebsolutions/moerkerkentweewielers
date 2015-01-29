$(".js-navigation").on("click", ".js-navigation-toggle", function()
{
	var parent = $(this).parent();
	if (parent.hasClass("collapsed"))
	{
		parent.find(".navigation-item").not(".toggle").removeClass("hidden-xs");
		parent.removeClass("collapsed");
	}
	else
	{
		parent.find(".navigation-item").not(".toggle").addClass("hidden-xs");
		parent.addClass("collapsed");
	}
});