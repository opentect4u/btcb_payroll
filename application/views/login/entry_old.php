<?php
// echo $captcha;
// echo $header;
$grades = unserialize(GRADES);
$months = unserialize(MONTHS);
$days = unserialize(DAYS);
$times = unserialize(TIMES);
$timezone = unserialize(TIMEZONE);
$attributes = array('enctype' => 'multipart/form-data');
?>
    <div class="innerPage">
	<div class="wrapper">
		
		<div class="col-sm-12">
			<div class="loginBox">
				<div class="loginWraper">
					<?php echo form_open('login/register', $attributes); ?>
            <?= strlen($this->session->flashdata('msg')) > 0 ? $this->session->flashdata('msg') : ''; ?>
	<div class="col-sm-12">
		<h1><?= $header; ?></h1>
	<div class="form-group">
    <label class="inputWraper"><i class="fa fa-envelope-o" aria-hidden="true"></i>
<input type="text" class="form-control" name="name" placeholder="Your Name" autocomplete="off" required></label>
  </div>
		<div class="form-group">
    <label class="inputWraper"><i class="fa fa-lock" aria-hidden="true"></i>
<input type="email" class="form-control" name="email" id="email" placeholder="Your Email id" autocomplete="off" required></label>
  </div>
		
		
<div class="form-group">
<label class="inputWraper"><i class="fa fa-lock" aria-hidden="true"></i>
<input type="text" class="form-control" name="phone" placeholder="Phone Number With Country Code" autocomplete="off" require></label>
</div>
		
<div class="form-group">
<label class="inputWraper"><i class="fa fa-lock" aria-hidden="true"></i>
<select class="form-control" name="time_zone" id="time_zone" require>
                                    <option>Time Zone</option>
                                    <?php 
                                        foreach($timezone as $k => $v){
                                            echo '<option value="'. $v .'">'. $v .'</option>';
                                        }
                                    ?>
                                </select></label>
</div>
		

<div class="captureMain">
        <div class="captureCode"><?php if (isset($image)) echo $image; ?> 
	<a class="refreshCapBtn" href="javascript:void(0);" title="Refresh Captcha Access code">
                                    <i class="fa fa-refresh"></i></a>
	</div>
	
		
		<div class="captureInput">
    <label class="inputWraper">
    <input type="text" class="form-control" name="captcha" id="captcha" placeholder="Captcha" autocomplete="off" required></label>
    </div></div>
		
<div class="form-group">
    

	<button type="submit" id="submit" class="btn btnRed widthFull">Register Now</button>
  </div>
		
	
	</div>
	<?php echo form_close(); ?>
	</div>
			</div>
		</div>
        <!-- <div class="row">
            <div class="col-md-4">
                <a href="<?= base_url('order/entry'); ?>" class="btn btn-success float-right">Order Now</a>
            </div>
            <div class="col-md-4">
                <a href="<?= base_url('/login'); ?>" class="btn btn-success float-left">Login</a>
            </div>
        </div> -->
        <?php /*?><div class="card">
            <?php echo form_open('index.php/login/register', $attributes); ?>
            <?= strlen($this->session->flashdata('msg')) > 0 ? $this->session->flashdata('msg') : ''; ?>
            <div class="card-header"><?= $header; ?></div>
            <div class="card-body">
                <div class="row">
                    <small><span class="text-danger">* fields are Mandatory</span></small>
                    <div class="col-md-12 mt-3">
                        <div class="form-group row">
                            <div class="col-md-2"><label for="name">Name<span class="text-danger">*</span></label></div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" placeholder="Your Name" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <div class="col-md-2"><label for="email">Email id<span class="text-danger">*</span></label></div>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email id" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <div class="col-md-2"><label for="phone">Phone or Mobile<span class="text-danger">*</span></label></div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="phone" placeholder="Phone Number With Country Code" autocomplete="off" require>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <div class="col-md-2"><label for="time_zone">Time Zone<span class="text-danger">*</span></label></div>
                            <div class="col-md-6">
                                <select class="form-control" name="time_zone" id="time_zone" require>
                                    <option>Time Zone</option>
                                    <?php 
                                        foreach($timezone as $k => $v){
                                            echo '<option value="'. $v .'">'. $v .'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group row">
                            <div class="col-md-2"><label></label></div>
                            <div class="col-md-4">
                                <span id="image" ><?php if (isset($image)) echo $image; ?> </span>	
                            </div>
                            <div class="col-md-2 pull-right">
                                <a class="loadCaptcha btn bg-blue-grey btn-circle waves-effect waves-circle waves-float mt-2" href="javascript:void(0);" title="Refresh Captcha Access code">
                                    <i class="fa fa-refresh">refresh</i></a>
                                <!--<i class="fa fa-refresh" style="color: #fff;font-size:24px;"></i>-->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <div class="col-md-2"><label for="captcha">Captcha<span class="text-danger">*</span></label></div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="captcha" id="captcha" placeholder="Captcha" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <div class="col-md-2"><label></label></div>
                            <div class="col-md-4">
                                <button type="submit" id="submit" class="btn btn-success btn-block">Register Now</button>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
			
			<?php echo form_close(); ?>
        </div><?php */?>
    </div>
	</div>

<script>
    $(document).ready(function () {
        $('.loadCaptcha').on('click', function () {
            $.get('<?php echo site_url("index.php/login/captcha_refresh"); ?>', function (data) {
            $('#image').html(data);
            });
        });
    });
</script>

<script>
    $('#email').on('change', function(){
        $.get('<?php echo site_url("index.php/login/check_email"); ?>', {email: $(this).val()}). done(function (data) {
            // console.log(data);
            if(data > 0){
                $('#submit').removeAttr('disabled');
            }else{
                alert("Email ID Already Exist !!!");
                $('#submit').attr('disabled', 'disabled');
            }
            // $('#image').html(data);
        });
    })
</script>