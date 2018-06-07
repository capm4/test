
    <div>
        <button href="/addTask" class="btn btn-primary" id="task_create" style="margin-bottom: 20px; display: none">
            Back
        </button>
   </div>
    <div id="tbody" class="wrapper container-fluid">
    </div>

    <div id="forma">
        <form method="post" action="/addTask" enctype="multipart/form-data">
            <div class="form-group">

                <label>Name</label>
                <input name="name" type="text" class="form-control"  placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Task</label>
                <textarea name="task" class="form-control" rows="3"></textarea>
            </div>
            <? if($_SESSION['img_error']){?>
               <div class="alert alert-danger" role="alert">
                    <strong>Oh snap!</strong> <?echo  $_SESSION['img_error']?>.
               </div>
            <?}$_SESSION['img_error'] = null ?>
            <div class="form-group">
                <label>Image input</label>
                <input name="img" type="file" class="form-control-file">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <hr>
            <button type="submit" id="task_preview" class="btn btn-primary" style="margin-bottom: 20px">
                Task Preview
            </button>
        </form>

    </div>




