<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    if($this->session->userdata("user_type") == "admin")
        $this->load->view('inc/admin_header');
    else
        $this->load->view('inc/header');    
?>
<body>
     <div class="se-pre-con"></div>
   <div class="page-container">
   <!--/content-inner-->
    <div class="left-content">
       <div class="inner-content">
        <!-- header-starts -->
            <div class="header-section">
                        <!--menu-right-->
                        <div class="top_menu">
                                <!--<div class="main-search">
                                            <form>
                                               <input type="text" value="Search" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Search';}" class="text"/>
                                                <input type="submit" value="">
                                            </form>
                                    <div class="close"><img src="<?php echo base_url()?>assets/images/cross.png" /></div>
                                </div>
                                    <div class="srch"><button></button></div>
                                    <script type="text/javascript">
                                         $('.main-search').hide();
                                        $('button').click(function (){
                                            $('.main-search').show();
                                            $('.main-search text').focus();
                                        }
                                        );
                                        $('.close').click(function(){
                                            $('.main-search').hide();
                                        });
                                    </script>
                            <!--/profile_details-->
                                <div class="profile_details_left">
                                    <?php $this->load->view('notification');?>
                            </div>
                            <div class="clearfix"></div>    
                            <!--//profile_details-->
                        </div>
                        <!--//menu-right-->
                    <div class="clearfix"></div>
                </div>
                    <!-- //header-ends -->
                        <div class="outter-wp">

<div class="container">
    <div class="page-header">
        <h1><?php echo $heading; ?></h1>
    </div>
    <div class="row">
        <div class="col-sm-3 form-group">
            <label for="project">Enter Project Name:</label>
            <input type="text" class="form-control" onblur="check_project(this.value)" id="project"  name="project" placeholder="Enter Project">
        </div>
        <div class="col-sm-3 form-group">
            <label for="builder">Builder:</label>
            <select id="builder" class="form-control" required="required">
                <option value="">Select</option>
                <?php $allbuilders = $this->common_model->all_active_builders(); 
                foreach ($allbuilders as $builder) { ?>
                    <option value="<?php echo $builder->id; ?>"><?php echo $builder->name; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-sm-3 form-group">
            <label for="city">City:</label>
            <select id="city_name" class="form-control" required="required">
                <option value="">Select</option>
                <?php 
                foreach ($active_cities as $city) { ?>
                    <option value="<?php echo $city->id; ?>"><?php echo $city->name; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-sm-3 form-group">
            <button type="submit" id="add_project" style="margin-top:25px;" class="btn btn-success btn-block" onclick="add()">Add Project</button>
        </div>
    </div>
    
    <table id="example" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Project Id</th>
                <th>Project Name</th>
                <th>Builder Name</th>
                <th>City</th>
                <th>Date Added</th>
                <th>Status</th>
            </tr>
        </thead> 
        <tbody>
            <?php if(isset($all_projects) && $all_projects){
                foreach($all_projects as $project){ ?>
                    <tr>
                        <td><?php echo $project->id; ?></td>
                        <td><?php echo $project->name; ?></td>
                        <td><?php echo $project->builder_name; ?></td>
                        <td><?php  if(empty($project->city_name)){echo '-----';}else {echo $project->city_name;} ?></td>
                        <td><?php echo $project->date_added; ?></td>
                        <td align="middle"> 
                        <a onclick="edit('<?php echo $project->id; ?>')" data-toggle="modal" data-target="#modal_edit">
                            <i class="fa fa-home fa-2x"  title="Detail" style="color:#ff1122; font-size:21px;padding-right:7px;" aria-hidden="true"></i>
                        </a> 
                        <button type="button" id="b1<?php echo $project->id; ?>" class="btn <?php echo $project->active?'btn-info':'btn-danger'; ?>" onclick="change_status(<?php echo $project->id; ?>)"><span id="projectus_sp_<?php echo $project->id; ?>"><?php echo $project->active?'Active':'Inactive'; ?></span></button>
                        <!-- <a onclick="soft_delete('<?php echo $project->id; ?>','1')" data-toggle="modal">
                        <i title="Delete" class="fa fa-trash-o fa-2x" style="color:#ff1122; font-size:21px;padding-right:7px; color:#225511;" aria-hidden="true"></i>
                        </a> -->
                            </td>
                            </tr>
                            
                <?php }
            } ?>
        </tbody>
    </table>
    <script>
        function add(){
            $(".se-pre-con").show();
            var project=$('#project').val();
            if(project!=''){
                if($('#builder').val() == ""){
                    alert("Please select a Builder");
                    $('#builder').focus();
                    return false;
                }
                if($('#active_cities').val() == ""){
                    alert("Please select a City");
                    $('#active_cities').focus();
                    return false;
                }
                
                $.ajax({
                    type:"POST",
                    url: "<?php echo base_url()?>admin/add_project",
                    data:{
                        project:project,
                        builder:$('#builder').val(),
                        city_id:$('#city_name').val()
                    },
                    success:function(data){
                        alert("add successful");
                    }
                });
                location.reload();
            }
            else{
                $(".se-pre-con").hide("slow");
                alert("Please Enter a value");
            }
        }
        function change_status(id){
            $(".se-pre-con").show();
            $.ajax({
                type:"POST",
                url: "<?php echo base_url()?>admin/change_status_project",
                data:{id:id},
                success:function(data){
                    if(data.active){
                        $('#projectus_sp_'+id).text('Active');
                        $('#b1'+id).removeClass("btn-danger");
                        $('#b1'+id).addClass("btn-info");
                    }else{
                        $('#projectus_sp_'+id).text('Inactive');
                        $('#b1'+id).removeClass("btn-info");
                        $('#b1'+id).addClass("btn-danger");
                    }
                    $(".se-pre-con").hide("slow");
                }
            });
        }
        function check_project(name){
            $('#add_project').prop('disabled', false);
            $(".se-pre-con").show();
            $.ajax({
                type:"POST",
                url: "<?php echo base_url()?>admin/check_project",
                data:{code:name},
                success:function(data){
                    if(data.count){
                        alert("Duplicate Code! try again");
                        $('#project').val('');
                    }
                    else
                        $('#add_project').prop('disabled', false);
                    $(".se-pre-con").hide("slow");
                }
            });
        }
            function edit(v){
        $(".se-pre-con").show();
        $.ajax({
            type:"POST",
            url: "<?php echo base_url()?>admin/get_project_details",
            data:{id:v},
            success:function(data){
                $('#mhid').val(v);
                $('#p_name').val(data.project);
                $('#c_id').val(data.city_id);
                $('#b_id').val(data.builder_id); 
                console.log(data);
                $(".se-pre-con").hide("slow");
            }
        });
    }
    </script>
</div>

                        </div><!--/tabs-->
                                         <div class="tab-main">
                                             <!--/tabs-inner-->
                                                
                                                </div>
                                              <!--//tabs-inner-->

                                     <!--footer section start-->
                                        <footer>
                                            <p>&copy <?= date('Y')?> Holding Bricks . All Rights Reserved <!--| Design by <a href="#" target="_blank">Digilance5</a>--></p> 
                                        </footer>
                                    <!--footer section end-->
                                </div>
                            </div>
                <!--//content-inner-->
            <!--/sidebar-menu-->
                <div class="sidebar-menu">
                    <header class="logo">
                    <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a>  <span id="logo"> <h1>HBKS</h1></span> 
                    <!--<img id="logo" src="" alt="Logo"/>--> 
                  </a> 
                </header>
            <div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
            <!--/down-->
                            <div class="down">  
                                      <?php $this->load->view('profile_pic');?>
                                      <span class=" name-caret"><?php echo $this->session->userdata('user_name'); ?></span>
                                       <p><?php echo $this->session->userdata('user_type'); ?></p>
                                    
                                    <ul>
                                    <li><a class="tooltips" href="<?= base_url('dashboard/profile'); ?>"><span>Profile</span><i class="lnr lnr-user"></i></a></li>
                                        <li><a class="tooltips" style=" color: #00C6D7 !important; " href="#"><span>Team Size</span><?php if($this->session->userdata("manager_team_size")) echo $this->session->userdata("manager_team_size")?$this->session->userdata("manager_team_size"):''?></a></li>
                                        <li><a class="tooltips" href="<?php echo base_url()?>login/logout"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
                                        </ul>
                                    </div>
                               <!--//down-->
                           <?php $this->load->view('inc/header_nav'); ?>
                              </div>
                              <div class="clearfix"></div>      
                            </div>
                            <script>
                            var toggle = true;
                                        
                            $(".sidebar-icon").click(function() {                
                              if (toggle)
                              {
                                $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
                                $("#menu span").css({"position":"absolute"});
                              }
                              else
                              {
                                $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
                                setTimeout(function() {
                                  $("#menu span").css({"position":"relative"});
                                }, 400);
                              }
                                            
                                            toggle = !toggle;
                                        });
                            </script>
                            
                            
    <div class="modal fade" id="modal_edit"  role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Project details</h4>
            </div>
            <div class="modal-body">
                
                <div class="col-sm-3 form-group">
                    <label for="name">Project:</label>
                    <input type="text" class="form-control" id="p_name" name="project" placeholder="Name" required="required">
                </div>
                <div class="col-xs-12 col-md-3 form-group">
                    <input type="hidden" id="mhid">
                    <label for="emp_code">City:</label>
                    <select  class="form-control"  id="c_id" name="m_dept" required >
                        <option value="">Select</option>
                        <?php $all_active_cities=$this->common_model->all_active_cities();
                        foreach($all_active_cities as $all_active_cities){ ?>
                            <option value="<?php echo $all_active_cities->id; ?>"><?php echo $all_active_cities->name; ?></option>
                        <?php }?> 
                    </select>
                </div>
                <div class="col-sm-3 form-group">
                    <label for="contact_no1">Builder:</label>
                    <select  class="form-control"  id="b_id" name="m_dept" required >
                        <option value="">Select</option>   
                        <?php $all_active_builders=$this->common_model->all_active_builders();
                        foreach($all_active_builders as $all_active_builders){ ?>
                            <option value="<?php echo $all_active_builders->id; ?>"><?php echo $all_active_builders->name; ?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" onclick="update_project_details();" id="save" >Save</button>
            </div>
            </div>
        </div>
    </div>
</div>
<!--js -->

<script type="text/javascript" src="<?php echo base_url()?>assets/js/TweenLite.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/CSSPlugin.min.js"></script>
<!-- <script src="<?php echo base_url()?>assets/js/jquery.nicescroll.js"></script> -->
<!--<script src="<?php echo base_url()?>assets/js/scripts.js"></script>-->

<!-- Bootstrap Core JavaScript -->
   
   <script>
    $(document).ready(function() {
         $('#example').DataTable({
              "paging":   false,
              "info": false
 
        });
        if (!Modernizr.inputtypes.date) {
            // If not native HTML5 support, fallback to jQuery datePicker
            $('input[type=date]').datepicker({
                // Consistent format with the HTML5 picker
                    dateFormat : 'dd/mm/yy'
                }
            );
        }
        if (!Modernizr.inputtypes.time) {
            // If not native HTML5 support, fallback to jQuery timepicker
            $('input[type=time]').timepicker({ 'timeFormat': 'H:i' });
        }
        $('#revenueMonth').MonthPicker({
            Button: false
        });
       

        $("#refresh").click(function(){
            $(".se-pre-con").show();
            $.get("<?php echo base_url(); ?>dashboard/get_live_feed_back", function(response){
                $("#live_feed_back_body").html(response);
                $(".se-pre-con").hide("slow");
            });
        });

        $("#overdue_lead_count").click(function(){
            var form = document.createElement('form');
            form.method = "POST";
            form.action = "<?php echo base_url()."dashboard/generate_report" ?>";
            
            var input = document.createElement('input');
            input.type = "text";
            input.name = "toDate";
            input.value = $(this).data('datetime');
            form.appendChild(input);

            input = document.createElement('input');
            input.type = "text";
            input.name = "reportType";
            input.value = "due";
            form.appendChild(input);

            document.body.appendChild(form);
            form.submit();
        });

        $('.emailSiteVisit').on('click', function(){
            $(".se-pre-con").show();
            $.ajax({
                type : 'POST',
                url : "<?= base_url('site-visit-report-mail');?>",
                data:1,
                success: function(res){
                    $(".se-pre-con").hide("slow");
                    if(res == 1)
                        alert('Email Sent Successfully.');
                    else
                        alert('Email Sent fail!');
                }
            });
        });

    });
    // $('#filter_revenue').click(get_revenues());
    function get_revenues(){
        $.get( "<?php echo base_url()."dashboard/get_revenue/" ?>"+$('#revenueMonth').val(), function( data ) {
            $('#revenue_data').html(data);
        });
    }
    
    function soft_delete(id,i){
        $(".se-pre-con").show();
        $.ajax({
            type:"POST",
            url: "<?=base_url();?>/admin/delete_project",
            data:{id:id},
            success:function(data){
                if(data.status){
                    alert("Success");
                    location.reload();
                    //$('#row'+i).remove();
                }
                $(".se-pre-con").hide("slow");
            }
        });
    }
      function update_project_details(){
          var data = {
            'id':$('#mhid').val(),
            'name':$('#p_name').val(),
            'builder_id':$('#b_id').val(),
            'city_id':$('#c_id').val()
          };
          console.log(data);
          //alert(data)
          $.ajax({
            type:"POST",
            url: "<?php echo base_url()?>admin/update_project_details",
            data:data,
            success:function(data){
                location.reload();
            }
        });
      }


</script>
 
</body>
</html>