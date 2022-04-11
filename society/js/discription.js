function validation() {
   
  
    var discription = document.getElementById('discription').value;

    numbers = /^[0-9]*$/;

    if (discription == "") {
        document.getElementById("e_discription").innerHTML = "discription is required";
        return false;
    } else {
        document.getElementById("e_discription").innerHTML = "";
    }
    
    
    
}