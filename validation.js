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
// manufacturer validation
    function man_validation(){
        'use strict';
        var manid_name = document.getElementById("manid");
        var manid_value = document.getElementById("manid").value;
        var manid_length = manid_value.length;
        var letters = /^[A-Z]{2}[0-9]{2}/g;
        if(!manid_value.match(letters))
        {
        document.getElementById('man_err').innerHTML = 'Must be in formatt LL66 & length 4';
        document.getElementById('man_err').style.color = "#FF0000";
        passid_name.focus();
        
        }
        else
        {
        document.getElementById('man_err').innerHTML = 'Valid Number';
        document.getElementById('man_err').style.color = "#00AF33";
        }
        }
    