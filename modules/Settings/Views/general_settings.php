<div class="mb-3">
	<div class="col-md">
		<small class="text-light fw-semibold d-block">General Settings</small>
		<div class="row">
			<?php if (empty(get_option('profile_picture'))): ?>
				<div class="col-md-12 mt-3">
					<label for="profile_picture" class="form-label">Profile Picture</label>
					<input type="file" id="profile_picture" name="profile_picture" class="form-control">
					<img src="" id="preview-image" class="mt-3" alt="">
				</div>
			<?php endif ?>
			<?php if (!empty(get_option('profile_picture'))): ?>
				<div class="col-md-12 mt-3 d-flex">
					<img src="<?= base_url().'/uploads/general/'.get_option('profile_picture').'' ?>" alt="">
					<a href="" data-name="profile_picture" id="delete"><i class="bi bi-x"></i></a>
				</div>
			<?php endif ?>
			<div class="col-md-12 mt-3">
				<label class="form-label" for="allow_user_to_register">ALLOW USER TO REGISTER ?</label>
		        <div class="form-check">
		            <input
		            class="form-check-input"
		            type="radio"
		            name="allow_user_to_register"
		            id="allow_user_to_register"
		            value="yes"
		            <?php if(get_option('allow_user_to_register') == 'yes') { echo 'checked'; } ?>
		            />
		            <label class="form-check-label" for="yes">YES</label>
		        </div>
		        <div class="form-check">
		            <input
		            class="form-check-input"
		            type="radio"
		            name="allow_user_to_register"
		            id="allow_user_to_register"
		            value="no"
		            <?php if(get_option('allow_user_to_register') == 'no') { echo 'checked'; } ?>
		            />
		            <label class="form-check-label" for="no">NO</label>
		        </div>
			</div>
		</div>
	</div>
</div>

<script>
	$('#preview-image').hide();
        $('#profile_picture').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-image').show();
                $('#preview-image').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
        }); 
</script>
	