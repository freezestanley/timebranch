schema.sql 为数据库结构



API 说明

1. /api/filter 获取 projects，GET
参数说明：
p：分页，从1开始算
name: 项目名称，所有项目名称获取见下面
os: 操作系统，只能是ios,android,WindowPhone
area: 地区，只能是cn,tw
startime: 开始时间
endtime: 结束时间

返回例子
{
    "data": [
        {
            "nodes": [
                {
                    "nid": "1",
                    "remark": "开始立项了",
                    "update_remark": "删除测试",
                    "type_id": "1",
                    "type": "立项",
                    "deadline": "2014-11-21",
                    "updatetime": "2014-11-30"
                },
                {
                    "nid": "2",
                    "remark": "",
                    "update_remark": "1416980270",
                    "type_id": "7",
                    "type": "官方网站",
                    "deadline": "2014-11-22",
                    "updatetime": "2014-11-29"
                },
                {
                    "nid": "3",
                    "remark": "sdfsdf",
                    "update_remark": "1416980247",
                    "type_id": "8",
                    "type": "宣传网站",
                    "deadline": "2014-11-21",
                    "updatetime": "2014-11-21"
                }
            ],
            "name": "OP",
            "os": "iOS",
            "area": "TW",
            "ip": "testip",
            "contract": "testcontract",
            "issuer": "testissuer",
            "type": "1",
            "operator": "testoperator",
            "apply": "testapply",
            "remark": "testremark",
            "pid": "1"
        },
        {
            "nodes": [ ],
            "name": "OP",
            "os": "Android",
            "area": "TW",
            "ip": "testip",
            "contract": "testcontract",
            "issuer": "testissuer",
            "type": "1",
            "operator": "testoperator",
            "apply": "testapply",
            "remark": "testremark",
            "pid": "2"
        }
    ],
    "status": true
}


2. /api/get_projects 获取全部 projects_name，GET
无参数
返回例子
{
    "data": [
        {
            "name": "OP"
        }
    ],
    "status": true
}


