let typeSelect = document.querySelector('#type');


function getTypes(){
    let type = typeSelect.value;
    let req = new XMLHttpRequest();
    req.open('post', `/devicesType/selectList/${type}`, true);
    req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    req.send();
    req.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            typeSelect.innerHTML = `
            <option selected hidden value="0">اختار نوع</option>
            ${this.responseText}
            `;
        }else if(this.readyState == 4 && this.status == 404){
            console.log("not found");
        }
    }
}
getTypes();


let listProbDom = document.querySelector('#parts');
typeSelect.addEventListener("change", changeProbDom);
function changeProbDom (){
    if(typeSelect.value != 0){
        listProbDom.disabled  = false;
        getParts();
    }else{
        listProbDom.disabled  = true;
        listProbDom.value = 0;
    }
}


function getParts(){
    let type = typeSelect.value;
    let req = new XMLHttpRequest();
    req.open('post', `/parts/getParts/${type}`, true);
    req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    req.send();
    req.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText == ''){
                listProbDom.disabled  = true;
                listProbDom.innerHTML = ' <option selected hidden value="0">لايوجد اعطال لهذا النوع من الاجهزة</option>'
            }else{
                listProbDom.innerHTML = `${this.responseText}`;
            }
            selectPart()
        }else if(this.readyState == 4 && this.status == 404){
            console.log("not found");
        }
    }
}


// file the input with job name


let editInp = document.querySelector('#name');
let serial = document.querySelector('#serial');
listProbDom.addEventListener("change", selectPart);
var partName;
var partSerial;
function selectPart(){
    if(listProbDom.value != 0){
        editInp.disabled  = false;
        serial.disabled  = false;
        editInp.value = listProbDom.options[listProbDom.selectedIndex].text;
        serial.value= listProbDom.options[listProbDom.selectedIndex].getAttribute("data-serial");
        partName = editInp.value;
    }else{
        editInp.disabled  = true;
        editInp.value = '';
        serial.disabled  = true;
        serial.value = '';
    }
}