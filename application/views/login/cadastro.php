<div class="container">
    <div class="row justify-content-md-center">

        <form class="col-md-6 col-12" method="post" action="<?= $action ?>" id="cadastro">
            <p class="h5 text-center mb-4">Cadastro</p>

            <div class="md-form">
                <i class="fa fa-envelope prefix grey-text"></i>
                <input type="email" id="defaultForm-email" class="form-control" name="email" required="true">
                <label for="defaultForm-email">Seu email</label>
            </div>

            <div class="md-form">
                <i class="fa fa-lock prefix grey-text"></i>
                <input type="password" id="defaultForm-pass" class="form-control" name="senha" required="true">
                <label for="defaltForm-pass">Sua Senha</label>
            </div>

            <div class="md-form">
                <i class="fa fa-user prefix grey-text"></i>
                <input type="text" id="defaultForm-pass" class="form-control" name="nome" required="true">
                <label for="defaltForm-pass">Seu Nome</label>
            </div>
            <div id="cargos">
            <div class="form-group" id="select">
            <label for="sel1">Qual seu cargo: </label>
                <select class="form-control" id="cargo" name="cargo">
                    <option value = "1">Presidente</option>
                    <option value = "2">Supervisor</option>
                    <option value = "3">Gerente</option>
                    <option value = "4">Colaborador</option>
                </select>
            </div>
            </div>
            <div class="text-center">
                <button class="btn btn-default">Cadastrar</button>
        </div>    
        </form>
    </div>
</div>