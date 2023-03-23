<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="./assets/images/brand/logo-2.png" />

    <!-- TITLE -->
    <title>KRIStronics - Send Your Inquiry</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="./assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="./assets/css/style.css" rel="stylesheet" />
    <link href="./assets/css/dark-style.css" rel="stylesheet" />
    <link href="./assets/css/transparent-style.css" rel="stylesheet">
    <link href="./assets/css/skin-modes.css" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="./assets/css/icons.css" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="./assets/colors/color1.css" />

</head>

<?php
        require_once('./admin/include/_db.php');
        $message = @$_GET['message'];
        $error = @$_GET['error'];
        global $connectingDB;
       
        if(isset($_POST['submit'])){

                $client_name = $_POST['name'];
                $client_email = $_POST['email'];
                $client_phone = $_POST['phone'];
                $client_company = $_POST['company'];
                $client_country = $_POST['country'];
                $client_address = $_POST['address'];
                $client_part_no = $_POST['partNo'];
                $client_description = $_POST['description'];
                $client_quantity = $_POST['quantity'];
                $client_additional_remarks = $_POST['additionalRemarks'];

                $sql = "INSERT INTO client_inquiries (client_name, client_email, client_phone, client_company,  	
                client_address, client_country, client_part_no, client_description, client_quantity, client_additional_remarks) VALUES(:clientName, :clientEmail, :clientPhone, :clientCompany, :clientAddress, :clientCountry, :clientPartNo, :clientDescription, :clientQuantity, :clientAdditionalRemarks)";

                $stmt = $connectingDB->prepare($sql);

                $stmt -> bindValue(':clientName', $client_name);
                $stmt -> bindValue(':clientEmail', $client_email);
                $stmt -> bindValue(':clientPhone', $client_phone);
                $stmt -> bindValue(':clientCompany', $client_company);
                $stmt -> bindValue(':clientAddress', $client_address);
                $stmt -> bindValue(':clientCountry', $client_country);
                $stmt -> bindValue(':clientPartNo', $client_part_no);
                $stmt -> bindValue(':clientDescription', $client_description);
                $stmt -> bindValue(':clientQuantity', $client_quantity);
                $stmt -> bindValue(':clientAdditionalRemarks', $client_additional_remarks);

                $Execute = $stmt->execute(); 

                if($Execute){
                    $message = '<script>window.open("send-inquiry.php?message=Inquiry has been sent successfully. Please check your mail for more information","_self")</script>'; 
                }
                else{
                    $message = '<script>window.open("send-inquiry.php?error=Error! Please try again","_self")</script>';
                }
            }

?>

<body>

    <!-- BACKGROUND-IMAGE -->
    <div class="">

        <!-- GLOABAL LOADER -->
        <div id="global-loader">
            <img src="./assets/images/loader.svg" class="loader-img" alt="Loader">
        </div>
        <!-- /GLOABAL LOADER -->

        <!-- PAGE -->
        <div class="page">
            <div class="">

                <!-- CONTAINER OPEN -->
                <div class="col col-login mx-auto mt-7">
                    <div class="text-center">
                        <img src="../assets/images/brand/logo.png" class="header-brand-img" alt="">
                    </div>
                </div>

                <div class="container">
                    <div class="wrap-login100 p-6">
                        <form class="login100-form validate-form" action="" method="post">
                            <span class="login100-form-title pb-5">
                                Submit Your Inquiry
                            </span>
                            <span class="text-success">
                                <?php echo $message; ?>
                            </span>
                            <span class="text-danger">
                                <?php echo $error; ?>
                            </span>
                            <div class="panel panel-primary">
                                <div class="panel-body tabs-menu-body p-0 pt-5">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab5">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Name <span
                                                                class="text-red">*</span></label>
                                                        <input type="text" name="name" class="form-control"
                                                            placeholder="Name" required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Email <span
                                                                class="text-red">*</span></label>
                                                        <input type="text" name="email" class="form-control"
                                                            placeholder="Email" required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Phone <span
                                                                class="text-red">*</span></label>
                                                        <input type="text" name="phone" class="form-control"
                                                            placeholder="Phone" required>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Company <span
                                                                class="text-red">*</span></label>
                                                        <input type="text" name="company" class="form-control"
                                                            placeholder="Company" required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Address <span
                                                                class="text-red">*</span></label>
                                                        <input type="text" name="address" class="form-control"
                                                            placeholder="Address" required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Country <span
                                                                class="text-red">*</span></label>
                                                        <input type="text" name="country" class="form-control"
                                                            placeholder="Country" required>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Part No.<span
                                                                class="text-red">*</span></label>
                                                        <input type="text" name="partNo" class="form-control"
                                                            placeholder="Part No." required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Description <span
                                                                class="text-red">*</span></label>
                                                        <input type="text" name="description" class="form-control"
                                                            placeholder="Description" required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Quantity<span
                                                                class="text-red">*</span></label>
                                                        <input type="number" min=0 name="quantity" class="form-control"
                                                            placeholder="Quantity" required>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Addtional Remarks (Optional)<span
                                                                class="text-red"></span></label>
                                                        <textarea type="text" name="additionalRemarks"
                                                            class="form-control" placeholder="Message"
                                                            required></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col col-lg-2">
                                                    <div class="container-form-btn">
                                                        <input type="submit" name="submit" value="Send Now" class="btn btn-success">
                                                    </div>
                                                </div>
                                            </div>

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
        <!-- End PAGE -->

    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->

    <!-- JQUERY JS -->
    <script src="./assets/js/jquery.min.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="./assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="./assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    
    <!-- Perfect SCROLLBAR JS-->
    <script src="./assets/plugins/p-scroll/perfect-scrollbar.js"></script>

    <!-- Color Theme js -->
    <script src="./assets/js/themeColors.js"></script>

    <!-- CUSTOM JS -->
    <script src="./assets/js/custom.js"></script>

</body>

</html>