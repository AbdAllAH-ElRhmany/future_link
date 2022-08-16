<title>FutureLink || تغيير كلمة السر</title>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>تغيير كلمة السر</h1>
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
                <div class="empsContent reset">
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="كلمة السر الحالية"  name="pass" id="pass"/>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="كلمة السر الجديدة (أكبر من 8 ارقام أو حروف)"  name="newpass" id="newpass"/>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="تأكيد كلمة السر الجديدة"  name="renewpass" id="renewpass"/>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary mb-4">تغيير كلمة السر</button>
                </div>
            </form>
        <!-- /.card-body -->
        </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script src="/assets/js/orders/add.js"></script>
