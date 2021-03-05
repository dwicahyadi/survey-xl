<div>
    <div id="{{ $elementId }}" style="width: 600px;height:400px;"></div>
    <script type="text/javascript">
        // based on prepared DOM, initialize echarts instance
        var {{ $elementId }} = echarts.init(document.getElementById('{{ $elementId }}'));

        // specify chart configuration item and data
        var option{{ $elementId }} = {

            tooltip: {
                trigger: 'item'
            },
            legend: {
                orient: 'vertical',
                left: 'left',
            },
            series: [
                {
                    name: '{{ $itemName }}',
                    type: 'pie',
                    radius: '50%',
                    data: {!! $data !!},
                    emphasis: {
                        itemStyle: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                    }
                }
            ]
        }

        // use configuration item and data specified to show chart
        {{ $elementId }}.setOption(option{{ $elementId }});
    </script>
</div>
