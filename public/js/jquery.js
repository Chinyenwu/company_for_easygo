$(document).ready(function(){
 $(".register_teacher").click(function(){
 	if($('.register_teacher').is(':checked')) 
 		{ 	
 			      $(".register_position2").hide();
            $(".register_position1").show();
 		}
  		});
 $(".register_staff").click(function(){
 	if($('.register_staff').is(':checked')) 
 		{ 	
 			      $(".register_position1").hide();
            $(".register_position2").show();
 		}
  		}); 
 	if($('.register_teacher').is(':checked')) 
 		{ 	
 			      $(".register_position2").hide();
            $(".register_position1").show();
 		}
 	else if($('.register_staff').is(':checked')) 
 		{ 	
 			      $(".register_position1").hide();
            $(".register_position2").show();
 		}

 	$("#chinese").click(function(){
 			//alert( "chinese" );
 			      $("#information_english").hide();
            $("#information_chinese").show();
 	});
 	$("#english").click(function(){
 			//alert( "#english" );
 			      $("#information_chinese").hide();
            $("#information_english").show();
 	});

  	$("#basic").click(function(){
 			//alert( "#english" );
 			      $("#information_basic").show();
            $("#information_status").hide();
 			      $("#information_tags").hide();
            $("#information_image").hide();
            $("#information_email").hide();
 	});
 	
  	$("#status").click(function(){
 			//alert( "#english" );
 			      $("#information_basic").hide();
            $("#information_status").show();
 			      $("#information_tags").hide();
            $("#information_image").hide();
            $("#information_email").hide();
 	});	

  	$("#tags").click(function(){
 			//alert( "#english" );
 			      $("#information_basic").hide();
            $("#information_status").hide();
 			      $("#information_tags").show();
            $("#information_image").hide();
            $("#information_email").hide();
 	});	


  	$("#image").click(function(){
 			//alert( "#english" );
 			      $("#information_basic").hide();
            $("#information_status").hide();
 			      $("#information_tags").hide();
            $("#information_image").show();
            $("#information_email").hide();
 	});	 	 	

    $("#email").click(function(){
      //alert( "#english" );
            $("#information_basic").hide();
            $("#information_status").hide();
            $("#information_tags").hide();
            $("#information_image").hide();
            $("#information_email").show();
  }); 

	});
