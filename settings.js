$(document).ready(function() {
    
    $(".removeRow").on("click",function() {
        var tr = $(this).closest('tr');
        tr.fadeOut(400, function(){
            tr.remove();
        });
        var email = $(this).closest('tr').find('.email').text();
        $.ajax({
            type: "POST",
            url: "/ajax/settingsdelete.php",
            data: {"email":email},
            success: function(){
                alert( "User ''" + email + "'' successfully deleted.");
            }
        });
        return false;
    });
    $(".selection").on("change",function() {
       var email = $(this).closest('tr').find('.email').text(); 
       var type = $(this).closest('tr').find(".selection option:selected").text();
       $.ajax({
            type: "POST",
            url: "/ajax/settingschange.php",
            data: {"email":email,
                   "type":type},
            success: function(){
                alert( "User type changed to ''" + type + "'' for user ''" + email + "''.");
            }
        });
        return false;
    });
});