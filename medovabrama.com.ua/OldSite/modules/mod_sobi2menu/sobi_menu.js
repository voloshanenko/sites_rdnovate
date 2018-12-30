function mainmenu(){
$(" .sobi-categories ul>ul ").css({display: "none"}); // Opera Fix
$(" .sobi-categories li").hover(function(){
		$(this).find('ul:first').css({visibility: "visible",display: "none"}).show(400);
		},function(){
		$(this).find('ul:first').css({visibility: "hidden"});
		});
}

 $(document).ready(function(){
	mainmenu();
});