<title>FutureLink || توزيع الطلبات</title>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1>توزيع الطلبات للفنيين</h1>
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
                    <p><span>اسم العميل: </span><?= $order['name'] ?></p>
                    <p><span>رقم الهاتف: </span><?= $order['phone'] ?></p>
                    <p><span>عنوان العميل: </span><?= $order['address'] ?></p>
                    <hr class="my-4">
                    <p><span>عنوان الطلب: </span><?= $order['orderAddress'] ?></p>
                    <p><span>رقم هاتف الطلب: </span><?= $order['orderPhone'] ?></p>
                    <p><span>نوع الجهاز: </span><?= $order['type'] ?></p>
                    <p><span>ماركة الجهاز: </span><?= $order['brand'] ?></p>
                    <p><span>الخدمة: </span><?= $order['title'] ?></p>
                    <p><span>العطل: </span><?= $order['content'] ?></p>
                    <p><span>تاريخ الفتح: </span><?= $order['openDate'] ?></p>
                    <hr class="my-4">
                    <p><span>الفني المسؤول: </span><?= isset($order['empName'])? $order['empName'] : "لم يتم اسناد الطلب لأي فني بعد" ?></p>
                    
                </div>
                <form method="post"  class="card-body ">
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
                <div class="form-group">
                        <label for="emps">اختار فني<span class="reqInp">*</span></label>
                        <?php if(isset($order['empName'])): ?>
                        <select class="custom-select rounded-0 "  name="emps" id="emps">
                        <?php foreach($emps as $emp): ?>
                            <option value="<?= $emp['empId'] ?>"<?= $emp['empId'] ==  $order['empId'] ? 'selected' : '' ?>><?= $emp['name'] ?></option>
                          <?php endforeach; ?>
                        </select>
                        <?php else: ?>
                            <select class="custom-select rounded-0"  name="emps" id="emps">
                                <option selected hidden value="">اختار فني</option>
                            <?php foreach($emps as $emp): ?>
                                <option value="<?= $emp['empId'] ?>"><?= $emp['name'] ?></option>
                              <?php endforeach; ?>
                            </select>
                        <?php endif; ?>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary mb-4">إسناد الطلب للفني</button>
                    </div>
                    <div class="text-center">
                    <a class="btn btn-info mb-4" href="/orders/display/<?= $order['orderId'] ?>">تفاصيل الطلب</a>
                    </div>
                </form>
        </div>
        <?php else: ?>
            <h4 class="p-3">لا يوجد طلب </h4>
        <?php endif; ?>
        </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

