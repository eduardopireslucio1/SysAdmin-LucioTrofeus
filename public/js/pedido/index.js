const itensArray = []

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
        valor: valor
    }

    itensArray.push(item)
    renderTable()
}


function renderTable() {
    let subtotal = 0;

    let table = '<table class="table">'
    table += `
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Produto</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Tamanho</th>
            <th scope="col">Valor</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    `
    table += '<tbody>'
    itensArray.forEach(i => {
        subtotal += i.quantidade * i.valor;
        table += `
        <tr>
            <td>${i.models_produto_id}</td>
            <td>${i.descricaoProduto}</td>
            <td>${i.quantidade}</td>
            <td>${i.tamanho}</td>
            <td>${i.valor}</td>
            <td><button>remover</button></td>
        </tr>`
    })
    table += `
    <tr>
        <th colspan="4">Total</th>
        <th>${subtotal}</th>
    </tr>
    `
    table += '</tbody>'
    table += '</table>'
    $('#grid_produto').html(table)
}

$(document).ready(()=>{
    $('#produto').selectpicker('val','');
    $('#cliente').selectpicker('val','');
})

function salvar(){
    const models_cliente_id = $('#cliente').val();
    const descricao = $('#descricao').val();
    let valor_total = 0;
    itensArray.forEach(i => {
        valor_total += i.valor;
    })

    fetch("/api/admin/pedido",
    {
        headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
        },
        method: "POST",
        body: JSON.stringify({valor_total, models_cliente_id, descricao, itens: itensArray})
    })
    .then(function(res){ console.log(res) })
    .catch(function(res){ console.log(res) })
}


