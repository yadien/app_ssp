<?php
	$session = $this->session->all_userdata();
	if ( isset ( $session['userid'] ) ):
		echo "";
	else:
		redirect( 'landing/login', 'refresh' );
	endif;
?>