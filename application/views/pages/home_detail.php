
<div class="w3-row-padding w3-padding-16">
    <div class="w3-card w3-panel">
        <div class="w3-center">
            <img src="<?php echo base_url() . 'uploads/blog/' . $blog->data->image; ?>" 
                alt="<?php echo $blog->data->title; ?>" style="width:30%">

            <h3><?php echo $blog->data->title; ?></h3>
        </div>

        <article>
            <?php echo $blog->data->content; ?> 
        </article>
    </div>
</div>
