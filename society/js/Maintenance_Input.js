function validation() {
   
  
    var faltNo = document.getElementById('faltNo').value;
    var amount = document.getElementById('amount').value;

    letters = /^[a-zA-Z ]*$/;
    numbers = /^[0-9]*$/;
    const Email = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if (faltNo == "") {
        document.getElementById("e_flatNO").innerHTML = "flat number is required";
        return false;
    }else if (!faltNo.match(numbers)) {
        document.getElementById("e_flatNO").innerHTML = "only number is allowed";
        return false;
    } else {
        document.getElementById("e_flatNO").innerHTML = "";
    }
    if (amount == "") {
        document.getElementById("e_amount").innerHTML = "Amount is required";
        return false;
    }else if (!amount.match(numbers)) {
        document.getElementById("e_amount").innerHTML = "only number is allowed";
        return false;
    } else {
        document.getElementById("e_amount").innerHTML = "";
    }

    
    
}