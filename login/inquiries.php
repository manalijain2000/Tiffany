<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investors</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" type="text/css" href="../custom-bootstrap/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css" />
    <link rel="stylesheet" type="text/css" href="../js/jquery-datatables.css" />
    <script type="text/javascript" src="../js/jquery-min.js"></script>
    <script type="text/javascript" src="../js/jquery-datatables.js"></script>
    <script type="text/javascript" src="../custom-bootstrap/bootstrap.js"></script>
    <script src="../js/sweat-alert.js"></script>

</head>

<body>
    <div class="container-fluid py-1">
        <?php include('sideNavigation.php') ?>
        <section class="home-section">
            <div class="home-content">
                <div class="container-fluid pt-4 sidebar-content">
                    <div class="d-flex mb-4 justify-content-between align-items-center">
                        <h2 class="mb-0">Inquiries</h2>
                    </div>

                    <!-- DataTable -->
                    <div class="card p-4 table-responsive">
                        <table id="investor-table" class="table mt-3 w-100">
                            <thead>
                                <tr class="bg-light-primary">
                                    <th>Inquiry Contact</th>
                                    <th>Registered On</th>
                                </tr>
                            </thead>
                        </table>
                    </div>

                </div>
        </section>
</body>

</html>
<script>
    var dt
    $(document).ready(function () {
        window.dt = $('#investor-table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "inquiriesServerSide.php?action=index",
                "type": "POST",
                "data": function (d) {
                    d.draw = d.draw || 1;
                }
            },
            "columns": [
                {
                    "data": "inquiry_contact"
                },
                {
                    "data": "created_at"
                },
            ],
        });
    });
</script>