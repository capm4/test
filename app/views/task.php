
<a href="/" class="btn btn-primary" style="margin: 20px;">
    Back
</a>
<? var_dump($_SESSION) ?>

<div class="col-12 toppad" >
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
                </div>
            </div>
        </div>
    </div>
</div>
