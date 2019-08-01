
document.getElementById('admc').style.display = 'none';
document.getElementById('ac').style.display = 'none';

/*var rol =  document.getElementById('rol');
var pro = rol.options[rol.selectedIndex].value;
var option = document.getElementsByTagName("option");*/

function dimepropiedad(){
    //var texto = document.formul.rol.length 
    var indice = document.formul.rol.selectedIndex;
    var valor = document.formul.rol.options[indice].value;
    //var textoEscogido = document.formul.rol.options[indice].text 
    
    //console.log(texto);
    console.log(indice);
    console.log(valor);
    //console.log(textoEscogido);
    
    if (valor == 1){
        document.getElementById('admc').style.display = 'block';
        document.getElementById('ac').style.display = 'block';
        document.innerHTML='<br/>';
    } else {
        document.getElementById('admc').style.display = 'none';
        document.getElementById('ac').style.display = 'none';
    }
}



//console.log(pro);
//console.log(option);
//console.log(indice);

/*if (pro == 1){
    document.getElementById('admc').style.display = 'block';
    document.getElementById('ac').style.display = 'block';
}*/