<?php require APPROOT.'/views/inc/header.php'; ?>



    <a href="<?php echo URLROOT ;?>/posts" class="btn btn-light"> <i class="fa fa-backward"></i></i> Back</a>
        <div class="card card-body bg-light mt-5">
            <h2>Edit Post</h2>
            <p>Create a post with this form </p>
            <form action="<?php echo URLROOT;?>/posts/Edit/<?php echo $data['id'] ;?>" method="POST">
                
                <div class="form-group">
                    <label for="Title"> Title : <sup>*</sup></label>
                    <input type="Title" name="title" id="Title"
                        class="form-control  form-control-lg <?php echo (!empty($data['title_err']) )? 'is-invalid' : ''; ?>"
                        placeholder="" value="<?php echo $data['title'] ?>">
                    <span class="invalid-feedback"><?php echo $data['title_err'] ?></span>


                </div>

                <div class="form-group">
                    <label for="Body"> Body : <sup>*</sup></label>
                    <textarea type="Body" name="body" id="Body"
                        class="form-control  form-control-lg <?php echo (!empty($data['body_err']) )? 'is-invalid' : '' ; ?>"
                        placeholder="" ><?php echo $data['body'] ?></textarea>
                    <span class="invalid-feedback"><?php echo $data['body_err'] ?></span>


                </div>
                <input type="submit" value="Edit POST" class="btn btn-success">
 
            </form>

        </div>

 

<?php require APPROOT.'/views/inc/footer.php'; ?>