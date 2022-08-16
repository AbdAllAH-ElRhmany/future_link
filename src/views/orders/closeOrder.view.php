<title>FutureLink || تقفيل طلب </title>


<link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>تعديل طلب صيانة</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
          <?php if(isset($order)): ?>
          
        <div class="card-body">
                <div class="client_data">
                    <p><span>رقم الطلب: </span><span id="i"><?= $order['orderId'] ?></span></p>
                    <p><span>اسم العميل: </span><?= $order['name'] ?></p>
                    <p><span>رقم الهاتف: </span><?= $order['phone'] ?></p>
                    <p><span>العنوان: </span><?= $order['address'] ?></p>
                </div>
        </div>
        <div class="card-body">
            <form method="post"  >
                    <div class="client_data">
                        <p><span>عنوان الطلب: </span><?= $order['orderAddress'] ?></p>
                        <p><span>رقم التواصل: </span><?= $order['orderPhone'] ?></p>
                        <p><span>ماركة الجهاز: </span><?= $order['brand'] ?></p>
                        <p id="deviceData" data-fill="<?= $order['deviceType'] ?>"><span>نوع الجهاز: </span><?= $order['type'] ?></p>
                        <p><span>العطل: </span><?= $order['content'] ?></p>
                        <p><span>نوع الخدمة: </span><?= $order['title'] ?></p>
                    </div>
                
                <?php if(isset($error)): ?>
                    <div class="alert alert-danger">
                    <?= $error ?>
                    </div>
                    <script>
                    setTimeout(() => {
                        $('.alert').fadeOut()
                    }, 3000);
                    </script>
                <?php endif ;?>
                <?php if(isset($success)): ?>
                    <div class="alert alert-success">
                    <?= $success ?>
                    </div>
                    <script>
                    setTimeout(() => {
                        $('.alert').fadeOut()
                    }, 3000);
                    </script>
                <?php endif ;?>
                <div class="empsContent">
                    <div class="form-group">
                        <label for="parts">قطع الغيار</label>
                        <select class="select2 select2-hidden-accessible " style="width: 100%;" id="listParts" name="parts[]" multiple="" data-placeholder="اختار قطعة"  data-select2-id="7" tabindex="-1" aria-hidden="true">
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="phone">موديل الجهاز<span class="reqInp">*</span></label>
                        <input type="text" class="form-control" placeholder="موديل الجهاز" value="<?= isset($order['deviceModel']) ? $order['deviceModel'] : '' ?>"   name="model" id="model"/>
                    </div>
                    <div class="form-group">
                        <label for="serial">سريال الجهاز<span class="reqInp">*</span></label>
                        <input type="text" class="form-control" placeholder="سريال الجهاز"  value="<?= isset($order['deviceSerial']) ? $order['deviceSerial'] : '' ?>"   name="serial" id="serial"/>
                    </div>
                    <div class="form-group">
                        <label for="comment">تعليق الفني<span class="reqInp">*</span></label>
                        <textarea name="comment" style="height: calc(2.25rem + 2px);" id="comment" class="form-control"   placeholder="تفاصيل العمل"><?= isset($order['comment']) ? $order['comment'] : '' ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="comment">حساب الطلب</label>
                        <input type="text" class="form-control" placeholder="حساب الطلب"  value="<?= isset($order['cost']) ? $order['cost'] : '' ?>"   name="cost" id="cost"/>
                    </div>
                    <div class="form-group">
                        <label for="comment">تفاصيل الحساب<span class="reqInp">*</span></label>
                        <input type="text" class="form-control" placeholder="تفاصيل الحساب"  value="<?= isset($order['costComment']) ? $order['costComment'] : '' ?>"   name="costComment" id="costComment"/>
                    </div>
                    
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary mb-4">تقفيل الطلب</button>
                    <br>
                    <a class="btn btn-primary mb-4" href="/orders/display/<?= $order['orderId'] ?>">عرض بيانات الطلب</a> 
                </div>
            </form>
            </div>
        <?php elseif(isset($noEmp)): ?>
            <h4 class="p-3">يرجي اسناد الطلب للفني أولا لتتمكن من الاغلاق </h4>
        <?php else: ?>
            <h4 class="p-3">لا يوجد طلب </h4>
        <?php endif; ?>
        </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script src="/assets/js/orders/close.js"></script>
<script src="/assets/plugins/jquery/jquery.min.js"></script>
<script src="/assets/plugins/select2/js/select2.full.min.js"></script>
<script>
    $(".select2.select2-hidden-accessible").select2({
//   maximumSelectionLength: 2
});
</script>