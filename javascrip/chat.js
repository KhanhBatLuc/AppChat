const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
// o ma minh nhap
sendBtn = form.querySelector("button"),
// nut de submit noi dung di;
// o chat de hien thi
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e)=>{
    e.preventDefault();
}
inputField.focus();
inputField.onkeyup = ()=>{
    if(inputField.value != ""){
        sendBtn.classList.add("active");
    }else{
        sendBtn.classList.remove("active");
    }
}

sendBtn.onclick = () => {
    let formdata = new FormData(form);
    $.ajax({
          type: "POST",
          processData: false,
           contentType: false,
          url: "php/insert-chat.php",
          data :formdata,
          success: function(data){
            inputField.value = "";
           
          }
        });
   
}
// chatBox.onmouseenter = ()=>{
//   chatBox.classList.add("active");
// }

chatBox.onmouseleave = ()=>{
  chatBox.classList.remove("active");
}
inputField.onclick= ()=>{
  chatBox.classList.add("active");
}

setInterval(()=>{
    let formdata = new FormData(form);
    $.ajax({
          type: "POST",
          processData: false,
          contentType: false,
          data :formdata,
          url: "php/get-chat.php",
          success: function(data){
          chatBox.innerHTML = data ;
            if( chatBox.classList.contains('active')){
              scrollToBottom();
            }
          }
        });
       
  
  },500);
  
// ajax 
function scrollToBottom(){
  chatBox.scrollTop = chatBox.scrollHeight;
}