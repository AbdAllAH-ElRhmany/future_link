<title>FutureLink || تقفيل الطلبات</title>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>تقفيل الطلبات</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>





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
                <th>تاريخ الفتح</th>
                <th>الاعدادات</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if(isset($orders)):
              foreach($orders as $order):?>
              <tr>
                  <td><?= $order['orderId'] ?></td>
                  <td><?= $order['name'] ?></td>
                  <td><?= $order['phone'] ?></td>
                  <td><?= $order['address'] ?></td>
                  <td><?= $order['openDate'] ?></td>
                  <td>
                    <a href="/orders/display/<?= $order['orderId'] ?>" title="عرض تفاصيل الطلب"><i class="fa mx-2 fa-eye"></i></a>
                    <a href="/orders/closeOrder/<?= $order['orderId'] ?>" title="تقفيل الطلب"><i class="fas fa-lock"></i></a>
                  </td>
              </tr>
              <?php endforeach; ?>
              <tr>
                <td colspan="6"><a href="/orders/add/" class="btn btn-primary">إضافة طلب صيانة</a></td>
              </tr>
              <?php else:
                echo "<p>لا يوجد بيانات للعرض ادخل بيانات اولا</p>";
              endif; ?>
            </tbody>
          </table>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

