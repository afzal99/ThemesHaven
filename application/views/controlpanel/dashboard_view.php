<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title; ?></title>
	<meta name="description" content="">
	<meta name="keywords" content="">
    <link rel="icon" type="image/png" href="<?php echo site_url(); ?>site_elements/ico.png"/>
	<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>site_elements/control panel/dashboard_view_style.css"/>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/control panel/loader.css"/>
    <script src="<?php echo site_url(); ?>site_elements/js/loader.js"></script>
	<script src="<?php echo site_url(); ?>site_elements/js/bootstrap.min.js"></script>
	<script src="<?php echo site_url(); ?>site_elements/jquery/jquery-1.11.3.min.js"></script>

</head>
<body>
    <div class="se-pre-con"></div>
	<div class="" id="c_main">
    	<div  id="contents">

    		<div class="block_">
    				<h4>Total Sales<br/>
                    0</h4> 
    		</div>
    		<div class="block_">
    				<h4>Number of Products<br/>
                    <?php echo $product; ?></h4> 
    		</div>
    		<div class="block_">
    				<h4>Registered Users<br/>
                    <?php echo $customer; ?></h4> 
    		</div>

    	 </div>
         <div id="pending_list">
            <h3>Waiting for approval  <a class="btn btn-default" href="<?php echo site_url('controlpanel/products/pendings'); ?>">See all</a></h3>
            <table class="table .table-striped .table-condensed table-hover">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <?php
                            foreach ($pending_products as $key) {
                                echo '<td>'.$key['title'].'</td>';
                                foreach ($ca as $ca) {
                                    if($key['category_id'] == $ca['id'])
                                    {
                                        echo '<td>'.$ca['name'].'</td>';
                                    }
                                }
                                foreach ($cus as $cus) {
                                    if($key['author_id'] == $cus['id'])
                                    {
                                        echo '<td>'.$cus['username'].'</td>';
                                    }
                                }
                                echo '<td>'.$key['date_added'].'</td>';
                                echo '<td>[ <a href="'.site_url().'controlpanel/products/pendingview/'.$key['product_id'].'">View</a> ]</td>';
                            }
                         ?>
                    </tr>
                </tbody>
            </table>
            <?php if($w_rows =="0") echo '<span class="text-info">The List Is Empty !</span>';?>
        </div>

        <div id="pending_list">
            <h3>Recent Sales <a class="btn btn-default pull-rignt" href="../sales">See all</a></h3>
            <table class="table .table-striped .table-condensed table-hover">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Buyer</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <?php
                            foreach ($sales as $sales) {
                                echo '<td>'.$sales['product_name'].'</td>';
                                foreach ($category as $category) {
                                    if($sales['category_id'] == $category['id'])
                                    {
                                        echo '<td>'.$category['name'].'</td>';
                                    }
                                }
                                echo '<td>'.$sales['customer_un'].'</td>';
                                echo '<td>'.$sales['date'].'</td>';
                                echo '<td></td>';
                            }
                         ?>
                    </tr>
                </tbody>
            </table>
             <?php if($s_rows =="0") echo '<span class="text-info">The List Is Empty !</span>';?>
         </div>


    </div>

</body>
</html>