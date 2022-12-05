<?php

	function IsAdmin(){
	    
	    $ci =& get_instance();

	    if($ci->session->userdata('IsAdmin') <> 1){
	    
       		$ci->session->set_flashdata('message', 'Silahkan Login Terlebih Dahulu');
		
			redirect('Auth','refresh');
	    
	    }
	    
	}
?>