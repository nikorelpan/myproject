<div id="modal-content">

    <h3 class="large-subtitle">
        <?php echo $merchant['profile_name']; ?>
    </h3>
    
    <?php if ($this->success_msg != ''): ?>
        <div class="alert alert-success" role="alert">
        	<?php echo $this->success_msg; ?>
        </div>  
        <script type="text/javascript">

        self.parent.set_data_change_to_true();
	
        </script>	
    <?php endif; ?>
    
    <?php if ($this->error_msg != ''): ?>
    	<div class="alert alert-danger" role="alert">
    		<?php echo $this->error_msg; ?>
    	</div>
    <?php endif; ?> 
    
    <?php if (validation_errors() != ''): ?>    
        <div class="alert alert-danger" role="alert">
            <?php echo validation_errors(); ?>
        </div>
    <?php endif; ?>
    
    <?php if (!empty($form_error_msgs)): ?>
        <div class="alert alert-danger" role="alert">
        	<?php foreach ($form_error_msgs as $error_msg): ?>
                <p><?php echo $error_msg; ?></p>
        	<?php endforeach; ?>
        </div>    
    <?php endif; ?>
        
    <h3>
        DNS Entry Details
    </h3>

    <p>
        Edit the Do Not Sell list entry for this merchant.
    </p>    
    
    <form action="/enforcement/do_not_sell_edit/<?php echo $merchant_id; ?>" method="post">
        
        <p>
            Status: <?php echo $status_dropdown; ?>
        </p>
         		
        <p id="removal-date-field"<?php if ($saved_status == 1): ?> style="display:none;"<?php endif; ?>>
            Removal Date: <input class="start dateInput" value="<?php echo $removal_date; ?>" id="end-date-field" name="end_date" />
        </p>
        
        <p>
            Note About Change
        </p>
        
        <p>
            <textarea style="width: 60%; height: 100px;" name="change_note"></textarea>
        </p>
         		
        <p style="margin-top: 20px;">                
            <input class="btn btn-success" type="submit" value="Save Changes" />
        </p>	
    
    </form>
    
    <hr />
    
    <h3>
        Violation Level
    </h3>
    
    <form action="/merchants/change_level/<?php echo $merchant_id; ?>" method="post">
    
        <p>
            <!-- violation level: <?php echo $current_level; ?> -->
            Change current violation notification level to:
            <?php echo $violation_level_dropdown; ?>
        </p>
        
        <p>
            Note About Change
        </p>
        
        <p>
            <textarea style="width: 60%; height: 100px;" name="change_note"></textarea>
        </p>        
        
        <input type="hidden" name="redirect_to" value="/enforcement/do_not_sell_edit/<?php echo $merchant_id; ?>" />
         		
        <p style="margin-top: 20px;">                
            <input class="btn btn-success" type="submit" value="Change Level" />
        </p>	
                
    </form>        
</div>

<script type="text/javascript">
      
$(document).ready(function() {

    $('#end-date-field').datepicker({
        dateFormat: 'yy-mm-dd',
        minDate:'-20y'
    });

    $('#status-dropdown').on('change', function() {
        $('#removal-date-field').toggle();
    });    

});

</script>

