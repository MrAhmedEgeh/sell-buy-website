console.log("ggggggg");
let sellbtn = document.querySelector('#sell');
let usersbtn = document.querySelector('#users');
let mprofile = document.querySelector('#mprofile');
let notification = document.querySelector('#notification');
//let sellbtn = document.querySelector('#sell');
let jsonArray;

let pg = document.querySelector('#page');

pg.innerHTML = `

<svg width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="spin d-block mx-auto" role="img" viewBox="0 0 24 24" ><title>Product</title><circle cx="12" cy="12" r="10"/><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/></svg>
<h2>WELCOME TO THE INVENTORY MANAGEMENT SYSTEM</h2>
`;

sellbtn.addEventListener("click", () =>{
    pg.innerHTML =  
            `
<h3>Add Product to Sell</h3>
<div class="div1">
  <form id="prod-form" action="productSubmit.php" method="post" enctype="multipart/form-data">
  <label for="img">Product image</label><br>
  <input class="img" type="file" id="img" name="myfile" placeholder="Product image.."><br><br><br>

    <label for="pname">Product Name</label>
    <input class="input1" type="text" id="Pname" name="Pname" placeholder="Product name..">

    <label for="lname">Product Price</label>
    <input class="input1" type="number" id="price" name="price" placeholder="0$">

    <label for="cate">Category</label>
    <select name="cate">
    <option value="Vehicles" >Vehicles</option>
        <option value="Electronic Devices" >Electronic Devices</option>
        <option value="Home appliences" >Home appliences</option>
        <option value="Games" >Games</option>
        <option value="Health and Beauty">Health and Beauty</option>
        <option value="Flowers and gifts">Flowers and gifts</option>
        <option value="Books">Books </option>
        <option value="general">General items</option>

    </select>

    <input class="input1" id="prod_submit" type="submit" value="Submit">
  </form>
</div>`;
    
    
});



$('#sold').click(function(){
  $.getJSON("http://localhost/InvMGMT/Dashboard/soldItems.php", function(result){
    
    let holder = `
    <h2>Emplyees Data in the company</h2>
    <table id="customers">
    <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Payment Amount</th>
        <th>Order Date</th>
    </tr>
  
      `;
      for (let r of result.rows) {
        holder += `<tr> 
        <td>${r.Product_Id} </td>
        <td>${r.Product_Name}</td>
        <td>${r.Payment_amount}</td>  
        <td>${r.Payment_Date}</td>          
    </tr>`;
        }
        pg.innerHTML = holder;
})});








mprofile.addEventListener("click", () => {
  let id = mprofile.getAttribute('data-id');
  getUser(id);
  
});
notification.addEventListener("click", () => {

  content = `
  <table id="customers">
  <tr>
      <th>User ID</th>
      <th>Company ID</th>
      <th>Status</th>
      <th>Accept</th>
      <th>Reject</th>
  </tr>
  <tr>
  <td>User ID</td>
  <td>Company ID</td>
  <td>Status</td>
  <td>Accept</td>
  <td>Reject</td>
</tr>
</table>
  `;
})
$(notification).click(function(){
  $.getJSON("http://localhost/InvMGMT/Dashboard/notify.php", function(result){
    
    let holder = `
    <h2>Emplyees Data in the company</h2>
    <table id="customers">
    <tr>
    <th>User ID</th>
    <th>Company ID</th>
    <th>Status</th>
    <th>Accept</th>
    <th>Reject</th>
    </tr>
      `;
      for (let r of result.rows) {
        holder += `<tr> 
        <td>${r.user_id} </td>
        <td>${r.company_id}</td>
        <td>${r.status}</td>    
        <td><button id=${r.user_id} class="accBtn">Accept</button></td>  
        <td><button id=${r.user_id} class="rjBtn">Reject</button></td>          
    </tr>`;
        }
      holder +=`</table>`;
      pg.innerHTML = holder;
    });

    $(document).ready(function(){
      $('table').on("click", ".accBtn", function( e ) {
        if(confirm("Do you want to accept user "+e.target.id+"? ")){
          acc_user(e.target.id);
        }
        
    });
    });

    $(document).ready(function(){
      $('table').on("click", ".rjBtn", function( e ) {
        if(confirm("Do you want to reject user "+e.target.id+"? ")){
          rj_user(e.target.id);
        }
        
    });
    });
  });

$(usersbtn).click(function(){
  $.getJSON("http://localhost/InvMGMT/Dashboard/manage_profile.php", function(result){
    
    let holder = `
    <h2>Emplyees Data in the company</h2>
    <table id="customers">
    <tr>
        <th>User ID</th>
        <th>Company ID</th>
        <th>Roll ID</th>
        <th>Username</th>
        <th>User Password</th>
        <th>Email</th>
        <th>Delete User</th>
        <th>Edit User</th>
    </tr>
      `;
      for (let r of result.rows) {
        console.log(r);
        holder += `<tr> 
        <td>${r.User_id} </td>
        <td>${r.Company_Id}</td>
        <td>${r.Roll_id}</td>  
        <td>${r.username}</td>  
        <td>${r.user_password}</td>  
        <td>${r.email}</td>  
        <td><button id=${r.User_id} class="delBtn">Delete</button></td>  
        <td><button id=${r.User_id} class="editBtn">Edit</button></td>          
    </tr>`;
        }
      holder +=`</table>`;
      pg.innerHTML = holder;
    });
    document.querySelectorAll(".delBtn").forEach(element => {
      element.addEventListener("click", (e) => {
          console.log(e.target.id);
      });
    });
  });
  let els = document.querySelectorAll(".delBtn");


  $(document).ready(function(){
    $('.results').on("click", ".delBtn", function( e ) {
      if(confirm("Do you want to delete user "+e.target.id+"? ")){
        delete_user(e.target.id);
      }
      
  });
  });
  $(document).ready(function(){
    $('table').on("click", ".editBtn", function( e ) {
      getUser(e.target.id);
      
  });
  });
  //---------------- delete user
  function delete_user(ids){
    let deleteUsers ={
      user_ids: ids,
  };
    $.ajax({
      type: "POST",
      url: "http://localhost/InvMGMT/Dashboard/deleteUser.php",
      data: deleteUsers,
      dataType: "json",
      encode: true,
    }).done(function (data) {
        console.log(data);
    });

  }
/*-----------------EDIT USER----------------------*/
  function getUser(id){
    let editUser ={
      edit_id: id,
  };
    $.ajax({
      type: "POST",
      url: "http://localhost/InvMGMT/Dashboard/getUser.php",
      data: editUser,
      dataType: "json",
      encode: true,
    }).done(function (data) {
      changeForm(data);
    });

    
  }


function changeForm(data){
  let myForm = `
  <div class="mycontainer">
  <form id="submitForm" method="post" action="">
  <label for="fname">ID</label>
  <input class="myText" type="text" id="userid" name="firstname" value=${data[0].userid} disabled="disabled">

  <label for="fname">Username</label>
  <input class="myText" type="text" id="fname" name="firstname" value=${data[0].username} placeholder="Enter username..">

  <label for="lname">password</label>
  <input class="myText" type="text" id="lname" name="password" value=${data[0].user_password} placeholder="Enter password">


  <label for="email">Email</label>
  <input class="myText" type="text" id="email" name="firstname" value=${data[0].email} placeholder="Enter Email..">

  <input class="mySubmit" onclick="submitForm()" type="submit" value="Submit">
</form> </div>
  `;
  pg.innerHTML = myForm;
}

  //---------------- post user


function submitForm(){
  $('#submitForm').submit(function(event){

    let postUser ={
      ids: $('#userid').val(),
      usernames: $('#fname').val(),
      passwords: $('#lname').val(),
      roll: $('#select').val(),
      emails: $('#email').val()
  };
      $.ajax({
          type: "POST",
          url: "http://localhost/InvMGMT/Dashboard/editUser.php",
          data: postUser,
          dataType: "json",
          encode: true,
        }).done(function (data) {
            console.log(data);
            
    });
        event.preventDefault();
  });
}




function acc_user(ids){
  let accept ={
    acceptUserId: ids,
};
  $.ajax({
    type: "POST",
    url: "http://localhost/InvMGMT/Dashboard/acceptUser.php",
    data: accept,
    dataType: "json",
    encode: true,
  }).done(function (data) {
      console.log(data);
  });
}

function rj_user(ids){
  let reject ={
    rejected: ids,
};
  $.ajax({
    type: "POST",
    url: "http://localhost/InvMGMT/Dashboard/rejectUser.php",
    data: reject,
    dataType: "json",
    encode: true,
  }).done(function (data) {
      console.log(data);
  });
}





/*
function prodForm(e){
  e.preventDefault();
  $(document).ready(function(e){
    $('#prod-form').on("click", "#prod_submit", function( e ) {

      prodSubmit();
      return false;
  });
  });
}

function prodSubmit(myimg, pname, price){
  let prod = {
    imgs : $('#img').val(),
    pnames : $('#Pname').val(),
    prices : $('#price').val()
};
  $.ajax({
    type: "POST",
    url: "http://localhost/InvMGMT/Dashboard/productSubmit.php",
    data: prod,
    dataType: "json",
    encode: true,
  }).done(function (data) {
      console.log(data);
  });
}
*/