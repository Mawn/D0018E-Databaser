$(document).ready(function() {
    
    $(".add").on("click",function() {
        id = $(this).closest("body").find(".userid").text(),
        cartitems = parseInt($(this).closest("body").find(".label").text()),
        productid = $(this).closest('.col-sm-4').find('.productid').text();
        $.ajax({
            type: "POST",
            url: "/ajax/productsadd.php",
            data: {"userid":id,
                "productid":productid,
                "amount":1}, //ADD AMOUNTS
            success: function(){
            }
        });
        cartitems = cartitems < 100 ? cartitems + 1 : 100;
        $(this).closest("body").find(".label").html(cartitems);
        return false;
    });
});