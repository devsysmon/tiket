/*=========================================================================================
[Custom Morris Javascript]

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
		Morris Bar Chart JS
		=================================================================	
		*/

		var area = new Morris.Bar({
			element: 'morris_bar_chart',
			data: [{
					device: 'iPhone',
					geekbench: 136
				},
				{
					device: 'iPhone 3G',
					geekbench: 137
				},
				{
					device: 'iPhone 3GS',
					geekbench: 275
				},
				{
					device: 'iPhone 4',
					geekbench: 380
				},
				{
					device: 'iPhone 3S',
					geekbench: 355
				},
				{
					device: 'iPhone 5',
					geekbench: 680
				}
			],
			xkey: 'device',
			ykeys: ['geekbench'],
			labels: ['geekbench'],
			barRatio: 0.4,
			xLabelAngle: 35,
			hideHover: 'auto',
			resize: true,
			barColors: function (row, series, type) {
				console.log("--> " + row.label, series, type);
				if (row.label == "iPhone") return "#c785e2";
				else if (row.label == "iPhone 3G") return "#fac64c";
				else if (row.label == "iPhone 3GS") return "#47debe";
				else if (row.label == "iPhone 4") return "#fc5378";
				else if (row.label == "iPhone 3S") return "#47b2f8";
				else if (row.label == "iPhone 5") return "#d35fdd"
			}
		});


		/* 
		=================================================================
		Morris Area Chart JS
		=================================================================	
		*/

		var area = new Morris.Area({
			element: 'morris_area_chart',
			data: [{
					period: '2010 Q1',
					iphone: 2666,
					ipad: null,
					itouch: 2647
				},
				{
					period: '2010 Q2',
					iphone: 2778,
					ipad: 2294,
					itouch: 2441
				},
				{
					period: '2010 Q3',
					iphone: 4912,
					ipad: 1969,
					itouch: 2501
				},
				{
					period: '2010 Q4',
					iphone: 3767,
					ipad: 3597,
					itouch: 5689
				},
				{
					period: '2011 Q1',
					iphone: 6810,
					ipad: 1914,
					itouch: 2293
				},
				{
					period: '2011 Q2',
					iphone: 5670,
					ipad: 4293,
					itouch: 1881
				},
				{
					period: '2011 Q3',
					iphone: 4820,
					ipad: 3795,
					itouch: 1588
				},
				{
					period: '2011 Q4',
					iphone: 15073,
					ipad: 5967,
					itouch: 5175
				},
				{
					period: '2012 Q1',
					iphone: 10687,
					ipad: 4460,
					itouch: 2028
				},
				{
					period: '2012 Q2',
					iphone: 8432,
					ipad: 5713,
					itouch: 1791
				}
			],
			xkey: 'period',
			ykeys: ['iphone', 'ipad', 'itouch'],
			labels: ['iPhone', 'iPad', 'iPod Touch'],
			pointSize: 2,
			lineColors: ['#bf45f0', '#fc5378', '#47b2f8'],
			hideHover: 'auto'
		});


		/* 
		=================================================================
		Morris Line Chart JS
		=================================================================	
		*/

		var area = new Morris.Line({
			element: 'morris_line_chart',
			data: [{
					period: '2010',
					iphone: 50,
					ipad: 80,
					itouch: 20
				}, {
					period: '2011',
					iphone: 130,
					ipad: 100,
					itouch: 80
				}, {
					period: '2012',
					iphone: 80,
					ipad: 60,
					itouch: 70
				}, {
					period: '2013',
					iphone: 70,
					ipad: 200,
					itouch: 140
				}, {
					period: '2014',
					iphone: 180,
					ipad: 150,
					itouch: 140
				}, {
					period: '2015',
					iphone: 105,
					ipad: 100,
					itouch: 80
				},
				{
					period: '2016',
					iphone: 250,
					ipad: 150,
					itouch: 200
				}
			],
			xkey: 'period',
			ykeys: ['iphone', 'ipad', 'itouch'],
			labels: ['iPhone', 'iPad', 'iTouch'],
			pointSize: 3,
			fillOpacity: 0,
			pointStrokeColors: ['#1cc100', '#fdc006', '#1db4bd'],
			behaveLikeLine: true,
			gridLineColor: '#e0e0e0',
			lineWidth: 1,
			hideHover: 'auto',
			lineColors: ['#1cc100', '#fdc006', '#1db4bd'],
			resize: true
		});


		/* 
		=================================================================
		Morris Donut Chart JS
		=================================================================	
		*/
		var area = new Morris.Donut({
			element: 'morris_donut_chart',
			data: [{
					label: "Download Sales",
					value: 12
				},
				{
					label: "In-Store Sales",
					value: 30
				},
				{
					label: "Mail-Order Sales",
					value: 20
				}
			],
			resize: true,
			colors: ["#f25454", "#0fb49b", "#fa9a2a"]

		});


	});


}(jQuery));