<title>FutureLink || اضافة عملية</title>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>إضافة عملية دفع</h1>
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
                        <label for="title">العنوان<span class="reqInp">*</span></label>
                        <input type="text" class="form-control" placeholder="عنوان العملية"  value="<?= isset($client['title']) ? $client['title'] : '' ?>" name="title" id="title"/>
                    </div>
                    <div class="form-group">
                        <label for="cost">القيمة<span class="reqInp">*</span></label>
                        <input type="text" class="form-control" placeholder="القيمة"  value="<?= isset($client['cost']) ? $client['cost'] : '' ?>" name="cost" id="cost"/>
                    </div>
                    <div class="form-group">
                        <label for="date">تاريخ العملية<span class="reqInp">*</span></label>
                        <input type="date" class="form-control" placeholder="تاريخ"  value="<?= isset($client['date']) ? $client['date'] : '' ?>" name="date" id="date"/>
                    
                    </div>
                    <div class="form-group">
                        <label for="status">نوع العملية<span class="reqInp">*</span></label>
                        <select class="custom-select rounded-0"  name="status" id="status">
                            <option value="1" >عملية اساسية</option>
                            <option value="0" >عملية غير اساسية</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary mb-4">إضافة العملية</button>
            </div>
            </form>
        <!-- /.card-body -->
        </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

