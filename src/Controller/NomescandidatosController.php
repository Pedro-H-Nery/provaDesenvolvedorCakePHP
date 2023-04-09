<?php

namespace App\Controller;

use App\Controller\AppController;

class NomescandidatosController extends AppController{
    public function index(){
        $this->paginate = [
            'limit' => 5,
            'order' => [
                'Nomescandidatos.id' => 'asc'
            ]
        ];
        $nomescandidatos = $this->paginate($this->Nomescandidatos);
        $this->set(compact('nomescandidatos'));
    }

    public function add(){
        $nomescandidato = $this->Nomescandidatos->newEmptyEntity();
        if ($this->request->is('post')) {
            $nomescandidato = $this->Nomescandidatos->patchEntity($nomescandidato, $this->request->getData());
            if ($this->Nomescandidatos->save($nomescandidato)) {
                return $this->redirect(['action' => 'index']);
            }
        }
        $this->set('nomescandidato', $nomescandidato);
    }

    public function delete($id = null){
        $this->request->allowMethod(['post', 'delete']);

        $nomescandidato = $this->Nomescandidatos->findById($id)->firstOrFail();
        if ($this->Nomescandidatos->delete($nomescandidato)) {
            return $this->redirect(['action' => 'index']);
        }
    }

    public function edit($id){
        $nomescandidato = $this->Nomescandidatos
            ->findById($id)
            ->firstOrFail();

        if ($this->request->is(['post', 'put'])) {
            $this->Nomescandidatos->patchEntity($nomescandidato, $this->request->getData());
            if ($this->Nomescandidatos->save($nomescandidato)) {
                return $this->redirect(['action' => 'index']);
            }
        }

        $this->set('nomescandidato', $nomescandidato);
    }
}

?>
