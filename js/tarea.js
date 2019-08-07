
document.getElementById('img').style.display = 'none';
document.getElementById('arc').style.display = 'none';
document.getElementById('doc').style.display = 'none';
//document.getElementById('tex').style.display = 'none';

/*var inputimg = document.getElementById('img');
var inputarc = document.getElementById('arc');
var inputdoc = document.getElementById('doc');
var inputtex = document.getElementById('tex');*/
var form = document.getElementById('form');

function archivo(){
    document.getElementById('arc').style.display = 'block';
    document.getElementById('larc').style.display = 'block';
    document.getElementById('img').style.display = 'none';
    document.getElementById('limg').style.display = 'none';
    document.getElementById('doc').style.display = 'none';
    document.getElementById('ldoc').style.display = 'none';
    //document.getElementById('tex').style.display = 'none';
    
    form.reset();
}

function imagen(){
    document.getElementById('img').style.display = 'block';
    document.getElementById('limg').style.display = 'block';
    document.getElementById('arc').style.display = 'none';
    document.getElementById('larc').style.display = 'none';
    document.getElementById('doc').style.display = 'none';
    document.getElementById('ldoc').style.display = 'none';
    //document.getElementById('tex').style.display = 'none';
    
    form.reset();
}

function documento(){
    document.getElementById('doc').style.display = 'block';
    document.getElementById('ldoc').style.display = 'block';
    document.getElementById('arc').style.display = 'none';
    document.getElementById('larc').style.display = 'none';
    document.getElementById('img').style.display = 'none';
    document.getElementById('limg').style.display = 'none';
    //document.getElementById('tex').style.display = 'none';
    
    form.reset();    
}

