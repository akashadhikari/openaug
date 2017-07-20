@extends('main')

@section('title', '| Sentiment Analysis')

@section('content')

<html>
<head>

  <script>
  src="http://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous">
  </script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

</head>
<body>

<div class="container">

  <div class="row">
    <div class="col align-self-center">
    
        <div id="container1"></div>
    </div>

  </div>

  <div class="col align-self-center">

    @foreach($comments as $comment)

        <table class="table table-hover">

                    <thead>
                        <th>Comment</th>
                        <th>Bias</th>
                    </thead>

                    <tbody>
                            <tr>
                                <td>{{$comment->comment}}</td>
                                <td>0.75</td>
                            </tr>
                    </tbody>
        </table>
                
    @endforeach


    <!-- @foreach($posts as $post)
    {{$post->title}}
    @endforeach -->


    </div>
</div>


<script type="text/javascript">

//container 1 stores pie chart visualization

    Highcharts.chart('container1', {
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'What users say about the spot?'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Sentiment Analysis',
            data: [
                ['Positive', 75.0],
                ['Negative', 20.0],
                {
                    name: 'Neutral',
                    y: 5.0,
                    sliced: true,
                    selected: true
                }
            ]
        }]
    });

</script>


</body>
</html>

@endsection
