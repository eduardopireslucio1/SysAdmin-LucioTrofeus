<div>
<h4>Faturamento por período:</h4>
<label for="">Data inicial:</label>
<input class="form-control datetimepicker-input" type="date" id="data_inicial">
<label for="">Data final:</label>
<input class="form-control datetimepicker-input" type="date" id="data_final">
<button style="margin-top:10px" class="btn btn-primary" onclick="getTotalByPeriod()">Filtrar</button>
<div class="total">
    <label style="margin-right:5px" for="">Total R$:</label>
    <span class="" id="total"></span>
    </div>
</div>