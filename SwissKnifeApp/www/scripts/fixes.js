 /* Keyboard fix
  */
 
 $(document).ready(function(){
     $("input").focus(function() {
        $("nav").hide();
        $("body").css("padding-top", "15px");
     });
     $("input").blur(function() {
        $("nav").show();
        $("body").css("padding-top", "0px");
     });
});
