<script>
  function printDiv() {

        var divToPrint = document.getElementById('divToPrint');
        var WindowObject = window.open('', 'Print-Window');
        WindowObject.document.open();
        WindowObject.document.writeln('<!DOCTYPE html>');
        WindowObject.document.writeln('<html><head><title></title><style type="text/css">');
        WindowObject.document.writeln('@media print { .center { text-align: center;}' +
            '                                         .inline { display: inline; }' +
            '                                         .underline { text-decoration: underline; }' +
            '                                         .left { margin-left: 315px;} ' +
            '                                         .right { margin-right: 375px; display: inline; }' +
            '                                          table { border-collapse: collapse; }' +
            '                                          th, td { border: 1px solid black; border-collapse: collapse; padding: 10px;}' +
            '                                           th, td { }' +
            '                                         .border { border: 1px solid black; } ' +
            '                                         .bottom { bottom: 5px; width: 100%; position: fixed ' +
            '                                       ' +
            '                                   } } </style>');
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
    if($_SERVER['REQUEST_METHOD'] == "POST" ) {
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
          <div class="card">
            <div class="card-body" id='divToPrint'>
            <div class="row">
            <div class="col-1"><a href="javascript:void()"><img src="<?=base_url()?>assets/images/benfed.png" alt="logo"/></a></div>
            <div class="col-10">
                <div style="text-align:center;">
                    <h3>THE WEST BENGAL STATE CO.OP.MARKETING FEDERATION LTD.</h3>
                    <h4>Southend Conclave, 3rd Floor, 1582, Rajdanga Main Rd, Kasba, Kolkata-700073</h4>
                    <h4>Salary summary report for the month of <?php echo MONTHS[$this->input->post('sal_month')].' '.$this->input->post('year'); ?></h4>
                </div>
            </div>    
            </div>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                    <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th>Name</th>
                            <th>Account No</th>
                            <th>Net Amount</th>
                        </tr>
</thead>
<tbody> 

<?php 
    
if($statement) {

    $i  =   1;

    $tot_net = 0;
        
    foreach($statement as $s_list) {

        $tot_net += $s_list->net_amount;

    ?>

        <tr>

            <td><?php echo $i++; ?></td>

            <td><?php echo $s_list->emp_name; ?></td>

            <td style="text-align: center;"><?php echo $s_list->bank_ac_no; ?></td>
            
            <td style="text-align: right;"><?php echo $s_list->net_amount; ?></td>

        </tr>

<?php
            
        }

?>


        <tr>

            <td colspan="3">Total Amount</td>

            <td style="text-align: right;"> Rs. <?php echo $tot_net; ?></td>

        </tr>

<?php        
        
    }

    else {

        echo "<tr><td colspan='4' style='text-align:center;'>No Data Found</td></tr>";
    }
?>

</tbody>
                    </table>
                    <br>
                    <div>

                       <p>Amount: <?php echo @$tot_net.' ('.getIndianCurrency(@$tot_net).').';?></p> 

                    </div>
                    
                    <div  class="bottom">
                        
                        <p style="display: inline;">Prepared By</p>

                        <p style="display: inline; margin-left: 8%;"></p>

                        <p style="display: inline; margin-left: 8%;"></p>

                        <p style="display: inline; margin-left: 8%;">Chief Executive officer</p>

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
              <h3>Salary Statement Report</h3>
              <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                        <form method="POST" id="form" action="<?php echo site_url("reports/paystatementreport");?>" >
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                    <label for="exampleInputName1">From Date:</label>
                                    <input type="date"
                                name="from_date"
                                class="form-control required"
                                id="from_date"
                                value="<?php echo $this->session->userdata('sys_date');?>"
                             />
                                    </div>
                                    <div class="col-6">
                                    <label for="exampleInputName1">Select Month:</label>
                                    <select class="form-control" name="sal_month" id="sal_month" >
                                <option value="">Select Month</option>
                                <?php foreach($month_list as $m_list) {?>

                                    <option value="<?php echo $m_list->id ?>" ><?php echo $m_list->month_name; ?></option>

                                <?php
                                }
                                ?>

                            </select>   

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                    <label for="exampleInputName1">Input Year:</label>
                                     <input type="text" class="form-control" name="year" id="year"
                                     value="<?php echo date('Y');?>" />
                  </div>
                    <div class="col-6">
                        <label for="exampleInputName1">Category:</label>
                        <select class="form-control required" name="category" id="category">

                            <option value="">Select Category</option>

                            <?php foreach($category as $c_list) {?>

                                <option value="<?php echo $c_list->category_code; ?>" ><?php echo $c_list->category_type; ?></option>

                            <?php
                            }
                            ?>

                        </select>  
                        </div>
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
      
