<title>FutureLink || العملاء</title>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 mb-2">
            <h1>جميع العملاء</h1>
          </div>
          <div class="col-sm-6">
            <form action="" method="post" id="clientSearch">
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

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card ">
        <div class="card-body">
          <table class="table table-bordered  text-center">
            <thead>
              <tr>
                <th>الاسم</th>
                <th>الهاتف</th>
                <th>الايميل</th>
                <th>العنوان</th>
                <th>الاعدادات</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if(isset($clients) && !empty($clients)):
              foreach($clients as $client):?>
              <tr>
                  <td><?= $client['name'] ?></td>
                  <td><?= $client['phone'] ?></td>
                  <td><?= $client['email'] ?></td>
                  <td><?= $client['address'] ?></td>
                  <td>
                    <a href="/orders/default/<?= $client['id'] ?>" title="عرض الطلبات النشطة للعميل"><i class="mx-2 fa fa-eye"></i></a>
                    <a href="/orders/add/<?= $client['id'] ?>" title="اضافة طلب"><i class="fas fa-plus"></i></a>
                    <a href="/clients/edit/<?= $client['id'] ?>" title="تعديل بيانات العميل"><i class="fas mx-2 fa-edit"></i></a>
                  </td>
              </tr>
              <?php endforeach; ?>
              <tr>
                <td colspan="5"><a href="/clients/add/" class="btn btn-primary">إضافة عميل</a></td>
              </tr>
              <?php else: ?>
                <tr>
                  <td colspan="5">لا يوجد عميل</td>
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

  <script src="/assets/js/clients/clients.js"></script>