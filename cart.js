$(document).ready(function() {
    
    $(".removeRow").on("click",function() {
        var tr = $(this).closest('tr');
        tr.fadeOut(400, function(){
            tr.remove();
        });
        
        id = $(this).closest("body").find(".userid").text(),
        cartitems = $(this).closest("body").find(".label").text(),
        productid = $(this).closest('tr').find('.productid').text();
        $.ajax({
            type: "POST",
            url: "/ajax/cartdelete.php",
            data: {"userid":id,
                "productid":productid},
            success: function(){
            }
        });
        cartitems = cartitems > 1 ? cartitems - 1 : 0;
        $(this).closest("body").find(".label").html(cartitems);
        return false;
    });
    $(".clear").on("click",function() {
        $("tbody tr").remove();
        id = $(this).closest("body").find(".userid").text(),
        cartitems = $(this).closest("body").find(".label").text(),
        $.ajax({
            type: "POST",
            url: "/ajax/cartdeleteall.php",
            data: {"userid":id},
            success: function(){
            }
        });
        cartitems = 0;
        $(this).closest("body").find(".label").html(cartitems);
        return false;
    });
    $(".quantity").on("click", function() {
        $currentvalue = $(this).closest("tr").find(".amount").text(),
        productid = $(this).closest("tr").find(".productid").text(),
        id = $(this).closest("body").find(".userid").text(),
        price = $(this).closest("tr").find(".productprice").text(),
        amount = parseInt($currentvalue),
        myClass = $(this).attr("class");
        if (myClass.includes("minus")) {
            amount = amount > 1 ? amount - 1 : 1;
        } else {
            amount = amount < 100 ? amount + 1 : 100;
        }
        $.ajax({
            type: "POST",
            url: "/ajax/cartchange.php",
            data: {"amount":amount,
                "productid":productid,
                "id":id},
            success: function(){
            }
        });
        $(this).closest("tr").find(".amount").html(amount);
        $(this).closest("tr").find(".totalprice").html(amount*price + " SEK");
    });
});