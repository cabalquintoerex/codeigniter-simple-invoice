
<script>
function submit_data()
{
    var id=$('#id').val();
    var first_name = $("#first_name").val();
    var last_name = $("#last_name").val();
    var gender = $("#gender").val();   
    var user_name = $("#user_name").val();   
    var password = $("#password").val();   
    var submit = $("#form_add").attr('action');   

    $.ajax({
        type: "POST",
        url: submit,
        data: {"id":id,"first_name":first_name
                ,"last_name":last_name,"gender":gender
                ,"user_name":user_name,"password":password},
        success: function(resp){   
            var obj = jQuery.parseJSON(resp);
            $("#myResponDeptLabel").html(obj.msg);
            if(obj.stat==="1"){
                $('#mod_add').modal('hide');
                location.reload();
            }
        },
        error:function(event, textStatus, errorThrown) {
            $("#myResponDeptLabel").html('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
        }
    });
}

function cancel(){
       
    $("#id").val('');
    $("#first_name").val('');
    $("#last_name").val('');
    $("#gender").val('');
    $("#user_name").val('');
    $("#password").val('');
  
}

function set_data(id){
    $.ajax({
        type: "POST",
        url: "<?=site_url('employees/set_data');?>",
        data: {"id":id},
        success: function(resp){
            var obj = jQuery.parseJSON(resp);
            $("#id").val(obj.id);      
            $("#first_name").val(obj.first_name);
            $("#last_name").val(obj.last_name);
            $("#gender").val(obj.gender);
            $("#user_name").val(obj.user_name);
            $('#mod_add').modal({
                backdrop: 'static'
              });
            $('#mod_add').modal('show'); 
        },
        error:function(event, textStatus, errorThrown) {
            $("#myResponDeptLabel").html('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
        }
    });
}

function del_data(id){
    var r=confirm("Are you sure to Delete data ?");
    if (r===true)
      {
          $.ajax({
                type: "POST",
                url: "<?=site_url('employees/submit');?>",
                data: {"id":id,"stat":"delete"},
                success: function(resp){
                    var obj = jQuery.parseJSON(resp);
                    alert(obj.msg);
                    if(obj.stat==="1"){
                        location.reload();
                    }
                },
                error:function(event, textStatus, errorThrown) {
                    $("#myResponDeptLabel").html('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
                }
            });
      }
}
</script>

<div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">Item Details</h3>
    </div><!-- /.box-header -->
      <div class="box-body">
          <table class="table table-bordered table-hover">
              <thead>
                  <tr>
                    <td style="width: 10px;">Id</td>
                    <td style="width: 130px;">First Name</td>
                    <td style="width: 130px;">Last Name</td>
                    <td style="width: 10px;">Gender</td>                
                    <td style="width: 10px;">Username</td>
                    <td style="width: 10px;">Password</td>
                    <td style="width: 10px;">Edit</td>
                    <td style="width: 10px;">Delete</td>
                </tr>
              </thead>
              <tbody>
                  <?php
                    if(!empty($table)){
                        foreach ($table as $val){
                            echo "<tr>";
                                echo "<td>".$val->id."</td>";
                                echo "<td>".$val->first_name."</td>";
                                echo "<td>".$val->last_name."</td>";
                                if($val->gender == 0)
                                echo "<td>Male</td>";
                                else
                                echo "<td>Female</td>";
                                echo "<td>".$val->user_name."</td>";
                                echo "<td>*********</td>";
                                echo "<td><button data-toggle=\"modal\" data-target=\"#mod_add\" data-backdrop=\"static\" "
                                    . " class=\"btn btn-default btn-sm btn-block\" onclick=\"set_data(".$val->id.");\">Edit</button></td>";
                                echo "<td><button class=\"btn btn-danger btn-sm btn-block\" onclick=\"del_data(".$val->id.");\">Delete</button></td>";
                            echo "</tr>";
                        }
                    }
                  ?>    
              </tbody>
          </table>
      </div><!-- /.box-body -->
      <div class="box-footer">
        <button data-toggle="modal" data-target="#mod_add" data-backdrop="static" class="btn btn-primary">Add</button>
        <button class="btn btn-default" onclick="location.reload();">Refresh</button>
    </div>
  </div><!-- /.box -->
  
  <div class="modal fade" id="mod_add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
	  <?php echo validation_errors(); ?>
        <?php
            $attributes = array('role' => 'form'
                , 'id' => 'form_add', 'name' => 'form_add');
            echo form_open('employees/submit',$attributes); 
        ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLocationLabel">
              <i class="fa fa-fw fa-cloud"></i>
              Employee Details
          </h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-xs-12">
                    <div id="myResponDeptLabel" class=" animated fadeInDown"></div>
                    </div>
                </div>
            </div>            
            <div class="row">
                <div class="col-lg-12">  
                    <input type="hidden" id="id" name="id" />
                    <div class="col-xs-12">
                        <div class="form-group">
                          <label for="first_name">First Name</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-fw fa-cloud"></i>
                            </div>
                            <input type="text" class="form-control" id="first_name" name="first_name" 
                                     placeholder="First Name" required="">
									 <span class="help-block"></span>
                          </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                          <label for="last_name">Last Name</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-fw fa-cloud"></i>
                            </div>
                            <input type="text" class="form-control" id="last_name" name="last_name" 
                                     placeholder="Last Name" required="">
                          </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                          <label for="gender">Gender</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-fw fa-cloud"></i>
                            </div>
                            <select class="form-control" id="gender" name="gender">
                              <option></option>
                              <option value="0">Male</option>
                              <option value="1">Female</option>
                            </select>

                          </div>
                        </div>
                    </div>
                     <div class="col-xs-12">
                        <div class="form-group">
                          <label for="user_name">Username</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-fw fa-cloud"></i>
                            </div>
                            <input type="text" class="form-control" id="user_name" name="user_name" 
                                     placeholder="Username" required="">
                          </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                          <label for="password">Password</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-fw fa-cloud"></i>
                            </div>
                            <input type="password" class="form-control" id="password" name="password" 
                                     placeholder="***********" required="">
                          </div>
                        </div>
                    </div>
                    
                </div>  
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" type="button" onclick="submit_data();">Submit</button>
            <button class="btn btn-default" type="button" data-dismiss="modal" aria-hidden="true" onclick="cancel();">Cancel</button>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
</div>