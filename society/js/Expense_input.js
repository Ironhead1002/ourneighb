function validation() {
   
  
    var expense = document.getElementById('expense').value;

    numbers = /^[0-9]*$/;

    if (expense == "") {
        document.getElementById("e_expense").innerHTML = "expense is required";
        return false;
    }else if (!expense.match(numbers)) {
        document.getElementById("e_expense").innerHTML = "only number is allowed";
        return false;
    } else {
        document.getElementById("e_expense").innerHTML = "";
    }
    
    
    
}