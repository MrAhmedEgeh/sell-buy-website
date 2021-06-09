


$(document).ready(function(){
    $('body').on("click", ".shopbtn", function( e ) {
      console.log(" to shopping caaaart");
      console.log(e.target.id);
      toCart(e.target.id);
  });
  });



function toCart(ids){
let toCart ={
    el: ids,
};
$.ajax({
    type: "POST",
    url: "http://localhost/InvMGMT/product_pages/toCart.php",
    data: toCart,
    dataType: "json",
    encode: true,
}).done(function (data) {
    console.log(data);
});
}