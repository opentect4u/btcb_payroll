<style>
    .table td .form-group {
        width: 165px;
    }
</style>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h3>Add Earnings</h3>
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" id="form" action="<?php echo site_url("slryad"); ?>?catg_id=<?= $selected['catg_id'] ?>&sys_dt=<?= $selected['sal_date'] ?>">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-5">
                                                <label for="exampleInputName1">Date:</label>
                                                <input type="date" name="sal_date" class="form-control required" id="sal_date" value="<?= $selected['sal_date']; ?>" readonly />
                                            </div>
                                            <div class="col-5">
                                                <label for="exampleInputName1">Category:</label>
                                                <select class="form-control required" name="catg_id" id="catg_id">
                                                    <option value="">Select Category</option>
                                                    <?php
                                                    if ($catg_list) {
                                                        $select = '';
                                                        foreach ($catg_list as $catg) {
                                                            if ($selected['catg_id'] == $catg->id) {
                                                                $select = 'selected';
                                                            } else {
                                                                $select = '';
                                                            } ?>
                                                            <option value="<?= $catg->id ?>" <?= $select ?>><?= $catg->category; ?></option>
                                                    <?php }
                                                    } ?>
                                                </select>
                                            </div>
                                            <div class="col-2 float-right">
                                                <label for="exampleInputName1">&nbsp;</label>
                                                <button type="submit" id="submit" name="submit" class="btn btn-primary mr-2 form-control">Populate</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <?php if (isset($_REQUEST['submit'])) {
            $display = '';
            $disabled = '';
            if ($selected['catg_id'] == 2) {
                $display = 'style="display:none;"';
            } ?>
            <div class="card mt-4">
                <div class="card-body">
                    <h3>Add Earnings</h3>
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST" id="form" action="<?php echo site_url("salsv"); ?>">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="table-responsive" id='permanent'>

                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Emp name</th>
                                                                <th>Basic</th>
                                                                <th <?= $display ?>>D.A.</th>
                                                                <th <?= $display ?>>S.A.</th>
                                                                <th <?= $display ?>>H.R.A.</th>
                                                                <th <?= $display ?>>T.A.</th>
                                                                <th <?= $display ?>>D.A. on S.A.</th>
                                                                <th <?= $display ?>>D.A. on T.A.</th>
                                                                <th <?= $display ?>>M.A.</th>
                                                                <th <?= $display ?>>CASH/S.W.A.</th>
                                                                <th>Gross Salary</th>
                                                                <th>LWP</th>
                                                                <th>GROSS SALARY (after deduction)</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            if ($sal_list) {
                                                                $i = 0;
                                                                foreach ($sal_list as $sal) { ?>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text" name="emp_name[]" class="form-control required" id="emp_name_<?= $i ?>" value="<?= $sal['emp_name']; ?>" readonly />
                                                                                <input type="hidden" name="emp_code[]" id="emp_code_<?= $i ?>" value="<?= $sal['emp_code'] ?>">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text" name="basic[]" class="form-control required" id="basic_<?= $i ?>" value="<?= $sal['basic']; ?>" readonly />
                                                                            </div>
                                                                        </td>
                                                                        <td <?= $display ?>>
                                                                            <div class="form-group">
                                                                                <input type="text" name="da[]" class="form-control required" id="da_<?= $i ?>" value="<?= $sal['da']; ?>" readonly />
                                                                            </div>
                                                                        </td>
                                                                        <td <?= $display ?>>
                                                                            <div class="form-group">
                                                                                <input type="text" name="sa[]" class="form-control required" id="sa_<?= $i ?>" value="<?= $sal['sa']; ?>" readonly />
                                                                            </div>
                                                                        </td>
                                                                        <td <?= $display ?>>
                                                                            <div class="form-group">
                                                                                <input type="text" name="hra[]" class="form-control required" id="hra_<?= $i ?>" value="<?= $sal['hra']; ?>" readonly />
                                                                            </div>
                                                                        </td>
                                                                        <td <?= $display ?>>
                                                                            <div class="form-group">
                                                                                <input type="text" name="ta[]" class="form-control required" id="ta_<?= $i ?>" value="<?= $sal['ta']; ?>" readonly />
                                                                            </div>
                                                                        </td>
                                                                        <td <?= $display ?>>
                                                                            <div class="form-group">
                                                                                <input type="text" name="da_on_sa[]" class="form-control required" id="da_on_sa_<?= $i ?>" value="<?= $sal['da_on_sa']; ?>" readonly />
                                                                            </div>
                                                                        </td>
                                                                        <td <?= $display ?>>
                                                                            <div class="form-group">
                                                                                <input type="text" name="da_on_ta[]" class="form-control required" id="da_on_ta_<?= $i ?>" value="<?= $sal['da_on_ta']; ?>" readonly />
                                                                            </div>
                                                                        </td>
                                                                        <td <?= $display ?>>
                                                                            <div class="form-group">
                                                                                <input type="text" name="ma[]" class="form-control required" id="ma_<?= $i ?>" value="<?= $sal['ma']; ?>" readonly />
                                                                            </div>
                                                                        </td>
                                                                        <td <?= $display ?>>
                                                                            <div class="form-group">
                                                                                <input type="text" name="cash_swa[]" class="form-control required" id="cash_swa_<?= $i ?>" value="<?= $sal['cash_swa']; ?>" onchange="cash_cal(<?= $i ?>)" />
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text" name="gross[]" class="form-control required" id="gross_<?= $i ?>" value="<?= $sal['gross']; ?>" readonly />
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text" name="lwp[]" class="form-control required" id="lwp_<?= $i ?>" value="<?= $sal['lwp']; ?>" onchange="lwp_cal(<?= $i ?>)" />
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text" name="final_gross[]" class="form-control required" id="final_gross_<?= $i ?>" value="<?= $sal['final_gross']; ?>" readonly />
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                            <?php $i++;
                                                                }
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="sal_date" value="<?= $selected['sal_date']; ?>">
                                        <input type="hidden" name="catg_id" value="<?= $selected['catg_id']; ?>">
                                        <div class="mt-3">
                                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                            <button class="btn btn-light">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        <?php } ?>
    </div>

    <script>
        function cash_cal(id) {
            var cash_val = $('#cash_swa_' + id).val();
            var gross_val = $('#gross_' + id).val();
            var final_gross = $('#final_gross_' + id).val();
            $('#gross_' + id).val(parseInt(cash_val) + parseInt(gross_val))
            $('#final_gross_' + id).val(parseInt(cash_val) + parseInt(final_gross))
        }

        function lwp_cal(id) {
            var lwp_val = $('#lwp_' + id).val();
            var final_gross = $('#final_gross_' + id).val();
            $('#final_gross_' + id).val(parseInt(final_gross) - parseInt(lwp_val))
        }
    </script>

    <script>
        $(document).ready(function() {
            var catg_id = <?= $selected['catg_id'] ?> > 0 ? <?= $selected['catg_id'] ?> : 0;
            if (catg_id > 0) {
                <?php if (!isset($_REQUEST['submit'])) { ?>
                    $('#submit').click();
                <?php } ?>
            }
        })
    </script>