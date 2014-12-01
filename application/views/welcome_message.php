                                                                                                                                                         <?php include 'header.php'?>
  <div class="jumbotron">
    <h2 style="padding-top: 13px;">DeNA Project TimeLine</h2>
    <p class="lead">展示各个游戏项目的上线时间。<br>
      便于公司各相关部门了解各个项目的时间安排，任务上线和结束时间。</p>
  </div>

<div class="bs-callout bs-callout-info" ng-controller="MenuController">
    <div class="row">
      <div class="col-xs-2">
        <select class="form-control" ng-model="param.game">
  			<option value="">-- 请选择 --</option>
            <option ng-repeat="o in menu_game" value="{{o.name}}">{{o.name}}</option>
        </select>
      </div>
      <div class="col-xs-2">
        <select class="form-control" ng-model="param.market" ><!--ng-options="for m in menu_market">-->
          <option value="">-- 请选择 --</option>
          <option ng-repeat="m in menu_market" value="{{m}}">{{m}}</option>
        </select>
      </div>
      <div class="col-xs-2">
        <select class="form-control"  ng-model="param.platform"> <!--ng-options="for p in menu_platform">-->
          <option value="">-- 请选择 --</option>
          <option ng-repeat="p in menu_platform" value="{{p}}">{{p}}</option>
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
      <!--<div class="row">
        <div class="col-xs-2">
          <select class="form-control" ng-model="time" ng-options="y for y in times">
          </select>
          {{Tt | titleCase}}{{myDate}}
        </div>
        <nav>
          <ul class="pagination total_num">
            <li ng-repeat = "m in month"><a href="#">{{m}}</a></li>
          </ul>
        </nav>
      </div>-->
      <div>
        <div class="panel panel-default" ng-repeat="d in detail_info">
          <div class="panel-body">
			{{d.day}}
          <table width="100%" class="p_table">
          	  <tbody>
              <tr ng-repeat="task in d.task">
              <td>{{task.gname}}</td>
              <td>{{task.point}}</td>
              <td>{{task.market}}</td>
              <td>{{task.pf}}</td>
              <td><a ng-click="setPopID(task.nid);">历史</a></td> <!--ng-click="showpop({{task.nid}});"-->
              </tr>
              </tbody>
          </table>

          </div>
        </div>
      </div>
    </div>
  </div>





 <!-- <div class="gantt"></div>-->
  <iframe src="<?=site_url()?>api/gantt_iframe" style="width:100%; border:none; height:525px;" scrolling="no"></iframe>





<div ng-controller="tabController">
  <div align="center" style="margin-bottom:30px;">
    <div class="btn-group">
      <a href="javascript:;" class="btn btn-default" data-name ="table" ng-click="show_ctl($event)">统计信息</a>
     <!-- <button type="button" class="btn btn-default">历史记录</button>-->
      <a href="javascript:;" class="btn btn-default" data-name = "block" ng-click="show_ctl($event)">XXXX</a>
    </div>
  </div>

    <div id="container" style="width:940px;height:600px; margin-bottom:30px;" ng-show="showCtl.tab_show"></div>

    <div ng-show="showCtl.tab_show2">
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



</div>




<!--<div ng-controller="MainController">
  Choose:
  <a href="Book/Moby">#/Moby</a> |
  <a href="Book/Moby/ch/1">Moby: Ch1</a> |
  <a href="Book/Gatsby">Gatsby</a> |
  <a href="Book/Gatsby/ch/4?key=value">Gatsby: Ch4</a> |
  <a href="Book/Scarlet">Scarlet Letter</a><br/>

  <div ng-view></div>

  <hr />

  <pre>$location.path() = {{$location.path()}}</pre>
  <pre>$route.current.templateUrl = {{$route.current.templateUrl}}</pre>
  <pre>$route.current.params = {{$route.current.params}}</pre>
  <pre>$route.current.scope.name = {{$route.current.scope.name}}</pre>
  <pre>$routeParams = {{$routeParams}}</pre>
</div>-->
<div class="dialog" id="dialog" ng-controller="dialogController" ng-show="showDia">
		<div class="dia_zone" id="dia_zone">
        <a href="javascript:;" ng-click="showDia = showDia == true?false:true;" class="close"></a>
			<table class="">
            	<tr><td>项目时间</td><td>修改操作</td><td>修改时间</td><td>修改原因</td></tr>
            	<tr ng-repeat="h in history"><td >{{h.update_time}}</td><td>{{h.type | typefilter}}</td><td>{{h.addtime}}</td><td>{{h.remark}}</td></tr>
            </table>
        </div>

        <div class="mask" id="mask"></div>
</div>

<script>
var menu_game = [{id:1001,gameName:'NBA'},{id:1001,gameName:'ck'},{id:1001,gameName:'tf'}];
var menu_form = ['IOS（越狱）', 'IOS（正版）', 'IOS', 'ANDROID','WindowPhone'];
var menu_market = ['TW','CN'];
var day_table = '<?=site_url() . "api/filter"?>';
var pop_url = '<?=site_url()?>api/history?nid=';
var game_name_url = '<?=site_url() . "api/get_projects"?>';

var task_event = [{day:'2014-01-10',
				   task:[{stime:'2014-01-10',mtime:'2014-02-02',gname:'NBA',reason:'修改理由',market:'大陆',pf:'Android',point:'CBT1'},
  						 {stime:'2014-01-10',mtime:'2014-02-02',gname:'ck',reason:'修改理由',market:'台湾',pf:'Android',point:'CBT1'},
						 {stime:'2014-01-10',mtime:'2014-02-02',gname:'TF',reason:'修改理由',market:'大陆',pf:'Winphone',point:'CBT1'}
						]
				  },
				  {day:'2014-01-11',
				   task:[{stime:'2014-01-12',mtime:'2014-02-02',gname:'NBA',reason:'修改理由',market:'台湾',pf:'Ios',point:'CBT1'},
  						 {stime:'2014-01-12',mtime:'2014-02-02',gname:'NBA',reason:'修改理由',market:'台湾',pf:'Ios',point:'CBT1'},
						 {stime:'2014-01-12',mtime:'2014-02-02',gname:'TF',reason:'修改理由',market:'大陆',pf:'Winphone',point:'CBT1'}
						]
				  },
				  {day:'2014-01-12',
				   task:[{stime:'2014-01-13',mtime:'2014-02-01',gname:'NBA',reason:'修改理由',market:'大陆',pf:'Android',point:'CBT1'},
  						 {stime:'2014-01-14',mtime:'2014-02-14',gname:'ck',reason:'修改理由',market:'台湾',pf:'Ios',point:'CBT1'},
						 {stime:'2014-01-11',mtime:'2014-02-15',gname:'ck',reason:'修改理由',market:'大陆',pf:'Winphone',point:'CBT1'}
						]
				  },
				 ];

var date_array = [{
				name: 'Tokyo',
				data: [7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6],
			}, {
				name: 'London',
				data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8],
			}];
var ztime;
 jQuery(function () {
            // 时间设置
            jQuery('#starttime').datetimepicker({
                dateFormat: "yy-mm-dd",

        		  onClose:function(time){
                  $('#endtime').datepicker( "option", "minDate", time );
        				}
            });
      		jQuery('#endtime').datetimepicker({
      			dateFormat: "yy-mm-dd",
                onClose:function(time){
                  $('#starttime').datepicker( "option", "maxDate", time );
                }
      		});
        });
$(function () {

		/*$(".gantt").gantt({
				source: [{
					name: "Sprint 0",
					desc: "Analysis",
					values: [{
						id: "t01",
						from: "/Date(1320192000000)/",
						to: "/Date(1322401600000)/",
						label: "Requirement Gathering",
						customClass: "ganttRed",
						desc: "aa"
					}]
				},{
					name: " ",
					desc: "Scoping",
					values: [{
						id: "t02",
						from: "/Date(1322611200000)/",
						to: "/Date(1323302400000)/",
						label: "Scoping",
						customClass: "ganttRed",
						dep: "t01",
						desc: "bb"
					}]
				},{
					name: "Sprint 1",
					desc: "Development",
					values: [{
						from: "/Date(1323802400000)/",
						to: "/Date(1325685200000)/",
						label: "Development",
						customClass: "ganttGreen",
						desc: "cc"
					}]
				},{
					name: " ",
					desc: "Showcasing",
					values: [{
						from: "/Date(1325685200000)/",
						to: "/Date(1325695200000)/",
						label: "Showcasing",
						customClass: "ganttBlue",
						desc: "dd"
					}]
				},{
					name: "Sprint 2",
					desc: "Development",
					values: [{
						from: "/Date(1326785200000)/",
						to: "/Date(1325785200000)/",
						label: "Development",
						customClass: "ganttGreen",
						desc: "ee"
					}]
				},{
					name: " ",
					desc: "Showcasing",
					values: [{
						from: "/Date(1328785200000)/",
						to: "/Date(1328905200000)/",
						label: "Showcasing",
						customClass: "ganttBlue",
						desc: "ff"
					}]
				},{
					name: "Release Stage",
					desc: "Training",
					values: [{
						from: "/Date(1330011200000)/",
						to: "/Date(1336611200000)/",
						label: "Training",
						customClass: "ganttOrange",
						desc: "gg"
					}]
				},{
					name: " ",
					desc: "Deployment",
					values: [{
						from: "/Date(1336611200000)/",
						to: "/Date(1338711200000)/",
						label: "Deployment",
						customClass: "ganttOrange",
						desc: "hh"
					}]
				},{
					name: " ",
					desc: "Warranty Period",
					values: [{
						from: "/Date(1336611200000)/",
						to: "/Date(1349711200000)/",
						label: "Warranty Period",
						customClass: "ganttOrange",
						desc: "ii"
					}]
				}],
				navigate: "scroll",
				scale: "weeks",
				maxScale: "months",
				minScale: "days",
				itemsPerPage: 10,
				onItemClick: function(data) {
					//alert("Item clicked - show some details");
				},
				onAddClick: function(dt, rowId) {
					//alert("Empty space clicked - add an item!");
				},
				onRender: function() {
					if (window.console && typeof console.log === "function") {
						console.log("chart rendered");
					}
				}
			});

			$(".gantt").popover({
				selector: ".bar",
				title: "I'm a popover",
				content: "And I'm the content of said popover.",
				trigger: "hover"
			});*/

			//



		 var colors = Highcharts.getOptions().colors,
        categories = ['NBA', 'CK', 'TF', '女神', '龙之心'],
        name = 'Browser brands',
        data = [{
                y: 55.11,
                color: colors[0],
                drilldown: {
                    name: 'NBA versions',
                    categories: ['CBT 1.0', 'CBT 2.0', 'CBT 3.0', 'CBT 4.0'],
                    data: [10.85, 7.35, 33.06, 2.81],
                    color: colors[0]
                }
            }, {
                y: 21.63,
                color: colors[1],
                drilldown: {
                    name: 'CK versions',
                    categories: ['CBT 1.0', 'CBT 2.0', 'CBT 3.0', 'CBT 4.0'],
                    data: [0.20, 0.83, 1.58, 13.12, 5.43],
                    color: colors[1]
                }
            }, {
                y: 11.94,
                color: colors[2],
                drilldown: {
                    name: 'TF versions',
                    categories: ['CBT 1.0', 'CBT 2.0', 'CBT 3.0', 'CBT 4.0'],
                    data: [0.12, 0.19, 0.12, 0.36, 0.32, 9.91, 0.50, 0.22],
                    color: colors[2]
                }
            }, {
                y: 7.15,
                color: colors[3],
                drilldown: {
                    name: '女神 versions',
                    categories: ['CBT 1.0', 'CBT 2.0', 'CBT 3.0', 'CBT 4.0'],
                    data: [4.55, 1.42, 0.23, 0.21, 0.20, 0.19, 0.14],
                    color: colors[3]
                }
            }, {
                y: 2.14,
                color: colors[4],
                drilldown: {
                    name: '龙之心 versions',
                    categories: ['CBT 1.0', 'CBT 2.0', 'CBT 3.0', 'CBT 4.0'],
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
    };
	 var chart = $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'DeNA China game project.'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: categories
        },
        yAxis: {
            title: {
                text: '项目时间统计'
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
                                setChart(name, categories, data);
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
                        return this.y +'个';
                    }
                }
            }
        },
        tooltip: {
            formatter: function() {
                var point = this.point,
                    s = this.x +':<b>'+ this.y +'个项目</b><br>';
                if (point.drilldown) {
                    s += '点击查看 '+ point.category +' 详细';
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
    .highcharts();
});

</script>
<?php include 'footer.php'?>
