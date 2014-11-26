<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <table class="table">
                <tbody>
                    <?php foreach ($projects as $project): ?>
                    <tr>
                        <?php foreach ($project as $key => $value): ?>
                        <td><?=$value?></td>
                        <?php endforeach; ?>
                        <td>
                            <a href="<?=base_url().'project/test_show_id/' . $project->pid?>" class="btn btn-default">查看</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?=$pagination?>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
