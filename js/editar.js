
document.getElementById('contra').style.display = 'none';
var a = 1;

function boton(){
    
    a = a + 1;
    
    if (a % 2 == 0){
        document.getElementById('contra').style.display = 'block';
    } else {
        document.getElementById('contra').style.display = 'none';
    }
    
}