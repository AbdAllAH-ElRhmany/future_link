<title>FutureLink || مصاريف الطلبات</title>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>جميع مصاريف طلبات الصيانة</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div class="content">
      <div class="card">
        <div class="card-body">
          <form action="" method="post" class="filterForm" id="ordersForm">
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
                  <label for="type">نوع العميل</label>
                  <select class="custom-select rounded-0" name="type" id="type" >
                    <option value="off">اختار نوع</option>
                      <?php foreach($types as $type): ?>
                        <option value="<?= $type['typeId'] ?>"<?= $clientType ==  $type['typeId'] ? 'selected' : '' ?>><?= $type['type'] ?></option>
                      <?php endforeach; ?>
                      
                    </select>
                </div>
              <div class="col-lg-3 mb-3">
              </div>
              <div class="col-lg-3 mb-3">
                  <label for="sum" class="d-block">المجموع</label>
                  <input type="text" name="sum" class="form-control" value="<?= isset($sum[0]['cost']) ? $sum[0]['cost'] :'' ?>" placeholder="المجموع" id="sum">
              </div>
              <div class="col-lg-3 mb-3 pt-4 mt-2">
                  <button type="submit" class="btn btn-primary">حساب المجموع</button>
                  <?php if(isset($sum)): ?>
                    <a href="/payments/orders" class="btn btn-info "><i class="fas fa-times"></i></a>
                  <?php endif; ?>
              </div>
            </div>
            <div class="message"></div>
          </form>
        </div>
      </div>
    </div>
    <section class="content">

      <!-- Default box -->
      <div class="card ">
        <div class="card-body">
          <table class="table table-bordered  text-center">
            <thead>
              <tr>
                <th style="max-width: 100px">رقم الطلب</th>
                <th>تاريخ غلق الطلب</th>
                <th>الفني المسؤول</th>
                <th>حساب الطلب</th>
                <th>تفاصيل الحساب</th>
                <th>الاعدادات</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if(isset($orders) && !empty($orders)):
              foreach($orders as $order):?>
              <tr>
                  <td><?= $order['orderId'] ?></td>
                  <td><?= $order['closeDate'] ?></td>
                  <td><?= $order['empName'] ?></td>
                  <td><?= $order['cost'] ?></td>
                  <td><?= $order['costComment'] == '' ? 'لم يتم اضافة تفاصيل' : $order['costComment'] ?></td>
                  <td>
                  <a href="/orders/display/<?= $order['orderId'] ?>"><i class="fa mx-2 fa-eye"></i></a>
                    <a href="/orders/edit/<?= $order['orderId'] ?>"><i class="fas mx-2 fa-edit"></i></a>
                  </td>
              </tr>
              <?php endforeach; ?>
              <?php else: ?>
                <td colspan="6">لا يوجد بيانات للعرض ادخل بيانات اولا</td>
              <?php endif; ?>
            </tbody>
          </table>
        <!-- /.card-body -->
        </div>
      <!-- /.card -->
        </div>  

    </section>
    <!-- /.content -->
</div>
  
  <!-- /.content-wrapper -->

  <script src="/assets/js/payments/payments.js"></script>