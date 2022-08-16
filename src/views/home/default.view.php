<title>FutureLink || الصفحة الرئيسية</title>

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>الصفحة الرئيسية</h1>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">

        <!-- Default box -->
        <div class="card">
        
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-info">
                            <div class="inner">
                            <h3><?= ($todayOrders[0]['ordersNum']); ?></h3>
                            <p>طلبات جديدة اليوم</p>
                            </div>
                            <div class="icon">
                            <i class="fas fa-cogs"></i>
                            </div>
                            <a href="/orders" class="small-box-footer">معلومات اكتر <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-success">
                            <div class="inner">
                            <h3><?= ($todayClosedOrders[0]['ordersNum']); ?></h3>
                            <p>طلبات تم اغلاقها اليوم </p>
                            </div>
                            <div class="icon">
                            <i class="fas fa-lock"></i>
                            </div>
                            <a href="/orders/closed" class="small-box-footer">معلومات اكتر <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-warning">
                            <div class="inner">
                            <h3><?= ($monthPaymentOrders[0]['ordersCost']) == '' ? 0 : ($monthPaymentOrders[0]['ordersCost']) ?></h3>
                            <p>اجمالي دخل الطلبات هذا الشهر</p>
                            </div>
                            <div class="icon">
                            <i class="fas fa-dollar-sign"></i>
                            </div>
                            <a href="/payments/orders" class="small-box-footer">معلومات اكتر <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-danger">
                                <div class="inner">
                                <h3><?= ($monthPaymentCost[0]['paymentsCost']) == '' ? 0 :  ($monthPaymentCost[0]['paymentsCost'])?></h3>
                                <p>اجمالي المصروفات هذا الشهر</p>
                                </div>
                                <div class="icon">
                                <i class="fas fa-dollar-sign"></i>
                                </div>
                                <a href="/payments" class="small-box-footer">معلومات اكتر <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>