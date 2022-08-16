<title>FutureLink || جميع الموظفيين</title>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>جميع الموظفين</h1>
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
                <th style="width: 120px">الكود الوظيفي</th>
                <th>الاسم</th>
                <th>الهاتف</th>
                <th>الايميل</th>
                <th>الاعدادات</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if(isset($emps)):
              foreach($emps as $emp):?>
              <tr>
                  <td><?= $emp['empId'] ?></td>
                  <td><?= $emp['name'] ?></td>
                  <td><?= $emp['phone'] ?></td>
                  <td><?= $emp['email'] ?></td>
                  <td>
                    <a href="/employees/edit/<?= $emp['empId'] ?> " title="تعديل بيانات الموظف"><i class="fas mx-2 fa-edit"></i></a>
                  </td>
              </tr>
              <?php endforeach; ?>
              <tr>
                <td colspan="5"><a href="/employees/add/" class="btn btn-primary">إضافة موظف</a></td>
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

