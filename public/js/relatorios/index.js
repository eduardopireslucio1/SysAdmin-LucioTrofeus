const renderBestClients = (json) => {
    let table = `<table class="table table-dark table-striped">
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
    let table = `<table class="table table-dark table-striped">
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

const renderPedidosPorPeriodo = (json) => {
    let table = `<table class="table table-dark table-striped">
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Valor total</th>
            <th>Status</th>
        </tr>
    `
    json.forEach((a,i) => {
        table += `
            <tr>
                <td>${a.id}</td>
                <td>${a.models_cliente_id}</td>
                <td>${a.valor_total}</td>
                <td>${a.status}</td>
            </tr>
        `
    })
    table += '</table>'
    $('#pedidos').html(table)
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
        dataFinal: $('#data_final').val()
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

//const getPedidosByPeriod = () => {
//    const urlParams = new URLSearchParams({
//        dataInicial: $('#pedido_data_inicial').val(),
//        dataFinal: $('#pedido_data_final').val()
 //   }).toString()
 //   fetch('/admin/pedidosPorPeriodo?'+urlParams, {
   //     method: "GET"
  //  })
  //  .then(async (response) => {
  //      const json = await response.json()
   //     $('#pedidos').text(json.pedidos || 0)
  //      renderPedidosPorPeriodo(json)
   // }).catch((err) => {
   //     alert(err)
   // })
//}

$(document).ready(() => {
    getBestClients()
    getBestProducts()
    getTotalByPeriod()
    getPedidosByPeriod()
})