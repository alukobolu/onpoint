var modalbutn = document.querySelector('#btm');
var modalbg = document.querySelector('#modal-bg');
var modalclose = document.querySelector('#modal-close');
if(modalbutn){
modalbutn.addEventListener('click',function(){
    
    document.getElementById("bg-active").style.visibility = "visible";
    document.getElementById("bg-active").style.opacity = "1";
    
});
}
if(modalclose){
    modalclose.addEventListener('click',function(){
        
        document.getElementById("bg-active").style.visibility = "hidden";
        document.getElementById("bg-active").style.opacity = "0";
        
    });
    }