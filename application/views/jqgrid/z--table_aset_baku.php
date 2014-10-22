<script type="text/javascript">
$(function () {
   $("#list").jqGrid({
        url: "<?php echo base_url(); ?>index.php/master/aset_baku/primary/load",
        datatype: "xml",
        mtype: "GET",
        colNames: ["Id Aset", "Nama Aset", "Merek", "Model", "Tipe"],
        colModel: [
            { name: "id", index: "id", width: 55, hidden: true },
            { name: "nama_aset", index: "nama_aset", width: 200, editable:true },
            { name: "merek", index: "merek", width: 80, align: "left", editable:true },
            { name: "model", index: "model", width: 100, align: "right", editable:true },
            { name: "id_tipe", index: "id_tipe", width: 80, align: "right", editable:true }
        ],
        pager: "#pager",
        rowNum: 10,
        rowList: [10, 20, 30],
		// multikey: "ctrlKey",
		// multiselect: true,
		// multiboxonly: true,
		editurl: "<?php echo base_url(); ?>index.php/master/aset_baku/primary/update",
		// toolbar: [true,"top"],
        // caption: "Table ASET BAKU"
    });
	jQuery("#list").navGrid("#pager",{edit:false,add:false,del:true});
	jQuery("#list").jqGrid('inlineNav',"#pager",{ 
		addParams: { position: "last", addRowParams: {
				"keys": true, "aftersavefunc": function() { var grid = $("#list"); reloadgrid(grid); }
				}
			}, editParams: { "aftersavefunc": function() { var grid = $("#list"); reloadgrid(grid); }}
        });
	function reloadgrid(grid) {
		grid.trigger("reloadGrid");
	}
	
	/** FUNGSI MULTI DELETE STILL NOT YET WORK
	$("#t_list").append("<input type='button' value='Click Me' id='deleteButton' style='height:20px;font-size:-3'/>");
	$("input","#t_list").click(function(){
		var s;
		s = jQuery("#list").jqGrid('getGridParam','selarrrow');
		alert(s);
		for(var i=0;i<s.length;i++){
			// alert(s.length);
			myrow = jQuery('#list').jqGrid('getCell',s[i],'nama_aset');
			alert(myrow);
		$("#list").delRowData(s[i]);
		}
		
		});
	**/
	 
}); 
</script>