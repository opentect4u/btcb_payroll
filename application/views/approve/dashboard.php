<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
            <div class="row" style="margin-bottom:10px">
                <div class="col-10"> <h3>Salary Approve</h3></div>
                <div class="col-2"></div>
                <span class="confirm-div" style="float:right; color:green;"></span>
            </div>    
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                      <tr>
                      <th>Date</th>
                    <th>Category</th>
                    <th>Month</th>
                    <th>Year</th>
                    <!-- <th>Bank</th> -->
                    <th>Total Gross Amount</th>
                    <th>Total Net Amount</th>
                    <th>Option</th>
                       </tr>
                      </thead>
                      <tbody> 

<?php 

if($unapprove_tot_dtls) {

    foreach($unapprove_tot_dtls as $d_dtls) {

        foreach($category as $c_list) {

            if($d_dtls->catg_cd == $c_list->category_code) {


?>

        <tr>

            <td><?php echo date('d-m-Y', strtotime($d_dtls->trans_date)); ?></td>

            <td><?php echo $c_list->category_type; ?></td>

            <td><?php echo $d_dtls->sal_month; ?></td>

            <td><?php echo $d_dtls->sal_year; ?></td>

            <!-- <td><?php 

                    foreach($bank as $b_list) {

                        if($b_list->acc_code == $d_dtls->bank){

                            echo $b_list->bank_name;

                        }

                    }
                ?>
            </td> -->

            <td><?php echo $d_dtls->gross; ?></td>

            <td><?php echo $d_dtls->net_amount; ?></td>

            <td>
            
                <button class="btn btn-success"
                        id="<?php echo $d_dtls->trans_no; ?>"
                        date="<?php echo $d_dtls->trans_date; ?>"
                        catg="<?php echo $d_dtls->catg_cd; ?>"
                        month="<?php echo $d_dtls->sal_month; ?>"
                        year="<?php echo $d_dtls->sal_year; ?>"
                        style="width: 100px;">Approve</button>
                
            </td>

        </tr>

<?php
            }
        
        }

    } 

    }

    else {

        echo "<tr><td colspan='10' style='text-align: center;'>No data Found</td></tr>";

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
        <script>

$(document).ready( function (){

    $('button').click(function () {

        var approval = false,
            id       = $(this).attr('id'),
            date     = $(this).attr('date'),
            catg     = $(this).attr('catg'),
            month    = $(this).attr('month'),
            year     = $(this).attr('year');

        approval     = confirm("Are you sure?");

        if(approval){

            window.location = "<?php echo site_url('approves/payapprove?trans_no="+id+"&trans_date="+date+"&catg_cd="+catg+"&month="+month+"&year="+year+"');?>";
        }
        
    });

});

</script>

<script>

$(document).ready(function() {

$('.confirm-div').hide();

<?php if($this->session->flashdata('msg')){ ?>

$('.confirm-div').html('<?php echo $this->session->flashdata('msg'); ?>').show();

});

<?php } ?>

</script>