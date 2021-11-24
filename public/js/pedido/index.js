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

    const valor = Number($('#produto').find(":selected").data('valor'))
    const produtoText = $('#produto').find(":selected").text()
    if (!valor) {
        alert('Valor inválido.')
        return
    }

    const item = {
        produto: produtoId,
        descricaoProduto: produtoText,
        quantidade: quantidade,
        valor: valor
    }

    itensArray.push(item)
    renderTable()
}


function renderTable() {
    let table = '<table class="table">'
    table += `
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Produto</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Valor</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    `
    table += '<tbody>'
    itensArray.forEach(i => {
        table += `
        <tr>
            <td>${i.produto}</td>
            <td>${i.descricaoProduto}</td>
            <td>${i.quantidade}</td>
            <td>${i.valor}</td>
            <td><button>remover</button></td>
        </tr>`
    })
    table += '</tbody>'
    table += '</table>'
    $('#grid_produto').html(table)
}