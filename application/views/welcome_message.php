<?php include 'header.php'?>
  <div class="jumbotron">
    <h2 style="padding-top: 13px;">DeNA Project TimeLine</h2>
    <p class="lead">展示各个游戏项目的上线时间。<br>
      便于公司各相关部门了解各个项目的时间安排，任务上线和结束时间。</p>
  </div>
  <div class="bs-callout bs-callout-info" ng-controller="MenuController">
    <div class="row">
      <div class="col-xs-2">
        <select class="form-control" ng-model="param.game" ng-options="o.id as o.gameName for o in menu_game">
          <option value="">-- 请选择 --</option>
        </select>
      </div>
      <div class="col-xs-2">
        <select class="form-control" ng-model="param.market" ng-options="m.value as m.pf for m in menu_market">
          <option value="">-- 请选择 --</option>
        </select>
      </div>
      <div class="col-xs-2">
        <select class="form-control"  ng-model="param.platform" ng-options="p.market for p in menu_platform">
          <option value="">-- 请选择 --</option>
        </select>
      </div>
      <div class="col-xs-2">
        <!--<select class="form-control" ng-model="param.time" ng-options="y for y in times" >
        </select>-->
        <input class="form-control"  id="starttime" type="text" placeholder="开始时间" ng-model="param.starttime"/>
      </div>
      <div class="col-xs-2">
        <!--<select class="form-control" ng-model="param.current_sea" ng-options="s.s for s in season" >
        </select>-->
        <input class="form-control"  id="endtime" type="text"  placeholder="结束时间" ng-model="param.endtime"/>
      </div>
    </div>
  </div>
  
  
  <div class="tab_zone">
    <div class="well" ng-controller="totalController">
      <div class="row">
        <div class="col-xs-2">
          <!--<select class="form-control" ng-model="time" ng-options="y for y in times">
          </select>-->
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
  
  
  <div ng-view></div>
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
  
    <div id="container" style="min-width:700px;height:400px"></div>
  
  
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


//var menu_time = [2014,2015,2016,2017,2018,2019,2020];
//var season_time = [{s:'全年',v:0},{s:'第1季度',v:1},{s:'第2季度',v:2},{s:'第3季度',v:3},{s:'第4季度',v:4}];
var menu_game = [{id:1001,gameName:'NBA'},{id:1001,gameName:'ck'},{id:1001,gameName:'tf'}];
var menu_form = [{market:'大陆',value:'1'},{market:'台湾',value:'2'},{market:'海外',value:'3'}];
var menu_market = [{pf:'IOS',value:1},{pf:'Android',value:2},{pf:'Winphone',value:3}];

 jQuery(function () {
            // 时间设置
            jQuery('#starttime').datetimepicker({
               // timeFormat: "HH:mm:ss",
                dateFormat: "yy-mm-dd"
            });
			jQuery('#endtime').datetimepicker({
				//timeFormat: "HH:mm:ss",
				dateFormat: "yy-mm-dd"
			});
        });
		
		
  </script> 
  <script type="text/javascript" src="<?php echo js_url('js.js');?>"></script>
  <?php include 'footer.php'?>
