<?php

namespace App\Model\Table;
use Cake\ORM\Table;

class NomescandidatosTable extends Table{
    public function initialize(array $config): void{
        $this->addBehavior('Timestamp');
    }
}