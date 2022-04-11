function validation() {

    var name = document.getElementById('username').value;
    var email = document.getElementById('email').value;
    var phoneNO = document.getElementById('phoneNo').value;
    var faltNo = document.getElementById('faltNo').value;
    var password = document.getElementById('password').value;

    letters = /^[a-zA-Z ]*$/;
    numbers = /^[0-9]*$/;
    const Email = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if (name == "") {
        document.getElementById("c_name").innerHTML = "Name is required";
        return false;
        // document.getElementById("c_name").style.display = "block";
    } else if (!name.match(letters)) {
        document.getElementById("c_name").innerHTML = "only alphabate is required";
        return false;
    }else if (name.length > 30 ){
        document.getElementById("c_name").innerHTML = "Maximum Length should be 30";
        return false;
    }  else {
        document.getElementById("c_name").innerHTML = "";
    }

    if (email == "") {
        document.getElementById("c_email").innerHTML = "email is required";
        return false;
    }else if (!email.match(Email)) {
        document.getElementById("c_email").innerHTML = "Please valid email";
        return false;
    } else {
        document.getElementById("c_email").innerHTML = "";
    }

    if (phoneNO == "") {
        document.getElementById("c_phone").innerHTML = "phone No is required";
        return false;
    }else if (!phoneNO.match(numbers)) {
        document.getElementById("c_phone").innerHTML = "only number is allowed";
        return false;
    } else if (phoneNO.length != 10 ){
        document.getElementById("c_phone").innerHTML = "phone No must be 10 number";
        return false;
    } else {
        document.getElementById("c_phone").innerHTML = "";
    }
    if (faltNo == "") {
        document.getElementById("c_flatNO").innerHTML = "flat number is required";
        return false;
    }else {
        document.getElementById("c_flatNO").innerHTML = "";
    }

    if (password == "") {
        document.getElementById("c_pass").innerHTML = "password is required";
        return false;
    } else if (password.length < 8 ) {
        document.getElementById("c_pass").innerHTML = "password must be 8 character";
        return false;
    } else {
        document.getElementById("c_pass").innerHTML = "";
    }


}
