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

<!-- START -->

<?php

use MonkeyLearn\Client as MonkeyLearn;

        $ml = new MonkeyLearn('289ec47e8ed51bb7d4232569551cda7b7343fa68');
        
        // from table 'comments' only pluck 'comment' field and convert it to an array
        $arr = DB::table('comments')->pluck('comment')->toArray();
        
        $module_id = 'cl_qkjxv9Ly'; // this is tweet module id
        //$res is an array that returns
        $res = $ml->classifiers->classify($module_id, $arr, true);

        //count the total number of comments in the array
        $x= count($comments);
        print $x;
        
        // $x-1 because i have "chor buddhi"
        //print all the labels (positive, negative or neutral) of the comments

        // for($i=0; $i<=$x-1; $i++) {
        //     print($res->result[$i][0]['label']);print"\n";

        // }

        //count total number of positive reviews
        $countPositive = 0;
        for($i=0; $i<=$x-1; $i++) {
            
            if($res->result[$i][0]['label']=='positive') {
                $countPositive = $countPositive + 1;
            }
        }
        print("Total Positive:");
        print($countPositive);print"\n";

        //count total number of negative reviews
        $countNegative = 0;
        for($i=0; $i<=$x-1; $i++) {
            
            if($res->result[$i][0]['label']=='negative') {
                $countNegative = $countNegative + 1;
            }
        }
        print("<br>Total Negative:"); 
        print($countNegative);print"\n";

        //count total number of neutral reviews
        $countNeutral = 0;
        for($i=0; $i<=$x-1; $i++) {
            
            if($res->result[$i][0]['label']=='neutral') {
                $countNeutral = $countNeutral + 1;
            }
        }
        print("<br>Total Neutral:"); 
        print($countNeutral);print"\n";


        
?>


<!-- END -->

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
                        
                    </thead>

                    <tbody>
                            <tr>
                                <td>{{$comment->comment}}</td>

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
                ['Positive', {{$countPositive}}],
                ['Negative', {{$countNegative}}],
                {
                    name: 'Neutral',
                    y: {{$countNeutral}},
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
