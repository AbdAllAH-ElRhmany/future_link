<title>FutureLink || اضافة طلب صيانة</title>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>إضافة طلب صيانة</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-body">
            <?php if(!isset($client)): ?>
                <form action="" id="client">
                <div class="input-group mb-3">
                    <input type="text" name="clientId" id="searchId" class="form-control" placeholder="رقم هاتف العميل">
                    <div class="input-group-prepend">
                        <button type="submit" class="btn btn-primary">بحث</button>
                    </div>
                    </div>
                </form>
            <?php else: ?>
                <div class="client_data">
                    <p><span>اسم العميل: </span><?= $client['name'] ?></p>
                    <p><span>رقم الهاتف: </span><?= $client['phone'] ?></p>
                    <p><span>العنوان: </span><?= $client['address'] ?></p>
                </div>
            <?php endif; ?>
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
                <?php if(isset($client)): ?>
                <div class="empsContent">
                    <div class="form-group">
                        <label for="phone">رقم للتواصل<span class="reqInp">*</span></label>
                        <input type="text" class="form-control" placeholder="رقم للنواصل"  value="<?= isset($client['phone']) ? $client['phone'] : '' ?>" name="phone" id="phone"/>
                    </div>
                    <div class="form-group">
                        <label for="address">عنوان الطلب<span class="reqInp">*</span></label>
                        <input type="text" class="form-control" placeholder="عنوان الطلب"  value="<?= isset($client['address']) ? $client['address'] : '' ?>" name="address" id="address"/>
                    </div>
                    <div class="form-group">
                        <label for="brand">ماركة الجهاز<span class="reqInp">*</span></label>
                        <select class="custom-select rounded-0" name="brand" id="brand">

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="service">نوع الخدمة<span class="reqInp">*</span></label>
                        <select class="custom-select rounded-0" name="service" id="service">

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="type">نوع الجهاز<span class="reqInp">*</span></label>
                        <select class="custom-select rounded-0" name="type" id="type">

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="problems">الاعطال<span class="reqInp">*</span></label>
                        <select class="custom-select rounded-0" disabled name="problems" id="problems">
                        <option selected hidden value="0">اختار نوع جهاز اولا</option>

                        </select>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary mb-4">إضافة الطلب</button>
            </div>
            <script src="/assets/js/orders/add.js"></script>
            <?php endif; ?>
        </form>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



    <script src="/assets/js/orders/clientSearch.js"></script>