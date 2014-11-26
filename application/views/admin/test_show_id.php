<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <table class="table">
                <?php foreach ($project as $key => $value):?>
                <tr>
                    <th><?=$key?></th>
                    <td><?=$value?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <a class="btn btn-default" href="<?=base_url().'node/add/'.$project->pid?>">add node</a>
            <table class="table">
                <tbody>
                    <?php foreach ($nodes as $node): ?>
                    <tr>
                        <?php foreach ($node as $key => $value): ?>
                        <td><?=$value?></td>
                        <?php endforeach; ?>
                        <td>
                            <a href="<?=base_url().'node/update/'.$node->nid?>" class="btn btn-default">修改</a>
                        </td>
                        <td>
                            <a href="javascript:;" class="btn btn-default history" data-nid="<?=$node->nid?>">历史记录</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>



<script>
    $(function() {
        $('.history').click(function(event) {
            var nid = $(this).data('nid');
            $('#history').html('');
            $.get("<?=base_url()?>/node/history/" + nid, function(data) {
                console.info(typeof data);
                data.data.forEach(function(item) {
                    var $tr = $('<tr></tr>');
                    for (var key in item) {
                        $tr.append($('<td>' + item[key] + '</td>'));
                    }
                    $('#history').append($tr);
                });
                $('#myModal').modal('show');
            });
        });
    })
</script>
<div class="modal fade bs-example-modal-lg" tabindex="-1" id="myModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">历史记录</h4>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tbody id="history">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
