                     
<div class="container bootstrap snippets bootdey">
  <div class="row">
    <div class="col-md-12">
     	<hr>
      <h1><strong>Hi <?php echo $this->session->userdata('loggedin')['first_name'];?>, Welcome to CodeIgniter Invoice System</strong></h1>
      <hr>
    </div>
  </div>
  <div class="row">
  	<a href="invoice">
	    <div class="col-sm-6">
	      <div class="tile dark-green">
	        <h3 class="title"><span class="fa fa-plus"></span> New Invoice</h3>
	        <p>Use this module to create new invoice</p>
	      </div>
	    </div>
	</a>
	<a href="invoice/invoice_reports">
	    <div class="col-sm-6">
	      <div class="tile dark-green">
	        <h3 class="title"><span class="fa fa-line-chart"></span> Invoice Reports</h3>
	        <p>Use this module to all invoice reports</p>
	      </div>
	    </div>
	</a>
	<a href="products">
	    <div class="col-sm-6">
	      <div class="tile dark-green">
	        <h3 class="title"><span class="fa fa-suitcase"></span> Products / Items</h3>
	        <p>Use this module view, add, and update products</p>
	      </div>
	    </div>
	</a>
	<a href="employees">
	    <div class="col-sm-6">
	      <div class="tile dark-green">
	        <h3 class="title"><span class="fa fa-group"></span> Employees</h3>
	        <p>Use this module view, add, and delete employees</p>
	      </div>
	    </div>
	</a>
</div>                    