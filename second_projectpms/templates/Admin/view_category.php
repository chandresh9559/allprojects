<div class="wrapper">
<!-- ========Navbar======== -->
<?php echo $this->element('admin/navbar') ?>
<!-- ======navbar====== -->

<!-- =========sidebar========== -->
 <?php echo $this->element('admin/admin_sidebar') ?>
<!-- ==========sidebar========= -->

<div class="content-wrapper" style="margin-left:250px;">

   <section class="why_section layout_padding">
                <div class="container-fluid register">
                    <div class="row">
                        <div class="col-lg-8">
                        <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
                            <div class="card p-4">

                            <div class="productCategories view content">
                        <h3><?= h($productCategory->id) ?></h3>
                        <table>
                            <tr>
                                <th><?= __('Category Name') ?></th>
                                <td><?= h($productCategory->category_name) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Id') ?></th>
                                <td><?= $this->Number->format($productCategory->id) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Status') ?></th>
                                <td><?= $this->Number->format($productCategory->status) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Created Date') ?></th>
                                <td><?= h($productCategory->created_date) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Modified Date') ?></th>
                                <td><?= h($productCategory->modified_date) ?></td>
                            </tr>
                        </table>
                    </div>
               </div>
            </div>
         </div>
      </div>
   </section>

</div>
</div>





