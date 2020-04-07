document.addEventListener("DOMContentLoaded", function(){
    //autocompletion Film
    const searchFilm = document.getElementById("searchFilm");
    const renderTitle = document.getElementById("renderTitle");
    document.addEventListener("keyup", ()=>{
        let searchVal = searchFilm.nodeValue;
        fetch("librairies/autoFilm.php",{
            method: "POST",
            headers:{'Content-Type':'application/x-ww-form-urlencoded'},
            body:"searchFilm="+searchVal
        })
        .then(function(response){
            return response.text();
        })
        .then(function(text){
            renderTitle.innerHTML=text;
        })
    });
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    //Fin du JS
})