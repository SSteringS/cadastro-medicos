<button id="botao_modal" class="cadastro btn btn-primary">Modal extra grande</button>

<div id="modalCadastro" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="jumbotron">Cadastro de Médico</div>

            <form method="post">
                @csrf
                <div class="form-group">
                    <label for="nome" class="">Nome:</label>
                    <input type="text" class="form-control" name="nome" id="nome">

                    <label for="email" class="">E-mail:</label>
                    <input type="email" class="form-control" name="email" id="email">

                    <label for="cpf" class="">CPF:</label>
                    <input type="text" class="form-control" name="cpf" id="cpf">

                    <label for="especialidade" class="">Especialidade:</label>
                    <select id="especialidade" name="especialidade" class="form-control">
                        @foreach($especialidades as $especialidade)
                            <option>{{$especialidade->nome}}</option>
                        @endforeach
                    </select>

                    <label for="data_aniversario" class="">Data de aniversário:</label>
                    <input type="text" class="form-control" name="data_aniversario" id="data_aniversario">

                    <label for="telefone" class="">Telefone:</label>
                    <input type="text" class="form-control" name="telefone" id="telefone">

                    <label for="salario" class="">Média Salarial:</label>
                    <input type="text" class="form-control" name="salario" id="salario">

                    <label for=crm class="">CRM:</label>
                    <input type="text" class="form-control" name="crm" id="crm">

                </div>

                <button class="btn btn-primary">Cadastrar</button>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#botao_modal").click(function(){
            console.log('clicou');
            $("#modalCadastro").modal({backdrop: true});
        })
    })
</script>