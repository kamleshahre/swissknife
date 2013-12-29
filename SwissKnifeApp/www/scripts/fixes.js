 /* Keyboard fix
  */
 
 $(document).ready(function(){
     $("textarea").focus(function() {
        $("nav").hide();
        $("body").css("padding-top", "15px");
     });
     $("textarea").blur(function() {
        $("nav").show();
        $("body").css("padding-top", "0px");
     });
     $("input").focus(function() {
        $("nav").hide();
        $("body").css("padding-top", "15px");
     });
     $("input").blur(function() {
        $("nav").show();
        $("body").css("padding-top", "0px");
     });
});
