let itensArray = []

function addItem(){
    const produtoId = $('#produto').val()
    if (!produtoId) {
        alert('Selecione um produto!')
        return
    }

    const quantidade = Number($('#quantidade').val())
    if (quantidade <= 0) {
        alert('A quantidade deve ser maior que zero.')
        return
    }
    const tamanho = Number($('#tamanho').val())
    if (tamanho <= 0) {
        alert('O tamanho deve ser maior que zero.')
        return
    }

    const valor = Number($('#produto').find(":selected").data('valor'))
    const produtoText = $('#produto').find(":selected").text()
    if (!valor) {
        alert('Valor inválido.')
        return
    }

    const item = {
        models_produto_id: produtoId,
        descricaoProduto: produtoText,
        quantidade: quantidade,
        tamanho: tamanho,
        valor: valor,
        valor_total : (valor * quantidade).toFixed(2),
    }

    itensArray.push(item)
    renderTable()
}

function limpar(){
    itensArray = [];
    // $('#produto').selectpicker('val','');
    // $('#cliente').selectpicker('val','');
    $('#produto').val('');
    $('#cliente').val('');
    const today = new Date().toISOString().split('T')[0];
    $("#data").attr('min', today);
    $("#data").val(today);
    $("#descricao").val('');
    $("#quantidade").val('0');
    $("#tamanho").val('');
}

function remover(index){
    itensArray.splice(index,1);
    renderTable();
}
function renderTable() {
    let subtotal = 0;

    let table = '<table class="table">'
    table += `
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Produto</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Tamanho</th>
            <th scope="col">Valor do produto</th>
            <th scope="col">Total</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    `
    table += '<tbody>'
    itensArray.forEach((i , index) => {

        var valorItem = Intl.NumberFormat('pt-br',{style: 'currency', currency: 'BRL'}).format(i.valor);
        var valorTotal = Intl.NumberFormat('pt-br',{style: 'currency', currency: 'BRL'}).format(i.valor_total);

        subtotal += i.quantidade * i.valor;
        table += `
        <tr>
            <td>${i.models_produto_id}</td>
            <td>${i.descricaoProduto}</td>
            <td>${i.quantidade}</td>
            <td>${i.tamanho} cm</td>
            <td>${valorItem}</td>
            <td>${valorTotal}</td>
            <td><button class="btn btn-danger" onclick="remover(${index})">Remover</button></td>
        </tr>`
    })

    var subTotal = Intl.NumberFormat('pt-br',{style: 'currency', currency: 'BRL'}).format(subtotal);

    table += `
    <tr>
        <th colspan="5">Total</th>
        <th>R$ ${subTotal}</th>
    </tr>
    `
    table += '</tbody>'
    table += '</table>'
    table += '<button class="btn btn-success" onclick="salvar()">Salvar</button>'
    
    $('#grid_produto').html(table)
}

$(document).ready(()=>{
    limpar();
})

function salvar(){
    const models_cliente_id = $('#cliente').val();
    if(!models_cliente_id ){
        alert('Selecione um cliente!')
        return
    }
    const descricao = $('#descricao').val();
    const data_entrega = $('#data').val();
    if(!data_entrega ){
        alert('Selecione uma data para entrega!')
        return
    }
    const status = $('#status').val();
    if(!status ){
        alert('Selecione uma status para o pedido!')
        return
    }
    if(!itensArray.length){
        alert('Adicione um item!')
        return
    }
    let valor_total = 0;
    itensArray.forEach(i => {
        valor_total += i.valor * i.quantidade;
    })

    fetch("/api/admin/pedido",
    {
        headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
        },
        method: "POST",
        body: JSON.stringify({
            data_entrega,
            status,
            valor_total,
            models_cliente_id,
            descricao,
            itens: itensArray
        })
    })
    .then(function(res){ 
        alert('Pedido salvo com sucesso!');
        limpar();
        renderTable();
    })
    .catch(function(res){ alert(res) })
}