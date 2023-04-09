<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Home</title>
    <script>
        let resultadoRequisicao;
        function pesquisar(){
            const diasSemana = ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'];
            const mesAno = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
            const data = new Date();
            const diaSemana = diasSemana[data.getDay()];
            const dia = data.getDate();
            const mes = mesAno[data.getMonth()];
            const ano = data.getFullYear();
            cidade = document.getElementsByName("input_cidade")[0].value;
            api_key="828b205ac463fa15ed4b4d32406a42b6";
            requisicao = "http://api.openweathermap.org/data/2.5/weather?q="+cidade+"&appid="+api_key+"&units=metric"
            fetch(requisicao)
                .then(response => response.json())
                .then(data => {
                    document.getElementsByName("resultado")[0].innerHTML = 
                    data.name+", "+data.sys.country+" - "+diaSemana+", "+dia+" "+mes+" "+ano+" - "+data.main.temp+"°c " + data.weather[0].description + " - " + data.main.temp_max+"°c / "+ data.main.temp_min+"°c";
                })
                .catch(error => console.error(error));
        }
    </script>
    <style>
        .pagAtiva{
            background-color:lightgray;
        }
        thead{
            background-color:white;
        }
        td, th{
            text-align: center;
            color: black;
        }
    </style>
</head>
<body>
    <div>
        <table>
            <tr>
                <td><img src="img/logo.png" width="140px" height="50px"></img> </td>
                <td class="pagAtiva">HOME</td>
                <td>CARTEIRAS</td>
                <td>PESSOAS</td>
                <td>DOWNLOADS</td>
                <td>CONTATOS</td>
            </tr>
        </table>
    </div>
    <div style="background-color:lightgray;padding:50px">
        <div class="large-12 medium-8 columns" style="text-align:right">
            <input name="input_cidade" type="text" placeholder="Digite o nome da cidade" style="width:200px"></input>
            <button onclick="pesquisar()">Pesquisar</button>
            <p name="resultado">Sem dados por enquanto</p>
        </div>

        <div class="large-12 medium-8 columns">
            <h4>Cadastro</h4>
            <?php 
                #echo $this->Form->create($nomescandidato); Não funciona e não sei outra opção
                echo $this->Form->control('nome', ['label' => '', 'placeholder' => 'Nome', 'style' => 'background-color:lightslategray']);
                echo $this->Form->control('email', ['label' => '', 'placeholder' => 'E-mail', 'style' => 'background-color:lightslategray']);
                echo $this->Form->control('telefone', ['label' => '', 'placeholder' => '(00) 0 0000 0000', 'style' => 'background-color:lightslategray']);
                echo $this->Form->control('cpf', ['label' => '', 'placeholder' => 'CPF ou CNPJ', 'style' => 'background-color:lightslategray']);
                echo $this->Form->control('text', ['rows' => '3', 'label' => '', 'placeholder' => 'Mensagem', 'style' => 'background-color:lightslategray']);
                echo $this->Form->button(__('Cadastrar'));
                echo $this->Form->end();
            ?>
        </div>
        <div class="nomescandidatos index large-12 medium-8 columns">
            <h4>Últimos Cadastrados</h4>
            <input placeholder="Buscar..." type="text" style="width:100px;border-color:blue;border-width:3px;border-left:none;border-top:none;border-right:none"></input>
            <table>
                <thead>
                    <tr>
                        <th scope="col"><?php echo $this->Paginator->sort('id'); ?></th>
                        <th scope="col"><?php echo $this->Paginator->sort('data'); ?></th>
                        <th scope="col"><?php echo $this->Paginator->sort('nome'); ?></th>
                        <th scope="col"><?php echo $this->Paginator->sort('email'); ?></th>
                        <th scope="col"><?php echo $this->Paginator->sort('cpf'); ?>/<?php echo $this->Paginator->sort('cnpj'); ?></th>
                        <th scope="col"><?php echo $this->Paginator->sort('telefone'); ?></th>
                        <th scope="col"><?php echo $this->Paginator->sort('text'); ?></th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($nomescandidatos as $nomescandidato): ?>
                        <tr>
                            <td><?php echo $nomescandidato->id; ?></td>
                            <td><?php echo $nomescandidato->data; ?></td>
                            <td><?php echo $nomescandidato->nome; ?></td>
                            <td><?php echo $nomescandidato->email; ?></td>
                            <td><?php 
                                if(is_null($nomescandidato->cpf)){
                                    echo $nomescandidato->cnpj;
                                }
                                else{
                                    echo $nomescandidato->cpf;
                                }
                            ?></td>
                            <td><?php echo $nomescandidato->telefone; ?></td>
                            <td><?php echo $nomescandidato->text; ?></td>
                            <td>
                                <?= $this->Html->link('Editar', ['action' => 'edit', $nomescandidato->id]) ?>
                                <?= $this->Form->postLink(
                                    'Apagar',
                                    ['action' => 'delete', $nomescandidato->id],
                                    ['confirm' => 'Você tem certeza que deseja apagar o registro?'])
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="paginator">
                <ul class="pagination">
                    <?php echo $this->Paginator->prev('<');?>
                    <?php echo $this->Paginator->numbers();?>
                    <?php echo $this->Paginator->next('>');?>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>