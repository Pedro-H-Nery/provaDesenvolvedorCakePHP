<h1>Editar Candidato</h1>
<?php 
    echo $this->Form->create($nomescandidato);
    echo $this->Form->control('nome', ['label' => '', 'placeholder' => 'Nome', 'style' => 'background-color:lightslategray']);
    echo $this->Form->control('email', ['label' => '', 'placeholder' => 'E-mail', 'style' => 'background-color:lightslategray']);
    echo $this->Form->control('telefone', ['label' => '', 'placeholder' => '(00) 0 0000 0000', 'style' => 'background-color:lightslategray']);
    echo $this->Form->control('cpf', ['label' => '', 'placeholder' => 'CPF ou CNPJ', 'style' => 'background-color:lightslategray']);
    echo $this->Form->control('text', ['rows' => '3', 'label' => '', 'placeholder' => 'Mensagem', 'style' => 'background-color:lightslategray']);
    echo $this->Form->button(__('Editar e Salvar'));
    echo $this->Form->end();
?>