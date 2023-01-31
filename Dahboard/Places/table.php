<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Places Table</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>place</th>
                            <th>description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach($result as $place){
                    ?>
                        <tr>
                            <td><?=$id++?></td>
                            <td><?=$place['place_name']?></td>
                            <td><?=$place['place_description']?></td>

                            <td>
                                <a class="btn action" href="Places/delete.php?place_id=<?=$place['place_id']?>">Delete</a>
                                <a class="btn action1" href="?edit=<?=$place['place_id']?>">Edit</a>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
</body>

</html>