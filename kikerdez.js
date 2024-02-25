$(document).ready(function(){    
        $(".rejtett").hide();
		$(".ki_be_csuk").hide();
		$("#focus").focus();
		$("tr:even").css("background-color", "white");
		$("input").focus(function(){
		 $(this).css("background-color", "#cccccc");
		});		
		$("input").blur(function(){
		 $(this).css("background-color", "#ffffff");    
        });
		$("p.nyit").click(function(){	 
         $(".ki_be_csuk").toggle();		 
        });		
		$("p.nyit").css("cursor", "pointer");
		
});




