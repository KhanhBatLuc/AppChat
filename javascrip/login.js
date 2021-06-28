const form = document.querySelector(".login form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-text");

form.onsubmit = (e)=>{
    e.preventDefault();
}

continueBtn.onclick = ()=>{
    let formdata = new FormData(form);
    $.ajax({
          type: "POST",
          processData: false,
           contentType: false,
          url: "php/login.php",
          data :formdata,
          success: function(data){
             if(data === "success"){
                 location.href = "users.php";
             }
             else{
                 errorText.textContent = data;
                 errorText.style.display = "block";
             }
          }
        });
       
}