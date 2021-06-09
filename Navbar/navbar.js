


let apply = document.querySelector('#apply');
let nav = document.querySelector('#mynav');
let id = document.querySelector('#userid');

$(document).ready(function(){
    console.log("nav");
    $('#mynav').on("click", "#apply", function() {
        openForm();
});})





function openForm() {
    document.getElementById("myForms").style.display = "block";
  }

  function closeForm() {
    document.getElementById("myForms").style.display = "none";
  }

  document.querySelector("#myForms").addEventListener("click",submitForm);
  function submitForm(){
    $('#submitForm').submit(function(event){
  
      let postUser ={
        ids: $('#userid').val(),
        usernames: $('#cid').val()

    };

    $.ajax({
        type: "GET",
        url: "http://localhost/InvMGMT/Navbar/getId.php",
        dataType: "json",
        encode: true,
    }).done(function (data) {
        id.value = data;
        console.log(data);
    });
    
        $.ajax({
            type: "POST",
            url: "http://localhost/InvMGMT/Navbar/toCompany.php",
            data: postUser,
            dataType: "json",
            encode: true,
          }).done(function (data) {
              console.log(data);
              
      });
          event.preventDefault();
    });

    
  }

