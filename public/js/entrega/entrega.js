function limpar(){
    $('#models_funcionario_id').selectpicker('val','');
    $('#pedido_id').selectpicker('val','');
    const today = new Date().toISOString().split('T')[0];
    $("#dt_entrega").attr('min', today);
    $("#dt_entrega").val(today);
    $("#custo").val('');
    $("#endereco").val('');
    $("#descricao").val('');
}

function salvar(){
    const models_funcionario_id = $('#models_funcionario_id').val();
    if(!models_funcionario_id ){
        alert('Selecione um funcionário!')
        return
    }

    const pedido_id = $('#pedido_id').val();
    if(!pedido_id ){
        alert('Selecione um pedido!')
        return
    }
    const descricao = $('#descricao').val();
    const custo = $('#custo').val();
    const endereco = $('#endereco').val();
    const dt_entrega = $('#dt_entrega').val();
    if(!dt_entrega ){
        alert('Selecione uma data para entrega!')
        return
    }
    const status = $('#status').val();
    if(!status ){
        alert('Selecione uma status para o pedido!')
        return
    }
    
}