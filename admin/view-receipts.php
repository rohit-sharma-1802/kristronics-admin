<?php require_once('include/_header.php'); ?>
<?php require_once('include/convertWords.php'); ?>

<?php
$purchaseOrderID = @$_GET['OrderID'];
$sql = "SELECT * FROM purchase_order_archive WHERE purchase_order_id = '$purchaseOrderID' ";
$stmt = $connectingDB->prepare($sql);
$stmt->execute();
while ($dataRows = $stmt->fetch()) {
    $orderID = $dataRows['purchase_order_id'];
    $supplierName = $dataRows['supplier_name'];
    $supplierPhone = $dataRows['supplier_phone'];
    $supplierEmail = $dataRows['supplier_email'];
    $supplierCompany = $dataRows['supplier_company'];
    $supplierCountry = $dataRows['supplier_country'];
    $supplierAddress = $dataRows['supplier_address'];
    $lpoNo = $dataRows['lpo_no'];
    $yourRef = $dataRows['your_ref'];
    $attn = $dataRows['attn'];
    $partNo = $dataRows['Part_no'];
    $description = $dataRows['description'];
    $quantity = $dataRows['quantity'];
    $unitRate = $dataRows['unit_rate'];
    $totalAmount = $dataRows['total_amount'];
    $discount = $dataRows['discount'];
    $netTotal = ($dataRows['total_amount']) - $discount;
    $wordTotal = conrvertAmountToWords($netTotal);

    $shippingAddress = $dataRows['shipping_address'];
    $createdOrderDate = $dataRows['created-date'];
}
?>

<!-- CONTAINER -->
<div class="main-container container-fluid">

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Dashboard</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Home</li>
            </ol>
        </div>

    </div>

    <!-- PAGE-HEADER END -->

    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-md-12" id="printInvoice">
            <div class="card">
                <div class="pt-5">
                    <h2 class="text-center"><u>Local Purchase Order</u></h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="../assets/images/brand/logo.png" class="header-brand-img logo" alt="Sash logo">
                            <div>
                                <address class="pt-3">
                                    KRIStronics ELECTRONICS<br>
                                    <strong>Abu Dhabi, United Arab Emirates</strong><br>
                                    <strong>Web :</strong> www.kristr.com
                                </address>
                            </div>
                        </div>
                        <div class="col-lg-6 text-end border-bottom border-lg-0">
                            <h3>#INV-<?php echo $orderID; ?></h3>
                            <h5><strong>LPO No.:</strong> <?php echo $lpoNo; ?></h5>
                            <h5><strong>Date :</strong> <?php echo $createdOrderDate; ?></h5>
                            <h5><strong>Your Ref :</strong> <?php echo $yourRef; ?></h5>
                            <h5><strong>Attn :</strong> <?php echo $attn; ?></h5>
                        </div>
                    </div>
                    <div class="row pt-5">
                        <div class="col-lg-3">
                            <p class="h3">Invoice To:</p>
                            <p class="fs-18 fw-semibold mb-0"><?php echo $supplierName; ?></p>
                            <address>
                                <?php echo $supplierCompany; ?><br>
                                <?php echo $supplierAddress; ?><br>
                                <?php echo $supplierCountry; ?>
                            </address>
                        </div>
                        <div class="col-lg-6 text-end">
                        </div>
                        <div class="col-lg-3 text-end">
                            <p class="h4 fw-semibold">Shipping Address:</p>
                            <address>
                                <?php echo $shippingAddress; ?>
                            </address>
                        </div>
                    </div>
                    <div class="table-responsive push">
                        <table class="table table-bordered table-hover mb-0 text-nowrap">
                            <tbody>
                                <tr class=" ">
                                    <th class="text-center">P/N</th>
                                    <th class="text-center">Description/Make</th>
                                    <th class="text-center">Qty.</th>
                                    <th class="text-end">Unit Rate</th>
                                    <th class="text-end">Total Rate (USD)</th>
                                </tr>
                                <tr>
                                    <td class="text-center"><?php echo $partNo; ?></td>
                                    <td class="text-center"><?php echo $description; ?></td>
                                    <td class="text-center"><?php echo $quantity; ?></td>
                                    <td class="text-end">$<?php echo $unitRate; ?></td>
                                    <td class="text-end">$<?php echo $totalAmount; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="fw-bold text-uppercase text-end">Total</td>
                                    <td class="fw-bold text-end h4">$<?php echo $totalAmount; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="fw-bold text-uppercase text-end">Discount (-)</td>
                                    <td class="fw-bold text-end h4">$<?php echo $discount; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="fw-bold text-uppercase text-end">Net Total</td>
                                    <td class="fw-bold text-end h4">$<?php echo $netTotal; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="fw-bold text-uppercase text-end">(US DOLLARS <?php echo $wordTotal; ?> ONLY)</td>
                                    <td class="fw-bold text-end h4"></td>
                                </tr>
                            </tbody>
                        </table>

                        <h4 class=" pt-4 fw-800">Note</h4>
                        <div>
                            <ul class="list">
                                <li class="list-item">* THE SUPPLIED ITEMS ARE TO BE BRAND NEW</li>
                                <li class="list-item">* ITEMS SUPPLIED SHOWLD HAVE A 1 YEAR WARRANTY</li>
                            </ul>
                        </div>

                    </div>
                </div>

            </div>

        </div>
        <div class="card-footer text-end">
            <button type="button" class="btn btn-danger mb-1" onclick="printDiv('printInvoice')"><i class="si si-printer"></i> Print Invoice</button>
        </div>
        <!-- COL-END -->
    </div>
    <!-- ROW-1 CLOSED -->
</div>
<!-- CONTAINER CLOSED -->
</div>
</div>
<!--app-content closed-->
</div>

<?php require_once('include/_footer.php'); ?>



