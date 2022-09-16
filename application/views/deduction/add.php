<style>
    .table td .form-group {
        width: 165px;
    }
</style>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h3>Add Deductions</h3>
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" id="form" action="<?php echo site_url("slrydedad"); ?>?catg_id=<?= $selected['catg_id'] ?>&sys_dt=<?= $selected['sal_date'] ?>">
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
        <?php if (isset($_REQUEST['submit'])) { ?>
            <div class="card mt-4">
                <div class="card-body">
                    <h3>Add Deductions</h3>
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST" id="form" action="<?php echo site_url("salsv"); ?>">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="table-responsive" id='permanent'>

                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Employee</th>
                                                                <th>GROSS SALARY (after deduction)</th>
                                                                <th>Service P.F.</th>
                                                                <th>Adv. agst. H.B. Prin.</th>
                                                                <th>Adv. agst. H.B. Int</th>
                                                                <th>Adv. agst. H.B. Construction Prin.</th>
                                                                <th>Adv. agst. H.B. Construction Int.</th>
                                                                <th>Adv. agst. Staff H.B. Extention Prin.</th>
                                                                <th>Adv. agst. Staff H.B. Extention Int.</th>
                                                                <th>Gross H.B. Int.</th>
                                                                <th>Adv. agst of staff with int. Prin.</th>
                                                                <th>Adv. agst of staff with int. Int.</th>
                                                                <th>Staff Advance Extension Prin.</th>
                                                                <th>Staff Advance Extension Int.</th>
                                                                <th>Motor Cycle / TV Loan Prin.</th>
                                                                <th>Motor Cycle / TV Loan Int.</th>
                                                                <th>P.Tax</th>
                                                                <th>G.I.C.I</th>
                                                                <th>Puja Adv.</th>
                                                                <th>Income Tax TDS.</th>
                                                                <th>Union Subs.</th>
                                                                <th>Total Deduction</th>
                                                                <th>NET SALARY</th>
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
                                                                                <input type="text" class="form-control" name="emp_name[]" id="emp_name_<?= $i ?>" value="<?= $sal['emp_name']; ?>" />
                                                                                <input type="hidden" name="emp_code[]" id="emp_code_<?= $i ?>" value="<?= $sal['emp_code'] ?>">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" name="gross[]" id="gross_<?= $i ?>" value="<?= $sal['gross']; ?>" onchange="cal_deduction(<?= $i ?>)" />
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" name="pf[]" id="pf_<?= $i ?>" value="<?= $sal['pf']; ?>" onchange="cal_deduction(<?= $i ?>)" onchange="cal_deduction(<?= $i ?>)" />
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" name="adv_agst_hb_prin[]" id="adv_agst_hb_prin_<?= $i ?>" value="<?= $sal['adv_agst_hb_prin']; ?>" onchange="cal_deduction(<?= $i ?>)" />
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" name="adv_agst_hb_int[]" id="adv_agst_hb_int_<?= $i ?>" value="<?= $sal['adv_agst_hb_int']; ?>" onchange="cal_deduction(<?= $i ?>)" />
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" name="adv_agst_hb_const_prin[]" id="adv_agst_hb_const_prin_<?= $i ?>" value="<?= $sal['adv_agst_hb_const_prin']; ?>" onchange="cal_deduction(<?= $i ?>)" />
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" name="adv_agst_hb_const_int[]" id="adv_agst_hb_const_int_<?= $i ?>" value="<?= $sal['adv_agst_hb_const_int']; ?>" onchange="cal_deduction(<?= $i ?>)" />
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" name="adv_agst_hb_staff_prin[]" id="adv_agst_hb_staff_prin_<?= $i ?>" value="<?= $sal['adv_agst_hb_staff_prin']; ?>" onchange="cal_deduction(<?= $i ?>)" />
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" name="adv_agst_hb_staff_int[]" id="adv_agst_hb_staff_int_<?= $i ?>" value="<?= $sal['adv_agst_hb_staff_int']; ?>" onchange="cal_deduction(<?= $i ?>)" />
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" name="gross_hb_int[]" id="gross_hb_int_<?= $i ?>" value="<?= $sal['gross_hb_int']; ?>" onchange="cal_deduction(<?= $i ?>)" />
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" name="adv_agst_of_staff_prin[]" id="adv_agst_of_staff_prin_<?= $i ?>" value="<?= $sal['adv_agst_of_staff_prin']; ?>" onchange="cal_deduction(<?= $i ?>)" />
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" name="adv_agst_of_staff_int[]" id="adv_agst_of_staff_int_<?= $i ?>" value="<?= $sal['adv_agst_of_staff_int']; ?>" onchange="cal_deduction(<?= $i ?>)" />
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" name="staff_adv_ext_prin[]" id="staff_adv_ext_prin_<?= $i ?>" value="<?= $sal['staff_adv_ext_prin']; ?>" onchange="cal_deduction(<?= $i ?>)" />
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" name="staff_adv_ext_int[]" id="staff_adv_ext_int_<?= $i ?>" value="<?= $sal['staff_adv_ext_int']; ?>" onchange="cal_deduction(<?= $i ?>)" />
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" name="motor_cycle_prin[]" id="motor_cycle_prin_<?= $i ?>" value="<?= $sal['motor_cycle_prin']; ?>" onchange="cal_deduction(<?= $i ?>)" />
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" name="motor_cycle_int[]" id="motor_cycle_int_<?= $i ?>" value="<?= $sal['motor_cycle_int']; ?>" onchange="cal_deduction(<?= $i ?>)" />
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" name="p_tax[]" id="p_tax_<?= $i ?>" value="<?= $sal['p_tax']; ?>" onchange="cal_deduction(<?= $i ?>)" />
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" name="gici[]" id="gici_<?= $i ?>" value="<?= $sal['gici']; ?>" onchange="cal_deduction(<?= $i ?>)" />
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" name="puja_adv[]" id="puja_adv_<?= $i ?>" value="<?= $sal['puja_adv']; ?>" onchange="cal_deduction(<?= $i ?>)" />
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" name="income_tax_tds[]" id="income_tax_tds_<?= $i ?>" value="<?= $sal['income_tax_tds']; ?>" onchange="cal_deduction(<?= $i ?>)" />
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" name="union_subs[]" id="union_subs_<?= $i ?>" value="<?= $sal['union_subs']; ?>" onchange="cal_deduction(<?= $i ?>)" />
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" name="tot_diduction[]" id="tot_diduction_<?= $i ?>" value="<?= $sal['tot_diduction']; ?>" onchange="cal_deduction(<?= $i ?>)" />
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" name="net_sal[]" id="net_sal_<?= $i ?>" value="<?= $sal['net_sal']; ?>" onchange="cal_deduction(<?= $i ?>)" />
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
        function cal_deduction(id) {
            var gross = $('#gross_' + id).val();
            var pf = $('#pf_' + id).val();
            var adv_agst_hb_prin = $('#adv_agst_hb_prin_' + id).val();
            var adv_agst_hb_int = $('#adv_agst_hb_int_' + id).val();
            var adv_agst_hb_const_prin = $('#adv_agst_hb_const_prin_' + id).val();
            var adv_agst_hb_const_int = $('#adv_agst_hb_const_int_' + id).val();
            var adv_agst_hb_staff_prin = $('#adv_agst_hb_staff_prin_' + id).val();
            var adv_agst_hb_staff_int = $('#adv_agst_hb_staff_int_' + id).val();
            var gross_hb_int = $('#gross_hb_int_' + id).val();
            var adv_agst_of_staff_prin = $('#adv_agst_of_staff_prin_' + id).val();
            var adv_agst_of_staff_int = $('#adv_agst_of_staff_int_' + id).val();
            var staff_adv_ext_prin = $('#staff_adv_ext_prin_' + id).val();
            var staff_adv_ext_int = $('#staff_adv_ext_int_' + id).val();
            var motor_cycle_prin = $('#motor_cycle_prin_' + id).val();
            var motor_cycle_int = $('#motor_cycle_int_' + id).val();
            var p_tax = $('#p_tax_' + id).val();
            var gici = $('#gici_' + id).val();
            var puja_adv = $('#puja_adv_' + id).val();
            var income_tax_tds = $('#income_tax_tds_' + id).val();
            var union_subs = $('#union_subs_' + id).val();
            var tot_diduction = $('#tot_diduction_' + id).val();
            var net_sal = $('#net_sal_' + id).val();
            var total_did = parseInt(pf) + parseInt(adv_agst_hb_prin) + parseInt(adv_agst_hb_int) + parseInt(adv_agst_hb_const_prin) + parseInt(adv_agst_hb_const_int) + parseInt(adv_agst_hb_staff_prin) + parseInt(adv_agst_hb_staff_int) + parseInt(adv_agst_of_staff_prin) + parseInt(adv_agst_of_staff_int) + parseInt(staff_adv_ext_prin) + parseInt(staff_adv_ext_int) + parseInt(motor_cycle_prin) + parseInt(motor_cycle_int) + parseInt(p_tax) + parseInt(gici) + parseInt(puja_adv) + parseInt(income_tax_tds) + parseInt(union_subs)

            var tot_gross_int = parseInt(adv_agst_hb_int) + parseInt(adv_agst_hb_const_int) + parseInt(adv_agst_hb_staff_int)
            $('#gross_hb_int_' + id).val(tot_gross_int)

            $('#tot_diduction_' + id).val(total_did)

            var diduction = parseInt(gross) - parseInt(total_did)
            $('#net_sal_' + id).val(diduction);
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