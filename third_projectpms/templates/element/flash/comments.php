<div class="related">
    <h4><?= __('Related Comment') ?></h4>
    <?php if (!empty($product->product_comment)) : ?>
        <div class="table-responsive">
            <table>
                <div class="row">
                    <div class="col-md-6">
                    <tr>
                    <th><?= __('User') ?></th>
                    <th><?= __('Comments') ?></th>
                    <th><?= __('Rating') ?></th>
                   
                    
                </tr>
                    </div>
                    <div class="col-md-6">
                        <?php foreach ($product->product_comment as $comment) : ?>
                    <tr>
                        <td><i class="fa fa-user" style="font-size:24px;color:#5a5858;"></i><?= h($comment->name) ?></td>
                        <td><?= h($comment->comment) ?></td>
                        <td>
                        <?php
                           for ($i = 0; $i < $comment->rate_value; $i++) {
                               echo '<i class="fa-solid fa-star"></i>';
                           }
                           for ($j = $i; $j < 5; $j++) {
                               echo '<i class="fa-regular fa-star"></i>';
                           }
                        ?>
                        </td>
                    </tr>
                    
                <?php endforeach; ?>
                    </div>
                </div>
            </table>
        </div>
    <?php endif; ?>
</div>