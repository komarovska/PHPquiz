/*$('input[type=radio], input[type=checkbox]').on("click", function() {

    var $t = $(this);

    //If it's checked
    if ($t.is(':checked')) {
        //Add the green class to the parent
        $t.parent().addClass("greenText");
        
    } else {
        //Remove the green class from the parent
        $t.parent().removeClass("greenText");
    }

});*/


$("input[type=radio]").on('click', function(){
    $(this).parent().toggleClass('greenText').siblings().removeClass('greenText');
 })