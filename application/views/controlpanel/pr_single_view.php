<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Categories</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>site_elements/control panel/pr_single_style.css"/>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/css/bootstrap.min.css"/>
	<script src="<?php echo site_url(); ?>site_elements/jquery/jquery-1.11.3.min.js"></script>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/css/bootstrap-multiselect.css" type="text/css"/>
	<script type="text/javascript" src="<?php echo site_url(); ?>site_elements/js/bootstrap-multiselect.js"></script>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/control panel/loader.css"/>
	<script src="<?php echo site_url(); ?>site_elements/js/loader.js"></script>
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
	<div class="" id="prs_main">
	<?php foreach ($product as $key) {  ?>

		<?php 
	 		 if($this->session->flashdata('message')){echo '<span class=" text-danger col-md-10">'. $this->session->flashdata('message').'</span>' ;}
	 		 else if($this->session->flashdata('msg')){echo  $this->session->flashdata('msg') ;}

          ?>
		<form name="product_form" id="multiselectForm" role="form" autocomplete="off"  class="form-horizontal"  action="<?php echo site_url('controlpanel/products/update'); ?>" enctype="multipart/form-data" method="post">
			  	<div class="form-group">
				    <label class="control-label col-md-3">Product Title: <span style="color:red;margin-left:5px;">*</span></label>
				    <div class="col-sm-7">
				      	<input type="text" class="form-control" placeholder="Title" value="<?php echo $key['title']; ?>" name="prTitle"/>
				    	<input type="hidden" name="pr_id" value="<?php echo $key['product_id'] ?>" />
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label class="control-label col-md-3">Category: <span style="color:red;margin-left:5px;">*</span></label>
				    <div class="col-sm-7">
				      <select class="form-control" name="caId">
				      		<option value="<?php echo $ca_id; ?>"> <?php echo $ca_name; ?></option>
				      		<?php
				      			if(isset($categories)){
				      				foreach ($categories as $ca) {
				      					echo '<option value="'.$ca['id'].'">'.$ca['name'].'</option>';
				      				}
				      			}
				      		?>
				      </select>
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label class="control-label col-md-3">Item Tag: <span style="color:red;margin-left:5px;">*</span></label>
				    <div class="col-sm-7" style="padding-left:15px">
				     	<select class="multiselect" multiple="multiple" name="tag[]">
							<?php
				      			if(isset($tags)){
				      				foreach ($tags as $tag) {
				      					for ($i=0; $i < sizeof($tag_ids); $i++)
				      					{
				      						$c='0';
				      						if($tag['id']==$tag_ids[$i])
				      						{
				      							echo '<option selected value="'.$tag['id'].'">'.$tag['name'].'</option>';
				      							$c='1';
				      							break;
				      						}
				      					}
				      					if($c=='0')echo '<option value="'.$tag['id'].'">'.$tag['name'].'</option>';
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
						  <label><input type="radio" id="radiofree" value="Free" <?php if($key['price']=="Free"){ ?>checked <?php } ?> name="prPrice">Free</label>
						</div>
						<div class="radio col-md-1">
						  <label><input type="radio" id="radiopaid" <?php if($key['price']!="Free"){ ?>checked <?php } ?> name="prPrice">Paid</label>
						</div>
						<div class="col-md-9">
				     	 	<input id="paidinput" type="text" style="margin-left:20px; width:360px" class="form-control" <?php if($key['price']!="Free"){ ?> value="<?php echo $key['price']; ?>"  <?php } ?> placeholder="Price" name="prPrice"/>
				      	</div>
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label class="control-label col-md-3">Future Updates:<span style="color:red;margin-left:5px;"></span></label>
				    <div class="col-sm-7">
				      <select class="form-control" name="future_updates">
				      		<?php if ($key['free_future_updates']=='1'){ ?>
					      			<option value="1"> Free</option>
					      			<option value="0"> Paid</option>
				      			<?php 
				      			}
				      			else
				      			{ ?>
				      				<option value="0"> Paid</option>
				      				<option value="1"> Free</option>
				      			<?php }

				      			 ?>
				      		
				      		
				      </select>
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label class="control-label col-md-3">Layout:<span style="color:red;margin-left:5px;"></span></label>
				    <div class="col-sm-7">
				      <select class="form-control" name="layout">
				      		<?php if ($key['layout']=='Responsive'){ ?>
					      			<option value="Responsive"> Responsive</option>
				      				<option value="Fluid"> Fluid</option>
				      			<?php 
				      			}
				      			else
				      			{ ?>
				      				<option value="Fluid"> Fluid</option>
				      				<option value="Responsive"> Responsive</option>
				      			<?php }

				      			 ?>
				      </select>
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label class="control-label col-md-3">High Resolution:<span style="color:red;margin-left:5px;"></span></label>
				    <div class="col-sm-7">
				      <select class="form-control" name="h_resolution">
				      		<?php if ($key['high_resolution']=='Yes'){ ?>
					      			<option value="Yes"> Yes</option>
				      				<option value="No"> No</option>
				      			<?php 
				      			}
				      			else
				      			{ ?>
				      				<option value="No"> No</option>
				      				<option value="Yes"> Yes</option>
				      			<?php }

				      			 ?>
				      </select>
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label class="control-label col-md-3">Bootstrap Version:<span style="color:red;margin-left:5px;"></span></label>
				    <div class="col-sm-7">
				      <select class="form-control" name="b_version">
				      		<?php if ($key['bootstrap_version']=='Bootstrap 3.x'){ ?>
					      			<option value="Bootstrap 3.x"> Bootstrap 3.x</option>
						      		<option value="Bootstrap 2.x"> Bootstrap 2.x</option>
						      		<option value="Bootstrap 1.x"> Bootstrap 1.x</option>
				      			<?php 
				      			}
				      			else if($key['bootstrap_version']=='Bootstrap 2.x')
				      			{ ?>
						      		<option value="Bootstrap 2.x"> Bootstrap 2.x</option>
				      				<option value="Bootstrap 3.x"> Bootstrap 3.x</option>
						      		<option value="Bootstrap 1.x"> Bootstrap 1.x</option>
				      			<?php }
				      			else{ ?>
						      		<option value="Bootstrap 1.x"> Bootstrap 1.x</option>
						      		<option value="Bootstrap 2.x"> Bootstrap 2.x</option>
				      				<option value="Bootstrap 3.x"> Bootstrap 3.x</option>
				      			<?php }

				      			 ?>
				      </select>
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label class="control-label col-md-3">Browser:<span style="color:red;margin-left:5px;">*</span></label>
				        <div class="form-group">
					        <div class="col-sm-7" style="padding-left:15px">
					            <select class="multiselect" multiple="multiple" name="c_browser[]">
					                <option selected value="Google Chrome">Google Chrome</option>
					                <option selected value="Firefox">Firefox</option>
					                <option value="IE10">IE10</option>
					                <option value="Safari">Safari</option>
					                <option selected value="Opera">Opera</option>
					                <option value="Other">Other</option>
					            </select>
					        </div>
					    </div>
			  	</div>
			  	<div class="form-group">
				    <label class="control-label col-md-3">Live Preview Url:<span style="color:red;margin-left:5px;">*</span></label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" value="<?php echo $key['preview_link'] ?>" placeholder="http://" name="demourl"/>
				    </div>
			  	</div>
			  	<div class="form-group">

				    <label class="control-label col-md-3">Description:<span style="color:red;margin-left:5px;">*</span></label>
				    <div class="col-sm-7">

				    <textarea  name="des" > <?php echo $key['description']; ?></textarea>
				     
				      <script>
                                CKEDITOR.replace('des');
                     </script> 

				    </div>
			  	</div>
			  	<div class="form-group">
				    <label class="control-label col-md-3">Thumbnail:<span style="color:red;margin-left:5px;">*</span></label>
				    <div class="col-sm-7">
				    	<img width="200px" src="<?php echo site_url().'site_elements/image/'.$key['image'] ?>"/>
				        <img id="output"/>
				        <input type="file" onchange="loadFile(event)" name="image">
				    </div>
				    

			  	</div>
			  	<div id="form_buttons">
				  	<button class="btn-success submit" type="submit" name="prosubmit">SUBMIT </button>
				  	<button class="btn-primary" type="reset">Reset</button>
				</div>


		</form>
	<?php } ?>



	</div>
</body>
	<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>


</html>