<?php

if (!function_exists('aurl')) {


    function aurl($url = null)
    {
        return url('admin-panel', $url);
    }
}
if (!function_exists('admin')) {


    function admin()
    {
        return auth()->guard('admin');
    }


}

if (!function_exists('yajra_lang')) {
    function yajra_lang()
    {
        $yajra_trans = [
            "sProcessing" => __('admin.datatable.download'),
            "sLengthMenu" => __('admin.datatable.show') . " _MENU_" . __('admin.datatable.records'),
            "sZeroRecords" => __('admin.datatable.zero_record'),
            "sEmptyTable" => __('admin.datatable.none_record_table'),
            "sInfo" => __('admin.datatable.showing') . " " . __('admin.datatable.records') . __('admin.datatable.ofthe') . " _START_ " . __('admin.datatable.of') . " _END_ " . __('admin.datatable.ofatotalof') . " _TOTAL_ " . __('admin.datatable.records'),
            "sInfoEmpty" => __('admin.datatable.zero_records'),
            "sInfoFiltered" => "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix" => "",
            "sSearch" => __('admin.datatable.search'),
            "sUrl" => "",
            "sInfoThousands" => ",",
            "sLoadingRecords" => "Cargando...",
            "oPaginate" => [
                "sFirst" => __('admin.datatable.first'),
                "sLast" => __('admin.datatable.last'),
                "sNext" => __('admin.datatable.next'),

                "sPrevious" => __('admin.datatable.previous'),
            ],
            "oAria" => [
                "sSortAscending" => "=> Activar para ordenar la columna de manera ascendente",
                "sSortDescending" => "=> Activar para ordenar la columna de manera descendente"
            ],
        ];
        return json_encode($yajra_trans, JSON_UNESCAPED_UNICODE);
    }
}
