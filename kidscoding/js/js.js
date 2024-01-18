// JavaScript Document
$(document).ready(function(e) {
    $(".mainmu").mouseover(
		// 滑鼠移上去 .mw出現
		function()
		{
			$(this).children(".mw").stop().show()
		}
	)
	$(".mainmu").mouseout(
		// 滑鼠離開 .mw消失
		function ()
		{
			$(this).children(".mw").hide()
		}
	)
});
function lo(x)
{
	location.replace(x)
}
function op(x,y,url)
{
	$(x).fadeIn()
	if(y)
	$(y).fadeIn()
	if(y&&url)
	$(y).load(url)
}
function cl(x)
{
	$(x).fadeOut();
}