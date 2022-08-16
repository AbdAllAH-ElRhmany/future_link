<title>FutureLink || طلب صيانة - <?= $order['name'] ?></title>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>معلومات الطلب</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
          <?php if(isset($order)  && !empty($order)): 
            ?>
        <div class="card-body">
                <div class="client_data">
                    <p><span>اسم العميل: </span><?= $order['name'] ?></p>
                    <p><span>رقم الهاتف: </span><?= $order['phone'] ?></p>
                    <p><span>عنوان العميل: </span><?= $order['address'] ?></p>
                    <p><span>نوع العميل: </span><?= $order['clientTypeTitle'] ?></p>
                    <hr class="my-4">
                    <p><span>عنوان الطلب: </span><?= $order['orderAddress'] ?></p>
                    <p><span>رقم هاتف الطلب: </span><?= $order['orderPhone'] ?></p>
                    <p><span>نوع الجهاز: </span><?= $order['type'] ?></p>
                    <p><span>ماركة الجهاز: </span><?= $order['brand'] ?></p>
                    <p><span>الخدمة: </span><?= $order['title'] ?></p>
                    <p><span>العطل: </span><?= $order['content'] ?></p>
                    <p><span>تاريخ الفتح: </span><?= $order['openDate'] ?></p>
                    <p><span>تاريخ الغلق: </span><?= $order['closeDate'] ? $order['closeDate'] : "لم يغلق بعد" ?></p>
                    <?php if(isset($cost['cost'])): ?>
                    <hr class="my-4">
                    <p><span>قطع الغيار: </span>
                      <?php 
                          // print_r($parts);
                        if(count($parts)): 
                          $partsStr = "";
                          foreach($parts as $part):
                            $partsStr .= " , ".$part["name"] ;
                          endforeach;
                          $partsStr = ltrim($partsStr, " ,");
                          echo $partsStr;
                        else: 
                          echo"لا يوجد قطع غيار";
                      endif;
                        ?> 
                    </p>
                    <p><span>حساب الطلب: </span><?= $cost['cost'] == 0 ?  "لا يوجد" : $cost['cost'] ?></p>
                    <p><span>تفاصيل الحساب: </span><?= $cost['costComment'] == '' ? 'لم يتم اضافة تفاصيل' : $cost['costComment'] ?></p>
                    <?php if(isset($active) && $active !=0): ?>
                        <p><span>الفني المسؤول: </span><?= $active['empName'] ?></p>
                        <?php else: ?>
                            <p><span>الفني المسؤول: </span>لم يتم اسناد الطلب لفني بعد</p>
                        <?php endif; ?>
                      <?php endif; ?>
                </div>
                <div class="text-center">
                <?php if(!isset($cost['empId']) || $cost['empId'] == 0): ?>
                    <a class="btn btn-primary" href="/orders/give/<?= $order['orderId'] ?>">إضافة فني</a>
                    <?php endif; if(empty($order['closeDate']) && isset($cost['empId'])): ?>
                      <a class="btn btn-primary" href="/orders/closeOrder/<?= $order['orderId'] ?>">تقفيل الطلب</a>
                <?php endif; ?>
                    <a class="btn btn-primary" href="/orders/edit/<?= $order['orderId'] ?>">تعديل الطلب</a>
                  </div>
                  <div class="text-center mt-3">
                    <a class="btn btn-danger" href="/orders/delete/<?= $order['orderId'] ?>">حذف الطلب</a>
                  </div>
        </div>
        <?php else: ?>
            <h4 class="p-3">لا يوجد طلب </h4>
        <?php endif; ?>
        </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

