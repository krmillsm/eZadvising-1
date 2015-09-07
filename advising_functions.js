function getCurrentState($token, $studentId) {
    //alert("in getCurrentState");
    $.ajax({
        url: "getSomething.php",
        success: function (result) {
            //$("#div1").html(result);
            alert(result);
            return result;
        }//end success
    });//end ajax
}//end function getCurrentState