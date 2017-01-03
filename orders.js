$(document).ready(function() {
    
    $(".removeRow").on("click",function() {
        var tr = $(this).closest('tr');
        tr.fadeOut(400, function(){
            tr.remove();
        });
        
        orderid = $(this).closest('tr').find('.orderid').text();
        $.ajax({
            type: "POST",
            url: "/ajax/ordersdelete.php",
            data: {"orderid":orderid},
            success: function(){
            }
        });
        return false;
    });
    $(".selection").on("change",function() {
       var id = $(this).closest('tr').find('.orderid').text(); 
       var status = $(this).closest('tr').find(".selection option:selected").text();
       $.ajax({
            type: "POST",
            url: "/ajax/orderschange.php",
            data: {"orderid":id,
                   "status":status},
            success: function(){
                alert( "Ordered status changed to ''" + status + "'' for Order ID # ''" + id + "''.");
            }
        });
        return false;
    });
});