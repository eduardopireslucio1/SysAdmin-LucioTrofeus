function checkCnpj(cnpj) {
    $.ajax({
        url: 'https://www.receitaws.com.br/v1/cnpj/' + cnpj.replace(/[^0-9]/g, ''),
        method: "GET",
        dataType: 'jsonp',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        success: function(dado) {
            if(dado.status == "ERROR"){
                alert("CNPJ Inválido!");
            }else if(dado){
                document.getElementById('nome_razaosocial').value = dado.nome;
                document.getElementById('fantasia').value = dado.fantasia;
                document.getElementById('telefone').value = dado.telefone;
                document.getElementById('cep').value = dado.cep;
                document.getElementById('estado').value = dado.uf;
                document.getElementById('cidade').value = dado.municipio;
                document.getElementById('logradouro').value = dado.logradouro;
                document.getElementById('numero').value = dado.numero;
                document.getElementById('email').value = dado.email;
            }else{
                console.log("Não teve retorno!");
            }
        },
        error: function(dado){
            console.log(dado);
        }
    })

}

// var cleave = new Cleave('#cnpj', {
//     delimiters: ['.', '.', '/', '-'],
//     blocks: [2, 3, 3, 4, 2],
//     numericOnly: true
// });

// var cleave = new Cleave('#cep', {
//     delimiters: ['-'],
//     blocks: [5, 3],
//     numericOnly: true
// });

// var cleave = new Cleave('#telefone', {
//     delimiters: ['(', ')', '-'],
//     blocks: [0, 2, 5, 4],
//     numericOnly: true
// });
