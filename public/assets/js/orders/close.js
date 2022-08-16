let devicesType = document.getElementById("deviceData");

let type = (devicesType.getAttribute('data-fill'));
let order = $("#i").text();

let listParts = document.getElementById("listParts");

function getParts(){
    let req = new XMLHttpRequest();
    // console.log(order);
    req.open('post', `/orders/getparts/${type}/${order}`, true);
    req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    req.send();
    req.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            // console.log(this.responseText);
            if(this.responseText == ''){
                devicesType.disabled= true;
                listParts.innerHTML = ' <option hidden value="0">لايوجد اعطال لهذا النوع من الاجهزة</option>';
            }else{
                devicesType.disabled= false;
                listParts.innerHTML = `${this.responseText}`;
            }
        }else if(this.readyState == 4 && this.status == 404){
            console.log("not found");
        }
    }
}
getParts();