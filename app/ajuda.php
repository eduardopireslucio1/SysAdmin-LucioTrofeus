<?php
// Seleção nas colunas no sidebar!
if(!function_exists('activeSegment')){
    function activeSegment($nome,$segment = 2, $class='active'){
        return request()->segment($segment)==$nome ? $class:'';
    }
}