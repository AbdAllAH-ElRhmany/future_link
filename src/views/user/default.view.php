<title>FutureLink || الملف الشخصي</title>
  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>المعلومات الشخصية</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
        <?php if(isset($user)  && $user != ''): ?>
        <div class="card-body">
            <div class="client_data">
                <p><span>الاسم: </span><?= $user['name'] ?></p>
                <p><span>رقم الهاتف: </span><?= $user['phone'] ?></p>
                <p><span>العنوان: </span><?= $user['address'] ?></p>
                <p><span>الايميل: </span><?= $user['email'] ?></p>
                <p><span>تاريخ الميلاد: </span><?= $user['bdate'] ?></p>
                <p><span>الوظيفة: </span><?= $job['title'] ?></p>
                <p><span>الراتب: </span><?= $user['salary'] ?></p>
                <hr class="my-4">
            </div>
            <div class="text-center">
                <a class="btn btn-primary" href="/user/reset">تغيير كلمة السر</a>
            </div>
        </div>
        <?php else: ?>
            <h4 class="p-3">لا يوجد موظف </h4>
        <?php endif; ?>
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>