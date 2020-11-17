//btnLogin Click
$('#btnLogin').click(
    function() {

        if (inputValidation()) {
            // alert('input ok');
            logIn();
        }
    });
//end btnLogin Click


function logIn() {
    var login_data = {
        user_name: $("#txtUserName").val(),
        password: $('#txtPassword').val()
    }
    $.post("Controllers/Login/login.php", {
        request: 'login',
        data: login_data
    }, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            alert("Undefined");
        } else {
            if (e.msgType === 1) {
                location.href = 'View/Home/Home.php';
            } else {
                alert(e.msg);
            }

        }
    }, "json");
}

//input validation
function inputValidation(callback) {
    var inputValidation = true;
    //txtUserName Validation
    if ($('#txtUserName').val().length === 0) {
        alert('Username cannot be empty');
        inputValidation = false;
    }
    //end txtUserName Validation


    //txtPassword Validation
    if ($('#txtPassword').val().length === 0) {
        alert('Password cannot be empty');
        inputValidation = false;
    }
    //end txtPassword Validation
    return inputValidation;
} //end input validation