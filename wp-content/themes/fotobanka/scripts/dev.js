$(document).on('click','.redirect-to-image-page',function(){
        
       var langVar    = jQuery('#langvar').text() + ''; 
       var langPrefix = '';
       
        
       var thisId = $(this).data('product');
       
       if(langVar != 'uk'){
           langPrefix = '/' + langVar
       }
       
       window.location.href = langPrefix + "/product/" + thisId;
       return false; 
});

$( document ).ready(function() {
    
    jQuery('.custom-select-subcategories').on('change', function(){
       var thisURL = $(this).find(':selected').data('url');
       window.location.href = thisURL;
    });
    

    jQuery('nav a[href="#"]').click(function(){
       return false; 
    });
    
    $("#lightgallery2").lightGallery();
    
    
});


var productCountElement = document.querySelector('#product_count');
var productCount =  productCountElement.innerHTML;


var delay = 55;
var nextm = 0;
var msg = new Array(
    tickerLine1,
    tickerLine2,
    productCount + tickerLine3
            );

function start_print() { do_print(msg[0], 0, 1); }

function do_print(text, pos, dir) {
 var out = '&nbsp;<font color="#20c997">' +
 text.substring(0, pos) + '</font>&nbsp;';
 document.getElementById("message").innerHTML=out;
 pos += dir;
 if(pos > text.length)
 setTimeout('do_print("' + text + '",' + pos + ',' + (-dir) + ')', delay*10);
 else {
  if(pos < 0) {
   if(++nextm >= msg.length) nextm = 0;
   text = msg[nextm];
   dir = -dir;
  }
 setTimeout('do_print("' + text + '",' + pos + ',' + dir + ')', delay);
 }
}
