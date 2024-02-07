<?php
require_once 'EJ/AutoLoad.php';
?>
<div class="cols-sample-area">

<link href="<?php echo base_url(); ?>assets/synfusion/Content/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/synfusion/Content/ejthemes/ej.widgets.core.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/synfusion/Content/ejthemes/bootstrap-theme/ej.web.all.min.css" rel="stylesheet">

<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery-easyui-175/jquery.min.js"></script> -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/synfusion/Scripts/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/synfusion/Scripts/default.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/synfusion/Scripts/jsrender.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/synfusion/Scripts/ej.web.all.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/synfusion/Scripts/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/synfusion/Scripts/CodeMirror/codemirror.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/synfusion/Scripts/CodeMirror/javascript.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/synfusion/Scripts/CodeMirror/css.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/synfusion/Scripts/CodeMirror/xml.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/synfusion/Scripts/CodeMirror/clike.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/synfusion/Scripts/CodeMirror/codemirror.min.css"></script>



<?php
    $Json = json_decode($data_order,true);

    $pivotgrid =  new EJ\PivotGrid("PivotGrid1");
    $datasource = new EJ\PivotGrid\DataSource();
    $NamaCabang = new EJ\PivotGrid\Row();
    $NamaPrinciple = new EJ\PivotGrid\Row();
    $GroupProduk = new EJ\PivotGrid\Row();
    $NamaProduk = new EJ\PivotGrid\Row();
    $row=array($NamaCabang->fieldName("NamaCabang")->fieldCaption("Nama Depo"), $NamaPrinciple->fieldName("NamaPrinciple")->fieldCaption("Principle"),$GroupProduk->fieldName("GroupProduk")->fieldCaption("Group Produk"), $NamaProduk->fieldName("NamaProduk")->fieldCaption("Nama Produk"));
    // $column = new EJ\PivotGrid\Column();
    // $column=array($column->fieldName("RppKtn")->fieldCaption("Rpp Ktn"));
    $RppKtn = new EJ\PivotGrid\Value();
    $RppRp = new EJ\PivotGrid\Value();
    $CurrStokKtn = new EJ\PivotGrid\Value();
    $CurrStokRp = new EJ\PivotGrid\Value();
    $IronStokDay = new EJ\PivotGrid\Value();
    $IronStokKtn = new EJ\PivotGrid\Value();
    $IronStokRp= new EJ\PivotGrid\Value();
    $EstEndStokKtn= new EJ\PivotGrid\Value();
    $EstEndStokRp= new EJ\PivotGrid\Value();
    $SpKtn= new EJ\PivotGrid\Value();
    $SpAdjKtn= new EJ\PivotGrid\Value();
    $SpRp= new EJ\PivotGrid\Value();
    $SpAdjRp= new EJ\PivotGrid\Value();
    $FinalOrderKtn= new EJ\PivotGrid\Value();
    $FinalOrderRp= new EJ\PivotGrid\Value();
    $OSKtn= new EJ\PivotGrid\Value();
    $OSRp= new EJ\PivotGrid\Value();
    $Ket= new EJ\PivotGrid\Value();
    $value=array($RppKtn->fieldName("RppKtn")->fieldCaption("Rpp Ktn"),
                    $RppRp->fieldName("RppRp")->fieldCaption("Rpp Rp"),
                    $CurrStokKtn->fieldName("CurrStokKtn")->fieldCaption("Curr Stok Ktn"),
                    $CurrStokRp->fieldName("CurrStokRp")->fieldCaption("Curr Stok Rp"),
                    $IronStokDay->fieldName("IronStokDay")->fieldCaption("Iron Stok Day"),
                    $IronStokKtn->fieldName("IronStokKtn")->fieldCaption("Iron Stok Ktn"),
                    $IronStokRp->fieldName("IronStokRp")->fieldCaption("Iron Stok Rp"),
                    $EstEndStokKtn->fieldName("EstEndStokKtn")->fieldCaption("Est. End Stok Ktn"),
                    $EstEndStokRp->fieldName("EstEndStokRp")->fieldCaption("Est. End Stok Rp"),
                    $SpKtn->fieldName("SpKtn")->fieldCaption("SP Ktn"),
                    $SpAdjKtn->fieldName("SpAdjKtn")->fieldCaption("SP Adj Ktn"),
                    $SpRp->fieldName("SpRp")->fieldCaption("SP Rp"),
                    $SpAdjRp->fieldName("SpAdjRp")->fieldCaption("SP Adj Rp"),
                    $FinalOrderKtn->fieldName("FinalOrderKtn")->fieldCaption("Final Order Ktn"),
                    $FinalOrderRp->fieldName("FinalOrderRp")->fieldCaption("Final Order Rp"),
                    $OSKtn->fieldName("OSKtn")->fieldCaption("OS Ktn"),
                    $OSRp->fieldName("OSRp")->fieldCaption("OS Rp"),
                    $Ket->fieldName("Ket")->fieldCaption("Ket"));

    // $datasource->data($Json)->rows($row)->columns($column)->values($value);
    $datasource->data($Json)->rows($row)->values($value);
    echo $pivotgrid->dataSource($datasource)->enableGroupingBar(true)->pivotTableFieldListID("PivotSchemaDesigner1")->render();

    $pivotschemadesigner = new EJ\PivotSchemaDesigner("PivotSchemaDesigner1");
    echo $pivotschemadesigner->render();
?>
</div>
<style>
    .cols-sample-area {
        width:100%;
        margin:0 auto;
        display:inline-block;
    }
    #PivotGrid1 {
        position: relative !important;
        /* float:left; */
        width:100% !important;
        overflow:auto;
    }
    #PivotSchemaDesigner1 {
        width: 100% !important;
        /* float:right; */
    }
</style>

