window.addEventListener('load', () => {
    if (localStorage.getItem('audioAllowed') === 'true') {
        document.getElementById('normal-audio').play();
        document.getElementById('normal-audio').muted=false;
        document.addEventListener('click', () => {
            document.getElementById('normal-audio').play();
            document.getElementById('normal-audio').muted=false;
        });
    }
});

document.getElementById('name').addEventListener('input',function(){
    let name=this.value;
    let error=document.getElementById('name-error');
    if (!/^[a-zA-Z-' ]*$/.test(name)) {
        error.textContent="**Only letters and whitespaces allowed";
    } else {
        error.textContent="";
    }
});
        
document.getElementById('type').addEventListener('input',function(){
    let type=this.value;
    let error=document.getElementById('type-error');
    if (!/^[a-zA-Z-' ]*$/.test(type)) {
        error.textContent="**Only letters and whitespaces allowed";
    } else {
        error.textContent="";
    }
});
 
document.getElementById('house').addEventListener('change',function(){
    let house=this.value;
    let error=document.getElementById('house-error');
    if (house=="") {
        error.textContent="**Please select a house";
    } else {
        error.textContent="";
    }
});

document.getElementById('wand').addEventListener('input',function(){
    let wand=this.value;
    let error=document.getElementById('wand-error');
    if (!/^[a-zA-Z\s\-.,:\'"()]+$/.test(wand)) {
        error.textContent="**Invalid wand core";
    } else {
        error.textContent="";
    }
});
   
document.getElementById('specialisation').addEventListener('input',function(){
    let specialties=this.value;
    let error=document.getElementById('specialties-error');
    if (!/^[a-zA-Z\s\-.,:\'"()]+$/.test(specialties)) {
        error.textContent="**Invalid specialties format";
    } else {
        error.textContent="";
    }
});

document.getElementById('patronus').addEventListener('input',function(){
    let patronus=this.value;
    let error=document.getElementById('patronus-error');
    if (!/^[a-zA-Z-' ]*$/.test(patronus)) {
        error.textContent="**Invalid patronus";
    } else {
        error.textContent="";
    }
});
        
document.getElementById('title').addEventListener('input',function(){ 
    let title=this.value; 
    let error=document.getElementById('title-error'); 
    if (!/^[a-zA-Z\s\-.,:\'"()]+$/.test(title)) { 
        error.textContent="**Invalid title format";
    } else { 
        error.textContent="";
    } 
});
        
document.getElementById('image').addEventListener('input',function(){
    let image=this.value;
    let error=document.getElementById('image-error');
    if (!/^https?:\/\/[^\s$.?#].[^\s]*$/i.test(image)) {
        error.textContent="**Invalid url";
    } else {
        error.textContent="";
    }
});

   
document.getElementById('background_image').addEventListener('input',function(){
    let background=this.value;
    let error=document.getElementById('background-error');
    if (!/^https?:\/\/[^\s$.?#].[^\s]*$/i.test(background)) {
        error.textContent="**Invalid url";
    } else {
        error.textContent="";
    }
});

document.getElementById('create').addEventListener('reset',function(){
    const errorspans=document.querySelectorAll('.error');
    errorspans.forEach(function (span){
        span.textContent="";
    })
});