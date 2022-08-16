
$("#paymentsForm").submit(function(e){
    e.preventDefault();
    start = ($('#startDate').val());
    end = ($('#totDate').val());
    if(start =='' || end ==''){
        $('.message').html(`
        <div class="alert alert-danger" role="alert">
            برجاء اختيار تاريخ بداية و نهاية
        </div>
        `);
        setTimeout(()=>{$('.message').html('')}, 3000);
    }else{
        location.assign(`/payments/default/${start}/${end}`)
    }
});
$("#paymentsNotForm").submit(function(e){
    e.preventDefault();
    start = ($('#startDate').val());
    end = ($('#totDate').val());
    if(start =='' || end ==''){
        $('.message').html(`
        <div class="alert alert-danger" role="alert">
        برجاء اختيار تاريخ بداية و نهاية
        </div>
        `);
        setTimeout(()=>{$('.message').html('')}, 3000);
    }else{
        location.assign(`/payments/notmain/${start}/${end}`)
    }
});
$("#ordersForm").submit(function(e){
    e.preventDefault();
    start = ($('#startDate').val());
    end = ($('#totDate').val());
    type = ($('#type').val());
    if(start =='' || end ==''){
        $('.message').html(`
        <div class="alert alert-danger" role="alert">
            برجاء اختيار تاريخ بداية و نهاية
            </div>
        `);
        setTimeout(()=>{$('.message').html('')}, 3000);
    }else{
        location.assign(`/payments/orders/${start}/${end}/${type}`)
    }
});