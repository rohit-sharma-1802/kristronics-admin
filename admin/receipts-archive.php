<?php require_once('include/_header.php'); ?>

<!-- CONTAINER -->
<div class="main-container container-fluid">

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Purchase Order Receipts</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Purchase Order Receipts</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <?php 

        $requestStatus = @$_GET['message'];
        
       
    ?>


</div>
<!-- /Row -->


<!-- Row -->
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <h2 class=" m-5 text-green"><?php echo @$_GET['message'] ?></h2>
            <div class="card-header">
                <h3 class="card-title">Purchase Order Archive</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                        <thead>
                            <tr>
                                <th class="wd-20p border-bottom-0">Order ID</th>
                                <th class="wd-15p border-bottom-0">Supplier Name</th>
                                <th class="wd-20p border-bottom-0">Part No.</th>
                                <th class="wd-15p border-bottom-0">Quantity</th>
                                <th class="wd-15p border-bottom-0">ORder Created On</th>
                                <th class="wd-10p border-bottom-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php
                             $sql = "SELECT * FROM purchase_order_archive";
                             $stmt = $connectingDB->prepare($sql);
                             $stmt->execute();
                             $count = $stmt->rowCount();
                     
                             while($dataRows = $stmt->fetch()){

                                 $purchaseOrderID = $dataRows['purchase_order_id'];
                                 $supplierName = $dataRows['supplier_name'];
                                 $partNo = $dataRows['Part_no'];
                                 $quantity = $dataRows['quantity'];
                                 $orderCreatedOn = $dataRows['created-date'];     
                             
                     
                        ?>
                            <tr>
                                <td><?php echo $purchaseOrderID; ?></td>
                                <td><?php echo $supplierName; ?></td>
                                <td><?php echo $partNo; ?></td>
                                <td><?php echo $quantity; ?></td>
                                <td><?php echo $orderCreatedOn; ?></td>
                                <td>
                                    <a href="<?php echo 'view-receipts.php?OrderID='.$purchaseOrderID; ?>" class="btn text-success btn-sm"
                                        data-bs-toggle="tooltip" data-bs-original-title="View Request"><span
                                            class="ion ion-eye fs-20"></span></a>
                                </td>
                            </tr>
                           <?php  }
                             ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Row -->
</div>
<!-- CONTAINER CLOSED -->
</div>
</div>
<!--app-content closed-->
</div>

<?php require_once('include/_footer.php'); ?>