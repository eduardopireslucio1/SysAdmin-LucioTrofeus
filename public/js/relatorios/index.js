const renderBestClients = (json) => {
    let table = `<table>
        <tr>
            <th>Posição</th>
            <th>#</th>
            <th>Cliente</th>
            <th>Quantidade de pedidos</th>
        </tr>
    `
    json.forEach((a,i) => {
        table += `
            <tr>
                <td>${i+1}º</td>
                <td>${a.id}</td>
                <td>${a.nome_razaosocial}</td>
                <td>${a.qtd_pedidos}</td>
            </tr>
        `
    })
    table += '</table>'
    $('#clientes').html(table)
}

const renderBestProducts = (json) => {
    let table = `<table>
        <tr>
            <th>Posição</th>
            <th>#</th>
            <th>Produto</th>
            <th>Quantidade vendida</th>
        </tr>
    `
    json.forEach((a,i) => {
        table += `
            <tr>
                <td>${i+1}º</td>
                <td>${a.id}</td>
                <td>${a.nome}</td>
                <td>${a.soma_quantidade}</td>
            </tr>
        `
    })
    table += '</table>'
    $('#produtos').html(table)
}

const getBestClients = () => {
    fetch('/admin/melhoresClientes', {
        method: "GET"
    })
    .then(async (response) => {
        const json = await response.json()
        renderBestClients(json)
    }).catch((err) => {
        alert(err)
    })
}

const getBestProducts = () => {
    fetch('/admin/produtosMaisVendidos', {
        method: "GET"
    })
    .then(async (response) => {
        const json = await response.json()
        renderBestProducts(json)
    }).catch((err) => {
        alert(err)
    })
}

const getTotalByPeriod = () => {
    const urlParams = new URLSearchParams({
        dataInicial: $('#data_inicial').val(),
        dataFinal: $('#data_final').val
    }).toString()
    fetch('/admin/faturamentoPorPeriodo?'+urlParams, {
        method: "GET"
    })
    .then(async (response) => {
        const json = await response.json()
        $('#total').text(json.total || 0)
    }).catch((err) => {
        alert(err)
    })
}

$(document).ready(() => {
    getBestClients()
    getBestProducts()
    getTotalByPeriod()
})