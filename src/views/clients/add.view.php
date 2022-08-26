<title>FutureLink || اضافة عميل</title>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>إضافة عميل</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        
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
                      <label for="name">الاسم<span class="reqInp">*</span></label>
                      <input type="text" class="form-control" required id="name" name="name" placeholder="ادخل الاسم">
                    </div>
                    <div class="form-group">
                      <label for="phone">رقم الهاتف<span class="reqInp">*</span></label>
                      <input type="text" class="form-control" required id="phone" name="phone" placeholder="ادخل رقم الهاتف">
                    </div>
                    <div class="form-group">
                      <label for="email">الايميل<span class="reqInp">*</span></label>
                      <input type="email" class="form-control" required id="email" name="email" placeholder="ادخل الايميل">
                    </div>
                    <div class="form-group">
                      <label for="address">العنوان<span class="reqInp">*</span></label>
                      <input type="text" class="form-control" required id="address" name="address" placeholder="ادخل العنوان">
                    </div>
                    <div class="form-group">
                      <label for="type">نوع العميل<span class="reqInp">*</span></label>
                      <select class="custom-select rounded-0" name="type" id="type">
                          <?php foreach($types as $type): ?>
                            <option value="<?= $type['typeId'] ?>"><?= $type['type'] ?></option>
                          <?php endforeach; ?>
                          
                        </select>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">إضافة</button>
                </div>
            </form>
        <!-- /.card-body -->
        </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


