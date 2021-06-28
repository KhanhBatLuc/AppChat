const searchBar = document.querySelector(".search input"),
searchIcon = document.querySelector(".search button"),
usersList = document.querySelector(".users-list");

searchIcon.onclick = ()=>{
  searchBar.classList.toggle("show");
  searchIcon.classList.toggle("active");
  searchBar.focus();
  if(searchBar.classList.contains("active")){
    searchBar.value = "";
    searchBar.classList.remove("active");
  }
}
searchBar.onkeyup = ()=>{
  let search = searchBar.value;
  if(search != ""){
    searchBar.classList.add("active");
  }else{
    searchBar.classList.remove("active");
  }
  $.ajax({
    type: "POST",
    url: "php/search.php",
    data :{search : search} ,
    success: function(data){
      usersList.innerHTML = data ;
    }
  });
 
}
// ajax 
setInterval(()=>{
  $.ajax({
        type: "GET",
        url: "php/users.php",
        success: function(data){
          if(!searchBar.classList.contains("active")){
            usersList.innerHTML = data;
          }
        }
      });
     

},500);
