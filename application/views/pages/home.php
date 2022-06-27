
<!-- Second Photo Grid-->
<?php $i = 1; foreach($blogs->data as $key => $blog) { ?>
    <?php if ($i % 4 == 1) { echo '<div class="w3-row-padding w3-padding-16 w3-center">'; } ?>

    <div class="w3-quarter">
        <div class="w3-card w3-panel">
            <img src="<?php echo base_url() . 'uploads/blog/' . $blog->image; ?>" alt="<?php echo $blog->title; ?>" style="width:100%">
            <h3><a href="<?php echo base_url() . 'home/page/' . $blog->id; ?>"><?php echo $blog->title; ?></a></h3>
            <p><?php echo $blog->content; ?>.</p>
        </div>
    </div>

    <?php if ($i % 4 == 0) { echo "</div>"; }
$i++; } ?>

<?php if ($i % 4 != 1) echo "</div>";  ?>