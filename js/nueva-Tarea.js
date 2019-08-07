

document.getElementById('arc').style.display = 'none';
document.getElementById('link').style.display = 'none';
document.getElementById('lin').style.display = 'none';

function archivo(){
    document.getElementById('arc').style.display = 'block';
    document.getElementById('link').style.display = 'none';
    document.getElementById('lin').style.display = 'none';
}

function link(){
    document.getElementById('lin').style.display = 'block';
    document.getElementById('link').style.display = 'block';
    document.getElementById('arc').style.display = 'none';    
}

function no(){
    document.getElementById('arc').style.display = 'none';
    document.getElementById('link').style.display = 'none';
    document.getElementById('lin').style.display = 'none';
}