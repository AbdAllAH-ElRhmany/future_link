<title>FutureLink || تعديل طلب  - <?= $order['name'] ?></title>


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
                    <p><span>رقم الطلب: </span><?= $order['orderId'] ?></p>
                    <p><span>اسم العميل: </span><?= $order['name'] ?></p>
                    <p><span>رقم الهاتف: </span><?= $order['phone'] ?></p>
                    <p><span>العنوان: </span><?= $order['address'] ?></p>
                </div>
        </div>
        <div class="card-body">
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
                <div class="empsContent">
                    <div class="form-group">
                        <label for="phone">رقو للتواصل<span class="reqInp">*</span></label>
                        <input type="text" class="form-control" placeholder="رقم للتواصل"  value="<?= isset($order['orderPhone']) ? $order['orderPhone'] : $order['phone'] ?>" name="phone" id="phone"/>
                    </div>
                    <div class="form-group">
                        <label for="address">عنوان الطلب<span class="reqInp">*</span></label>
                        <input type="text" class="form-control" placeholder="عنوان الطلب"  value="<?= isset($order['orderAddress']) ? $order['orderAddress'] : $order['address'] ?>" name="address" id="address"/>
                    </div>
                    <div class="form-group">
                        <label for="brand">ماركة الجهاز<span class="reqInp">*</span></label>
                        <select class="custom-select rounded-0" name="brand" id="brand" value="<?= $order['deviceBrand'] ? $order['deviceBrand'] : '' ?>">
                        <?php foreach($brands as $brand): ?>
                            <option value="<?= $brand['brandId'] ?>"
                            <?= $order['deviceBrand'] == $brand['brandId'] ? 'selected' : '' ?>>
                            <?= $brand['brand'] ?>
                            </option>
                          <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="service">نوع الخدمة<span class="reqInp">*</span></label>
                        <select class="custom-select rounded-0" name="service" id="service">
                        <?php foreach($services as $service): ?>
                            <option value="<?= $service['serviceId'] ?>"<?= $service['serviceId'] ==  $order['serviceType'] ? 'selected' : '' ?>><?= $service['title'] ?></option>
                          <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="type">نوع الجهاز<span class="reqInp">*</span></label>
                        <select class="custom-select rounded-0" name="type" id="type">
                        <?php foreach($types as $type): ?>
                            <option value="<?= $type['typeId'] ?>"<?= $type['typeId'] ==  $order['deviceType'] ? 'selected' : '' ?>><?= $type['type'] ?></option>
                          <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="problems">الاعطال<span class="reqInp">*</span></label>
                        <select class="custom-select rounded-0"  name="problems" id="problems">
                        <?php foreach($problems as $problem): ?>
                            <option value="<?= $problem['problemId'] ?>"<?= $problem['problemId'] ==  $order['deviceProblem'] ? 'selected' : '' ?>><?= $problem['content'] ?></option>
                          <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">حالة الطلب<span class="reqInp">*</span></label>
                        <select class="custom-select rounded-0"  name="status" id="status">
                            <option value="0" <?= $order['status'] ==0 ? 'selected': '' ?>>مفتوح</option>
                            <option value="1" <?= $order['status'] ==1 ? 'selected': '' ?>>مغلق</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="text-center">
            <a class="btn btn-primary mb-4" href="/orders/display/<?= $order['orderId'] ?>">عرض بيانات الطلب</a>
                <button type="submit" class="btn btn-primary mb-4">تعديل الطلب</button>
            </div>
            </form>
        <!-- /.card-body -->
        <?php else: ?>
            <h4 class="p-3">لا يوجد طلب </h4>
        <?php endif; ?>
        </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script src="/assets/js/orders/edit.js"></script>
