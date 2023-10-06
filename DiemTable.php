<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Diem Model
 *
 * @method \App\Model\Entity\Diem newEmptyEntity()
 * @method \App\Model\Entity\Diem newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Diem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Diem get($primaryKey, $options = [])
 * @method \App\Model\Entity\Diem findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Diem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Diem[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Diem|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Diem saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Diem[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Diem[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Diem[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Diem[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class DiemTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('diem');
        $this->setDisplayField('malopmonhoc');
        $this->setPrimaryKey('malopmonhoc');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('masinhvien')
            ->requirePresence('masinhvien', 'create')
            ->notEmptyString('masinhvien');

        $validator
            ->numeric('diem')
            ->requirePresence('diem', 'create')
            ->notEmptyString('diem');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['malopmonhoc', 'masinhvien']), ['errorField' => 'malopmonhoc']);

        return $rules;
    }
}
