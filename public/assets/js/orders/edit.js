
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


let listProbDom = document.querySelector('#problems');
typeSelect.addEventListener("change", changeProbDom);
function changeProbDom (){
    if(typeSelect.value != 0){
        listProbDom.disabled  = false;
        getProblems();
    }else{
        listProbDom.disabled  = true;
        listProbDom.value = 0;
    }
}

function getProblems(){
    let type = typeSelect.value;
    let req = new XMLHttpRequest();
    req.open('post', `/problems/getProblems/${type}`, true);
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
        }else if(this.readyState == 4 && this.status == 404){
            console.log("not found");
        }
    }
}
