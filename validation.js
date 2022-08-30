// Validation using jQury

// Prevents the form from submitting untill it pass from vaidations
$("form").submit(function(e){
    // e.preventDefault();

    // empty variable
    var error = "";

    if($("#email").val() == "")
    {
        error += "The email field is required.<br>";
    }
    if($("#subject").val() == "")
    {
        error += "The subject field is required.<br>";
    }
    if($("#content").val() == "")
    {
        error += "The content field is required.<br>";
    }
    if(error!="")
    {
        $("#error").html('<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form</strong></p>'+ error +'</div>');
        return false;
    }
    else
    {
        // after validation completed this will unbind the preventions
        // $("form").unbind("submit").submit();
        return true;
    } 
});  