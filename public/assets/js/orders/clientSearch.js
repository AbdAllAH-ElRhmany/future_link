$('#client').submit(function (e) { 
    e.preventDefault();
    let id = $('#searchId').val();
    location.assign(`/orders/add/${id}/`);
});
$('#clientSearch').submit(function (e) { 
    e.preventDefault();
    let searchValue = e.target.searchId.value;
    location.assign(`/orders/default//${searchValue}`)
});
$('#clientSearchClosed').submit(function (e) { 
    e.preventDefault();
    let searchValue = e.target.searchId.value;
    location.assign(`/orders/closed/${searchValue}`)
});




$("#ordersFilterForm").submit(function(e){
    e.preventDefault();
    start = ($('#openDate').val()) == '' ? "off" : ($('#openDate').val());
    type = ($('#type').val());
    service = ($('#service').val());
    
    location.assign(`/orders/default///${start}/${type}/${service}`)
    
});
$("#closedOrdersFilterForm").submit(function(e){
    e.preventDefault();
    start = ($('#openDate').val()) == '' ? "off" : ($('#openDate').val());
    type = ($('#type').val());
    service = ($('#service').val());
    
    location.assign(`/orders/closed//${start}/${type}/${service}`)
    
});


