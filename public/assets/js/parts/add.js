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
