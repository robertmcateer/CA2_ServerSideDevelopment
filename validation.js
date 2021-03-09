function price_validation(){
    'use strict';
    var priceid_name = document.getElementById("priceid");
    var priceid_value = document.getElementById("priceid").value;
    var priceid_length = priceid_value.length;
    var letters = /^\d+(,\d{3})*(\.\d{1,2})?$/g;
    if(!priceid_value.match(letters))
    {
    document.getElementById('price_err').innerHTML = 'Price must be in format ££.££';
    document.getElementById('price_err').style.color = "#FF0000";
    passid_name.focus();
    
    }
    else
    {
    document.getElementById('price_err').innerHTML = 'Valid price';
    document.getElementById('price_err').style.color = "#00AF33";
    }
    }
    //password validation ends