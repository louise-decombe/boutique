(function($){

    $('.addpanier').click(function(event){
        event.preventDefault();
        $.get($(this).attr('href'),{},function(data){
           if(data.error){
               confirm(data.message);
           }else{
                $('#total').empty().append(data.total);
                $('#count').empty().append(data.count);
           }
        },'json');
        return false;

    });

})(jQuery);

var w;
function Ouvrir() {
  w=window.open("popup.html","pop1","width=200,height=200");
}
function Fermer() {
  if (w.document) {  
    w.close(); 
  }
}