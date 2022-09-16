<script>
  function printDiv() {

        var divToPrint = document.getElementById('divToPrint');
        var WindowObject = window.open('', 'Print-Window');
        WindowObject.document.open();
        WindowObject.document.writeln('<!DOCTYPE html>');
        WindowObject.document.writeln('<html><head><title></title><style type="text/css">');
        WindowObject.document.writeln('@media print { .center { text-align: center;} .underline { text-decoration: underline; } p { display:inline; } .left { margin-left: 315px; text-align="left" display: inline; } .right { margin-right: 375px; display: inline; } td.left_algn { text-align: left; } td.right_algn { text-align: right; } .t2 td, th { border: 1px solid black; } td.hight { hight: 15px; } table.width { width: 100%; } table.noborder { border: 0px solid black; } th.noborder { border: 0px solid black; } .border { border: 1px solid black; } .bottom { position: absolute;; bottom: 5px; width: 100%; } } </style>');
        WindowObject.document.writeln('</head><body onload="window.print()">');
        WindowObject.document.writeln(divToPrint.innerHTML);
        WindowObject.document.writeln('</body></html>');
        WindowObject.document.close();
        setTimeout(function () {
            WindowObject.close();
        }, 10);

  }
</script>

<?php
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($payslip_dtls)) {
            // function getIndianCurrency($number)
            // {
            //     $decimal = round($number - ($no = floor($number)), 2) * 100;
            //     $hundred = null;
            //     $digits_length = strlen($no);
            //     $i = 0;
            //     $str = array();
            //     $words = array(0 => '', 1 => 'One', 2 => 'Two',
            //         3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
            //         7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
            //         10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
            //         13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
            //         16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
            //         19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
            //         40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
            //         70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
            //     $digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
            //     while( $i < $digits_length ) {
            //         $divider = ($i == 2) ? 10 : 100;
            //         $number = floor($no % $divider);
            //         $no = floor($no / $divider);
            //         $i += $divider == 10 ? 1 : 2;
            //         if ($number) {
            //             $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            //             $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            //             $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
            //         } else $str[] = null;
            //     }
            //     $Rupees = implode('', array_reverse($str));
            //     $paise = ($decimal) ? "and " . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
            //     return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise .' Only.';
            // }
?>  
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="card" >
            <div class="card-body" id='divToPrint'>
            <div class="row">
            <div class="col-1"><a href="javascript:void()"><img src="<?=base_url()?>assets/images/benfed.png" alt="logo"/></a></div>
            <div class="col-10">
                <div style="text-align:center;">
                <h3>WEST BENGAL STATE CONSUMERS' CO-OPERATIVE FEDERATION LTD.</h3>
                <h4>Southend Conclave, 3rd Floor, 1582, Rajdanga Main Rd, Kasba, Kolkata-700073</h4>
                <h4>Pay Slip for <?php echo MONTHS[$this->input->post('sal_month')].'-'.$this->input->post('year');?></h4>
                <h4><?php echo $payslip_dtls->emp_name; ?></h4>
                </div> 
            </div>    
            </div>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                      <tr>
                            <th class="noborder" width="25%"></th>
                            <th class="noborder" width="1%"></th>
                            <th class="noborder" width="25%"></th>
                            <th class="noborder" width="1%"></th>
                            <th class="noborder" width="30%"></th>
                            <th class="noborder" width="1%"></th>
                            <th class="noborder" width="20%"></th>
                            <th class="noborder" width="20%"></th>
                        </tr>
                      </thead>
                      <tbody>
                     
                      <tr>
                        <td>Employee Name</td>
                        <td class="left_algn">:</td>
                        <td class="left_algn"><?php echo $payslip_dtls->emp_name; ?></td>
                        <td></td>
                        <td >Employee Code
                        <!-- <td></td> -->
                        <td class="left_algn">:</td>
                        <td><?php echo $payslip_dtls->emp_no; ?></td>
                      </tr>
                      <tr>
                        <td>Date of Joining</td>
                        <td class="left_algn">:</td>
                        <td class="left_algn"><?php if(($emp_dtls->join_dt != "0000-00-00") && ($emp_dtls->join_dt != NULL)){ echo date('d-m-Y', strtotime($emp_dtls->join_dt)); } ?></td>
                        <td></td>
                        <td >Date of Retirement
                        <!-- <td></td> -->
                        <td class="left_algn">:</td>
                        <td><?php if(($emp_dtls->ret_dt != "0000-00-00") && ($emp_dtls->ret_dt != NULL)){ echo date('d-m-Y', strtotime($emp_dtls->ret_dt)); } ?></td>
                      </tr>
                      <tr>
                        <td>Phone Number</td>
                            <td class="left_algn">:</td>
                            <td class="left_algn"><?php echo $payslip_dtls->phn_no; ?></td>
                            <td></td>
                            <td>Designation</td>
                            <td class="left_algn">:</td>
                            <td><?php echo $payslip_dtls->designation; ?></td>

                        </tr>
                        <tr>
                        <td>Department</td>
                            <td class="left_algn">:</td>
                            <td class="left_algn"><?php echo $payslip_dtls->department; ?></td>
                            <td></td>
                            <td>Pan No</td>
                            <td class="left_algn">:</td>
                            <td><?php echo $payslip_dtls->pan_no; ?></td>

                        </tr>
                      
                      </tbody>
                    </table>
                    <br>
                    <table class="width" cellpadding="6" style="width:100%; ">

                        <thead>

                            <tr class="t2">
                                <th width="30%">Earnings</th>
                                <th width="20%">Amount</th>
                                <th width="30%">Deductions</th>
                                <th width="20%">Amount</th>
                               
                            </tr>

                        </thead>

                        <tbody> 

                            <tr class="t2">
                                <!-- <td class="left_algn">Basic Salary<br>(Band Pay + Grade pay)</td> -->
                                <td class="left_algn">Basic Salary</td>
                                <td class="right_algn"><?php echo $payslip_dtls->basic_pay; ?></td>
                                
                                <td class="left_algn">Professional Tax</td>
                                <td class="right_algn"><?php echo $payslip_dtls->ptax; ?></td>
                                
                            </tr>
                            <tr class="t2">
                                
                                <td class="left_algn">Dearness Allowance</td>
                                <td class="right_algn"><?php echo $payslip_dtls->da_amt; ?></td>
                                <td class="left_algn">Income Tax</td>
                                <td class="right_algn"><?php echo $payslip_dtls->itax; ?></td>

                            </tr>
                            <tr class="t2">
                               
                                <!-- <td class="left_algn">Grade Pay</td>
                                <td class="right_algn"><?php echo $payslip_dtls->grade_pay; ?></td> -->
                                <td class="left_algn">H.R.A.</td>
                                <td class="right_algn"><?php echo $payslip_dtls->hra_amt; ?></td>
                               
                                <td class="left_algn">Medical Insuarance</td>
                                <td class="right_algn"><?php echo $payslip_dtls->med_ins; ?></td>
                            </tr>

                            <tr class="t2">
                            
                                <td class="left_algn">Medical Allowance</td>
                                <td class="right_algn"><?php echo $payslip_dtls->med_allow; ?></td>
                                <td class="left_algn">Insuarance</td>
                                <td class="right_algn"><?php echo $payslip_dtls->insuarance; ?></td>
                            </tr>

                            <tr class="t2">
                                <!-- <td class="left_algn">Insuarance.</td>
                                <td class="right_algn"><?php echo $payslip_dtls->insuarance; ?></td> -->
                                <!-- <td class="left_algn">ccs</td>
                                <td class="right_algn"><?php echo $payslip_dtls->ccs; ?></td> -->
                            </tr>

                            <tr class="t2">
                            
                                <td class="left_algn">Other Allowance</td> 
                                <td class="right_algn"><?php echo $payslip_dtls->othr_allow; ?></td> 
                                <td class="left_algn">CCS</td>
                                <td class="right_algn"><?php echo $payslip_dtls->ccs; ?></td>

                            </tr>

                            <tr class="t2">
                            <td class="left_algn"></td>
                                <td class="right_algn"></td>
                                <td class="left_algn">HBL</td>
                                <td class="right_algn"><?php echo $payslip_dtls->hbl; ?></td>
                            </tr>

                            <tr class="t2"> 
                            <td class="left_algn"></td>
                                <td class="right_algn"></td>
                               
                                <td class="left_algn">Telephone</td> 
                               <td class="right_algn"><?php echo $payslip_dtls->telephone; ?></td>

                         </tr>
                         <tr class="t2"> 
                                <!-- <td class="left_algn">Cash Allowance</td> -->
                                <!-- <td class="right_algn"><?php echo $payslip_dtls->cash_allow; ?></td> -->
                                <td></td>
                                <td></td>
                                <td class="left_algn">Medical Advance</td> 
                               <td class="right_algn"><?php echo $payslip_dtls->med_adv; ?></td>

                         </tr>
                            <tr class="t2">
                                <td class="left_algn"></td>
                                <td class="right_algn"></td>
                                <td class="left_algn">Festival Advance</td>
                                <td class="right_algn"><?php echo $payslip_dtls->festival_adv; ?></td>

                            </tr>
                            <tr class="t2">
                                <td class="left_algn"></td>
                                <td class="right_algn"></td>
                                <td class="left_algn">TF</td>
                                <td class="right_algn"><?php echo $payslip_dtls->tf; ?></td>

                            </tr>
                            <tr class="t2">
                                <td class="left_algn"></td>
                                <td class="right_algn"></td>
                                <td class="left_algn">GPF</td>
                                <td class="right_algn"><?php echo $payslip_dtls->gpf; ?></td>

                            </tr>
                            <tr class="t2">
                                <td class="left_algn"></td>
                                <td class="right_algn"></td>
                                <td class="left_algn">EPF</td>
                                <td class="right_algn"><?php echo $payslip_dtls->epf; ?></td>

                            </tr>
                            <tr class="t2">
                                <td class="left_algn"></td>
                                <td class="right_algn"></td>
                                <td class="left_algn">Other Deduction</td>
                                <td class="right_algn"><?php echo $payslip_dtls->other_deduction; ?></td>

                            </tr>
                            
                            <tr class="t2">

                                <td class="left_algn"><b>Total Earnings</b></td>
                                <td class="right_algn"><b><?php  $tot_er = $payslip_dtls->basic_pay + 
                                                                //  $payslip_dtls->grade_pay +
                                                                $payslip_dtls->da_amt + 
                                                                // $payslip_dtls->ir +
                                                                $payslip_dtls->hra_amt +
                                                                $payslip_dtls->med_allow 
                                                                ; echo $tot_er; ?>
                                                               </b> </td>
                                <td class="left_algn"><b>Total Deductions</b></td>
                                <td class="right_algn"><b><?php $tot_dd = $payslip_dtls->ptax + 
                                                                // $payslip_dtls->pf + 
                                                                $payslip_dtls->itax + 
                                                                $payslip_dtls->gpf +
                                                                $payslip_dtls->festival_adv +
                                                                $payslip_dtls->epf +
                                                                $payslip_dtls->hbl +
                                                                $payslip_dtls->insuarance+
                                                                $payslip_dtls->ccs+
                                                                $payslip_dtls->med_allow+
																$payslip_dtls->	med_ins+
                                                                $payslip_dtls->other_deduction+
                                                                $payslip_dtls->tf+
                                                                $payslip_dtls->telephone;  echo $tot_dd;?></td></td>

                            </tr>
                          
                            <tr class="t2">

                                <td class="left_algn"></td>
                                <td class="right_algn"></td>
                                <td class="left_algn">Net Amount</td>
                                <td class="right_algn"><?php echo $tot_er - $tot_dd; ?></td>

                            </tr>

                        </tbody>

                    </table>
                    <div>
                       <p style="display: inline;">Amount (<small>in words</small>):
                       <b>   <?php echo getIndianCurrency($tot_er - $tot_dd);?></p></b>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <input type='button' id='btn' value='Print' onclick='printDiv();'>
          </div>
          
        </div>


<?php
    }

    else if($_SERVER['REQUEST_METHOD'] == 'GET') {

?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h3>Payslip Report</h3>
              <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                        <form method="POST" id="form" action="<?php echo site_url("reports/payslipreport");?>" >
                            <div class="form-group">
                                <div class="row">
                                  
                                    <div class="col-4">
                                        <label for="exampleInputName1">Month:</label>
                                        <select class="form-control" name="sal_month"
                                        id="sal_month" >
                                        <option value="">Select Month</option>
                                        <?php foreach($month_list as $m_list) {?>
                                            <option value="<?php echo $m_list->id ?>" ><?php echo $m_list->month_name; ?></option>

                                        <?php
                                        }
                                        ?>
                                        </select> 
                                    </div>
                                    <div class="col-4">
                                        <label for="exampleInputName1">Input Year:</label>
                                        <input type="text" class="form-control" name="year" id="year"
                                        value="<?php echo date('Y');?>"/>
                                    </div>
                                    <div class="col-4">
                                `      <label for="exampleInputName1">Emplyee Name:</label>
                                        <select class="form-control required" name="emp_cd" id="emp_cd">
                                        <option value="">Select Employee</option>
                                        <?php  

                                            if($emp_list) {
                                            foreach ($emp_list as $e_list) {
                                        ?>        
                                            <option value='<?php echo $e_list->emp_code ?>'>
                                            <?php echo $e_list->emp_name; ?></option>
                                        <?php
                                                    }
                                                }    ?>
                                        </select>
                                    </div>`
                                </div>
                            </div>
                            
                    <input type="submit" class="btn btn-info" value="Proceed" />
                            <button class="btn btn-light">Cancel</button>
                        </form>
                        </div>
                    </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <?php

}
else {

    echo "<h1 style='text-align: center;'>No Data Found</h1>";

}

?>
      
