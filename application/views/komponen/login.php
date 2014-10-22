<div class="row" style="padding:10px;">
<div class="col-md-6 col-xs-12">
<div class="panel panel-primary">
  <div class="panel-heading">
	<b><?=showicon('pencil')?> Information Board</b>
  </div>
  <div class="panel-body" style="height:auto">
	<p>Tempat ini dapat diisi dengan informasi seputar keuangan</p>
  </div>
</div>
</div>
<div class="col-md-6 col-xs-12">
<!--login-->
<div class="panel panel-danger">
  <div class="panel-heading">
	<h4><?=showicon('lock')?> LOGIN Keuangan Yayasan</h4>
  </div>
  <div class="panel-body">
<form class="form-inline" role="form" method="POST" action="<?=base_url()?>landing/ceklogin.xhtml">
  <div class="form-group">
    <label class="sr-only" for="exampleInputEmail2">User name</label>
    <input type="text" name="username" class="form-control" id="exampleInputEmail2" placeholder="Username">
  </div>
  <div class="form-group">
    <label class="sr-only" for="exampleInputPassword2">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-danger">Sign in</button>&nbsp;&nbsp;<span class="text-danger"><?=$pesan_write?></span>
</form>
  </div>
</div>
<div class="panel panel-warning">
  <div class="panel-heading">
	<h4><?=showicon('ok')?> LOGIN TU/Admin Lembaga</h4>
  </div>
  <div class="panel-body">
    <form class="form-inline" role="form" method="POST" action="<?=base_url()?>landing/ceklogin.xhtml">
  <div class="form-group">
    <label class="sr-only" for="exampleInputEmail2">User name</label>
    <input type="text" name="username" class="form-control" id="exampleInputEmail2" placeholder="Username">
  </div>
  <div class="form-group">
    <label class="sr-only" for="exampleInputPassword2">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-warning">Sign in</button>&nbsp;&nbsp;<span class="text-danger"><?=$pesan_write?></span>
</form>
  </div>
</div>
<div class="panel panel-success">
  <div class="panel-heading">
	<h4><?=showicon('user')?> LOGIN Guru</h4>
  </div>
  <div class="panel-body">
    <form class="form-inline" role="form" method="POST" action="<?=base_url()?>landing/ceklogin.xhtml">
  <div class="form-group">
    <label class="sr-only" for="exampleInputEmail2">User name</label>
    <input type="text" name="username" class="form-control" id="exampleInputEmail2" placeholder="Username">
  </div>
  <div class="form-group">
    <label class="sr-only" for="exampleInputPassword2">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-success">Sign in</button>&nbsp;&nbsp;<span class="text-danger"><?=$pesan_write?></span>
</form>
  </div>
</div>
<!--login-->
</div>
</div>