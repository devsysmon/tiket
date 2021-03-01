/* Example code for updating a chart with JS */

function loop(t) {
  requestAnimationFrame(loop);
  updateCharts(Math.floor(t / 16) % 100);
}

function updateCharts(value) {
  charts.forEach(chart => setChartValue(chart, value));
}

function setChartValue(chart, value) {
  chart.style.setProperty('--percent', value);
}

let charts = document.querySelectorAll('.js');

loop();