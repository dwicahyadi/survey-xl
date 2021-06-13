<div>
    <div id="{{ $elementId }}" style="min-width: 300px;height:300px; "></div>
    <script type="text/javascript">
        // based on prepared DOM, initialize echarts instance
        var {{ $elementId }} = echarts.init(document.getElementById('{{ $elementId }}'));

        var colorPalette = ['#FF0D0D', '#FF8E15', '#FAB733','#ACB334','#69B34C'];

        // specify chart configuration item and data
        var option{{ $elementId }} = {
            /*title: {
                text: '{{ $title }}',
                subtext: '-',
                left: 'center'
            },*/
            tooltip: {
                trigger: 'item',
                formatter: "{a} <br/>{b} : {c} ({d}%)"
            },
           /* legend: {
                orient: 'vertical',
                left: 'left',
            },*/
            series: [
                {
                    name: 'response',
                    type: 'pie',
                    radius: '50%',
                    data: {!! $data !!},
                    // color: colorPalette,
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

