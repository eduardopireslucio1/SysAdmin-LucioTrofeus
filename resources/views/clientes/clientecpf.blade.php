<script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
<div class="card" id="cpf">
    <div class="card-body">
        <form action="{{route('clientes.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row" id="margem">
                <div class="col-4">
                    <label>CPF:<span class="obrigatorio">*</span> </label>
                    <input placeholder="CPF" type="text" name="cpf"
                        class="form-control @error('cpf') is-invalid @enderror" id="cpf">{{old('cpf')}}</input>
                    @error('cpf')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-4">
                    <label>Nome: <span class="obrigatorio">*</span></label>
                    <input placeholder="Ex: Lúcio Troféus" type="text" name="nome_razaosocial"
                        class="form-control @error('nome') is-invalid @enderror" id="nome">
                    @error('nome')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-4">
                    <label>Telefone: <span class="obrigatorio">*</span></label>
                    <input placeholder="Telefone" type="text" name="telefone"
                        class="form-control @error('telefone') is-invalid @enderror" id="telefone">
                    @error('telefone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row" id="margem">
                <div class="col-4">
                    <label>CEP: <span class="obrigatorio">*</span></label>
                    <input placeholder="CEP" type="text" name="cep"
                        class="form-control @error('cep') is-invalid @enderror" id="cep">{{old('cep')}}</input>
                    @error('cep')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <div class="col-4">
                    <label>Estado: <span class="obrigatorio">*</span></label>
                    <input placeholder="UF" type="text" name="uf" class="form-control @error('uf') is-invalid @enderror"
                        id="estado">{{old('uf')}}</input>
                    @error('uf')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-4">
                    <label>Cidade: <span class="obrigatorio">*</span></label>
                    <input placeholder="Cidade" type="text" name="cidade"
                        class="form-control @error('cidade') is-invalid @enderror" id="cidade">{{old('cidade')}}</input>
                    @error('cidade')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row" id="margem">
                <div class="col-4">
                    <label>Logradouro: <span class="obrigatorio">*</span></label>
                    <input placeholder="Logradouro" type="text" name="logradouro"
                        class="form-control @error('logradouro') is-invalid @enderror"
                        id="logradouro">{{old('logradouro')}}</input>
                    @error('logradouro')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-4">
                    <label>Número: <span class="obrigatorio">*</span></label>
                    <input placeholder="Número" type="text" name="numero"
                        class="form-control @error('numero') is-invalid @enderror" id="numero">{{old('numero')}}</input>
                    @error('numero')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-4">
                    <label>E-mail:</label>
                    <input placeholder="Ex: email@gmail.com" type="text" name="email"
                        class="form-control @error('email') is-invalid @enderror" id="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row" id="margem">
                <div class="col-12">
                    <label>Observação:</label>
                    <textarea placeholder="Observação" type="text" name="observacao"
                        class="form-control @error('observacao') is-invalid @enderror"
                        id="descricao">{{old('observacao')}}</textarea>
                    @error('observacao')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Cadastrar</button>
    </div>
</div>