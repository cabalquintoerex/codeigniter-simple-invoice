$(document).ready(function(){
   $('#resetbtn').click(function(){
       $("#date_from").val('');
       $("#date_to").val('');
       $( "#filterinvoice" ).submit();
  });
 });