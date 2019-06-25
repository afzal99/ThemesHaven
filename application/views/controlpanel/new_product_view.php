<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Product New</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/control panel/loader.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>site_elements/control panel/new_product.css"/>
	<!-- Bootstrap and jQuery: -->
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/css/bootstrap.min.css"/>
	<script src="<?php echo site_url(); ?>site_elements/jquery/jquery-1.11.3.min.js"></script>
	<!-- plugin's CSS and JS: -->
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/css/bootstrap-multiselect.css" type="text/css"/>
	<script type="text/javascript" src="<?php echo site_url(); ?>site_elements/js/bootstrap-multiselect.js"></script>
	<script src="<?php echo site_url(); ?>site_elements/js/loader.js"></script>
	<!-- ckEditor: -->
	<script type="text/javascript" src="<?php echo site_url(); ?>site_elements/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="<?php echo site_url(); ?>site_elements/ckfinder/ckfinder.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('.multiselect').multiselect();

			
			$("#paidinput").prop('disabled', true);

			$("#radiopaid").on("click", function () {
	            $("#paidinput").prop('disabled', false);
	        });
	        $("#radiofree").on("click", function () {
	            $("#paidinput").prop('disabled', true);
	        });

			


		   });
	</script>



</head>

<body>
	<div class="se-pre-con"></div>
	<div class="" id="nw_main">
		<div class="col-md-12" id="nw_contents">
		<div class="col-md-12"style="margin-left:20%"><?php 
	 		 if($this->session->flashdata('message')){echo '<span class=" text-danger col-md-10">'. $this->session->flashdata('message').'</span>' ;}
	 		 else if($this->session->flashdata('msg')){echo  $this->session->flashdata('msg') ;}

          ?>
          </div>
			<h4> Add a new product </h4>

<form name="product_form" id="multiselectForm" role="form" autocomplete="off"  class="form-horizontal"  action="<?php echo site_url('controlpanel/products/f_addpr'); ?>" enctype="multipart/form-data" method="post">
			  	<div class="form-group">
				    <label class="control-label col-md-3">Product Title: <span style="color:red;margin-left:5px;">*</span></label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" placeholder="Title" name="prTitle"/>
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label class="control-label col-md-3">Category: <span style="color:red;margin-left:5px;">*</span></label>
				    <div class="col-sm-7">
				      <select class="form-control" name="caId">
				      		<option> Select Category</option>
				      		<?php
				      			if(isset($categories)){
				      				foreach ($categories as $key) {
				      					echo '<option value="'.$key['id'].'">'.$key['name'].'</option>';
				      				}
				      			}
				      		?>
				      </select>
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label class="control-label col-md-3">Item Tag: <span style="color:red;margin-left:5px;">*</span></label>
				    <div class="col-sm-7" style="padding-left:4px">
				     	<select class="multiselect" multiple="multiple" name="tag[]">
							<?php
				      			if(isset($tags)){
				      				foreach ($tags as $key) {
				      					echo '<option value="'.$key['id'].'">'.$key['name'].'</option>';
				      				}
				      			}
				      		?>
						</select>

				    </div>
			  	</div>
			  	<div class="form-group">
				    <label class="control-label col-md-3">Price: <span style="color:red;margin-left:5px;">*</span></label>
				    <div style="padding-left:0px;"  class="col-sm-9">
					    <div class="radio col-md-12">
						  <label><input type="radio" id="radiofree" value="Free" name="prPrice">Free</label>
						</div>
						<div class="radio col-md-1">
						  <label><input type="radio" id="radiopaid" name="prPrice">Paid</label>
						</div>
						<div class="col-md-9">
				     	 <input id="paidinput" type="text" style="margin-left:20px; width:360px" class="form-control" placeholder="Price" name="prPrice"/>
				      	</div>
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label class="control-label col-md-3">Future Updates:<span style="color:red;margin-left:5px;"></span></label>
				    <div class="col-sm-7">
				      <select class="form-control" name="future_updates">
				      		<option> Select One</option>
				      		<option value="0"> Paid</option>
				      		<option value="1"> Free</option>
				      </select>
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label class="control-label col-md-3">Layout:<span style="color:red;margin-left:5px;"></span></label>
				    <div class="col-sm-7">
				      <select class="form-control" name="layout">
				      		<option> Select Layout</option>
				      		<option value="Responsive"> Responsive</option>
				      		<option value="Fluid"> Fluid</option>
				      </select>
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label class="control-label col-md-3">High Resolution:<span style="color:red;margin-left:5px;"></span></label>
				    <div class="col-sm-7">
				      <select class="form-control" name="h_resolution">
				      		<option> Select One</option>
				      		<option value="Yes"> Yes</option>
				      		<option value="No"> No</option>
				      </select>
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label class="control-label col-md-3">Bootstrap Version:<span style="color:red;margin-left:5px;"></span></label>
				    <div class="col-sm-7">
				      <select class="form-control" name="b_version">
				      		<option>Select Version</option>
				      		<option value="Bootstrap 3.x"> Bootstrap 3.x</option>
				      		<option value="Bootstrap 2.x"> Bootstrap 2.x</option>
				      		<option value="Bootstrap 1.x"> Bootstrap 1.x</option>
				      </select>
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label class="control-label col-md-3">Browser:<span style="color:red;margin-left:5px;">*</span></label>
				        <div class="form-group">
					        <div class="col-sm-7" style="padding-left:4px">
					            <select class="multiselect" multiple="multiple" name="c_browser[]">
					                <option value="Google Chrome">Google Chrome</option>
					                <option value="Firefox">Firefox</option>
					                <option value="IE10">IE10</option>
					                <option value="Safari">Safari</option>
					                <option value="Opera">Opera</option>
					                <option value="Other">Other</option>
					            </select>
					        </div>
					    </div>
			  	</div>
			  	<div class="form-group">
				    <label class="control-label col-md-3">Live Preview Url:<span style="color:red;margin-left:5px;">*</span></label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" placeholder="http://" name="demourl"/>
				    </div>
			  	</div>
			  	<div class="form-group">

				    <label class="control-label col-md-3">Description:<span style="color:red;margin-left:5px;">*</span></label>
				    <div class="col-sm-7">

				    <textarea  name="des" > </textarea>
				     
				      <script>
                                CKEDITOR.replace('des');
                     </script> 

				    </div>
			  	</div>
			  	<div class="form-group">
				    <label class="control-label col-md-3">Main File:<span style="color:red;margin-left:5px;">*</span></label>
				    <div class="col-sm-7">
				      <input type="file" name="mainfile">
                      <span class="text-muted">Upload theme file which will get buyer.<br/>Only .zip file format is allowed.</span>
					</div>
				    <img id="output"/>

			  	</div>
			  	<div class="form-group">
				    <label class="control-label col-md-3">Thumbnail:<span style="color:red;margin-left:5px;">*</span></label>
				    <div class="col-sm-7">
				      <input type="file" name="image">
                      <span class="text-muted">Upload a thumbnail of template screenshot. Only PNG file format is allowed.<br/>The image resolution should be exact 850X660 PX.</span>
					</div>

			  	</div>
			  	<div id="form_buttons">
				  	<button class="btn-success submit" type="submit" name="prosubmit">SUBMIT </button>
				  	<button class="btn-primary" type="reset">Reset</button>
				</div>





			</form>
		</div>
	</div>
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>



</body>
</html>