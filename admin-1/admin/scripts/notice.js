$(document).ready(function(){

// jQuery ajax form submit example, runs when form is submitted
$("#notice").submit(function(e) {
    e.preventDefault(); // prevent actual form submit
    var form = $(this);
    var url = form.attr('action'); //get submit url [replace url here if desired]
    
    $("#btnAdd").html("Adding...");
    $("#btnAdd").prop('disabled', true);
    setInterval(function () {$("#btnAdd").prop('disabled', false);$("#btnAdd").html("Add Record")}, 3000);

    
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), // serializes form input
            success: function(data){

                console.log(data);

                $("#msg").html(data); 
                $("#msg").slideDown("slow");
                $("#msg").slideUp(3000,function(){ 
                if(!(data=="Please complete all required fields."))
                window.location.href="notice-list.php";
                 });
                

            }
        });
    
});

$(".delete").click(function(e) {

    var id= $(this).attr("id");
    var url="notice-action.php";
    if(confirm("Do you want to delete ?"))
    {
        $.ajax({
            type: "POST",
            url: url,
            data:{'id':id,'action':'Delete'}, // serializes form input
            success: function(data){

                alert(data); 
                location.reload();
            }
        });
    }

});
	
});
 




