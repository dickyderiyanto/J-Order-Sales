<html>
<head></head>
<body>
<div id="wdr-component"></div>
<link href="<?php echo base_url(); ?>assets/webdatarocks/webdatarocks.min.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/webdatarocks/theme/default/webdatarocks.min.css"/>
<script src="<?php echo base_url(); ?>assets/webdatarocks/webdatarocks.toolbar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/webdatarocks/webdatarocks.js"></script>
<script>
var pivot = new WebDataRocks({
	container: "#wdr-component",
    beforetoolbarcreated: customizeToolbar,
	toolbar: true,
    customizeCell: customizeCellFunction,
	report: {
		dataSource: {
			data: <?php echo $data_order ; ?>,
		},
        formats: [
            {
                "name": "",
                "decimalPlaces": 0
            }
        ],
            slice: {
            reportFilters: [
                {
                    "uniqueName": "GrupDivisi",
                    "caption"   : "Grup Divisi"
                },
                {
                    "uniqueName": "TglStruk",
                    "caption"   : "Tgl Struk"
                }
            ],
            rows: [
                {
                    "uniqueName": "NamaCabang",
                    "caption"   : "Nama Depo"
                },
                {
                    "uniqueName": "NamaPrinciple",
                    "caption"   : "Principle"
                },
                {
                    "uniqueName": "GroupProduk",
                    "caption"   : "Group Produk"
                },
                {
                    "uniqueName": "NamaProduk",
                    "caption"   : "Nama Produk"
                }
            ],
            measures: [
                {
                    "uniqueName": "RppKtn",
                    "caption"   : "Rpp Ktn"
                },
                {
                    "uniqueName": "RppRp",
                    "caption"   : "Rpp Rp"
                },
                {
                    "uniqueName": "CurrStokKtn",
                    "caption"   : "Curr Stok Ktn"
                },
                {
                    "uniqueName": "CurrStokRp",
                    "caption"   : "Curr Stok Rp"
                },
                {
                    "uniqueName": "IronStokDay",
                    "aggregation": "average",
                    "caption"   : "Iron Stok Day"
                },
                {
                    "uniqueName": "IronStokKtn",
                    "caption"   : "Iron Stok Ktn"
                },
                {
                    "uniqueName": "IronStokRp",
                    "caption"   : "Iron Stok Rp"
                },
                {
                    "uniqueName": "EstEndStokKtn",
                    "caption"   : "Est. End Stok Ktn"
                },
                {
                    "uniqueName": "EstEndStokRp",
                    "caption"   : "Est. End Stok Rp"
                },
                {
                    "uniqueName": "SpKtn",
                    "caption"   : "SP Ktn"
                },
                {
                    "uniqueName": "SpAdjKtn",
                    "caption"   : "SP Adj Ktn"
                },
                {
                    "uniqueName": "SpRp",
                    "caption"   : "SP Rp"
                },
                {
                    "uniqueName": "SpAdjRp",
                    "caption"   : "SP Adj Rp"
                },
                {
                    "uniqueName": "FinalOrderKtn",
                    "caption"   : "Final Order Ktn"
                },
                {
                    "uniqueName": "FinalOrderRp",
                    "caption"   : "Final Order Rp"
                },
                {
                    "uniqueName": "OSKtn",
                    "caption"   : "OS Ktn"
                },
                {
                    "uniqueName": "OSRp",
                    "caption"   : "OS Rp"
                }
            ]
            // ,
            // flatOrder: [
            //     "RppKtn",
            //     "RppRp",
            //     "CurrStokKtn",
            //     "CurrStokRp",
            //     "IronStokDay",
            //     "IronStokKtn",
            //     "IronStokRp",
            //     "EstEndStokKtn",
            //     "EstEndStokRp",
            //     "SpKtn",
            //     "SpAdjKtn",
            //     "SpRp",
            //     "SpAdjRp",
            //     "FinalOrderKtn",
            //     "FinalOrderRp",
            //     "OSKtn",
            //     "OSRp",
            //     "Ket"
            // ]
        },
        options: {
            grid: {
                title: "Purchase Order CMO <?php echo date('F', mktime(0, 0, 0, $bulan, 10))." ".$tahun; ?>"
            }
        }
	},
    global: {
        // replace this path with the path to your own translated file
        localization: "<?php echo base_url(); ?>assets/webdatarocks/es.json"
    }
});
function customizeToolbar(toolbar) {
        var tabs = toolbar.getTabs(); // get all tabs from the toolbar
        toolbar.getTabs = function () {
          delete tabs[0]; 
          delete tabs[1];
          delete tabs[2]; // delete the first tab
            return tabs;
        }
    }
function customizeCellFunction(cellBuilder, cellData) {
  if (cellData.type == "RppKtn") {
    if (cellData.rowIndex % 2 == 0) {
      cellBuilder.addClass("alter1");
    } else {
      cellBuilder.addClass("alter1");
    }
  }
}
</script>
</body>
</html>