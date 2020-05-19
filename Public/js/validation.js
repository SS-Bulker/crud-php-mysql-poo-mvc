//validating registration

function validation(){

    var name = document.querySelector('#name').Value;
    var email = document.querySelector('#email').Value;
    var address = document.querySelector('#address').Value;
    
//Validating users
    if(name != ""){
        var characters = name.length;
        var expression = /^[a-zA-Z0-9]*$ /;
        if(characters > 10){
            document.querySelector("label [for='name']").innerHTML += "<br> Please write less than 10 characters";
            return false;
        }
    }

    if(!expression.test(name)){
        document.querySelector("label [for='name']").innerHTML += "<br> Don't write special characters";
        return false;
    }

return true;

}

