<?php
namespace App\Model\Table;

use App\Model\Entity\List;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Lists Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Locations
 * @property \Cake\ORM\Association\HasMany $ListItems
 * @property \Cake\ORM\Association\HasMany $Participants
 */
class ListsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('lists');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('ListItems', [
            'foreignKey' => 'list_id'
        ]);
        $this->hasMany('Participants', [
            'foreignKey' => 'list_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');
            
        $validator
            ->add('created_at', 'valid', ['rule' => 'datetime'])
            ->requirePresence('created_at', 'create')
            ->notEmpty('created_at');
            
        $validator
            ->add('updated_at', 'valid', ['rule' => 'datetime'])
            ->requirePresence('updated_at', 'create')
            ->notEmpty('updated_at');
            
        $validator
            ->add('due_date', 'valid', ['rule' => 'datetime'])
            ->requirePresence('due_date', 'create')
            ->notEmpty('due_date');
            
        $validator
            ->requirePresence('type', 'create')
            ->notEmpty('type');
            
        $validator
            ->add('started', 'valid', ['rule' => 'numeric'])
            ->requirePresence('started', 'create')
            ->notEmpty('started');
            
        $validator
            ->add('ended', 'valid', ['rule' => 'numeric'])
            ->requirePresence('ended', 'create')
            ->notEmpty('ended');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['location_id'], 'Locations'));
        return $rules;
    }
}
