const img1 = document.querySelector(".img1");
const img2 = document.querySelector(".img2");


let count1 = 0;
let count2 = 0;


    document.querySelector("#good a").addEventListener("click", () => {
        result1 =  count1 += 1;
        document.querySelector(".count1").innerHTML = result1;   
    
        document.querySelector("#good .img1").classList.add("show");
    })
   
    setInterval(() => {
        img1.classList.remove("show");
    }, 1000);

  
