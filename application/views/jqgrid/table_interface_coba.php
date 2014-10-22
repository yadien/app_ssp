<script>
$(function () {
jQuery("#list4").jqGrid({
	datatype: "local",
	height: 250,
   	colNames:['Inv No','Date', 'Client', 'Amount','Tax','Total','Notes'],
   	colModel:[
   		{name:'id',index:'id', width:60, sorttype:"int"},
   		{name:'invdate',index:'invdate', width:90, sorttype:"date"},
   		{name:'name',index:'name', width:100},
   		{name:'amount',index:'amount', width:80, align:"right",sorttype:"float",editable:true},
   		{name:'tax',index:'tax', width:80, align:"right",sorttype:"string",edittype:'select',
		editable:true,editoptions: { value: "1:1-CPU;2:10-Monitor LCD;3:3-CPU 2nd;", dataEvents: [
		{ type: 'change', fn: function(e) {
			var textchange = $(this).find("option:selected").text();
			alert(textchange); 
		}},
		]}
		},		
   		{name:'total',index:'total', width:80,align:"right",sorttype:"float"},		
   		{name:'note',index:'note', width:150, sortable:false}		
   	],
   	// multiselect: true,
   	// caption: "Manipulating Array Data"
	forceFit : true,
	cellEdit: true,
	cellsubmit: 'clientArray',
	afterEditCell: function (id,name,val,iRow,iCol){
		if(name=='invdate') {
			jQuery("#"+iRow+"_invdate","#list4").datepicker({dateFormat:"yy-mm-dd"});
		}
	},
	afterSaveCell : function(rowid,name,val,iRow,iCol) {
		if(name == 'amount') {
			var taxval = jQuery("#list4").jqGrid('getCell',rowid,iCol+1);
			jQuery("#list4").jqGrid('setRowData',rowid,{total:parseFloat(val)+parseFloat(taxval)});
		}
		if(name == 'tax') {
			var amtval = jQuery("#list4").jqGrid('getCell',rowid,iCol-1);
			var taxval = jQuery("#list4").jqGrid('getCell',rowid,iCol);
			// alert(taxval);
			jQuery("#list4").jqGrid('setRowData',rowid,{total:taxval});
		}
	}

});
var mydata = [
		{id:"1",invdate:"2007-10-01",name:"test",note:"note",amount:"200.00",tax:"10.00",total:"210.00"},
		{id:"2",invdate:"2007-10-02",name:"test2",note:"note2",amount:"300.00",tax:"20.00",total:"320.00"},
		{id:"3",invdate:"2007-09-01",name:"test3",note:"note3",amount:"400.00",tax:"30.00",total:"430.00"},
		{id:"4",invdate:"2007-10-04",name:"test",note:"note",amount:"200.00",tax:"10.00",total:"210.00"},
		{id:"5",invdate:"2007-10-05",name:"test2",note:"note2",amount:"300.00",tax:"20.00",total:"320.00"},
		{id:"6",invdate:"2007-09-06",name:"test3",note:"note3",amount:"400.00",tax:"30.00",total:"430.00"},
		{id:"7",invdate:"2007-10-04",name:"test",note:"note",amount:"200.00",tax:"10.00",total:"210.00"},
		{id:"8",invdate:"2007-10-03",name:"test2",note:"note2",amount:"300.00",tax:"20.00",total:"320.00"},
		{id:"9",invdate:"2007-09-01",name:"test3",note:"note3",amount:"400.00",tax:"30.00",total:"430.00"}
		];
for(var i=0;i<=mydata.length;i++)
	jQuery("#list4").jqGrid('addRowData',i+1,mydata[i]);
});
</script>