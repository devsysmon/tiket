/*=========================================================================================
[Custom Sparkline Javascript]

Project	     : Seipkon - Responsive Admin Template
Author       : Hassan Rasu
Author URL   : https://themeforest.net/user/themescare
Version      : 1.0
Primary use  : Seipkon - Responsive Admin Template

Only Use For Demo Purposes.

==========================================================================================*/


(function ($) {
	"use strict";

	jQuery(document).ready(function ($) {


		/* 
		=================================================================
		Sparkbar Widget JS
		=================================================================	
		*/

		$('.sparkbar_widget').each(function () {
			var $this = $(this);
			$this.sparkline('html', {
				type: 'bar',
				barColor: '#926dde',
				type: 'bar',
				width: '100%',
				height: $this.data('height') ? $this.data('height') : '70',
				barWidth: '3',
				barSpacing: '2',
			});
		});

		/* 
		=================================================================
		Sparkbar Widget Visitor JS
		=================================================================	
		*/

		$('.sparkbar_widget_visitor').each(function () {
			var $this = $(this);
			$this.sparkline('html', {
				type: 'bar',
				barColor: '#33cabb',
				type: 'bar',
				width: '100%',
				height: $this.data('height') ? $this.data('height') : '70',
				barWidth: '3',
				barSpacing: '2',
			});
		});


		/* 
		=================================================================
		Sparkbar Widget Profits JS
		=================================================================	
		*/

		$('.sparkbar_widget_profits').each(function () {
			var $this = $(this);
			$this.sparkline('html', {
				type: 'bar',
				barColor: '#f96868',
				type: 'bar',
				width: '100%',
				height: $this.data('height') ? $this.data('height') : '70',
				barWidth: '3',
				barSpacing: '2',
			});
		});


		/* 
		=================================================================
		Sparkbar Area Chart JS
		=================================================================	
		*/

		if ($("#sparkline_area_chart").length) {
			$("#sparkline_area_chart").sparkline([10, 11, 14, 10, 16, 17, 19, 15, 13, 9], {
				type: 'line',
				width: '100%',
				height: '100%',
				lineColor: '#0b75b7',
				fillColor: 'rgba(97, 189, 250, 0.81)',
				lineWidth: 0
			});
		};


		/* 
		=================================================================
		Sparkbar Line Chart JS
		=================================================================	
		*/
		if ($("#sparkline_line_chart").length) {
			$("#sparkline_line_chart").sparkline([10, 11, 14, 10, 16, 7, 19, 15, 13], {
				width: '100%',
				height: '100%',
				lineColor: '#0083CD',
				fillColor: false
			});
		};

		/* 
		=================================================================
		Sparkbar Pie Chart JS
		=================================================================	
		*/

		if ($("#sparkline_pie_chart").length) {
			$("#sparkline_pie_chart").sparkline([1, 1, 2], {
				type: 'pie',
				width: '100%',
				height: '100%',
				sliceColors: ['#059BFF', '#FF3D67', '#FFC233', '#109618', '#FFC233', '#dd4477', '#0099c6', '#FFC233']
			});
		};

		/* 
		=================================================================
		Sparkbar Bullet Chart JS
		=================================================================	
		*/

		if ($("#sparkline_bullet_chart").length) {
			$("#sparkline_bullet_chart").sparkline([10, 12, 12, 9, 7], {
				type: 'bullet',
				width: '100%',
				height: '100%',
				performanceColor: '#fc6e89',
				rangeColors: ['#a1b0fd', '#8699fa', '#5a72ed ']
			});
		};


	});


}(jQuery));