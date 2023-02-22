<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Subskill Entity
 *
 * @property int $id
 * @property int $skill_id
 * @property string $subskill_name
 * @property \Cake\I18n\FrozenTime $created_date
 *
 * @property \App\Model\Entity\Skill $skill
 */
class Subskill extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'skill_id' => true,
        'subskill_name' => true,
        'created_date' => true,
        'skill' => true,
    ];
}
