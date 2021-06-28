const form = document.querySelector(".signup form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-text");

form.onsubmit = (e)=>{
    e.preventDefault();
}
// options 1
// continueBtn.onclick = ()=>{
//     let xhr = new XMLHttpRequest();
//     xhr.open("POST", "php/singup.php", true);
//     xhr.onload = ()=>{
//       if(xhr.readyState === XMLHttpRequest.DONE){
//           if(xhr.status === 200){
//               let data =  xhr.response;
//               console.log(data);
//           }
//       }
//     }
//     xhr.send();
// }

// option 2
    continueBtn.onclick = ()=>{
        let formdata = new FormData(form);
        $.ajax({
              type: "POST",
              processData: false,
               contentType: false,
              url: "php/singup.php",
              data :formdata,
              success: function(data){
                 if(data === "success"){
                     location.href = "login.php";
                 }
                 else{
                     errorText.textContent = data;
                     errorText.style.display = "block";
                 }
              }
            });
           
    }