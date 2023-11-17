<div class="wraper">

    <div class="row">

        <div class="col-lg-9 col-sm-12">

            <h1><strong>A/C Head Master</strong></h1>

        </div>

        <!-- </div> -->

        <div class="col-lg-12 container contant-wraper">

            <h3>
                <a href="<?php echo site_url("achead/entry"); ?>?id=" class="btn btn-primary" style="width: 100px;">Add</a>
                <span class="confirm-div" style="float:right; color:green;"></span>
            </h3>

            <table class="table table-bordered table-hover" id="example">

                <thead>

                    <tr>
                        <th>Sl No.</th>
                        <th>Group</th>
                        <th>Sub Group</th>
                        <th>A/C Head</th>
                        <th>Option</th>
                    </tr>

                </thead>

                <tbody>

                    <?php
                    $ac_head = json_decode($ac_head);
                    if ($ac_head) {
                        $i = 1;
                        foreach ($ac_head as $dt) {
                    ?>

                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $dt->gr_name; ?></td>
                                <td><?= $dt->subgr_name; ?></td>
                                <td><?= $dt->ac_name; ?></td>
                                <td><a href="<?= site_url() ?>/achead/entry?id=<?php echo $dt->sl_no; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit">

                                        <i class="fa fa-edit fa-2x" style="color: #007bff"></i>
                                    </a>
                                </td>
                            </tr>

                    <?php
                            $i++;
                        }
                    } else {

                        echo "<tr><td colspan='4' style='text-align: center;'>No data Found</td></tr>";
                    }
                    ?>

                </tbody>

                <tfoot>

                    <tr>
                        <th>Sl No.</th>
                        <th>Group</th>
                        <th>Sub Group</th>
                        <th>A/C Head</th>
                        <th>Option</th>
                    </tr>

                </tfoot>

            </table>
        </div>

    </div>

</div>
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {

        <?php if ($this->session->flashdata('msg')) { ?>
            window.alert("<?php echo $this->session->flashdata('msg'); ?>");

    });

    <?php } ?>
</script>



<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "pagingType": "full_numbers",
            // "scrollY": 250,
            // "scrollX": true
        });
    });
</script>