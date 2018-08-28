<script src="<?=base_url("assets/dashboard/js/jquery-3.1.1.min.js"); ?>" type="text/javascript"></script>

<script type="text/javascript">
	$(document).ready(function() {
        window_width = $(window).width();
		if (window_width <= 768) {
			alert('mobile')
		}else{
			<?php $this->load->view('layout/Header_front');?>
			
		}
    });
</script>