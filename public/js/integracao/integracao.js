function checkCep(cep){
    $.ajax({
        url: 'https://viacep.com.br/ws/' + cep.replace(/[^0-9]/g, '') + '/json/',
        method: "GET",
        dataType: 'jsonp',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        success: function(data){
            if(data.erro == "true"){
                alert("CEP Inválido!");
            }else if(data){
                document.getElementById('cidade').value = data.localidade;
                document.getElementById('estado').value = data.uf;
                if(document.getElementById('endereco')){
                    document.getElementById('endereco').value = data.logradouro;
                }
                if(document.getElementById('logradouro')){
                    document.getElementById('logradouro').value = data.logradouro;
                }
                
            }else{
                console.log("Não teve retorno");
            }
        },
        error: function(data){
            console.log(data);
        }
    })
}