 /* Keyboard fix
  */
 
 $(document).ready(function(){
     $("input").focus(function() {
        $("nav").hide();
     });
     $("input").blur(function() {
        $("nav").show();
     });
 });