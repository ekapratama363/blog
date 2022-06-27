
<!-- Header -->
<header class="w3-container" style="padding-top:22px">
<h5><b><i class="fa fa-pencil  w3-text-blue"></i> My Blog</b></h5>
</header>

<div class="w3-panel">
    <div class="w3-card">
      <?php echo form_open_multipart('admin/blog/store', ['class' => 'w3-container']); ?>
            <br>
            
            <label>Title</label>
            <input required class="w3-input" type="text" name="title"> <br>

            <label>Content</label>
            <textarea required class="w3-input" name="content"></textarea> <br>

            <label>Image</label>
            <input required class="w3-input" type="file" name="image"> <br>

            <button type="submit"
                class="w3-button w3-blue">Save</button>

            <a href="<?php echo base_url() ?>/admin/blog" class="w3-button w3-green">Back</a>

            <br>
            <br>
        <?php echo form_close(); ?>
    </div>
</div>
