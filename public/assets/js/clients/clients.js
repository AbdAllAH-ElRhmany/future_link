
let searchForm = document.querySelector('#clientSearch');
searchForm.addEventListener('submit', function(e){
    e.preventDefault();
    let searchValue = e.target.searchId.value;
    location.assign(`/clients/default/${searchValue}`)

})
