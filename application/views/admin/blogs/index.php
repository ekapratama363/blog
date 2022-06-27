
  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-pencil  w3-text-blue"></i> My Blog</b></h5>
  </header>

  <div class="w3-panel">

    <?php if($this->session->flashdata('success') != NULL) { ?>
        <div class="w3-panel w3-green w3-round">
            <p>Success!</p>
        </div>
    <?php } ?>

    <div class="w3-card">
        <a href="<?php echo base_url() ?>admin/blog/create" class="w3-button w3-blue"><i class="fa fa-plus"></i></a>
        <br>
        <br>
        <table class="w3-table w3-striped w3-white">
            <thead>
                <tr class="w3-green">
                    <td>Title</td>
                    <td>Content</td>
                    <td>Image</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($blogs->data as $blog) { ?>
                <tr>
                    <td><?php echo $blog->title ?></td>
                    <td><?php echo $blog->content ?></td>
                    <td>
                        <img 
                            width='70px' height='70px'
                            src="<?php echo base_url() ?>uploads/blog/<?php echo $blog->image ?>" alt="<?php echo $blog->title ?>">
                    </td>
                    <td style="width: 200px">
                        <a href="<?php echo base_url() ?>admin/blog/edit/<?php echo $blog->id ?>" class="w3-button w3-green"><i class="fa fa-pencil"></i></a>
                        <a 
                            onclick="return confirm('delete this item?')"
                            href="<?php echo base_url() ?>admin/blog/delete/<?php echo $blog->id ?>"
                            class="w3-button w3-red"><i class="fa fa-trash"></i></a>       
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
      </div>
  </div>