
    <div class="col-12 toppad" >
        <a href="/admin" class="btn btn-primary" style="margin: 20px;">
            Back
        </a>
        <div class="panel panel-info">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3 col-lg-3 " align="center">
                        <img src="<? echo $data['task']->getStoreImg()?>"/>
                    </div>

                    <div class=" col-md-9 col-lg-9 ">
                        <table class="table table-user-information">
                            <tbody>
                            <tr>
                                <td><h3>User name is :</h3></td>
                                <td><h3><? echo $data['task']->getUserName() ?></h3></td>
                            </tr>
                            <tr>
                                <td><h3>User email is :</h3></td>
                                <td><h3><? echo $data['task']->getUserEmail() ?></h3></td>
                            </tr>
                            <tr>
                                <td><h3>User Task :</h3> </td>
                                <td><h3> <? echo $data['task']->getTask() ?></h3></td>
                            </tr>
                            </tbody>

                        </table>
                        <div id="forma">
                            <form method="post" action="/admin/updateTask/<? echo $data['task']->getId() ?>" enctype="multipart/form-data">

                                <input type="hidden" name="id" value="<? echo $data['task']->getId() ?>">

                                <div class="form-group">
                                    <label><h3>Task</h3></label>
                                    <textarea name="task" class="form-control" rows="3" ><? echo $data['task']->getTask()?></textarea>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <label><h3>Progress : <? if($data['task']->getProgress() == 0){ ?>
                                                    <span style="color: #9c3328">In Progress</span>
                                                <?}else{?>
                                                    <span style="color: #0f8251">Done</span>
                                                <?}?></h3></label>
                                    </div>
                                    <div class="form-group">
                                        <label><h3>Cheange Progress</h3></label>
                                        <input name="progress" style="margin-left: 20px; vertical-align: middle" type="checkbox"
                                            <? if($data['task']->getProgress() == 1){
                                                ?>
                                                checked="checked"
                                            <?}?>
                                        >
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>





