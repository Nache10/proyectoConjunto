if(jQuery('.alert')){
    setTimeout(function(){ 
        jQuery('.alert').slideUp();
    }, 3000);
}

if(jQuery('.botonborrar')){
    
    jQuery('.botonborrar').click(function(e){
        var r = confirm('seguro que quieres borrar?');
        if (!r){
            e.preventDefault();
        }
    });
    
}