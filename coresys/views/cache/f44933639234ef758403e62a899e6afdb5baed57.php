<table class="easyui-datagrid" data-options="url:'<?=base_url()?>dashboard/summary_ticket',method:'get',border:false,singleSelect:true,fit:true,fitColumns:true">
	<thead>
		<tr>
			<th data-options="field:'idticket',align:'left'" width="120">TICKET ID</th>
			<th data-options="field:'idatm',align:'left'" width="100">ID ATM</th>
			<th data-options="field:'bank',align:'left'" width="150">BANK</th>
			<th data-options="field:'problem',align:'left'" width="100">PROBLEM</th>
			<th data-options="field:'areaservice',align:'left'" width="100">AREA SERVICE</th>
			<th data-options="field:'lokasi',align:'left'" width="200">LOKASI</th>
			<th data-options="field:'status',align:'left'" width="200">STATUS</th>
		</tr>
	</thead>
</table><?php /**PATH D:\DEV_SERVER\htdocs\atmserv-assindo\coresys\views/pages/dashboard/table_ticket.blade.php ENDPATH**/ ?>