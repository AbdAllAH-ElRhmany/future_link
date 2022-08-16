<title>FutureLink || الطلبات المغلقة</title>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>جميع الطلبات المغلقة</h1>
          </div>
          <div class="col-sm-6">
            <form action="" method="post" id="clientSearchClosed">
              <div class="input-group mb-3">
                  <input type="text" name="clientSearch" id="searchId" value="<?= $search == 0 ? '' : $search ?>" class="form-control" placeholder="رقم هاتف او اسم العميل">
                  <div class="input-group-prepend">
                      <button type="submit" class="btn btn-primary">بحث</button>
                  </div>
                </div>
            </form>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <div class="content">
      <div class="card">
        <div class="card-body">
          <form action="" method="post" class="filterForm" id="closedOrdersFilterForm">
            <div class="row align-items-center">
              <div class="col-lg-3 mb-3 ">
                  <label for="openDate" class="d-block">تاريخ الفتح</label>
                  <input type="date" name="openDate" class="form-control" value="<?= isset($closeDate) ? $closeDate : '' ?>" id="openDate">
              </div>
              <div class="col-lg-3 mb-3">
                  <label for="type">نوع الجهاز</label>
                  <!-- <?= $type ?> -->
                  <select class="custom-select form-control" name="type" id="type">
                    <option value="off" >اختار نوع</option>
                  <?php foreach($types as $type): ?>
                      <option value="<?= $type['typeId'] ?>"<?= $type['typeId'] == $devType ? "selected" : '' ?>><?= $type['type'] ?></option>
                    <?php endforeach; ?>
                  </select>
              </div>
              <div class="col-lg-3 mb-3">
                  <label for="service">نوع الخدمة</label>
                  <select class="custom-select form-control" name="service" id="service">
                  <option value="off" selected>اختار خدمة</option>
                  <?php foreach($services as $service): ?>
                      <option value="<?= $service['serviceId'] ?>"<?= $service['serviceId'] == $serviceType ? "selected" :'' ?>><?= $service['title'] ?></option>
                    <?php endforeach; ?>
                  </select>
              </div>
              <div class="col-lg-3 mb-3 pt-4 mt-2">
                  <button type="submit" class="btn btn-primary">عرض الطلبات</button>
                  <?php if(!empty($devType) || ($serviceType) != 'off' || !empty($closeDate)): ?>
                    <a href="/orders/closed" class="btn btn-info "><i class="fas fa-times"></i></a>
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
                <th style="max-width: 100px">رقم الطلب</th>
                <th>اسم العميل</th>
                <th>الهاتف</th>
                <th>العنوان</th>
                <th>تاريخ الغلق</th>
                <th>الاعدادات</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if(isset($orders) && !empty($orders)):
              foreach($orders as $order):?>
              <tr>
                  <td><?= $order['orderId'] ?></td>
                  <td><?= $order['name'] ?></td>
                  <td><?= $order['phone'] ?></td>
                  <td><?= $order['address'] ?></td>
                  <td><?= $order['closeDate'] ?></td>
                  <td>
                    <a href="/orders/display/<?= $order['orderId'] ?>" title="عرض تفاصيل الطلب"><i class="fa mx-2 fa-eye"></i></a>
                    <a href="/orders/edit/<?= $order['orderId'] ?>" title="تعديل بيانات الطلب"><i class="fas mx-2 fa-edit"></i></a>
                    <a href="/orders/delete/<?= $order['orderId'] ?>" title="حذف الطلب"><i class="fas mx-2 fa-trash-alt"></i></a>
                  </td>
              </tr>
              <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="6">لا يوجد طلبات</td>
                </tr>
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


  <script src="/assets/js/orders/clientSearch.js"></script>