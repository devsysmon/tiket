<?php $__env->startSection('content'); ?>
	<table class="easyui-datagrid" data-options="url:'<?=base_url()?>datagrid_data1.json',method:'get',border:false,singleSelect:true,fit:true,fitColumns:true">
		<thead>
			<tr>
				<th data-options="field:'productid',align:'center'" width="200">BANK</th>
				<th data-options="field:'productname',align:'center'" width="100">DIEBOLD</th>
				<th data-options="field:'unitcost',align:'center'" width="100">NCR</th>
				<th data-options="field:'status',align:'center'" width="100">CRM</th>
				<th data-options="field:'listprice',align:'center'" width="100">YIHUA</th>
				<th data-options="field:'attr1',align:'center'" width="100">TOTAL</th>
			</tr>
		</thead>
	</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.easyui', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEV_SERVER\htdocs\atmserv-assindo\coresys\views/pages/dashboard_merchant_internal/table_part.blade.php ENDPATH**/ ?>