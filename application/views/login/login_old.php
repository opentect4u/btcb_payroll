<div class="innerPage">
	<div class="wrapper">
		
		
		
        <div class="col-sm-12">
			<div class="loginBox">
            <?php echo form_open('login'); ?>
            <?= strlen($this->session->flashdata('msg')) > 0 ? $this->session->flashdata('msg') : ''; ?>
				
				<div class="loginWraper">
	<div class="col-sm-12">
		<h1><?= $header; ?></h1>
	<div class="form-group">
    <label class="inputWraper"><i class="fa fa-envelope-o" aria-hidden="true"></i>
<input type="email" class="form-control" name="email" id="email" placeholder="Your Email id" autocomplete="off" required></label>
  </div>
		<div class="form-group">
    <label class="inputWraper"><i class="fa fa-lock" aria-hidden="true"></i>
<input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off" require></label>
  </div>

<div class="captureMain">
        <div class="captureCode"><?php if (isset($image)) echo $image; ?> <a class="refreshCapBtn" href="javascript:void(0);" title="Refresh Captcha Access code">
                                    <i class="fa fa-refresh"> </i></a></div>
	
		
		<div class="captureInput">
    <label class="inputWraper">
    <input type="text" class="capField" name="captcha" id="captcha" placeholder="Captcha" autocomplete="off" required></label>
    </div></div>
		
<div class="form-group">
    

	<button type="submit" id="submit" class="btn btnRed widthFull">Login</button>
  </div>
		
	
	</div>
	</div>
				
				
				
            <?php /*?><div class="card-header"><?= $header; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <div class="col-md-3 fieldTitle"><label for="email">Email id</label></div>
                            <div class="col-md-3 fieldTitle">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email id" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <div class="col-md-3 fieldTitle"><label for="password">Password</label></div>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off" require>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <div class="col-md-3 fieldTitle"><label></label></div>
                            <div class="col-md-2">
                                <span id="image" ><?php if (isset($image)) echo $image; ?> </span>	
                            </div>
                            <div class="col-md-2 pull-right">
                                <a class="loadCaptcha btn bg-blue-grey btn-circle waves-effect waves-circle waves-float mt-2" href="javascript:void(0);" title="Refresh Captcha Access code">
                                    <i class="fa fa-refresh"> </i> Refresh</a>
                                <!--<i class="fa fa-refresh" style="color: #fff;font-size:24px;"></i>-->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <div class="col-md-3 fieldTitle"><label for="captcha">Captcha<span class="text-danger">*</span></label></div>
                            <div class="col-md-6">
								<div class="captureWidth">
                                <input type="text" class="form-control" name="captcha" id="captcha" placeholder="Captcha" autocomplete="off" required>
								</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <div class="col-md-3 fieldTitle"><label></label></div>
                            <div class="col-md-9">
                                <button type="submit" id="submit" class="submitCustom">Login</button>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div><?php */?>
				<?php echo form_close(); ?>
			</div>
        </div>
    </div>
	  </div>

<script>
    $(document).ready(function () {
        $('.refreshCapBtn').on('click', function () {
            $.get('<?php echo site_url("login/captcha_refresh"); ?>', function (data) {
            $('#image').html(data);
            });
        });
    });
</script>