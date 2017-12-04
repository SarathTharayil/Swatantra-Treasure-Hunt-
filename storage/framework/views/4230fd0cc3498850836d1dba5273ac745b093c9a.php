<<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin Page</title>

		<!-- Bootstrap CSS -->
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
     <link href="<?php echo e(URL::asset('css/navigationbar.css')); ?>" rel="stylesheet"> 
		<link href="<?php echo e(URL::asset('css/adminhome.css')); ?>" rel="stylesheet">
     <link href="<?php echo e(URL::asset('css/custommodal.css')); ?>" rel="stylesheet"> 

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body id="mainbody">
		  <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="topcontainer">
        
        <div class="container-fluid" id="test">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo e(route('adminhomepage')); ?>" id="glyphy"><span  class="glyphicon glyphicon-link"></span></a>
                  <a class="navbar-brand" href="<?php echo e(route('adminhomepagetechie')); ?>" id="glyphy"><span  class="glyphicon glyphicon-text-width"></span></a>

                  <a class="navbar-brand" href="<?php echo e(route('questionlist')); ?>" id="glyphy"><span  class="glyphicon glyphicon-book"></span></a>
                 
                      <a class="navbar-brand" href="<?php echo e(route('questionlisttechie')); ?>" id="glyphy"><span  class="glyphicon glyphicon-list-alt"></span></a>
                         
                             
               <a class="navbar-brand" href="<?php echo e(route('adminaddquestion')); ?>" id="glyphy"><span  class="glyphicon glyphicon-plus-sign"></span></a>
                
                <a class="navbar-brand" href="#" id="glyphy" data-toggle="modal" data-target="#rules_modal" ><span  class="glyphicon glyphicon-registration-mark"></span></a>
            </div> 
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
           
                 
                 
               
           <!--         <li>
                        <a href="#">Contact</a>
                    </li> -->
                </ul>
                
              <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <?php if(Auth::guest()): ?>
                            <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
                            <li><a href="<?php echo e(route('register')); ?>">Register</a></li>
                        <?php else: ?>
                            <li class="dropdown">
                                   <a id="namebutton" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative;"><img src="/storage/profile_avatars/<?php echo e(Auth::user()->profile_avatar); ?>" style="width:20px;height:20px; position:absoulte; border-radius:50%;">
                                     <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                   
                                    <li>
                                        <a id="logoutbutton" href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>  
              
            </div>
         </div>
         </nav>

 

 <br> 
<br>
    <div class="container-fluid" id="topmostcontainer">
    <div class="container" id="topcontainer">
  <div class="row" id="contactlisttable">
      <div class="panel panel-def Contactault" id="toplevel">
        <div class="panel-heading">
    <br>
    <br>         
  
        <table class="table table-fixed table-hover" >
          <thead>
            <tr>
              <th class="text-center 2-xs-offset-1 col-xs-2 col-sm-offset-1 col-sm-2 col-md-offset-1 col-md-2 col-lg-offset-1 col-lg-2" id= "formobilehead1" >RANK</th><th class="text-center col-xs-2 col-sm-2 col-md-2 col-lg-2" id= "formobilehead">NAME</th><th class="text-center col-xs-2 col-sm-2 col-md-2 col-lg-2" id= "formobileheadcollege1">PHONE</th><th class="text-center col-xs-1 col-sm-1 col-md-1 col-lg-1" id= "formobilehead1">LEVEL</th><th class="text-center col-xs-2 col-sm-2 col-md-2 col-lg-2" id= "formobileheadtime1">EMAIL</th><th class="text-center col-xs-2 col-sm-2 col-md-2 col-lg-2" id= "formobileheadcollege1">Attempts</th>
           </tr>
          </thead>
           <tbody>
          <?php if(count($fulldata)): ?>
           <?php $__currentLoopData = $fulldata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eachuser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <tr class="currentrowcontact" id="rowelement" data-toggle="modal" data-target="#PreviewModal"> 
          <td class="text-center col-xs-1 col-sm-1 col-md-1 col-lg-1"><span><img src="/storage/profile_avatars/<?php echo e($eachuser->profile_avatar); ?>" id="admpageimage"></span></td><td class="text-center col-xs-2 col-sm-2 col-md-2 col-lg-2" id="currentposition"><?php echo e($loop->iteration); ?></td><td class="text-center col-xs-2 col-sm-2 col-md-2 col-lg-2" id="currentname"><?php echo($eachusrclg = (strlen($eachuser->name) > 15) ? substr($eachuser->name,0, 13).'..' : $eachuser->name); ?></td><td class="text-center col-xs-2 col-sm-2 col-md-2 col-lg-2" id="college"><?php echo e($eachuser->phoneno); ?></td><td class="text-center col-xs-1 col-sm-1 col-md-1 col-lg-1" id="currentlevel"><?php echo e($eachuser->level); ?></td><td class="text-center col-xs-2 col-sm-2 col-md-2 col-lg-2" id= "formobilehead1"><?php echo($eachusrclg = (strlen($eachuser->email) > 18) ? substr($eachuser->email,0, 15).'..' : $eachuser->email); ?></td><td class="text-center col-xs-2 col-sm-2 col-md-2 col-lg-2" id= "formobilehead1"><?php echo e($eachuser->attempts); ?></td>  
          <input type="hidden" id="currentid" value="<?php echo e($eachuser->user_id); ?>">
          <input type="hidden" id="photo" value="<?php echo e($eachuser->profile_avatar); ?>">
          <input type="hidden" id="blockorunblock" value="<?php echo e($eachuser->blocked); ?>">
          <input type="hidden" id="institute" value="<?php echo e($eachuser->college); ?>">

          </tr>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
           <?php endif; ?>    
          </tbody>
        </table>
      
      </div>
  </div>
</div>
<br>
<br>
</div>


<!-- Modal -->
<div class="modal fade" id="PreviewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog mymodal" role="document">
        <div class="modal-content" id="modaldesign">
      <div class="modal-header" id="mheader">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
    
      <div class="modal-body" >
      <div class="container-fluid" id="mbody">

       <input type="hidden" id="elementid">

       <div class="row">
           <div class="col-lg-offset-4 col-lg-4">
               <div class="well col-lg-offset-2 col-lg-10">
                   <a href="#" id="pop" data-toggle="" data-target="#">
                       <img id="imageresource" src="">
                   </a>
                   
                   
           </div>
           </div>
           </div>

              <p id ="labelmp" style="text-align:center;font-weight:bold;">Rank:<span id="inputR" style="margin-left:1px;"></span></p>
              <p id ="labelmp" style="text-align:center;font-weight:bold;">Name:<span id="inputN" style="margin-left:1px;"></span></p>
               <p id ="labelmp" style="text-align:center;font-weight:bold;">Institute:<span id="inputC" style="margin-left:1px;"></span></p>
  

  <div class="modal-footer">

    
     <button type="button" class="btn btn-danger" id="deletebutton" data-dismiss="modal">Delete</button>
      
      <button type="button" class="" id="updatebutton" data-dismiss="modal"></button>
      </div>
      


      </div>
    </div>
    </div>
  </div>
</div> 






<!--RULE  Modal -->
<div id="rules_modal" class="modal fade move-horizontal" role="dialog">
  <div class="modal-dialog" id="rulemodaldial" style="transition:none;">

    <!-- Modal content-->
    <div class="modal-content" style="background:black">
      <div class="modal-header" style="text-align:center;border-bottom: 1px solid #4d4d4d;color:white">
        <button type="button" style="color:white" class="close" data-dismiss="modal">&times;</button>
        <h4  class="modal-title">Rules</h4>
      </div>
      <div class="modal-body" style="color:white">
<p style="font-weight:bold;text-decoration:underline;margin:0px;">Notes</p>
 <p style="margin:0px;">Game progress in seperate path for Students and Techie/Others.There will be winners from both user sections.</p>
      <p style="margin:0px;">-You are a <span style="font-size:15px;margin-right:4px;"><?php if(strcmp(Auth::user()->usertype,"s")==0): ?><?php echo('student');?><?php else: ?> <?php echo('others');?><?php endif; ?></span>User.</p>
       <p style="margin:0px;">only<span style="font-size:15px;margin-right:4px;margin-left:4px"><?php if(strcmp(Auth::user()->usertype,"s")==0): ?><?php echo('student');?><?php else: ?> <?php echo('techies/others');?><?php endif; ?></span> leaderboard/Questions will be accessible for you.</p>
<p style="font-weight:bold;text-decoration:underline;margin:0px;">Question & Answering</p>


<p style="margin:0px;">-The Treasure Hunt has total 40 Level in which each Level consist of 1 Question.</p>
<p style="margin:0px;">-The Treasure Hunt for <span style="font-size:15px;margin-right:2px;"><?php if(strcmp(Auth::user()->usertype,"s")==0): ?><?php echo('student');?><?php else: ?> <?php echo('others');?><?php endif; ?></span> has currently <span style="font-size:18px;margin-right:2px;"><?php echo e($totalquestion); ?></span>questions.</p>
<p style="margin:0px;">-Admin will add Questions throughtout the progress of the Game.</p>
<p style="margin:0px;">-Answers are not Case-Sensitive and nor space-Sensitive.</p>
<p style="margin:0px;">for eg: if your answer is 'superman'</p>
<p>You can answer in anycase u want. like 'Superman' or 'SUPERMAN' or 'sUPeRMaN'  or 'super man'. </p>

<p style="font-weight:bold;text-decoration:underline;margin:0px;">LeaderBoard</p>
<p style="margin:0px;">-The Leaderboard shows top 500 Players current position and last level completion time with date.Every Player can view thier Rank at top of the Leaderboard.</p>
<p>-Ranking of Players in same Level are time dependant, ie PLayer who complete that level first will be top among them.</p>

<p style="font-weight:bold;text-decoration:underline;margin:0px;">Prizes for students Player section</p>
<p style="font-weight:bold;margin:0px;">-First Prize  : Rs 30000</p>
<p style="font-weight:bold;margin:0px;">-Second Prize : Rs 15000 </p>
<p style="font-weight:bold">-Third Prize  : Rs  5000 </p>

<p style="font-weight:bold;text-decoration:underline;margin:0px;">Prizes for techie/other Player section</p>
<p style="font-weight:bold;margin:0px;">-First Prize  : will be anounced later</p>
<p style="font-weight:bold;margin:0px;">-Second Prize : will be anounced later</p>
<p style="font-weight:bold">-Third Prize  : will be anounced later</p>
<p style="font-weight:bold;text-decoration:underline;margin:0px;">Deciding Winner</p>
<p style="margin:0px;">-The Player who top the leaderboard at the closing Date will be  declared the winner,ie Player who comes Rank 1 in Leaderboard on closing date.</p>
<p>-Closing Date  : will be anounced later.</p>

<p style="font-weight:bold;text-decoration:underline;margin:0px;">Deciding Runner Up & Second Runner Up</p>
<p>-As Soon as the first prize winner is declared,his level number will be taken as a reference.let it be x. All players except winner have to go through <span style="font-size:18px; font-weight:bold;">2</span> extra levels apart from the x Levels to compete for the second and third Prize.Top 2 players from that x+2 levels will be declared the first and second Runner up Respectively.</p>

<p style="font-weight:bold;text-decoration:underline;margin:0px;">Clues & Hints</p>
<p style="margin:0px;">-Clues will be available in the Swatantra Hunt Telegram Group <a href="https://t.me/swatantra_treasurehunt" target="_blank">Swatantra Hunt Telegram</a>(Recommended) and SwatantraHunt Facebook page <a href="https://www.facebook.com/pg/swatantra.treasurehunt/posts/" target="_blank"> Swatantra Hunt Fb</a>.</p>
<p>-Frequency of clues will depend on the difficulty of each Level.</p>

<p style="font-weight:bold;text-decoration:underline;margin:0px;">Admin Rights</p>
<p style="margin:0px;">-Anyone who attempts malpractices like hacking will be blocked at once. </p>
<p style="margin:0px;" >-Student section winners need to produce their valid institute id card copy when admin ask for the same.Otherwise their prize will be cancelled.</p>
<p style="margin:0px;">-Only 1 account per Person is allowed.Any such malpractises could even lead to prize cancellation for the Player.</p>
<p style="margin:0px;">-Admin Rights are not limited to these and Admin decisions are Final.</p>
<p style="margin:0px;">-For any technical issues contact sajras1992@gmail.com or jithin@space-kerala.org</p>








      </div>
    </div>
  </div>
</div>



      

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<!-- UserdDefined  scripts   -->

<script>
$(document).ready(function(){

$(document).on('click','.currentrowcontact',function(event){

var id = $(this).find('#currentid').val();
var filename = $(this).find('#photo').val();

var rank = $(this).find('#currentposition').text();
var name = $(this).find('#currentname').text();
var phone = $(this).find('#college').text();
var blockorunblock = $(this).find('#blockorunblock').val();
var institute = $(this).find('#institute').val();

$('#inputR').text(rank);
$('#inputN').text(name);
$('#inputC').text(institute);
$('#elementid').val(id);
var folder ='/storage/profile_avatars/';
var imgpath = folder.concat(filename);
$('#imageresource').attr('src',imgpath);

if(blockorunblock == true)
{

$('#updatebutton').attr('class','btn btn-success');
$('#updatebutton').text('Unblock');
}
else
{
 $('#updatebutton').attr('class','btn btn-danger');
 $('#updatebutton').text('Block'); 
}

});



//block unblock functionality

$(document).on('click','#updatebutton',function(event){


var id = $('#elementid').val();
var r= confirm("Are you Sure want to Block or Unblock this User");
if(r==true)
{
$.ajax({
    url:"<?php echo e(route('blockunblock')); ?>",
    type: 'post',
    data: {'id':id,_method:'delete','_token':$('input[name=_token]').val()},
    success: function(data){ 
      
    $('#contactlisttable').load(location.href + ' #contactlisttable');
    }


});

}

});
//end of blockunblock

//delete user functionality

$(document).on('click','#deletebutton',function(event){


var id = $('#elementid').val();
var r= confirm("Are you Sure want to  Delete this User Later cannot revoke back the decision");
if(r==true)
{
$.ajax({
    url:"<?php echo e(route('deleteuser')); ?>",
    type: 'post',
    data: {'id':id,_method:'post','_token':$('input[name=_token]').val()},
    success: function(data){ 
 
    $('#contactlisttable').load(location.href + ' #contactlisttable');
    }


});

}

});
//end of blockunblock



}); 
</script>



	</body>
</html>