<title>FutureLink || جميع المصروفات الاساسية</title>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 align-items-center">
          <div class="col-sm-6 mb-3">
            <h1>جميع المصروفات الاساسية</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="content">
      <div class="card">
        <div class="card-body">
          <form action="" method="post" class="filterForm" id="paymentsForm">
            <div class="row align-items-center">
              <div class="col-lg-3 mb-3 ">
                  <label for="startDate" class="d-block">من يوم</label>
                  <input type="date" name="startDate" class="form-control" value="<?= isset($date1) ? $date1 : '' ?>" id="startDate">
              </div>
              <div class="col-lg-3 mb-3">
                  <label for="toDate" class="d-block">الي يوم</label>
                  <input type="date" name="totDate" class="form-control" value="<?= isset($date2) ? $date2 : '' ?>" id="totDate">
              </div>
             
              <div class="col-lg-3 mb-3">
                  <label for="sum" class="d-block">المجموع</label>
                  <input type="text" name="sum" class="form-control" value="<?= isset($sum[0]['cost']) ? $sum[0]['cost'] :'' ?>" placeholder="المجموع" id="sum">
              </div>
              <div class="col-lg-3 mb-3 pt-4 mt-2">
                  <button type="submit" class="btn btn-primary">حساب المجموع</button>
                  <?php if(isset($sum)): ?>
                    <a href="/payments" class="btn btn-info "><i class="fas fa-times"></i></a>
                  <?php endif; ?>
                </div>
            </div>
            <div class="message"></div>
          </form>
        </div>
      </div>
    </div>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card ">
        <div class="card-body">
          <table class="table table-bordered  text-center">
            <thead>
              <tr>
                <th style="max-width: 100px">رقم العملية</th>
                <th>العنوان</th>
                <th>القيمة</th>
                <th>تاريخ العملية</th>
                <th>الاعدادات</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if(isset($payments) && !empty($payments)):
              foreach($payments as $payment):?>
              <tr>
                  <td><?= $payment['id'] ?></td>
                  <td><?= $payment['title'] ?></td>
                  <td><?= $payment['cost'] ?></td>
                  <td><?= $payment['createdAt'] ?></td>
                  <td>
                    <a href="/payments/edit/<?= $payment['id'] ?>" title="تعديل التفاصيل"><i class="fas mx-2 fa-edit"></i></a>
                    <a href="/payments/delete/<?= $payment['id'] ?>" title="حذف العملية"><i class="fas mx-2 fa-trash-alt"></i></a>
                  </td>
              </tr>
              <?php endforeach; ?>
              <tr>
                <td colspan="6"><a href="/payments/add/" class="btn btn-primary">إضافة عملية</a></td>
              </tr>
              <?php else: ?>
                <td colspan="6">لا يوجد بيانات للعرض ادخل بيانات اولا</td>
              <?php endif; ?>
            </tbody>
          </table>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script src="/assets/js/payments/payments.js"></script>