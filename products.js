$(document).ready(function() {
    
    $(".add").on("click",function() {
        var cartitem = parseInt($(this).closest("body").find(".label").text());
        var target = $(this).closest("body").find(".label");
        id = $(this).closest("body").find(".userid").text(),
        productid = $(this).closest('.col-sm-4').find('.productid').text();
        $.ajax({
            type: "POST",
            url: "/ajax/productsadd.php",
            data: {"userid":id,
                "productid":productid,
                "amount":1} //ADD AMOUNTS
        }).done(function(data){
            if(data == '0'){
                cartitem = cartitem < 100 ? cartitem + 1 : 100;
                target.html(cartitem);
            }
        });
    });
    $(".removeRow").on("click",function() {
        var tr = $(this).closest('tr');
        tr.fadeOut(400, function(){
            tr.remove();
        });
        
        productid = $(this).closest('tr').find('.productid').text();
        $.ajax({
            type: "POST",
            url: "/ajax/productsdelete.php",
            data: {"productid":productid},
            success: function(){
            }
        });
        return false;
    });
});