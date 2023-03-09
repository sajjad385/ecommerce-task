<?php 
require  $_SERVER['DOCUMENT_ROOT'] . '/app/views/inc/header.php'; 
?>
    <div class="row">
        <div class="col-md-12 text-center">
            <h2>All Categories</h2>
        </div>
        <div class="offset-2 col-md-8">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Category Name</th>
                    <th scope="col">Total Items</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data['categories'] as $category) : ?>

                    <tr>
                        <td><?php echo $category->category_name; ?></td>
                        <td><?php echo $category->item_count; ?></td>
                    </tr>

                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

<?php require $_SERVER['DOCUMENT_ROOT']  . '/app/views/inc/footer.php'; ?>
