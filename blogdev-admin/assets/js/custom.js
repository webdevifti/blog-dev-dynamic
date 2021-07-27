$('.alert-close').on('click', function(){
    
   $('.alert-succes-msg').addClass('remove');
   $('.alert-error-msg').addClass('remove');
});

$("#selectall").click(function(event){
   if(this.checked){
      $('.checkboxes').each(function(){
         this.checked = true;
      });
   }else{
      $('.checkboxes').each(function(){
         this.checked = false;
      });
   }
});