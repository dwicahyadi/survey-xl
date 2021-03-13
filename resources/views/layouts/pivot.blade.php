
<!DOCTYPE html>
<html>
<head>
    <title>PivotTable - Avacentral.com</title>
    <!-- external libs from cdnjs -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/4.1.2/papaparse.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.js"></script>
    <script src="https://cdn.plot.ly/plotly-basic-latest.min.js"></script>

    <!-- PivotTable.js libs from ../dist -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pivot.css') }}">
    <script type="text/javascript" src="{{ asset('js/pivot.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/d3_renderers.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plotly_renderers.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/export_renderers.js') }}"></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <style>
        body {font-family: Nunito;}
        .node {
            border: solid 1px white;
            font: 10px sans-serif;
            line-height: 12px;
            overflow: hidden;
            position: absolute;
            text-indent: 2px;
        }
    </style>
</head>
<body>
<script type="text/javascript">
    $(function(){
        data = {!! $data !!}
        var renderers = $.extend(
            $.pivotUtilities.renderers,
            $.pivotUtilities.plotly_renderers,
            $.pivotUtilities.d3_renderers,
            $.pivotUtilities.export_renderers
        );

        $("#output").pivotUI(data, {
            rows: [""],
            cols: [""],
            aggregatorName: "Count",
            rendererName: "Table",
            renderers: renderers

        }, true);
    });




</script>
<div style="margin: 10px;">
    <h1 class="h1">PivotTable : "{{$question->text}}" </h1>
    @if(request('startDate'))
        <span class="badge badge-pill p-2 mr-2">Start date : {{ request('startDate') }}</span>
    @endif

    @if(request('endDate'))
        <span class="badge badge-pill p-2 mr-2">End date : {{ request('endDate') }}</span>
    @endif

    @if(request('dealer_id'))
        <span class="badge badge-pill p-2 mr-2">Dealer : {{ $dealer->name ?? '' }}</span>
    @endif

    @if(request('cluster_id'))
        <span class="badge badge-pill p-2 mr-2">Cluster : {{ $cluster->name ?? '' }}</span>
    @endif
    <div class="alert alert-info">
        <p>Drag and Drop PivotTable Fields to determine which fields we will place in parts of the PivotTable</p>
        <p>Use filter on each PivotTable Fields to get more specific results</p>
    </div>
</div>
<div id="output" style="margin: 10px;"></div>

</body>
</html>
