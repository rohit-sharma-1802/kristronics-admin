    <?php
    require_once('include/_header.php');
    require_once('include/_db.php');

    if (isset($_POST['createOrder'])) {
        $supplier_name = $_POST['Name'];
        $supplier_phone = $_POST['Phone'];
        $supplier_email = $_POST['Email'];
        $supplier_company = $_POST['Company'];
        $supplier_country = $_POST['Country'];
        $supplier_address = $_POST['supplierAddress'];
        $lpoNo = $_POST['lpoNo'];
        $your_ref = $_POST['yourRef'];
        $attn = $_POST['attn'];
        $pN = $_POST['partNo'];
        $description = $_POST['description'];
        $quantity = $_POST['quantity'];
        $unit_rate = $_POST['unitRate'];
        $total_amount = ((float)$quantity * (float)$unit_rate);
        $discount = $_POST['discount'];
        $shipping_address = $_POST['shippingAddress'];
        global $connectingDB;

        $sql = "INSERT INTO purchase_order_archive (supplier_name, supplier_phone, supplier_email, supplier_company, supplier_country, supplier_address, lpo_no, your_ref, attn, Part_no, description, quantity, unit_rate, total_amount, discount, shipping_address) VALUES(:supplierName, :supplierPhone, :supplierEmail, :supplierCompany, :supplierCountry, :supplierAddress, :lpoNo, :yourRef, :attn, :partNo, :description, :quantity, :unitRate, :totalAmount, :discount, :shippingAddress)";

        $stmt = $connectingDB->prepare($sql);

        $stmt->bindValue(':supplierName', $supplier_name);
        $stmt->bindValue(':supplierPhone', $supplier_phone);
        $stmt->bindValue(':supplierEmail', $supplier_email);
        $stmt->bindValue(':supplierCompany', $supplier_company);
        $stmt->bindValue(':supplierCountry', $supplier_country);
        $stmt->bindValue(':supplierAddress', $supplier_address);
        $stmt->bindValue(':lpoNo', $lpoNo);
        $stmt->bindValue(':yourRef', $your_ref);
        $stmt->bindValue(':attn', $attn);
        $stmt->bindValue(':partNo', $pN);
        $stmt->bindValue(':description', $description);
        $stmt->bindValue(':quantity', $quantity);
        $stmt->bindValue(':unitRate', $unit_rate);
        $stmt->bindValue(':totalAmount', $total_amount);
        $stmt->bindValue(':discount', $discount);
        $stmt->bindValue(':shippingAddress', $shipping_address);

        $Execute = $stmt->execute();

        if ($Execute) {
            echo  '<script>window.open("receipts-archive.php?message=Order has been Created successfully","_self")</script>';
        } else {
            echo 'Error! Please try again';
        }
    }

    ?>

    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">Dashboard</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create New Order</li>
                </ol>
            </div>
        </div>
        <!-- PAGE-HEADER END -->

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Create New Order</h3>
            </div>
            <form action="" method="post" class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                                <div class="form-group">
                                    <select class="form-control select2-show-search form-select"
                                        data-placeholder="Select Supplier" name="supplierDetails">
                                        <option label="Choose one"></option>
                                        <?php
                                        $sql = "SELECT * FROM suppliers_records";
                                        $stmt = $connectingDB->query($sql);


                                        while ($dataRows = $stmt->fetch()) {
                                            $supplier_id = $dataRows['supplier_id'];
                                            $supplier_name = $dataRows['supplier_name'];
                                        ?>
                                        <option value="<?php echo $supplier_id; ?>">
                                            <?php echo $supplier_name; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                                <input type="submit" name="addSupplier" value="+ Add Supplier" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
            </form>

            <?php

            if (isset($_POST['addSupplier'])) {
                //get data
                $supplier_id = $_POST['supplierDetails'];
                // fectch record
                global $connectingDB;
                $sql = "SELECT * FROM suppliers_records WHERE supplier_id = '$supplier_id'";
                $stmt = $connectingDB->query($sql);
                while ($dataRows = $stmt->fetch()) {
                    $supplierID = $dataRows['supplier_id'];
                    $supplierName = $dataRows['supplier_name'];
                    $supplierPhone = $dataRows['supplier_phone'];
                    $supplierEmail = $dataRows['supplier_email'];
                    $supplierCompany = $dataRows['supplier_company'];
                    $supplierCountry = $dataRows['supplier_country'];
                    $supplierAddress = $dataRows['supplier_address'];

                    echo '<form action="" method="post">
                    <div class="row">
                        <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                                <label class="form-label">Name <span class="text-red">*</span></label>
                                <input type="text" name="Name" class="form-control" placeholder="Name" value="' . $supplierName . '" required>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                                <label class="form-label">Phone <span class="text-red">*</span></label>
                                <input type="text" name="Phone" class="form-control" value="' . $supplierPhone . '" placeholder="Phone">
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                                <label class="form-label">Email address <span class="text-red">*</span></label>
                                <input type="email" name="Email" class="form-control" value="' . $supplierEmail . '" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Company Name <span class="text-red">*</span></label>
                                <input type="text" name="Company" class="form-control" value="' . $supplierCompany . '" placeholder="Company name">
                            </div>
                        </div>
        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Country Name <span class="text-red">*</span></label>
                                <input type="text" name="Country" class="form-control" value="' . $supplierCountry . '"  placeholder="Country name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Supplier Address <span class="text-red">*</span></label>
                                <input type="text" name="supplierAddress" class="form-control" value="' . $supplierAddress . '" placeholder="Supplier Address">
                            </div>
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                                <label class="form-label">LPO No.<span class="text-red">*</span></label>
                                <input type="text" name="lpoNo" class="form-control" placeholder="LPO No" required>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                                <label class="form-label">Your Ref.<span class="text-red">*</span></label>
                                <input type="text" name="yourRef" class="form-control" placeholder="Your Ref.">
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                                <label class="form-label">Attn.<span class="text-red">*</span></label>
                                <input type="text" name="attn" class="form-control" placeholder="Attn">
                            </div>
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">P/N<span class="text-red">*</span></label>
                                <input type="text" name="partNo" class="form-control" placeholder="P/N">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Description<span class="text-red">*</span></label>
                                <input type="text" name="description" class="form-control" placeholder="Description/Make">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Qty<span class="text-red">*</span></label>
                                <input type="text" name="quantity" class="form-control" placeholder="Quantity">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Unit Rate<span class="text-red">*</span></label>
                                <input type="text" name="unitRate" class="form-control" placeholder="Unit Rate">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Discount<span class="text-red">*</span></label>
                                <input type="text" name="discount" class="form-control" placeholder="Discount">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Shipping Address<span class="text-red">*</span></label>
                                <input type="text" name="shippingAddress" class="form-control" placeholder="Shipping Address">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="createOrder" value="Create New Order" class="btn btn-success">
                    </div>
        
                </form>';
                }
            } else { ?>
            <form action="" method="post">
                <div class="row">
                    <div class="col-sm-4 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Name <span class="text-red">*</span></label>
                            <input type="text" name="Name" class="form-control" placeholder="Name" required>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Phone <span class="text-red">*</span></label>
                            <input type="text" name="Phone" class="form-control" placeholder="Phone">
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Email address <span class="text-red">*</span></label>
                            <input type="email" name="Email" class="form-control" placeholder="Email">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Company Name <span class="text-red">*</span></label>
                            <input type="text" name="Company" class="form-control" placeholder="Company name">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Country Name <span class="text-red">*</span></label>
                            <input type="text" name="Country" class="form-control" placeholder="Country name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Supplier Address <span class="text-red">*</span></label>
                            <input type="text" name="supplierAddress" class="form-control"
                                placeholder="Supplier Address">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4 col-md-4">
                        <div class="form-group">
                            <label class="form-label">LPO No.<span class="text-red">*</span></label>
                            <input type="text" name="lpoNo" class="form-control" placeholder="LPO No" required>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Your Ref.<span class="text-red">*</span></label>
                            <input type="text" name="yourRef" class="form-control" placeholder="Your Ref.">
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Attn.<span class="text-red">*</span></label>
                            <input type="text" name="attn" class="form-control" placeholder="Attn">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">P/N<span class="text-red">*</span></label>
                            <input type="text" name="partNo" class="form-control" placeholder="P/N">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Description<span class="text-red">*</span></label>
                            <input type="text" name="description" class="form-control" placeholder="Description/Make">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Qty<span class="text-red">*</span></label>
                            <input type="text" name="quantity" class="form-control" placeholder="Quantity">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Unit Rate<span class="text-red">*</span></label>
                            <input type="text" name="unitRate" class="form-control" placeholder="Unit Rate">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Discount<span class="text-red">*</span></label>
                            <input type="text" name="discount" class="form-control" placeholder="Discount">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Shipping Address<span class="text-red">*</span></label>
                            <input type="text" name="shippingAddress" class="form-control"
                                placeholder="Shipping Address">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" name="createOrder" value="Create New Order" class="btn btn-success">
                </div>

            </form>
            <?php }
            ?>


        </div>
    </div>
    <!-- CONTAINER CLOSED -->
    </div>
    </div>
    <!--app-content closed-->
    </div>

    <?php require_once('include/_footer.php'); ?>