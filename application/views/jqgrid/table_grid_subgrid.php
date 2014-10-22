subGrid: true,
subGridRowExpanded: function(subgrid_id, row_id) {
		// we pass two parameters
		// subgrid_id is a id of the div tag created whitin a table data
		// the id of this elemenet is a combination of the "sg_" + id of the row
		// the row_id is the id of the row
		// If we wan to pass additinal parameters to the url we can use
		// a method getRowData(row_id) - which returns associative array in type name-value
		// here we can easy construct the flowing
		var subgrid_table_id, pager_id;
		subgrid_table_id = subgrid_id+"_t";
		pager_id = "p_"+subgrid_table_id;
		$("#"+subgrid_id).html("<table id='"+subgrid_table_id+"' class='scroll'></table><div id='"+pager_id+"' class='scroll'></div>");
		jQuery("#"+subgrid_table_id).jqGrid({
			url:"<?php echo base_url(); ?>index.php/<?=$this->uri->segment(1); ?>/index/subgrid/?id="+row_id,
			datatype: "xml",
			colNames: ['No','Menikah','Jumlah Anak'],
			colModel: [
				{name:"num",index:"num",width:80,key:true,hidden:true},
				{name:"menikah",index:"menikah",width:70,editable:true},
				{name:"anak",index:"anak",width:170,align:"right",editable:true},
			],
		   	rowNum:20,
		   	pager: pager_id,
		   	sortname: 'num',
		    sortorder: "asc",
		    height: '100%',
			cellEdit:true,
			cellsubmit : 'remote',
			cellurl: "<?php echo base_url(); ?>index.php/<?=$this->uri->segment(1); ?>/index/update/?grid=<?=$gridsubgrid['table']?>",
			// editurl: "<?php echo base_url(); ?>index.php/<?=$this->uri->segment(1); ?>/index/update/?grid=<?=$gridsubgrid['table']?>",
		});
		jQuery("#"+subgrid_table_id).jqGrid('navGrid',"#"+pager_id,{edit:false,add:false,del:false})
	},
	subGridRowColapsed: function(subgrid_id, row_id) {
		// this function is called before removing the data
		//var subgrid_table_id;
		//subgrid_table_id = subgrid_id+"_t";
		//jQuery("#"+subgrid_table_id).remove();
	}