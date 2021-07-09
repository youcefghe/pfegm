@extends('layouts.moderator')
@section('modera')

          <div class="col-md-4 mr-2">
              <canvas id="myChart" width="300" height="300" class="myChart bg-white shadow-lg mb-3" style="height:15%;"></canvas>
              <canvas id="reported" width="300" height="300" class="myChart bg-white shadow-lg" style="height:15%;"></canvas>
          </div>
          <div class="col-md-4 ml-1">
               <canvas id="posts" width="300" height="300" class="myChart bg-white shadow-lg mb-3" style="height:15%;"></canvas>
              <canvas id="commentsChart" width="300" height="300" class="myChart bg-white shadow-lg" style="height:15%;"></canvas>

          </div>
        <script src="http://www.datejs.com/build/date.js" type="text/javascript"></script>
    <script>
        var usersDate = {!! $usersJoined !!};
        var postsDate = {!! $posts !!};
        var commentsDate = {!! $comments !!};
        var reportedDate = {!! $reported !!};
        var now = new Date();

        if(!usersDate) {
            if( now.toString(" M yyyy").substring(3, 15) != new Date(usersDate[usersDate.length-1].dates).toString(" M yyyy").substring(3, 15))
            {usersDate.push({'dates': Date.now(),'total':0})}
        }
        if(!postsDate) {
            if (now.toString(" M yyyy").substring(3, 15) != new Date(postsDate[postsDate.length - 1].dates).toString(" M yyyy").substring(3, 15)) {
                postsDate.push({'dates': Date.now(), 'total': 0})
            }

        }if(!reportedDate) {
            if (now.toString(" M yyyy").substring(3, 15) != new Date(reportedDate[reportedDate.length - 1].dates).toString(" M yyyy").substring(3, 15)) {
                reportedDate.push({'dates': Date.now(), 'total': 0})
            }
        }
        if(!commentsDate) {
            if (now.toString(" M yyyy").substring(3, 15) != new Date(commentsDate[commentsDate.length - 1].dates).toString(" M yyyy").substring(3, 15)) {
                commentsDate.push({'dates': Date.now(), 'total': 0})
            }
        }
        var ctx = document.getElementById('myChart').getContext('2d');
        var ctxP = document.getElementById('posts').getContext('2d');
        var ctxR = document.getElementById('reported').getContext('2d');
        var ctxC = document.getElementById('commentsChart').getContext('2d');
        var posts = new Chart(ctxP, {
            type: 'line',
            data: {
                labels: postsDate.map((item,key)=>{
                    return new Date(item["dates"]).toString(" M yyyy").substring(3, 15);
                }),
                datasets: [{
                    label: 'Posts',
                    data: postsDate.map((item,key) => {
                        if(key !=0  )
                        {
                            item["total"]= postsDate[key-1].total +postsDate[key].total;
                            return item['total'];
                        }
                        return item["total"] ;
                    }),
                    borderColor: 'rgb(210,22,22)',

                }]
            },
            options : {
                responsive: true,
                scales: {
                    xAxes: [{
                        type: 'time',
                        time: {
                            displayFormats: {
                                'millisecond': 'MMM DD',
                                'second': 'MMM DD',
                                'minute': 'MMM DD',
                                'hour': 'MMM DD',
                                'day': 'MMM DD',
                                'week': 'MMM DD',
                                'month': 'MMM DD',
                                'quarter': 'MMM DD',
                                'year': 'MMM DD',
                            }
                        }
                    }],
                    yAxes: [{
                        display: true,
                        ticks: {
                            beginAtZero: false,

                        }
                    }]
                },
            }
        });
        var comments = new Chart(ctxC, {
            type: 'line',
            data: {
                labels: commentsDate.map((item,key)=>{
                    return new Date(item["dates"]).toString(" M yyyy").substring(3, 15);
                }),
                datasets: [{
                    label: 'Comments',
                    data: commentsDate.map((item,key) => {
                        if(key !=0  )
                        {
                            item["total"]= commentsDate[key-1].total +commentsDate[key].total;
                            return item['total'];
                        }
                        return item["total"] ;
                    }),
                    borderColor: 'rgb(210,22,22)',

                }]
            },
            options : {
                responsive: true,
                scales: {
                    xAxes: [{
                        type: 'time',
                        time: {
                            displayFormats: {
                                'millisecond': 'MMM DD',
                                'second': 'MMM DD',
                                'minute': 'MMM DD',
                                'hour': 'MMM DD',
                                'day': 'MMM DD',
                                'week': 'MMM DD',
                                'month': 'MMM DD',
                                'quarter': 'MMM DD',
                                'year': 'MMM DD',
                            }
                        }
                    }],
                    yAxes: [{
                        display: true,
                        ticks: {
                            beginAtZero: false,

                        }
                    }]
                },
            }
        });
        var reported = new Chart(ctxR, {
            type: 'line',
            data: {
                labels: reportedDate.map((item,key)=>{
                    return new Date(item["dates"]).toString(" M yyyy").substring(3, 15);
                }),
                datasets: [{
                    label: 'Reported posts',
                    data: reportedDate.map((item,key) => {

                        if(key !=0 )
                        {
                            item["total"]= reportedDate[key-1].total + reportedDate[key].total ;
                            return item['total'];
                        }
                        return item["total"] -1;
                    }),
                    borderColor: 'rgb(75, 192, 192)',

                }]
            },
            options : {
                responsive: true,
                scales: {
                    xAxes: [{
                        type: 'time',
                        time: {
                            displayFormats: {
                                'millisecond': 'MMM DD',
                                'second': 'MMM DD',
                                'minute': 'MMM DD',
                                'hour': 'MMM DD',
                                'day': 'MMM DD',
                                'week': 'MMM DD',
                                'month': 'MMM DD',
                                'quarter': 'MMM DD',
                                'year': 'MMM DD',
                            }
                        }
                    }],
                    yAxes: [{
                        display: true,
                        ticks: {
                            beginAtZero: false,

                        }
                    }]
                },
            }
        });
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: usersDate.map((item,key)=>{
                         return new Date(item["dates"]).toString(" M yyyy").substring(3, 15);
                }),
                datasets: [{
                    label: 'Members',
                    data: usersDate.map((item,key) => {
                        if(key !=0 )
                        {
                            item["total"]= usersDate[key-1].total + usersDate[key].total ;
                            return item['total'];
                        }
                        return item["total"] -1;
                    }),
                    borderColor: 'rgb(75, 192, 192)',

                }]
            },
            options : {
                responsive: true,
                scales: {
                    xAxes: [{
                        type: 'time',
                        time: {
                            displayFormats: {
                                'millisecond': 'MMM DD',
                                'second': 'MMM DD',
                                'minute': 'MMM DD',
                                'hour': 'MMM DD',
                                'day': 'MMM DD',
                                'week': 'MMM DD',
                                'month': 'MMM DD',
                                'quarter': 'MMM DD',
                                'year': 'MMM DD',
                            }
                        }
                    }],
                    yAxes: [{
                        display: true,
                        ticks: {
                            beginAtZero: false,

                        }
                    }]
                },
            }
        });
    </script>
@endsection
