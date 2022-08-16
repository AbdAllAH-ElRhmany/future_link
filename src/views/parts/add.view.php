<title>FutureLink || اضافة قطعة غيار</title>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>إضافة قطعة غيار</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        
        <div class="card-body col-6 m-auto">
            <form method="post"  class="card-body">
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
                <label for="type">نوع الجهاز<span class="reqInp">*</span></label>
                <select class="custom-select rounded-0" name="type" id="type">

                </select>
              </div>
                <div class="form-group">
                  <label for="name">اسم القطعة<span class="reqInp">*</span></label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="ادخل أسم القطعة">
                </div>
                <div class="form-group">
                  <label for="serial">سريال القطعة<span class="reqInp">*</span></label>
                  <input type="text" class="form-control" id="serial" name="serial" placeholder="ادخل سريال القطعة">
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


  <script src="/assets/js/parts/add.js"></script>
