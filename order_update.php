<?php

require_once 'connect.php';
error_reporting(0);
session_start();
if (strlen($_SESSION['user_id']) == 0) {
    header('location:../login.php');
} else {
    if (isset($_POST['update'])) {
        $form_id = $_GET['form_id'];
        $status = $_POST['status'];
        $remark = $_POST['remark'];
        $query = mysqli_query($db, "INSERT INTO remark(frm_id,status,remark) values('$form_id','$status','$remark')");
        $sql = mysqli_query($db, "UPDATE user_orders_tbl SET status='$status' where order_ID='$form_id'");
        $sqls = mysqli_query($db, "UPDATE user_orders_tbl SET remark='$remark' where order_ID='$form_id'");

        echo "<script>alert('Form Details Updated Successfully');</script>";
    }

?>


    <script language="javascript" type="text/javascript">
        function f2() {
            window.close();
        }
        ser

        function f3() {
            window.print();
        }
    </script>

    <head>


        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Order Update</title>
        <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
        <link href="css/helper.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Average+Sans&family=Merienda:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <style type="text/css" rel="stylesheet">
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                text-decoration: none;
                list-style: none;
                font-family: Poppins, Arial;
            }

            :root {
                --primary-color: #08266a;
                --secodary-color: #96cdf6;
                --dark-color: #000511;
                --black: #191817;
                --black25: #cfdbf8fb;
                --black10: #f8f8f8;

                --H1: 7.419rem;
                --H2: clamp(2.624rem, 3.4783vw + 0.3043rem, 5.247rem);
                --H3: clamp(2.856rem, 3.4783vw + 0.3043rem, 3.711rem);
                --H4: 2.624rem;
                --H5: clamp(1.313rem, 3.4783vw + 0.3043rem, 1.856rem);
                --H6: clamp(0.9rem, 3.4783vw + 0.3043rem, 1.313rem);
            }

            .indent-small {
                margin-left: 5px;
            }

            .form-group.internal {
                margin-bottom: 0;
            }

            .dialog-panel {
                margin: 10px;
            }

            .datepicker-dropdown {
                z-index: 200 !important;
            }


            label.control-label {
                font-weight: 600;
                color: var(--primary-color);
            }


            table {
                max-width: 850px;
                width: 100%;
                border-collapse: collapse;
                margin: auto;
                margin-top: 50px;
            }


            tr:nth-of-type(odd) {
                background: var(--black50);
                color: var(--primary-color);
            }

            th {
                background: #004684;
                color: white;
                font-weight: bold;
            }

            td,
            th {
                padding: 10px;
                border: 1px solid #ccc;
                text-align: left;
                font-size: 14px;
            }

            .form-container {
                height: 100vh;
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .btn-primary {
                cursor: pointer;
                font-size: 1rem;
                background-color: var(--primary-color);
                padding: 16px 32px;
                color: var(--black10);
                margin-bottom: 16px;
                border: none;
                width: 100%;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 25%);
            }

            .btn-danger {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                background-color: #dc3545;
                border: none;
                color: var(--black10);
                padding: 16px 32px;
                font-size: 1rem;
                width: 100%;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 15%);
            }
        </style>
    </head>

    <body>


        <div class="form-container">
            <form name="updateticket" id="updatecomplaint" method="post">
                <table>
                    <tr>
                        <td><b>Form Number</b></td>
                        <td><?php echo htmlentities($_GET['form_id']); ?></td>
                    </tr>

                    <tr>
                        <td><b>Status</b></td>
                        <td><select name="status" required="required">
                                <option value="">Select Status</option>
                                <option value="in process">On the way</option>
                                <option value="closed">Delivered</option>
                                <option value="rejected">Cancelled</option>
                                <option value="missing">Missing</option>
                                <option value="accept">Accepted</option>
                                <option value="reject">Rejected</option>

                            </select></td>
                    </tr>
                    <tr>
                        <td><b>Message</b></td>
                        <td><textarea name="remark" cols="50" rows="10" required="required"></textarea></td>
                    </tr>


                    <tr>
                        <td><b>Action</b></td>
                        <td><input type="submit" name="update" class="btn btn-primary" value="Submit">

                            <input name="Submit2" type="submit" class="btn btn-danger" value="Close this window " onClick="return f2();" style="cursor: pointer;" />
                        </td>
                    </tr>





                </table>
            </form>
        </div>

    </body>


    </html>

<?php } ?>