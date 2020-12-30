<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    $this->load->view('inc/header'); 
    $this->load->model('user_model');
   $user_ids =$this->session->userdata('user_ids');
   $user_ids =json_decode( json_encode($user_ids), true);
   $string_ids='';
   foreach ($user_ids as $id) {
   	//print_r($id['id']);
   	$string_ids.=$id['id'].',';
   }
   //echo $string_ids;

    ?>
  
<body>
<style>

td, th {
  /* border: 1px solid #dddddd; */
  text-align: left;
  padding: 8px;
}
.table td, .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    font-size: 14px;
}

tr:nth-child(even) {
  background-color: #f9f9f9;
}
.content section {
    font-size: 1.25em;
    padding: 1em 1em;
}
.tabs nav ul li {
    font-size: 12px;
}
.content section {
    font-size: 1.25em;
    padding: 1em 0em;
}
.table>thead>tr>th {
    background:#d8c26b;
    color:white!important;
}
.header-section {
    height: 40px;
    margin-top: -31px;
}
li.dropdown.note a {
    padding: 0.4em 2em;
    display: block;
    border: none;
}
.outter-wp {
     padding: .2em .2em;
}

.pull-right{
  float:right;
}
.pull-left{
  float:left;
}
#fbcomment{
  background:#fff;
  border: 1px solid #dddfe2;
  border-radius: 3px;
  color: #4b4f56;
  padding:50px;
}
.header_comment{
    font-size: 14px;
    overflow: hidden;
    border-bottom: 1px solid #e9ebee;
    line-height: 25px;
    margin-bottom: 24px;
    padding: 10px 0;
}
.sort_title{
  color: #4b4f56;
}
.sort_by{
  background-color: #f5f6f7;
  color: #4b4f56;
  line-height: 22px;
  cursor: pointer;
  vertical-align: top;
  font-size: 12px;
  font-weight: bold;
  vertical-align: middle;
  padding: 4px;
  justify-content: center;
  border-radius: 2px;
  border: 1px solid #ccd0d5;
}
.count_comment{
  font-weight: 600;
}
.body_comment{
    padding: 0 8px;
    font-size: 14px;
    display: block;
    line-height: 25px;
    word-break: break-word;
}
.avatar_comment{
  display: block;
}
.avatar_comment img{
  height: 48px;
  width: 48px;
  float: right;
  border-radius: 100px;
}
.box_comment{
	display: block;
    position: relative;
    line-height: 1.358;
    word-break: break-word;
    border: 1px solid #d3d6db;
    word-wrap: break-word;
    background: #fff;
    box-sizing: border-box;
    cursor: text;
    font-family: Helvetica, Arial, sans-serif;
    font-size: 16px;
	padding: 0;
}
.box_comment textarea{
	min-height: 40px;
	padding: 12px 8px;
	width: 100%;
	border: none;
	resize: none;
}
.box_comment textarea:focus{
  outline: none !important;
}
.box_comment .box_post{
	border-top: 1px solid #d3d6db;
    background: #f5f6f7;
    padding: 8px;
    display: block;
    overflow: hidden;
}
.box_comment label{
  display: inline-block;
  vertical-align: middle;
  font-size: 11px;
  color: #90949c;
  line-height: 22px;
}
.box_comment button{
  margin-left:8px;
  background-color: #4267b2;
  border: 1px solid #4267b2;
  color: #fff;
  text-decoration: none;
  line-height: 22px;
  border-radius: 2px;
  font-size: 14px;
  font-weight: bold;
  position: relative;
  text-align: center;
}
.box_comment button:hover{
  background-color: #29487d;
  border-color: #29487d;
}
.box_comment .cancel{
	margin-left:8px;
	background-color: #f5f6f7;
	color: #4b4f56;
	text-decoration: none;
	line-height: 22px;
	border-radius: 2px;
	font-size: 14px;
	font-weight: bold;
	position: relative;
	text-align: center;
  border-color: #ccd0d5;
}
.box_comment .cancel:hover{
	background-color: #d0d0d0;
	border-color: #ccd0d5;
}
.box_comment img{
  height:16px;
  width:16px;
}
.box_result{
  margin-top: 24px;
  list-style: none;
}
.box_result .result_comment h4{
  font-weight: 600;
  white-space: nowrap;
  color: #365899;
  cursor: pointer;
  text-decoration: none;
  font-size: 14px;
  line-height: 1.358;
  margin:0;
  text-align: initial;
}
.box_result .result_comment{
  display:block;
  overflow:hidden;
  padding: 0;
}
.child_replay{
	border-left: 1px dotted #d3d6db;
	margin-top: 12px;
	list-style: none;
	padding:0 0 0 8px
}
.reply_comment{
	margin:12px 0;
}
.box_result .result_comment p{
  margin: 4px 0;
  text-align:justify;
}
.box_result .result_comment .tools_comment{
  font-size: 12px;
  line-height: 1.358;
  text-align: initial;
}
.box_result .result_comment .tools_comment a{
  color: #4267b2;
  cursor: pointer;
  text-decoration: none;
}
.box_result .result_comment .tools_comment span{
  color: #90949c;
}
.body_comment .show_more{
  background: #3578e5;
  border: none;
  box-sizing: border-box;
  color: #fff;
  font-size: 14px;
  margin-top: 24px;
  padding: 12px;
  text-shadow: none;
  width: 100%;
  font-weight:bold;
  position: relative;
  text-align: center;
  vertical-align: middle;
  border-radius: 2px;
}
</style>
	 <div class="se-pre-con"></div>
   <div class="page-container" style="height: 1000px;">
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
					<?php
    if(!$this->session->userdata('permissions') && $this->session->userdata('permissions')=='' ) {
    ?>

    <style type="text/css">
    .alrtMsg{padding-top: 50px;}
    .alrtMsg i {
        font-size: 60px;
        color: #f1c836;
    }
    </style>
    <div class="container"> 
        <div class="row"> 
            <div class="text-center alrtMsg">
                <i class="fa fa-exclamation-triangle"></i>
                <h3>You Do Not have permission as of now. Please contact your Administration and Request for Permission.</h3>
            </div>
        </div>
    </div>
    <?php
}


								else{?>
						                <div class="outter-wp">
                                                <div class="col-md-9 mt-30">
                                                    <div class="birthday-card ">
                                                            <div class="birthday">
                                                                <div class="wrapper">
                                                                    <div class="text1">
                                                                        <h1>Happy Birthday</h1>
                                                                        <h2 class="quote">Hope your Special Day</h2>
                                                                        <h2 class="quote">Bring bring you all that your Heart Desires</h2>
                                                                        <h2 class="quote">Wishing you a day of Pleasent Surprises</h2>
                                                                        <h2 class="quote">Dear "Client Name"</h2>
                                                                    </div>
                                                                    <div id="scene">
                                                                        <div class="bgcover">
                                                                            <div class="ballon"></div>
                                                                            <div class="ballon"></div>
                                                                            <div class="ballon"></div>
                                                                            <div class="ballon"></div>
                                                                            <div class="ballon"></div>
                                                                            <div class="ballon"></div>
                                                                        </div>
                                                                        <div class="cake">
                                                                            <div class="candle">
                                                                                <div class="candle-1">
                                                                                    <div class="wax"></div>
                                                                                    <div class="flame"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="strip"></div>
                                                                            <div class="strip next"></div>
                                                                        </div>
                                                                        <div class="platform">
                                                                            <div class="strip"></div>
                                                                            <div class="strip next"></div>
                                                                        </div>
                                                                    </div>
                                                                
                                                                </div>
                                                                <div class="clearfix"> </div>	
                                                            
                                                            </div> 
                                                            <div class="ex1">
                                                                <div class="">
                                                                    <div class="" id="fbcomment">
                                                                        <div class="header_comment">
                                                                            <div class="row">
                                                                                <div class="col-md-6 text-left">
                                                                                <span class="count_comment">264235 Comments</span>
                                                                                </div>
                                                                                <div class="col-md-6 text-right">
                                                                                <span class="sort_title">Sort by</span>
                                                                                <select class="sort_by">
                                                                                    <option>Top</option>
                                                                                    <option>Newest</option>
                                                                                    <option>Oldest</option>
                                                                                </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="body_comment">
                                                                            <div class="row">
                                                                                <div class="avatar_comment col-md-1">
                                                                                <img src="https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg" alt="avatar"/>
                                                                                </div>
                                                                                <div class="box_comment col-md-11">
                                                                                <textarea class="commentar" placeholder="Add a comment..."></textarea>
                                                                                <div class="box_post">
                                                                                    <div class="pull-left">
                                                                                    <input type="checkbox" id="post_fb"/>
                                                                                    <label for="post_fb">Also post on Facebook</label>
                                                                                    </div>
                                                                                    <div class="pull-right">
                                                                                    <span>
                                                                                        <img src="https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg" alt="avatar" />
                                                                                        <i class="fa fa-caret-down"></i>
                                                                                    </span>
                                                                                    <button onclick="submit_comment()" type="button" value="1">Post</button>
                                                                                    </div>
                                                                                </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <ul id="list_comment" class="col-md-12">
                                                                                    <!-- Start List Comment 1 -->
                                                                                    <li class="box_result row">
                                                                                        <div class="avatar_comment col-md-1">
                                                                                            <img src="https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg" alt="avatar"/>
                                                                                        </div>
                                                                                        <div class="result_comment col-md-11">
                                                                                            <h4>Nath Ryuzaki</h4>
                                                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
                                                                                            <div class="tools_comment">
                                                                                                <a class="like" href="#">Like</a>
                                                                                                <span aria-hidden="true"> · </span>
                                                                                                <a class="replay" href="#">Reply</a>
                                                                                                <span aria-hidden="true"> · </span>
                                                                                                <i class="fa fa-thumbs-o-up"></i> <span class="count">1</span> 
                                                                                                <span aria-hidden="true"> · </span>
                                                                                                <span>26m</span>
                                                                                            </div>
                                                                                            <ul class="child_replay">
                                                                                                <li class="box_reply row">
                                                                                                    <div class="avatar_comment col-md-1">
                                                                                                        <img src="https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg" alt="avatar"/>
                                                                                                    </div>
                                                                                                    <div class="result_comment col-md-11">
                                                                                                        <h4>Sugito</h4>
                                                                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
                                                                                                        <div class="tools_comment">
                                                                                                            <a class="like" href="#">Like</a>
                                                                                                            <span aria-hidden="true"> · </span>
                                                                                                            <a class="replay" href="#">Reply</a>
                                                                                                            <span aria-hidden="true"> · </span>
                                                                                                            <i class="fa fa-thumbs-o-up"></i> <span class="count">1</span> 
                                                                                                            <span aria-hidden="true"> · </span>
                                                                                                            <span>26m</span>
                                                                                                        </div>
                                                                                                        <ul class="child_replay"></ul>
                                                                                                    </div>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </li>
                                                                                    
                                                                                    <!-- Start List Comment 2 -->
                                                                                    <li class="box_result row">
                                                                                        <div class="avatar_comment col-md-1">
                                                                                            <img src="https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg" alt="avatar"/>
                                                                                        </div>
                                                                                        <div class="result_comment col-md-11">
                                                                                            <h4>Gung Wah</h4>
                                                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
                                                                                            <div class="tools_comment">
                                                                                                <a class="like" href="#">Like</a>
                                                                                                <span aria-hidden="true"> · </span>
                                                                                                <a class="replay" href="#">Reply</a>
                                                                                                <span aria-hidden="true"> · </span>
                                                                                                <i class="fa fa-thumbs-o-up"></i> <span class="count">1</span> 
                                                                                                <span aria-hidden="true"> · </span>
                                                                                                <span>26m</span>
                                                                                            </div>
                                                                                            <ul class="child_replay"></ul>
                                                                                        </div>
                                                                                    </li>
                                                                                </ul>
                                                                            <button class="show_more" type="button">Load 10 more comments</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    
                                                    <div class="birthday-card ">
                                                            <div class="birthday">
                                                                <div class="wrapper">
                                                                    <div class="text1">
                                                                        <h1>Happy Birthday</h1>
                                                                        <h2 class="quote">Hope your Special Day</h2>
                                                                        <h2 class="quote">Bring bring you all that your Heart Desires</h2>
                                                                        <h2 class="quote">Wishing you a day of Pleasent Surprises</h2>
                                                                        <h2 class="quote">Dear "Client Name"</h2>
                                                                    </div>
                                                                    <div id="scene">
                                                                        <div class="bgcover">
                                                                            <div class="ballon"></div>
                                                                            <div class="ballon"></div>
                                                                            <div class="ballon"></div>
                                                                            <div class="ballon"></div>
                                                                            <div class="ballon"></div>
                                                                            <div class="ballon"></div>
                                                                        </div>
                                                                        <div class="cake">
                                                                            <div class="candle">
                                                                                <div class="candle-1">
                                                                                    <div class="wax"></div>
                                                                                    <div class="flame"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="strip"></div>
                                                                            <div class="strip next"></div>
                                                                        </div>
                                                                        <div class="platform">
                                                                            <div class="strip"></div>
                                                                            <div class="strip next"></div>
                                                                        </div>
                                                                    </div>
                                                                
                                                                </div>
                                                                <div class="clearfix"> </div>	
                                                            
                                                            </div> 
                                                            <div class="ex1">
                                                                <div class="">
                                                                    <div class="" id="fbcomment">
                                                                        <div class="header_comment">
                                                                            <div class="row">
                                                                                <div class="col-md-6 text-left">
                                                                                <span class="count_comment">264235 Comments</span>
                                                                                </div>
                                                                                <div class="col-md-6 text-right">
                                                                                <span class="sort_title">Sort by</span>
                                                                                <select class="sort_by">
                                                                                    <option>Top</option>
                                                                                    <option>Newest</option>
                                                                                    <option>Oldest</option>
                                                                                </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="body_comment">
                                                                            <div class="row">
                                                                                <div class="avatar_comment col-md-1">
                                                                                <img src="https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg" alt="avatar"/>
                                                                                </div>
                                                                                <div class="box_comment col-md-11">
                                                                                <textarea class="commentar" placeholder="Add a comment..."></textarea>
                                                                                <div class="box_post">
                                                                                    <div class="pull-left">
                                                                                    <input type="checkbox" id="post_fb"/>
                                                                                    <label for="post_fb">Also post on Facebook</label>
                                                                                    </div>
                                                                                    <div class="pull-right">
                                                                                    <span>
                                                                                        <img src="https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg" alt="avatar" />
                                                                                        <i class="fa fa-caret-down"></i>
                                                                                    </span>
                                                                                    <button onclick="submit_comment()" type="button" value="1">Post</button>
                                                                                    </div>
                                                                                </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <ul id="list_comment" class="col-md-12">
                                                                                    <!-- Start List Comment 1 -->
                                                                                    <li class="box_result row">
                                                                                        <div class="avatar_comment col-md-1">
                                                                                            <img src="https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg" alt="avatar"/>
                                                                                        </div>
                                                                                        <div class="result_comment col-md-11">
                                                                                            <h4>Nath Ryuzaki</h4>
                                                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
                                                                                            <div class="tools_comment">
                                                                                                <a class="like" href="#">Like</a>
                                                                                                <span aria-hidden="true"> · </span>
                                                                                                <a class="replay" href="#">Reply</a>
                                                                                                <span aria-hidden="true"> · </span>
                                                                                                <i class="fa fa-thumbs-o-up"></i> <span class="count">1</span> 
                                                                                                <span aria-hidden="true"> · </span>
                                                                                                <span>26m</span>
                                                                                            </div>
                                                                                            <ul class="child_replay">
                                                                                                <li class="box_reply row">
                                                                                                    <div class="avatar_comment col-md-1">
                                                                                                        <img src="https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg" alt="avatar"/>
                                                                                                    </div>
                                                                                                    <div class="result_comment col-md-11">
                                                                                                        <h4>Sugito</h4>
                                                                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
                                                                                                        <div class="tools_comment">
                                                                                                            <a class="like" href="#">Like</a>
                                                                                                            <span aria-hidden="true"> · </span>
                                                                                                            <a class="replay" href="#">Reply</a>
                                                                                                            <span aria-hidden="true"> · </span>
                                                                                                            <i class="fa fa-thumbs-o-up"></i> <span class="count">1</span> 
                                                                                                            <span aria-hidden="true"> · </span>
                                                                                                            <span>26m</span>
                                                                                                        </div>
                                                                                                        <ul class="child_replay"></ul>
                                                                                                    </div>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </li>
                                                                                    
                                                                                    <!-- Start List Comment 2 -->
                                                                                    <li class="box_result row">
                                                                                        <div class="avatar_comment col-md-1">
                                                                                            <img src="https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg" alt="avatar"/>
                                                                                        </div>
                                                                                        <div class="result_comment col-md-11">
                                                                                            <h4>Gung Wah</h4>
                                                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
                                                                                            <div class="tools_comment">
                                                                                                <a class="like" href="#">Like</a>
                                                                                                <span aria-hidden="true"> · </span>
                                                                                                <a class="replay" href="#">Reply</a>
                                                                                                <span aria-hidden="true"> · </span>
                                                                                                <i class="fa fa-thumbs-o-up"></i> <span class="count">1</span> 
                                                                                                <span aria-hidden="true"> · </span>
                                                                                                <span>26m</span>
                                                                                            </div>
                                                                                            <ul class="child_replay"></ul>
                                                                                        </div>
                                                                                    </li>
                                                                                </ul>
                                                                            <button class="show_more" type="button">Load 10 more comments</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                        </div>
                                                  <!--custom-widgets-->
												<div class="custom-widgets">
													<?php 
													
													if ($this->session->userdata('user_type')=="user") { 
       												?>
       												 <div class="col-md-3">
                                                            <div class="row-one">
                                                                <div class="col-md-3 widget">
                                                                    <div class="stats-left ">
                                                                        <h5>Today</h5>
                                                                        <h4> Calls</h4>
                                                                    </div>
                                                                    <div class="stats-right">
                                                                        <label><a href="#" class="view_callbacks" data-type="user_total"><?php echo $today_callback_count; ?></a></label>
                                                                    </div>
                                                                    <div class="clearfix"> </div>	
                                                                </div>
                                                                <div class="col-md-3 widget states-mdl">
                                                                    <div class="stats-left">
                                                                        <h5>Yesterday</h5>
                                                                        <h4>Calls</h4>
                                                                    </div>
                                                                    <div class="stats-right">
                                                                        <label> <?php echo $yesterday_callback_count; ?></label>
                                                                    </div>
                                                                    <div class="clearfix"> </div>	
                                                                </div>
                                                                <div class="col-md-3 widget states-thrd">
                                                                    <div class="stats-left">
                                                                        <h5>Overdue </h5>
                                                                        <h4>Calls</h4>
                                                                    </div>
                                                                    <div class="stats-right">
                                                                        <label><a href="#" class="view_callbacks" data-type="user_overdue"><?php echo $overdue_callback_count; ?></a></label>
                                                                    </div>
                                                                    <div class="clearfix"> </div>	
                                                                </div>
                                                                <div class="col-md-3 widget states-last">
                                                                    <div class="stats-left">
                                                                        <h5>Today Calls</h5>
                                                                        <h4>Done</h4>
                                                                    </div>
                                                                    <div class="stats-right">
                                                                        <label> <?php if(isset($callsDone['totalCalls'])){echo $callsDone['totalCalls'] ? $callsDone['totalCalls'] : 0; }else{echo 0;}?></label>
                                                                    </div>
                                                                    <div class="clearfix"> </div>	
                                                                </div>
                                                                <div class="clearfix"> </div>	
                                                            </div>
                                                    </div>
													<br>
													<div class="row-one">
														<div class="col-md-3 widget">
															<div class="stats-left ">
																<h5>Calls Assigned </h5>
																<h4> Today</h4>
															</div>
															<div class="stats-right">
																<label><?php echo $calls_assigned_today['count'] ? $calls_assigned_today['count'] : 0; ?></label>
															</div>
															<div class="clearfix"> </div>	
														</div>
														<div class="col-md-3 widget states-mdl">
															<div class="stats-left">
																<h5>Total</h5>
																<h4>Leads</h4>
															</div>
															<div class="stats-right">
																<label> <?php echo $total_callback_count; ?></label>
															</div>
															<div class="clearfix"> </div>	
														</div>
														<div class="col-md-3 widget states-thrd">
															<div class="stats-left">
																<h5>Dead </h5>
																<h4>Leads</h4>
															</div>
															<div class="stats-right">
																<label><?php echo $dead_leads_count; ?></label>
															</div>
															<div class="clearfix"> </div>	
														</div>
														<div class="col-md-3 widget states-last">
															<div class="stats-left">
																<h5>Active</h5>
																<h4>Leads</h4>
															</div>
															<div class="stats-right">
																<label><?php echo $active_leads_count; ?></label>
															</div>
															<div class="clearfix"> </div>	
														</div> 
														<div class="clearfix"> </div>	
													</div>
													<br>
													<div class="tab-inner">
												      <div id="tabs" class="tabs">
															<div class="graph">
																					<nav>
																						<ul>
																							<li class="tab-current"><a href="#section-1" class="icon-shop"><i class="lnr lnr-briefcase"></i> <span>Important Calls</span></a></li>
																							<li><a href="#section-2" class="icon-cup"><i class="lnr lnr-lighter"></i> <span>Site Visit Fixed</span></a></li>
																							<li><a href="#section-3" class="icon-cup"><i class="lnr lnr-lighter"></i> <span>Total Revenue</span></a></li>
																						</ul>
																					</nav>
																					<div class="content tab">
																						<section id="section-1" class="content-current">
																							<div class="">
																							<table class="table" style="margin-top: 10px;">
														                                <thead>
														                                    <tr>
														                                        <th>Contact Name</th>
														                                        <th>Assigned User</th>
														                                        <th>Email</th>
														                                        <th>Last added Note</th>
														                                    </tr>
														                                     <?php

																							if(count($imp_callbacks)>0)
																							{
														                                      foreach ($imp_callbacks as $callback) { ?>
																							
                                        <tr>
                                            <td><a href="<?php echo base_url().'dashboard/view_callbacks/'.$user_id; ?>" data-type="user_important" data-id="<?php echo $callback->id; ?>"><?php echo $callback->name; ?></a></td>
                                            <td><?php echo $callback->user_name; ?></td>
                                            <td>
                                                <?php 
                                                    echo $callback->email1; 
                                                    if($callback->email2)
                                                        echo ", ".$callback->email2;
                                                ?>
                                            </td>
                                            <td><?php echo $callback->last_note; ?></td>
                                        </tr>
                                    <?php }
                                }
                                 else
                                        echo '<tr><td colspan="3">No records found!</td></tr>';

                                     ?>
                                        
														                                </thead>
														                                <tbody>
														                                    														                                        
														                                </tbody>
														                            </table>
																							</div>
																						
																						</section>
																						<section id="section-2">
																							<div class="">
																							 <br>
														                            <table class="table">
														                                <thead>
														                                    <tr>
														                                        <th>Contact Name</th>
														                                        <th>Date of Site Visit</th>
														                                        <th>Project Name</th>
														                                        <!-- <th>Lastest Comment</th> -->
														                                    </tr>
														                                </thead>
														                                <tbody>
														                                	<?php  
                                    if(count($site_visit_data)>0) {    
                                   echo '<a href="javascript:void(0);" class="btn btn-info pull-right emailSiteVisit" style="margin-top: 15px;">Email this</a>';                              
                                        foreach ($site_visit_data as $k=>$data) { 
                                             if(!isset($site_visit_data[$k+1]['id']))
                                                $site_visit_data[$k+1]['id']=null;
                                            if($data['id'] != $site_visit_data[$k+1]['id']) {
                                            ?>
                                            <tr>
                                                <td><?php echo $data['name']; ?></td>
                                                <td><?php echo $data['visitDate']; ?></td>
                                                <td>
                                                    <?php echo implode(', ', $site_visit_projects[$data['id']]);?>
                                                </td>
                                                <!-- <td><?php //echo $callback->last_note; ?></td> -->
                                            </tr>
                                            <?php 
                                            }   
                                                                                 
                                        }
                                    }
                                    else
                                        echo '<tr><td colspan="3">No records found!</td></tr>';
                                    ?> 
										                                        
														                                </tbody>
														                            </table>
																							</div>
																						</section>
									                                                    <section id="section-3">
																							<div class="">
																							 <br>
														                            <!-- <table class="table">
														                                <thead>
														                                    <tr>
														                                        <th>Total Revenue</th> 
														                                        <th>Lastest Comment</th>
														                                    </tr>
														                                </thead>
														                                <tbody>
														                                	<tr>
														                                		 <td><a href="#" class="view_callbacks" data-type="user_close"><?php echo $total_revenue; ?></a></td>
														                                	</tr>
									                                  
														                                </tbody>
                                                                                    </table> -->
                                                                                    
                                                                                    <div class="container">
                                                                                            <div class="row text-center">
                                                                                                <div class="col-md-6">
                                                                                                Total Revenue
                                                                                                </div>
                                                                                                <div class="col-md-6">
                                                                                               <a href="#" class="view_callbacks" data-type="user_close"><?php echo $total_revenue; ?></a>
                                                                                                </div>
                                                                                               
                                                                                            </div>
                                                                                            </div>
																							</div>
																						</section>
																					</div><!-- /content -->
																				</div>
																				<!-- /tabs -->
																				
																			</div>
																			<script src="<?php echo base_url()?>/assets/js/cbpFWTabs.js"></script>
																			<script>
																				new CBPFWTabs( document.getElementById( 'tabs' ) );
																			</script>
																	
																 
																 <div class="clearfix"> </div>
														</div>
												<?php }
												elseif ($this->session->userdata('user_type')=="manager"){ 

        ?>
         <style>

       
        .stats-right label{
            font-size: 1em; 
            color: #3E3D3D;
            word-break: break-all;
        }
        #textright{
            padding: 37px 0px;
        }
        @media (max-width:1366px){
           
        .stats-right label{
            font-size: 1em; 
            color: #3E3D3D;
            word-break: break-all;
        }
        #textright{
            padding: 37px 0px;
        }
        }
        @media (max-width:1366px){
            .stats-right{
                padding: 37px 0px!important;
    height: 100px!important;
        } 
        .stats-right label{
            font-size: 1em; 
            color: #3E3D3D;
            word-break: break-all;
        }
        #textright{
            padding: 37px 0px;
        }
        }
        
        @media (max-width:1150px){
            .stats-right{
            padding: 33px 0px;
}
        } 
       
        #textright{
            padding: 32px 0px;
        }
        }

        @media (max-width:930px){
            .stats-right{
            padding: 2px 0px;
        } 
       
        #textright{
            padding: 24px 0px;
        }
        }
        @media (max-width:768px){
            .stats-right{
            padding: 2px 0px;
        } 
       
        #textright{
            padding: 24px 0px;
        }
        }
        </style>

												   <div class="row-one">
														<div class="col-md-3 widget">
															<div class="stats-left ">
																<h5>Team</h5>
																<h4> Revenue</h4>
															</div>
															<div class="stats-right" >
																<label style=""><a href="#" ><?php echo $total_team_revenue?$total_team_revenue:0; ?></a></label>
															</div>
															<div class="clearfix"> </div>	
														</div>
														<div class="col-md-3 widget states-mdl">
															<div class="stats-left">
																<h5>Own</h5>
																<h4>Closed Calls</h4>
															</div>
															<div class="stats-right" id="textright">
																<label> <a href="#" class="view_callbacks" data-type="manager_close"><?php echo $close_leads_count; ?></a></label>
															</div>
															<div class="clearfix"> </div>	
														</div>
														<div class="col-md-3 widget states-thrd">
															<div class="stats-left">
																<h5>Total Calls </h5>
																<h4>For Team</h4>
															</div>
															<div class="stats-right" id="textright">
																<label><a href="<?php echo base_url().'view_callbacks?advisor='.$team_members; ?>" ><?php echo $total_calls; ?></a></label>
															</div>
															<div class="clearfix"> </div>	
														</div>
														<div class="col-md-3 widget states-last">
															<div class="stats-left">
																<h5>Own</h5>
																<h4>Revenue</h4>
															</div>
															<div class="stats-right">
																<label> <?php echo $total_revenue; ?></label>
															</div>
															<div class="clearfix"> </div>	
														</div>
														<div class="clearfix"> </div>	
													</div> 
        <div class="container"> 
            <div class="top-mg dash-wd">
                <div class="tab-inner">
												      <div id="tabs" class="tabs">
															<div class="graph">
																					<nav>
																						<ul>
																							<li class="tab-current"><a href="#section-1" class="icon-shop"><i class="lnr lnr-briefcase"></i> <span>Important Calls</span></a></li>
																							<li><a href="#section-2" class="icon-cup"><i class="lnr lnr-lighter"></i> <span>Site Visit Fixed</span></a></li>
																						</ul>
																					</nav>
																					<div class="content tab">
																						<section id="section-1" class="content-current">
																							<div class="">
																							<table class="table" style="margin-top: 30px;">
														                                <thead>
														                                    <tr>
														                                        <th>Contact Name</th>
														                                        <th>Assigned User</th>
														                                        <th>Email</th>
														                                        <th>Last added Note</th>
														                                    </tr>
														                                </thead>
														                                <tbody>
														                                    														                                        
														                                </tbody>
														                            </table>
																							</div>
																						
																						</section>
																						<section id="section-2">
																							<div class="">
																							 <br>
														                            <table class="table">
														                                <thead>
														                                    <tr>
														                                        <th>Contact Name</th>
														                                        <th>Date of Site Visit</th>
														                                        <th>Project Name</th>
														                                        <!-- <th>Lastest Comment</th> -->
														                                    </tr>
														                                </thead>
														                                <tbody>
														                                    <tr><td colspan="3">No records found!</td></tr>                                        
														                                </tbody>
														                            </table>
																							</div>
																						</section>
																					</div><!-- /content -->
																				</div>
																				<!-- /tabs -->
																				
																			</div>
																			<script src="<?php echo base_url()?>/assets/js/cbpFWTabs.js"></script>
																			<script>
																				new CBPFWTabs( document.getElementById( 'tabs' ) );
																			</script>
																	
																 
																 <div class="clearfix"> </div>
														</div>
                <div class="col-md-12">
                    <div class="">
                        <h2 align="center">Lead Source Report</h2>
                        <div class=" ctr">
                            <table align="center" style="width:50%" class="table">
                                <thead>
                                    <tr>
                                        <th>Lead Source</th>
                                        <th>Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($lead_source_report as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $this->common_model->get_leadsource_name($key); ?></td>
                                            <td><?php echo $value; ?></td>
                                        </tr>
                                    <?php } ?>
                                        
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h2 align="center">Call Reports</h2>
                        <div class=" ctr">
                            <table align="center" style="width:50%" class="table">
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Number of calls</th>
                                        <th>Calls done Yesterday</th>
                                        <th>Calls for Today</th>
                                        <th>Productivity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($call_reports as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $value->first_name." ".$value->last_name; ?></td>
                                            <td><?php echo $value->total_calls; ?></td>
                                            <td><?php echo $value->yesterday_callback_count; ?></td>
                                            <td><?php echo $value->today_callback_count; ?></td>
                                            <td><?php echo $value->productivity; ?> %</td>
                                        </tr>
                                    <?php } ?>
                                        
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
             </div>
        </div>
    <?php } elseif ($this->session->userdata('user_type')=="City_head"  ) { 

        ?>
        <div class="container"> 
            <div class="top-mg dash-wd">
                <div class="col-md-12">
                    
                      <div class="tab-inner">
												      <div id="tabs" class="tabs">
															<div class="graph">
																					<nav>
																						<ul>
																							<li class="tab-current"><a href="#section-1" class="icon-shop"><i class="lnr lnr-briefcase"></i> <span>Important Calls</span></a></li>
																							<li><a href="#section-2" class="icon-cup"><i class="lnr lnr-lighter"></i> <span>Site Visit Fixed</span></a></li>
																						</ul>
																					</nav>
																					<div class="content tab">
																						<section id="section-1" class="content-current">
																							<div class="">
																							<table class="table" style="margin-top: 30px;">
														                                <thead>
														                                    <tr>
														                                        <th>Contact Name</th>
														                                        <th>Assigned User</th>
														                                        <th>Email</th>
														                                        <th>Last added Note</th>
														                                    </tr>
														                                </thead>
														                                <tbody>
														                                    														                                        
														                                </tbody>
														                            </table>
																							</div>
																						
																						</section>
																						<section id="section-2">
																							<div class="">
																							 <br>
														                            <table class="table">
														                                <thead>
														                                    <tr>
														                                        <th>Contact Name</th>
														                                        <th>Date of Site Visit</th>
														                                        <th>Project Name</th>
														                                        <!-- <th>Lastest Comment</th> -->
														                                    </tr>
														                                </thead>
														                                <tbody>
														                                    <tr><td colspan="3">No records found!</td></tr>                                        
														                                </tbody>
														                            </table>
																							</div>
																						</section>
																					</div><!-- /content -->
																				</div>
																				<!-- /tabs -->
																				
																			</div>
																			<script src="<?php echo base_url()?>/assets/js/cbpFWTabs.js"></script>
																			<script>
																				new CBPFWTabs( document.getElementById( 'tabs' ) );
																			</script>
																	
																 
																 <div class="clearfix"> </div>
														</div>
					<div class="row top-mg dash-wd">
                        <h2>Lead Source Report</h2>
                        <div class="col-md-12 ctr">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Lead Source</th>
                                        <th>Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($lead_source_report as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $this->common_model->get_leadsource_name($key); ?></td>
                                            <td><?php echo $value; ?></td>
                                        </tr>
                                    <?php } ?>
                                        
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row top-mg dash-wd">
                        <h2>Call Reports</h2>
                        <div class="col-md-12 ctr">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Number of calls</th>
                                        <th>Calls done Yesterday</th>
                                        <th>Calls for Today</th>
                                        <th>Productivity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($call_reports as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $value->first_name." ".$value->last_name; ?></td>
                                            <td><?php echo $value->total_calls; ?></td>
                                            <td><?php echo $value->yesterday_callback_count; ?></td>
                                            <td><?php echo $value->today_callback_count; ?></td>
                                            <td><?php echo $value->productivity; ?> %</td>
                                        </tr>
                                    <?php } ?>
                                        
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
              
            </div>
        </div>
    <?php }
    else{ ?>
    	<style>

        .stats-right{
            padding: 25px 0px;
             height: 71px;
        } 
        .stats-right label{
            font-size: 1em; 
            color: #3E3D3D;
            word-break: break-all;
        }
        #textright{
            padding: 37px 0px;
        }
        @media (max-width:1366px){
           
        .stats-right label{
            font-size: 1em; 
            color: #3E3D3D;
            word-break: break-all;
        }
        #textright{
            padding: 37px 0px;
        }
        }
        @media (max-width:1366px){
          
        .stats-right label{
            font-size: 1em; 
            color: #3E3D3D;
            word-break: break-all;
        }
        #textright{
            padding: 37px 0px;
        }
        }
        
        @media (max-width:1150px){
            .stats-right{
            padding: 33px 0px;
}
        } 
       
        #textright{
            padding: 32px 0px;
        }
        }

        @media (max-width:930px){
            .stats-right{
            padding: 2px 0px;
        } 
       
        #textright{
            padding: 24px 0px;
        }
        }
        @media (max-width:768px){
            .stats-right{
            padding: 2px 0px;
        } 
       
        #textright{
            padding: 24px 0px;
        }
        }
        </style>

												    <div class="row-one">
														<div class="col-md-3 widget">
															<div class="stats-left ">
																<h5>Team</h5>
																<h4> Revenue</h4>
															</div>
															<div class="stats-right mt-0" >
																<label style=""><a href="#" ><?php echo $total_team_revenue?$total_team_revenue:0; ?></a></label>
															</div>
															<div class="clearfix"> </div>	
                                                        </div>
                                                        
														<div class="col-md-3 widget mt-30">
															<div class="stats-left">
																<h5>Own</h5>
																<h4>Closed Calls</h4>
															</div>
															<div class="stats-right" id="textright">
																<label> <a href="#" class="view_callbacks" data-type="manager_close"><?php echo $close_leads_count; ?></a></label>
															</div>
															<div class="clearfix"> </div>	
                                                        </div>
                                                        
														<div class="col-md-3 widget mt-30">
															<div class="stats-left">
																<h5>Total Calls </h5>
																<h4><!--For Team --> &nbsp;</h4>
															</div>
															<div class="stats-right" id="textright">
																<label><a href="<?php echo base_url().'view_callbacks?advisor='.$team_members ?>&access=read_write" ><?php echo $total_calls; ?></a></label>
															</div>
															<div class="clearfix"> </div>	
                                                        </div>
                                                        
														<div class="col-md-3 widget mt-30">
															<div class="stats-left">
																<h5>Own</h5>
																<h4>Revenue</h4>
															</div>
															<div class="stats-right">
																<label> <?php echo $total_revenue; ?></label>
															</div>
															<div class="clearfix"> </div>	
                                                        </div>
                                                        
														<div class="clearfix"> </div>	
													</div> 
                                        <div class="container"> 
                                        <div class="col-md-6">
                                            <div class="top-mg dash-wd">
                                                <div class="tab-inner">
												      <div id="tabs" class="tabs">
															<div class="graph">
																					<nav>
																						<ul>
																							<li class="tab-current"><a href="#section-1" class="icon-shop"><i class="lnr lnr-briefcase"></i> <span>Important Calls</span></a></li>
																							<li><a href="#section-2" class="icon-cup"><i class="lnr lnr-lighter"></i> <span>Site Visit Fixed</span></a></li>
																						</ul>
																					</nav>
																					<div class="content tab">
																						<section id="section-1" class="content-current">
																							<div class="">
																							<table class="table" style="">
														                                <thead>
														                                    <tr>
														                                        <th>Contact Name</th>
														                                        <th>Assigned User</th>
														                                        <th>Email</th>
														                                        <th>Last added Note</th>
														                                    </tr>
														                                </thead>
														                                <tbody>
														                                    														                                        
														                                </tbody>
														                            </table>
																							</div>
																						
																						</section>
																						<section id="section-2">
																							<div class="">
																							 <br>
														                            <table class="table">
														                                <thead>
														                                    <tr>
														                                        <th>Contact Name</th>
														                                        <th>Date of Site Visit</th>
														                                        <th>Project Name</th>
														                                        <!-- <th>Lastest Comment</th> -->
														                                    </tr>
														                                </thead>
														                                <tbody>
														                                    <tr><td colspan="3">No records found!</td></tr>                                        
														                                </tbody>
														                            </table>
																							</div>
																						</section>
																					</div><!-- /content -->
																				</div>
																				<!-- /tabs -->
																				
																			</div>
                                                                            	
																			</div>
                                                                            </div>
                                                                            
																			<script src="<?php echo base_url()?>/assets/js/cbpFWTabs.js"></script>
																			<script>
																				new CBPFWTabs( document.getElementById( 'tabs' ) );
																			</script>
																	
																 
																 <div class="clearfix"> </div>
														</div>
                <div class="">
                    <div class="col-md-5 border-line">
                        <h2 align="center">Lead Source Report</h2>
                        <div class=" ctr">
                            <table align="center" style="" class="table">
                                <thead>
                                    <tr>
                                        <th>Lead Source</th>
                                        <th>Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($lead_source_report as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $this->common_model->get_leadsource_name($key); ?></td>
                                            <td><?php echo $value; ?></td>
                                        </tr>
                                    <?php } ?>
                                        
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6 border-line">
                        <h2 align="center">Call Reports</h2>
                        <div class=" ctr">
                            <table align="center" style="" class="table">
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Number of calls</th>
                                        <th>Calls done Yesterday</th>
                                        <th>Calls for Today</th>
                                        <th>Productivity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($call_reports as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $value->first_name." ".$value->last_name; ?></td>
                                            <td><?php echo $value->total_calls; ?></td>
                                            <td><?php echo $value->yesterday_callback_count; ?></td>
                                            <td><?php echo $value->today_callback_count; ?></td>
                                            <td><?php echo $value->productivity; ?> %</td>
                                        </tr>
                                    <?php } ?>
                                        
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
             </div>
        </div>
        <div class="container"> 
            <div class="top-mg dash-wd">
                <div class="col-md-5 border-line1">
                    <div class="row top-mg dash-wd">
                        <h2>Productivity</h2>
                        <div class=" ctr">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Number of calls</th>
                                        <!-- <th>Calls done Yesterday</th>
                                        <th>Calls for Today</th>
                                        <th>Productivity</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($productivity_report as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $value->first_name." ".$value->last_name; ?></td>
                                            <td>
                                                <a href="<?php echo base_url().'view_callbacks?advisor='.$value->id.'&for=dashboard'; ?>"><?php echo $value->total_calls; ?></a>
                                            </td>
                                            <!-- <td><?php echo $value->yesterday_callback_count; ?></td>
                                            <td><?php echo $value->today_callback_count; ?></td>
                                            <td><?php echo $value->productivity; ?> %</td> -->
                                        </tr>
                                    <?php } ?>
                                        
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                  <div class="col-md-6 border-line1">
                    <div class="row top-mg dash-wd">
                        <h2>Live Feedback<button type="submit" class="btn btn-default btn-default1" id="refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button></h2>
                        <div class="ctr">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Last Login Time</th>
                                    </tr>
                                </thead>
                                <tbody id="live_feed_back_body">
                                    <?php foreach ($live_feed_back as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $value->first_name." ".$value->last_name; ?> (<?php echo ($value->type == 1)?'User':'Manager'; ?>)</td>
                                            <td>
                                                <?php echo $value->last_login; ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                        
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>

                    <div class="col-md-6 border-line1">
                        <div class="row top-mg dash-wd">
                            <h2>Source Analysis</h2>
                            <div class=" ctr">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Lead Source</th>
                                            <th>Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($lead_source_report as $key => $value) { ?>
                                            <tr>
                                                <td><?php echo $this->common_model->get_leadsource_name($key); ?></td>
                                                <td><?php echo $value; ?></td>
                                            </tr>
                                        <?php } ?>
                                            
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
              
            </div>
            <br/><br/><br/><br/><br/>
            
        </div>
        <div class="container">
            <div class="top-mg dash-wd">
                
                <div class="col-md-6 border-line1">
                    <div class="row top-mg dash-wd">
                        <h2>Revenue List</h2>

                      
                        <input type="text" class="form-control table-form" id="revenueMonth" name="email2" placeholder="Click to filter" value="<?php echo date('m/Y'); ?>" > <button id="filter_revenue" class="filetr" onclick="get_revenues();">Filter</button>
                        <br>
                        <div class=" mt-30 ctr">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>User name</th>
                                        <th>Project</th>
                                        <th>Net Revenue</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody id="revenue_data">
                                        
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--<div class="col-md-3">
                    <div class="row top-mg dash-wd">
                        <h2>Name/State/</h2>
                    </div>
                </div>-->
            </div>
        </div>
    <?php }?>
												    
												</div>
									
									</div>
									<?php
								}?>
<!--/tabs-->
										<div class="tab-main">
											 <!--/tabs-inner-->
												
												</div>
											  <!--//tabs-inner-->

									 <!--footer section start-->
										<footer>
										   <p>&copy <?= date('Y')?> Premier Real Estate .  </p>
										</footer>
									<!--footer section end-->
								</div>
							</div>
				<!--//content-inner-->
			<!--/sidebar-menu-->
				<div class="sidebar-menu">
					<header class="logo">
					<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a>  <span id="logo"> <h1>PMR</h1></span> 
					<!--<img id="logo" src="" alt="Logo"/>--> 
				  </a> 
				</header>
			<div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
			<!--/down-->
							<div class="down">	
									  <?php $this->load->view('profile_pic');?>
									  <span class=" name-caret"><?php echo $this->session->userdata('user_name'); ?></span>
									   <p><?php echo $this->session->userdata('user_type'); ?></p>
									<?php if($this->session->userdata('user_type')=='user')
                                       {?>
                                      <span class="name-caret">RM:</span> <?php echo $this->session->userdata('manager_name'); ?><br>
                                        <?php } ?>
									<ul>

									<li><a class="tooltips" href="<?= base_url('dashboard/profile'); ?>"><span>Profile</span><i class="lnr lnr-user"></i></a></li>
										<li><a class="tooltips" style=" color: #d8c26b !important; " href="#"><span>Team Size</span><?php if($this->session->userdata("manager_team_size")) echo $this->session->userdata("manager_team_size")?$this->session->userdata("manager_team_size"):''?></a></li>
										<li><a class="tooltips" href="<?php echo base_url()?>login/logout"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
										</ul>
									</div>
							   <!--//down-->
                           <?php $this->load->view('inc/header_nav'); ?>
                           <div style="height: 100%"></div>
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
<!--js 
<script type="text/javascript" src="<?php echo base_url()?>assets/js/TweenLite.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/CSSPlugin.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.nicescroll.js"></script>-->
<!--<script src="<?php echo base_url()?>assets/js/scripts.js"></script>-->
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
        get_revenues();

        $('.view_callbacks').click(function(){
            var type = $(this).data('type');
            var data = {};
            switch (type)
            {
                case "user_total":
                    data.advisor = "<?php echo $user_id; ?>";
                    data.due_date = "<?php echo date('Y-m-d'); ?>";
                    data.access = 'read_write'; 
                    break;

                case "user_overdue":
                    data.advisor = "<?php echo $user_id; ?>";
                    data.due_date_to = "<?php echo date('Y-m-d H:i:s'); ?>";
                    data.for = "dashboard";
                    data.access = 'read_write'; 
                    break;

                case "user_active": 
                    data.advisor = "<?php echo $user_id; ?>";
                    data.for = "dashboard";
                    data.access = 'read_write'; 
                    break;

                case "user_close": 
                    data.advisor = "<?php echo $user_id; ?>";
                    data.status = "close";
                    break;

                case "user_important":
                    data.advisor = "<?php echo $user_id; ?>";
                    data.access = 'read_write'; 
                    data.important = 1;
                    break;

                case "manager_active": 
                    data.advisor = "<?php echo $user_id; ?>";
                    data.for = "dashboard";
                    data.access = 'read_write'; 
                    break;

                case "manager_close":
                    data.advisor = "<?php echo $user_id; ?>";
                    data.status = "close";
                    break;
            }
            
            view_callbacks(data,'post');

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
    function view_callbacks(data, method) {
        var form = document.createElement('form');
        form.method = method;
        form.action = "<?php echo base_url()."view_callbacks?" ?>"+jQuery.param(data);
        for (var i in data) {
            var input = document.createElement('input');
            input.type = "text";
            input.name = i;
            input.value = data[i];
            form.appendChild(input);
        }
        //console.log(form);
        document.body.appendChild(form);
        form.submit();
    }

</script>
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
        get_revenues();

       

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
    function view_callbacks(data, method) {
        var form = document.createElement('form');
        form.method = method;
        form.action = "<?php echo base_url()."view_callbacks?" ?>"+jQuery.param(data);
        for (var i in data) {
            var input = document.createElement('input');
            input.type = "text";
            input.name = i;
            input.value = data[i];
            form.appendChild(input);
        }
        //console.log(form);
        document.body.appendChild(form);
        form.submit();
    }

</script>
</body>
</html>