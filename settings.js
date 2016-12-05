$(document).ready(function() {
    $(".removeRow").on("click",function() {
        var tr = $(this).closest('tr');
        tr.fadeOut(400, function(){
            tr.remove();
        });
        return false;
    });
});