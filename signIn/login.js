$(document).ready(function(){ 
    $('form').submit(function(event){

        let formDatas ={
            user: $('#username').val(),
            pass: $('#password').val()
        };
        $.ajax({
            type: "POST",
            url: "loginProcess.php",
            data: formDatas,
            dataType: "json",
            encode: true,
          }).done(function (data) {
              console.log(data);
              $("ul.error li").remove();
            if(data.success){
                window.location.replace('http://localhost/InvMGMT/index.php');
            } 
            else
            {
                if(data.errors.username)
                {
                    $('ul.error').append('<li>'+data.errors.username+'</li>');
                } 
                if(data.errors.password)
                {
                    $('ul.error').append('<li>'+data.errors.password+'</li>');
                }
                if(data.errors.red)
                {
                    $('ul.error').append('<li>'+data.errors.red+'</li>');
                }
          }
      });
          event.preventDefault();
    });
    
})
