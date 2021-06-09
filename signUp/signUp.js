

function company(){
    

    $('#company').submit(function(event){

    let formData ={
        companyName: $('#name').val(),
        email: $('#email').val(),
        username: $('#username').val(),
        password: $('#password').val()
    };
    console.log(formData);
    $.ajax({
        type: "POST",
        url: "signUp-company.php",
        data: formData,
        dataType: "json",
        encode: true,
      }).done(function (data) {
          console.log(data)
          $("ul.error li").remove();
          if(data.success){
              window.location.replace('http://localhost/InvMGMT/signIn/SignIn.php');
          }
          else
          {
                if(data.errors.companyName){
                    $('ul.error').append('<li>'+data.errors.companyName+'</li>');
                }
                if(data.errors.email){
                    $('ul.error').append('<li>'+data.errors.email+'</li>');
                }
                if(data.errors.username){
                    $('ul.error').append('<li>'+data.errors.username+'</li>');
                }
                if(data.errors.password){
                    $('ul.error').append('<li>'+data.errors.password+'</li>');
                }
          }

      });
      event.preventDefault();
});
}
/*-----------------------------------------------*/
function user(){
    

    $('#users').submit(function(event){

    let formDatas ={
        emails: $('#user-email').val(),
        usernames: $('#user-username').val(),
        passwords: $('#user-pass').val()
    };
    $.ajax({
        type: "POST",
        url: "signUp-users.php",
        data: formDatas,
        dataType: "json",
        encode: true,
      }).done(function (data) {
          console.log(data)
          $("ul.errors li").remove();
          if(data.success){
              window.location.replace('http://localhost/InvMGMT/signIn/SignIn.php');
          }
          else
          {
                if(data.errors.emails){
                    $('ul.errors').append('<li>'+data.errors.emails+'</li>');
                }
                if(data.errors.usernames){
                    $('ul.errors').append('<li>'+data.errors.usernames+'</li>');
                }
                if(data.errors.passwords){
                    $('ul.errors').append('<li>'+data.errors.passwords+'</li>');
                }
          }

      });
      event.preventDefault();
});
}