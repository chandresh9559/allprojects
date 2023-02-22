<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Customer'), ['action' => 'edit', $customer->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Customer'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Customers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Customer'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="customers view content">
            <h3><?= h($customer->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($customer->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($customer->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($customer->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created Date') ?></th>
                    <td><?= h($customer->created_date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Profile') ?></h4>
                <?php if (!empty($customer->profile)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Customer Id') ?></th>
                            <th><?= __('Gender') ?></th>
                            <th><?= __('Phone') ?></th>
                            <th><?= __('Address') ?></th>
                            <th><?= __('Image') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($customer->profile as $profile) : ?>
                        <tr>
                            <td><?= h($profile->id) ?></td>
                            <td><?= h($profile->customer_id) ?></td>
                            <td><?= h($profile->gender) ?></td>
                            <td><?= h($profile->phone) ?></td>
                            <td><?= h($profile->address) ?></td>
                            <td><?= h($profile->image) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Profile', 'action' => 'view', $profile->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Profile', 'action' => 'edit', $profile->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Profile', 'action' => 'delete', $profile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $profile->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
