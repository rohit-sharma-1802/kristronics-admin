<?php 
    require_once('include/_header.php'); 
    require_once('include/_db.php');

        $message= "";
        $getUrlParameter = @$_GET['type']; 

        if(isset($_POST['submit'])){

            if($getUrlParameter == 'Supplier'){
          
                $supplier_name = $_POST['Name'];
                $supplier_phone = $_POST['Phone'];
                $supplier_email = $_POST['Email'];
                $supplier_company = $_POST['Company'];
                $supplier_country = $_POST['Country'];
                $supplier_address = $_POST['Address'];

                $sql = "INSERT INTO suppliers_records(supplier_name, supplier_phone, supplier_email, supplier_company, supplier_country, supplier_address) VALUES(:supplierName, :supplierPhone, :supplierEmail, :supplierCompany, :supplierCountry, :supplierAddress)";

                $stmt = $connectingDB->prepare($sql);

                $stmt -> bindValue(':supplierName', $supplier_name);
                $stmt -> bindValue(':supplierPhone', $supplier_phone);
                $stmt -> bindValue(':supplierEmail', $supplier_email);
                $stmt -> bindValue(':supplierCompany', $supplier_company);
                $stmt -> bindValue(':supplierCountry', $supplier_country);
                $stmt -> bindValue(':supplierAddress', $supplier_address);

                $Execute = $stmt->execute(); 

                if($Execute){
                    $message = '<script>window.open("view-all-record.php?type=Supplier&message=Record has been added successfully","_self")</script>'; 
                }
                else{
                    $message = 'Error! Please try again';
                }
            }
          
    
        if($getUrlParameter == 'Client'){
          
                $client_name = $_POST['Name'];
                $client_phone = $_POST['Phone'];
                $client_email = $_POST['Email'];
                $client_company = $_POST['Company'];
                $client_country = $_POST['Country'];
                $client_address = $_POST['Address'];

                $sql = "INSERT INTO clients_records(clients_name, clients_phone, clients_email, clients_company, clients_address, clients_country) VALUES(:clientName, :clientPhone, :clientEmail, :clientCompany, :clientAddress, :clientCountry)";

                $stmt = $connectingDB->prepare($sql);

                $stmt -> bindValue(':clientName', $client_name);
                $stmt -> bindValue(':clientPhone', $client_phone);
                $stmt -> bindValue(':clientEmail', $client_email);
                $stmt -> bindValue(':clientCompany', $client_company);
                $stmt -> bindValue(':clientAddress', $client_address);
                $stmt -> bindValue(':clientCountry', $client_country);

                $Execute = $stmt->execute(); 

                if($Execute){
                    $message = '<script>window.open("view-all-record.php?type=Client&message=Record has been added successfully","_self")</script>'; 
                }
                else{
                    $message = 'Error! Please try again';
                }
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
            <li class="breadcrumb-item active" aria-current="page">Add New Record</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->

<div class="card">
    <div class="card-header">
        <h3 class="card-title"><?php echo @$_GET['type']; ?>'s Information  </h3>
        <h3 class="card-title"><?php echo $message; ?></h3>
    </div>
    <form action=""  method="post" class="card">
        <div class="card-body">
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
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label">Company Name <span class="text-red">*</span></label>
                        <input type="text" name="Company" class="form-control" placeholder="Company name">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label">Country Name <span class="text-red">*</span></label>
                        <input type="text" name="Country" class="form-control" placeholder="Country name">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label">Address <span class="text-red">*</span></label>
                        <input type="text" name="Address" class="form-control" placeholder="   Address">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="submit" name="submit" value="Add New" class="btn btn-success">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

</div>
<!-- CONTAINER CLOSED -->
</div>
</div>
<!--app-content closed-->
</div>

<?php require_once('include/_footer.php'); ?>