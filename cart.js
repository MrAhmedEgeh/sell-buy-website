




/*

$('#checkout').click(function(){
    $('.results').on("click", ".item", function( e ) {
        console.log("clikced");
        submitCart(e.target.id.value, e.children[2].value);
    });
    });

$(document).ready(function(){
    $('.results').on("click", ".item", function( e ) {
        submitCart(e.target.id.value, e.children[2].value);
        
    });
    });
    */
$("#checkout").click(function(){
    $('.item').each(function(i, obj){
        console.log(obj.id, obj.childNodes[2].value);
        submitCart(obj.id, obj.childNodes[2].value);
    })
})



function submitCart(id, qnt){
    let item ={
      ids: id,
      qnts: qnt,
  };
    $.ajax({
      type: "POST",
      url: "http://localhost/InvMGMT/payment.php",
      data: item,
      dataType: "json",
      encode: true,
    }).done(function (data) {
        console.log(data);
    });
  }