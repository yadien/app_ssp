<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>Applikasi SSP</title>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <meta name="MobileOptimized" content="320">
   <!-- BEGIN GLOBAL MANDATORY STYLES -->          
   <link href="<?=base_url();?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
   <link href="<?=base_url();?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
   <link href="<?=base_url();?>assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
   <!-- END GLOBAL MANDATORY STYLES -->
   
   <!-- BEGIN THEME STYLES --> 
   <link href="<?=base_url();?>assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
   <link href="<?=base_url();?>assets/css/style.css" rel="stylesheet" type="text/css"/>
   <link href="<?=base_url();?>assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
   <link href="<?=base_url();?>assets/css/plugins.css" rel="stylesheet" type="text/css"/>
   <link href="<?=base_url();?>assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
   <link href="<?=base_url();?>assets/css/pages/login-soft.css" rel="stylesheet" type="text/css"/>
   <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet" type="text/css"/>
   <!-- END THEME STYLES -->
   <link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">


	<!-- BEGIN LOGO -->	
	   <div class="logo">
		  <img src="<?=base_url();?>assets/img/logo-tangsel.png" alt="" width="200" />
	   </div>
   <!-- END LOGO -->
   
   <!-- BEGIN LOGIN -->
   <div class="content">
      <div class="alert alert-danger" style='display: none;' id='errmsg'>
         <strong>Error!</strong> <div id='errmsg_text'></div>
      </div>
      <!-- BEGIN LOGIN FORM -->
      <?php $form_attributes = array ('class' => 'login-form', 'id' => 'frmLogin');?>
      <?=form_open('auth', $form_attributes);?>
         <h3 class="form-title">Login to your account</h3>
         <div class="alert alert-error hide">
            <button class="close" data-dismiss="alert"></button>
            <span>Enter any username and password.</span>
         </div>
         <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Username</label>
            <div class="input-icon">
               <i class="icon-user"></i>
               <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" id='username'/>
            </div>
         </div>
         <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <div class="input-icon">
               <i class="icon-lock"></i>
               <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" id='password'/>
            </div>
         </div>
         <div class="form-actions">
            <label class="checkbox">
            <input type="checkbox" name="remember" value="1"/> Remember me
            </label>
            <button type="submit" class="btn blue pull-right">
            Login <i class="m-icon-swapright m-icon-white"></i>
            </button>            
         </div>
      <?=form_close();?>
      <!-- END LOGIN FORM -->        
   </div>
   <!-- END LOGIN -->
   <!-- BEGIN COPYRIGHT -->
   <div class="copyright">
      <?=date('Y');?> &copy; PEMDA Kota Tangerang Selatan.
   </div>
   <!-- END COPYRIGHT -->
   <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
   <!-- BEGIN CORE PLUGINS -->   
   <!--[if lt IE 9]>
   <script src="<?=base_url();?>assets/plugins/respond.min.js"></script>
   <script src="<?=base_url();?>assets/plugins/excanvas.min.js"></script> 
   <![endif]-->   
   <script src="<?=base_url();?>assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
   <script src="<?=base_url();?>assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
   <script src="<?=base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
   <script src="<?=base_url();?>assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
   <script src="<?=base_url();?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
   <script src="<?=base_url();?>assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>  
   <script src="<?=base_url();?>assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
   <script src="<?=base_url();?>assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
   <!-- END CORE PLUGINS -->
   <!-- BEGIN PAGE LEVEL PLUGINS -->
   <script src="<?=base_url();?>assets/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
   <script src="<?=base_url();?>assets/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
   <script type="text/javascript" src="<?=base_url();?>assets/plugins/select2/select2.min.js"></script>
   <!-- END PAGE LEVEL PLUGINS -->
   <!-- BEGIN PAGE LEVEL SCRIPTS -->
   <script src="<?=base_url();?>assets/scripts/app.js" type="text/javascript"></script>
   <script src="<?=base_url();?>assets/scripts/login-soft.js" type="text/javascript"></script>
   <!-- END PAGE LEVEL SCRIPTS --> 
   <script type='text/javascript'>
      

   jQuery(document).ready(function() {
      $('#username').focus();
      App.init();
      Login.init();
   });
   var login = function(form){
      $('#errmsg').hide();
      postBody = $(form).serialize();
      url = $(form).attr('action');
      $.post(url, postBody, function(rtn){
         if(rtn.code == 0)
            document.location.href = rtn.redir;
         else
         {
            $('#errmsg_text').html(rtn.message);
            $('#errmsg').show();
            $('#username, #password').val('');
            $('#username').focus();
         }
      }, 'json');
      return false;
   }

   </script>
   <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>