$(document).ready(function() {
    
    $(".removeRow").on("click",function() {
        var tr = $(this).closest('tr');
        tr.fadeOut(400, function(){
            tr.remove();
        });
        
        id = $(this).closest("body").find(".userid").text(),
        orderid = $(this).closest('tr').find('.orderid').text();
        $.ajax({
            type: "POST",
            url: "/ajax/ordersdelete.php",
            data: {"userid":id,
                "orderid":orderid},
            success: function(){
            }
        });
        return false;
    });
    $(".clear").on("click",function() {
        $("tbody tr").remove();
        id = $(this).closest("body").find(".userid").text(),
        $.ajax({
            type: "POST",
            url: "/ajax/ordersdeleteall.php",
            data: {"userid":id},
            success: function(){
            }
        });
        return false;
    });
});