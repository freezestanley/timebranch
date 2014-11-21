<?php include 'header.php'?>
  <div class="jumbotron">
    <h2 style="padding-top: 13px;">DeNA Project TimeLine</h2>
    <p class="lead">展示各个游戏项目的上线时间。<br>
      便于公司各相关部门了解各个项目的时间安排，任务上线和结束时间。</p>
  </div>
  <div class="bs-callout bs-callout-info" ng-controller="MenuController">
    <div class="row">
      <div class="col-xs-3">
        <select class="form-control">
          <option>All</option>
          <option>NBA</option>
          <option>CK</option>
          <option>One Price</option>
        </select>
      </div>
      <div class="col-xs-2">
        <select class="form-control">
          <option>All</option>
          <option>大陆</option>
          <option>台湾</option>
          <option>海外</option>
        </select>
      </div>
      <div class="col-xs-2">
        <select class="form-control">
          <option>All</option>
          <option>IOS</option>
          <option>Android</option>
          <option>Winphone</option>
        </select>
      </div>
      <div class="col-xs-2">
        <select class="form-control" >
          <option ng-repeat="time in times">{{time}}</option>
        </select>
      </div>
      
      <div class="col-xs-2">
        <select class="form-control">
           <option ng-repeat="seas in season">{{seas}}</option>
        </select>
      </div>
    </div>
  </div>
  
  
  <div id="container" style="min-width:700px;height:400px"></div>
  
  
  <div  ng-controller="detailController" ng-show="menuState.show">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"></h3>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
              <div class="caption">
                <h3>NBA 官网上线</h3>
                <div>
                  <table>
                    <tr>
                      <td>平台：</td>
                      <td>Android</td>
                    </tr>
                    <tr>
                      <td>市场：</td>
                      <td>大陆</td>
                    </tr>
                    <tr>
                      <td>开始：</td>
                      <td>2014-09-01</td>
                    </tr>
                    <tr>
                      <td>结束：</td>
                      <td>2014-09-01</td>
                    </tr>
                      </tr>
                    
                  </table>
                  <div class="cap_title">项目进度：</div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"> 60% </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
              <div class="caption">
                <h3>NBA 官网上线</h3>
                <div>
                  <table>
                    <tr>
                      <td>平台：</td>
                      <td>Android</td>
                    </tr>
                    <tr>
                      <td>市场：</td>
                      <td>大陆</td>
                    </tr>
                    <tr>
                      <td>开始：</td>
                      <td>2014-09-01</td>
                    </tr>
                    <tr>
                      <td>结束：</td>
                      <td>2014-09-01</td>
                    </tr>
                      </tr>
                    
                  </table>
                  <div class="cap_title">项目进度：</div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"> 60% </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
              <div class="caption">
                <h3>NBA 官网上线</h3>
                <div>
                  <table>
                    <tr>
                      <td>平台：</td>
                      <td>Android</td>
                    </tr>
                    <tr>
                      <td>市场：</td>
                      <td>大陆</td>
                    </tr>
                    <tr>
                      <td>开始：</td>
                      <td>2014-09-01</td>
                    </tr>
                    <tr>
                      <td>结束：</td>
                      <td>2014-09-01</td>
                    </tr>
                      </tr>
                    
                  </table>
                  <div class="cap_title">项目进度：</div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"> 60% </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div align="center">
    <div class="btn-group">
      <button type="button" class="btn btn-default">统计信息</button>
      <button type="button" class="btn btn-default">历史记录</button>
    </div>
  </div>
  <div class="tab_zone">
    <div class="well" ng-controller="totalController">
      <div class="row">
        <div class="col-xs-2">
          <select class="form-control">
            <option ng-repeat = "t in times">{{t}}</option>
          </select>
        </div>
        <nav>
          <ul class="pagination total_num">
            <li ng-repeat = "m in month"><a href="#">{{m}}</a></li>
          </ul>
        </nav>
      </div>
          <div>
            <div class="panel panel-default">
              <div class="panel-body"> Basic panel example </div>
            </div>
            
            <div class="panel panel-default">
              <div class="panel-body"> Basic panel example </div>
            </div>
            
            
            <div class="panel panel-default">
              <div class="panel-body"> Basic panel example </div>
            </div>
          </div>
    </div>
  </div>
  <script>
    $(function () {
    var colors = Highcharts.getOptions().colors,
        categories = ['NBA', 'CK', 'One price', '妖精的尾巴', '死神'],
        name = ' ',
        data = [{
                y: 5,
                color: colors[0],
                drilldown: {
                    name: 'MSIE versions',
                    categories: ['MSIE 6.0', 'MSIE 7.0', 'MSIE 8.0', 'MSIE 9.0'],
                    data: [10.85, 7.35, 33.06, 2.81],
                    color: colors[0]
                }
            }, {
                y: 30,
                color: colors[1],
                drilldown: {
                    name: 'Firefox versions',
                    categories: ['Firefox 2.0', 'Firefox 3.0', 'Firefox 3.5', 'Firefox 3.6', 'Firefox 4.0'],
                    data: [0.20, 0.83, 1.58, 13.12, 5.43],
                    color: colors[1]
                }
            }, {
                y: 30,
                color: colors[2],
                drilldown: {
                    name: 'Chrome versions',
                    categories: ['Chrome 5.0', 'Chrome 6.0', 'Chrome 7.0', 'Chrome 8.0', 'Chrome 9.0',
                        'Chrome 10.0', 'Chrome 11.0', 'Chrome 12.0'],
                    data: [0.12, 0.19, 0.12, 0.36, 0.32, 9.91, 0.50, 0.22],
                    color: colors[2]
                }
            }, {
                y: 30,
                color: colors[3],
                drilldown: {
                    name: 'Safari versions',
                    categories: ['Safari 5.0', 'Safari 4.0', 'Safari Win 5.0', 'Safari 4.1', 'Safari/Maxthon',
                        'Safari 3.1', 'Safari 4.1'],
                    data: [4.55, 1.42, 0.23, 0.21, 0.20, 0.19, 0.14],
                    color: colors[3]
                }
            }, {
                y: 30,
                color: colors[4],
                drilldown: {
                    name: 'Opera versions',
                    categories: ['Opera 9.x', 'Opera 10.x', 'Opera 11.x'],
                    data: [ 0.12, 0.37, 1.65],
                    color: colors[4]
                }
            }];

    function setChart(name, categories, data, color) {
	chart.xAxis[0].setCategories(categories, false);
	chart.series[0].remove(false);
	chart.addSeries({
		name: name,
		data: data,
		color: color || 'white'
	}, false);
	chart.redraw();
    }

    var chart = $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: '2014年7月 游戏任务'
        },
        subtitle: {
            text: '点击柱状图察看详情'
        },
        xAxis: {
            categories: categories
        },
        yAxis: {
            title: {
                text: '游戏任务数量'
            }
        },
        plotOptions: {
            column: {
                cursor: 'pointer',
                point: {
                    events: {
                        click: function() {
                            var drilldown = this.drilldown;
                            if (drilldown) { // drill down
                                setChart(drilldown.name, drilldown.categories, drilldown.data, drilldown.color);
                            } else { // restore
                                //setChart(name, categories, data);
								//alert('fffffffffffff');
                            }
                        }
                    }
                },
                dataLabels: {
                    enabled: true,
                    color: colors[0],
                    style: {
                        fontWeight: 'bold'
                    },
                    formatter: function() {
                        return this.y+'个';
                    }
                }
            }
        },
        tooltip: {
            formatter: function() {
                var point = this.point,
                    s = this.x +':<b>'+ this.y +' market share</b><br/>';
                if (point.drilldown) {
                    s += 'Click to view '+ point.category +' versions';
                } else {
                    s += 'Click to return to browser brands';
                }
                return s;
            }
        },
        series: [{
            name: name,
            data: data,
            color: 'white'
        }],
        exporting: {
            enabled: false
        }
    })

});			


var year_time = [2014,2015,2016,2017,2018];
var season_time = ['全年','第1季度','第2季度','第3季度','第4季度'];
  </script>
  <script type="text/javascript" src="<?php echo js_url('js.js');?>"></script>
  <?php include 'footer.php'?>
