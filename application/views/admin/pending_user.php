<style>
    #example_wrapper .dt-buttons .buttons-csv{
        background-color: #1fbba6;
        padding: 5px 15px 5px 15px;

    }
</style>
<div class="main-content">
    <div class="wrap-content container" id="container">
        <!-- start: PAGE TITLE -->
        <section id="page-title">
            <div class="row">
                <div class="col-sm-8">
                    <h1 class="mainTitle">List Of Pending User Data</h1>
                </div>
            </div>
        </section>
        <!-- end: PAGE TITLE -->
        <!-- start: DYNAMIC TABLE -->
        <div class="container-fluid container-fullw">
            <div class="row">
                <div class="panel panel-primary" id="panel5">
                    <div class="panel-heading">
                        <h4 class="panel-title text-white">Pending User Data</h4>
                    </div>
                    <div class="panel-body bg-white" style="border: 1px solid #b2b7bb!important;">
                        <div class="row">
                            <div class="col-md-12 table-responsive">
                                <table class="table table-bordered table-striped text-center" id="user">
                                    <thead class="th_center">
                                        <tr>
                                            <th>Date</th>
                                            <th>Profile</th>
                                            <th>Full Name</th>
                                            <th>Phone No.</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Address</th>
                                            <th>State</th>
                                            <th>Country</th>
                                            <th>Job Title</th>
                                            <th>Company Name</th>
                                            <th>Industry</th>
                                            <th>Members</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($user) && !empty($user)) {
                                            foreach ($user as $val) {
                                                ?>
                                                <tr>
                                                    <td><?= date("Y-m-d", strtotime($val->register_date)) ?></td>
                                                    <td>
                                                        <?php if ($val->profile != "") { ?>
                                                            <img src="<?= base_url() ?>uploads/customer_profile/<?= $val->profile ?>" style="height: 40px; width: 40px;">
                                                        <?php } else { ?>
                                                            <img src="<?= base_url() ?>assets/images/Avatar.png" style="height: 40px; width: 40px;">
                                                        <?php } ?>
                                                    <td><?= $val->first_name . ' ' . $val->last_name ?></td>
                                                    <td><?= $val->phone ?></td>
                                                    <td><?= $val->email ?></td>
                                                    <td><?= base64_decode($val->password) ?></td>
                                                    <td><?= $val->address ?></td>
                                                    <td><?= $val->state ?></td>
                                                    <td><?= $val->country ?></td>
                                                    <td><?= $val->job_title ?></td>
                                                    <td><?= $val->company_name ?></td>
                                                    <td><?= $val->industry ?></td>
                                                    <td><?= $val->member_status ?></td> 
                                                    <td>
                                                        <?php
                                                        if ($val->customer_master_status == 0) {
                                                            ?>
                                                            <label class="label label-warning label-sm">Pending</label>
                                                        <?php } else if ($val->customer_master_status == 1) { ?>
                                                            <label class="label label-success label-sm">Active</label>
                                                        <?php } ?>
                                                    </td>
                                                        <td>
                                                            <?php
                                                            if ($val->customer_master_status == 0) {
                                                                ?>
                                                                <a class="btn btn-success btn-sm" href="<?= base_url() . 'admin/user/active/' . $val->cust_id ?>">
                                                                    Approve
                                                                </a>
                                                                <a class="btn btn-danger btn-sm" href="<?= base_url() . 'admin/user/reject/' . $val->cust_id ?>">
                                                                    Reject
                                                                </a>
                                                            <?php } ?>
                                                        </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
$msg = $this->input->get('msg');
switch ($msg) {
    case "D":
        $m = "User Delete Successfully...!!!";
        $t = "success";
        break;
    case "E":
        $m = "Something went wrong, Please try again!!!";
        $t = "error";
        break;
    default:
        $m = 0;
        break;
}
?>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
<?php if ($msg): ?>
            alertify.<?= $t ?>("<?= $m ?>");
<?php endif; ?>
        $("#user").dataTable({
            "ordering": true,
        });
    });
</script>








