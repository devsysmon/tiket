<?php $__env->startSection('content'); ?>
	<!-- row -->
	<div class="row hrow-gap">
		<article class="col-sm-7 padding-0" style="margin: 0px 0px 0px 0px; padding-left: 13px">
			<!-- new widget -->
			<div class="jarviswidget" id="wid-id-0" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
				<!-- widget options:
				usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

				data-widget-colorbutton="false"
				data-widget-editbutton="false"
				data-widget-togglebutton="false"
				data-widget-deletebutton="false"
				data-widget-fullscreenbutton="false"
				data-widget-custombutton="false"
				data-widget-collapsed="true"
				data-widget-sortable="false"

				-->
				<header>
					<span class="widget-icon"> <i class="glyphicon glyphicon-stats txt-color-darken"></i> </span>
					<h2>Grafik Statistik Layanan </h2>

					<ul class="nav nav-tabs pull-right in" id="myTab">
						<li class="active">
							<a data-toggle="tab" href="#s1">
							<i class="fa fa-clock-o"></i> <span class="hidden-mobile hidden-tablet">Live Status</span></a>
						</li>

					</ul>

				</header>

				<!-- widget div-->
				<div class="no-padding">
					<!-- widget edit box -->
					<div class="jarviswidget-editbox">

						test
					</div>
					<!-- end widget edit box -->

					<div class="widget-body">
						<!-- content -->
						<div id="myTabContent" class="tab-content">
							<div class="tab-pane fade active in padding-10 no-padding-bottom" id="s1">
								<div class="row no-space">
									<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
										<span class="demo-liveupdate-1"><span class="onoffswitch">
												<input type="checkbox" name="start_interval" class="onoffswitch-checkbox" id="start_interval">
												<label class="onoffswitch-label" for="start_interval"> 
													<span class="onoffswitch-inner" data-swchon-text="ON" data-swchoff-text="OFF"></span> 
													<span class="onoffswitch-switch"></span> </label> </span> </span>
										<div id="updating-chart" class="chart-large txt-color-blue"></div>

									</div>
									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 show-stats">

										<div class="row">
											<div class="col-xs-6 col-sm-6 col-md-12 col-lg-12"> <span class="text"> My Tasks <span class="pull-right">130/200</span> </span>
												<div class="progress">
													<div class="progress-bar bg-color-blueDark" style="width: 65%;"></div>
												</div> </div>
											<div class="col-xs-6 col-sm-6 col-md-12 col-lg-12"> <span class="text"> Transfered <span class="pull-right">440 GB</span> </span>
												<div class="progress">
													<div class="progress-bar bg-color-blue" style="width: 34%;"></div>
												</div> </div>
											<div class="col-xs-6 col-sm-6 col-md-12 col-lg-12"> <span class="text"> Trouble Found<span class="pull-right">77%</span> </span>
												<div class="progress">
													<div class="progress-bar bg-color-blue" style="width: 77%;"></div>
												</div> </div>
											<div class="col-xs-6 col-sm-6 col-md-12 col-lg-12"> <span class="text"> User Testing <span class="pull-right">7 Days</span> </span>
												<div class="progress">
													<div class="progress-bar bg-color-greenLight" style="width: 84%;"></div>
												</div> </div>

											<span class="show-stat-buttons"> <span class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> <a href="javascript:void(0);" class="btn btn-default btn-block hidden-xs">Generate PDF</a> </span> <span class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> <a href="javascript:void(0);" class="btn btn-default btn-block hidden-xs">Report Trouble</a> </span> </span>

										</div>

									</div>
								</div>
							</div>
							<!-- end s1 tab pane -->

							<div class="tab-pane fade" id="s2">
								<div class="widget-body-toolbar bg-color-white">

									<form class="form-inline" role="form">

										<div class="form-group">
											<label class="sr-only" for="s123">Show From</label>
											<input type="email" class="form-control input-sm" id="s123" placeholder="Show From">
										</div>
										<div class="form-group">
											<input type="email" class="form-control input-sm" id="s124" placeholder="To">
										</div>

										<div class="btn-group hidden-phone pull-right hidden-xs">
											<a class="btn dropdown-toggle btn-xs btn-default" data-toggle="dropdown"><i class="fa fa-cog"></i> More <span class="caret"> </span> </a>
											<ul class="dropdown-menu pull-right">
												<li>
													<a href="javascript:void(0);"><i class="fa fa-file-text-alt"></i> Export to PDF</a>
												</li>
												<li>
													<a href="javascript:void(0);"><i class="fa fa-question-sign"></i> Help</a>
												</li>
											</ul>
										</div>

									</form>

								</div>
								<div class="padding-10">
									<div id="statsChart" class="chart-large has-legend-unique"></div>
								</div>

							</div>
							<!-- end s2 tab pane -->

							<div class="tab-pane fade" id="s3">

								<div class="widget-body-toolbar bg-color-white smart-form" id="rev-toggles">

									<div class="inline-group">

										<label for="gra-0" class="checkbox">
											<input type="checkbox" name="gra-0" id="gra-0" checked="checked">
											<i></i> Target </label>
										<label for="gra-1" class="checkbox">
											<input type="checkbox" name="gra-1" id="gra-1" checked="checked">
											<i></i> Actual </label>
										<label for="gra-2" class="checkbox">
											<input type="checkbox" name="gra-2" id="gra-2" checked="checked">
											<i></i> Signups </label>
									</div>

									<div class="btn-group hidden-phone pull-right hidden-xs">
										<a class="btn dropdown-toggle btn-xs btn-default" data-toggle="dropdown"><i class="fa fa-cog"></i> More <span class="caret"> </span> </a>
										<ul class="dropdown-menu pull-right">
											<li>
												<a href="javascript:void(0);"><i class="fa fa-file-text-alt"></i> Export to PDF</a>
											</li>
											<li>
												<a href="javascript:void(0);"><i class="fa fa-question-sign"></i> Help</a>
											</li>
										</ul>
									</div>

								</div>

								<div class="padding-10">
									<div id="flotcontainer" class="chart-large has-legend-unique"></div>
								</div>
							</div>
							<!-- end s3 tab pane -->
						</div>

						<!-- end content -->
					</div>

				</div>
				<!-- end widget div -->
			</div>
			<!-- end widget -->

		</article>

		<article class="col-sm-5 padding-0" style="margin-top: 0px; padding-right: 12px">
			<div class="navbar navbar-default" style="width: 100%">
				<div id="cc" class="easyui-layout" style="height:300px;">
				
					<div data-options="region:'west',split:true,collapsed:true,
							hideExpandTool: true,
							expandMode: null,
							hideCollapsedContent: false,
							collapsedSize: 68,
							collapsedContent: function(){
								return $('#titlebar');
							}
					" title="West" style="width:100px;"></div>
					<div data-options="region:'center',title:'Summary Data'">
						<iframe id="iframe" name="myIframe" frameborder="0" width="100%" height="98%"></iframe>
						<div id="view_child">
							<table class="easyui-datagrid"
								data-options="url:'datagrid_data1.json',method:'get',border:false,singleSelect:true,fit:true,fitColumns:true">
								<thead>
									<tr>
										<th data-options="field:'DIEBOLD',align:'center'" width="100">DIEBOLD</th>
										<th data-options="field:'NCR',align:'center'" width="100">NCR</th>
										<th data-options="field:'CRM',align:'center'" width="100">CRM</th>
										<th data-options="field:'YIHUA',align:'center'" width="100">YIHUA</th>
										<th data-options="field:'TOTAL',align:'center'" width="100">TOTAL</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
				<div id="titlebar" style="padding:2px">
					<a href="javascript:void(0)" onclick="openDataUI()" class="easyui-linkbutton" style="width:100%" data-options="iconCls:'icon-large-picture',size:'large',iconAlign:'top'">ATM</a>
					<a href="javascript:void(0)" onclick="openDataUI('ticket')" class="easyui-linkbutton" style="width:100%" data-options="iconCls:'icon-large-shapes',size:'large',iconAlign:'top'">TICKET</a>
					<a href="javascript:void(0)" onclick="openDataUI('attend')" class="easyui-linkbutton" style="width:100%" data-options="iconCls:'icon-large-smartart',size:'large',iconAlign:'top'">ATTEND</a>
					<a href="javascript:void(0)" onclick="openDataUI('part')" class="easyui-linkbutton" style="width:100%" data-options="iconCls:'icon-large-chart',size:'large',iconAlign:'top'">PART</a>
				</div>
			</div>
		</article>
	</div>
	<div class="row hrow-gap">
		<article class="col-sm-12" style="margin: -32px 0px 0px 0px;">
		<div class="navbar navbar-default">
			<div class="easyui-panel" title="Mapping Area Kelolaan Mesin" style="width:100%;height:300px;">
				<div class="easyui-layout" data-options="fit:true">
					<div data-options="region:'west',split:true" style="width:210px;">
						<div class="easyui-datalist" title="Customer Support Engineer" style="width:200px;height:250px" data-options="url: 'datalist_data1.json',method: 'get',groupField: 'group'">
						</div>
					</div>
					<div data-options="region:'center'" style="">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.5147112103487!2d106.82016851484747!3d-6.195612895514772!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f421963cd607%3A0x503cb9e9306e657a!2sHotel%20Indonesia%20Kempinski%20Jakarta!5e0!3m2!1sid!2sid!4v1611906343720!5m2!1sid!2sid" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
					</div>
				</div>
			</div>
		</div>
		</article>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.easyui', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEV_SERVER\htdocs\atmserv-assindo\coresys\views/pages/dashboard_merchant_internal/view_child.blade.php ENDPATH**/ ?>