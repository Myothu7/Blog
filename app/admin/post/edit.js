
let input = document.querySelector("#photo");
let div = document.querySelector("#div");
let image = document.querySelector("img");

input.addEventListener('change',(event)=>{
    if(image.src != ""){
        div.style.display = "block";
        let file = event.target.files[0];
        let url = URL.createObjectURL(file);
        image.src = url;
        input.style.display = "none";
    }    
})

let img = document.querySelector("#change-img");

img.addEventListener('click',()=>{
    input.style.display = "block";
    input.value = "";
    div.style.display = "none";
})