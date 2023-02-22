<section style="background-color: #eee;">
    <div class="container py-5" style="margin-top: 50px;">
        <div class="row">

            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <?php echo $this->Html->image($user->image, ['class' => 'user_img']); ?>
                        <h4 class="my-3"><?= h($user->user_profile->first_name) ?></h4>
                        <h6 class="my-3"><?= h($user->occupation) ?></h6>
                        <div class="d-flex justify-content-center mb-2">
                            <button type="button" class="btn btn-primary">Follow</button>
                            <button type="button" class="btn btn-outline-primary ms-1">Message</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mt-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Full Name</p>
                            </div>
                            <div class="col-sm-9">
                                <?= h($user->user_profile->first_name) ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <?= h($user->email) ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Phone</p>
                            </div>
                            <div class="col-sm-9">
                                <?= h($user->user_profile->contact) ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Address</p>
                            </div>
                            <div class="col-sm-9">
                                <?= h($user->user_profile->address) ?>
                            </div>
                        </div>

                    </div>
                </div>
                <?= $this->Html->link(__('Edit Profile'), ['controller' => 'Users', 'action' => 'updateProfile', $user->id], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
</section>