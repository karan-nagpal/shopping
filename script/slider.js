 var a = 0;
 var i;
 var btnnext = document.getElementById("next");
 var btnprev = document.getElementById("prev");

 btnnext.addEventListener("click", next);
 btnprev.addEventListener("click", prev);
var slider = document.getElementById("slider")
 const images = slider.querySelectorAll("img");
    var radiodiv = document.getElementById("radioDiv");

    for( var j = 0 ; j< images.length; j++){
        var radiobox = document.createElement('input');
        radiobox.type = 'button'; 
        radiobox.value = j +1;
        radiobox.className = "radInput";
        radiobox.classList.add("radInput");
        radiobox.addEventListener("click" , btndone);
        radiodiv.appendChild(radiobox);
    }

    function btndone(){
       a = this.value -1;
        
        showimg();
    }

   
    
  
 function next(){
     a = a + 1;
        if(a == images.length){
        a = 0;
         }
    showimg();
    }

 function prev (){
     a = a - 1;
     if(a < 0){
         a = images.length -1
     }
       showimg();
     }
 
function showimg(){
    
 for( i = 0; i<images.length; i++){
   if (i != a){
       images[i].style.display = "none";
   }
   if (i == a){
    images[i].style.display = "block";
   }
}

}
setInterval(next, 3000);
