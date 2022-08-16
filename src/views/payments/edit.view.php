<title>FutureLink || تعديل عملية</title>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>تعديل عملية دفع</h1>
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
                <?php if(isset($payment)): ?>
                <div class="empsContent">
                    <div class="form-group">
                        <label for="title">العنوان<span class="reqInp">*</span></label>
                        <input type="text" class="form-control" placeholder="عنوان العملية"  value="<?= isset($payment['title']) ? $payment['title'] : '' ?>" name="title" id="title"/>
                    </div>
                    <div class="form-group">
                        <label for="cost">القيمة<span class="reqInp">*</span></label>
                        <input type="text" class="form-control" placeholder="القيمة"  value="<?= isset($payment['cost']) ? $payment['cost'] : '' ?>" name="cost" id="cost"/>
                    </div>
                    <div class="form-group">
                        <label for="date">تاريخ العملية<span class="reqInp">*</span></label>
                        <input type="date" class="form-control" placeholder="تاريخ"  value="<?= isset($payment['createdAt']) ? $payment['createdAt'] : '' ?>" name="date" id="date"/>
                    </div>
                    <div class="form-group">
                        <label for="status">نوع العملية<span class="reqInp">*</span></label>
                        <select class="custom-select rounded-0"  name="status" id="status">
                            <option value="1" <?= $payment['is_mainly'] == 1 ? 'selected' : '' ?>>عملية اساسية</option>
                            <option value="0" <?= $payment['is_mainly'] == 0 ? 'selected' : '' ?>>عملية غير اساسية</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary mb-4">تعديل العملية</button>
            </div>
            <?php else: ?>
                <h4 class="p-4">لا يوجد عملية بهذا الرقم</h4>
            <?php endif; ?>
            </form>
        <!-- /.card-body -->
        </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

