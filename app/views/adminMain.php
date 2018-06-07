<div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
    <h1 class="display-4 font-italic h1w">Hello this is Main Page</h1>
</div>
<div class="row mb-2">
    <a href="/addTask" class="btn btn-primary" style="margin-bottom: 20px">
        Create Task
    </a>
    <div class="dropdown" style="margin-left: 50px">
        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Sort by
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1" >
            <li><a  href="/">Id</a></li>
            <li> <a href="/sort/name">Name</a></li>
            <li><a href="/sort/email">Email</a></li>
            <li><a href="/sort/progress">Progress</a></li>
        </ul>
    </div>
    <table class="table table-condensed">
        <thead>
        <tr>
            <th><h2>Id</h2></th>
            <th><h2>User Name</h2></th>
            <th><h2>E-mail</h2></th>
            <th><h2>Task</h2></th>
            <th><h2>Progress</h2></th>
            <th><h2>Change Task</h2></th>
            <!--                <th><h1>Картинка</h1></th>-->
        </tr>
        </thead>
        <tbody>
        <?
        foreach ($data['tasks'] as $task){
            ?>
            <tr>
                <td><h3><?= $task->getId()?></h3></td>
                <td><h3><a href="/task/<? echo $task->getId() ?>">
                            <?= $task->getUserName()?>
                        </a>
                    </h3></td>
                <td><h3><?= $task->getUserEmail()?></h3></td>
                <td><h3><?= $task->getTask()?></h3></td>
                <td>
                     <? if($task->getProgress() == 0){
                     ?>
                         <h3 style="color: #9c3328">In Progress</h3>
                     <?}else{?>
                         <h3 style="color: #0f8251">Done</h3>
                     <?}?>
                </td>
                <td style="vertical-align: middle; text-align: center">
                    <a class="btn btn-primary" href="/task/admin/edit/<?echo $task->getId() ?>" >Cheange</a>
                </td>
            </tr>
        <?}?>
    </table>

    <div class="container">
        <div class="row">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center pagination-lg">
                    <? $countSecond = 1;
                    for($countfirst = 1; $countfirst<=$data['count']; $countfirst++) {
                        ?>
                        <? if($countfirst == 1){?>
                            <li class="page-item"><a class="page-link" href="/admin/"><? echo $countfirst?></a></li>
                        <? }else {?>
                            <li class="page-item"><a class="page-link" href="/admin/<? echo ($countfirst+$countSecond)?>"><? echo $countfirst?></a></li>
                            <?
                            $countSecond = $countSecond+2;
                        }?>
                    <? }?>
                </ul>
            </nav>
        </div>
    </div>

</div>