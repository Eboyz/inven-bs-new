<div>
	<div class="card">
		<div class="card-header">
			<h4>{{ $chartTitle }}</h4>
		</div>
		<div class="card-body">
			<div id="{{ $chartID }}"></div>
		</div>
	</div>
</div>

@push('js')
<script>
	const chartID = "#{{ $chartID }}";
	const categories = @json($categories);
	const series = @json($series);

	let options = {
		chart: {
			height: 350,
			type: "bar",
		},
		plotOptions: {
			bar: {
				distributed: true,
			}
		},
		series: [
			{
				data: series,
			},
		],
		xaxis: {
			categories: categories,
		},
	};

	@isset($colors)
		options.colors = @json($colors)
	@endisset

	new ApexCharts(document.querySelector(chartID), options).render();
</script>
@endpush
