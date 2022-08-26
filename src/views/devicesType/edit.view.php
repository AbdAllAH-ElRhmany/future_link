<title>FutureLink || تعديل جهاز</title>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>تعديل جهاز</h1>
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
              <?php if(!isset($typeName)): ?>
                <div class="alert alert-danger">
                  برجاء الرجوع و اختيار نوع للتعديل
                </div>
              <?php endif ;?>
              <?php if(isset($error)): ?>
                <div class="alert alert-danger">
                  <?= $error ?>
                </div>
              <?php endif ;?>
              <?php if(isset($success)): ?>
                <div class="alert alert-success">
                  <?= $success ?>
                </div>
              <?php endif ;?>
                <div class="form-group">
                <label for="type">نوع الجهاز<span class="reqInp">*</span></label>
                <input type="text" class="form-control" required id="type"  name="type" value="<?= $typeName['type'] ? $typeName['type'] : '' ?>" placeholder="ادخل نوع">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">تعديل</button>
                </div>
            </form>
        <!-- /.card-body -->
        </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

