<title>FutureLink || جميع الاجهزة</title>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>جميع الاجهزة</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card ">
        <div class="card-body">
          <table class="table table-bordered col-lg-6 m-auto text-center">
            <thead>
              <tr>
                <th style="width: 20px">#</th>
                <th>النوع</th>
                <th>الاعدادات</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if(isset($types)):
              foreach($types as $type):?>
              <tr>
                  <td><?= $type['typeId'] ?></td>
                  <td><?= $type['type'] ?></td>
                  <td>
                    <a href="/devicesType/edit/<?= $type['typeId'] ?>" title="تعديل اسم الجهاز"><i class="fas mx-2 fa-edit"></i></a>
                  </td>
              </tr>
              <?php endforeach; ?>
              <tr>
                <td colspan="3"><a href="/devicesType/add/" class="btn btn-primary">إضافة نوع</a></td>
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

