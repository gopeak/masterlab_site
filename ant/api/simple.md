# OpenApi接口文档

## 用户授权

**请求方式：** GET  
**请求地址：** [域名]/api/auth?account=master&password=testtest  
**返回结果：**

```text
{
    "ret": "200",
    "debug": {},
    "time": 1605792798,
    "trace": [],
    "data": {
        "msg": "授权成功",
        "code": 20000,
        "body": {
            "account": "master",
            "api_access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiIsImp0aSI6IjEtMTYwNTc5Mjc5OCJ9.eyJpc3MiOiJodHRwOlwvXC9tYXN0ZXJsYWIuaW5rXC8iLCJhdWQiOiIxIiwianRpIjoiMS0xNjA1NzkyNzk4IiwiaWF0IjoxNjA1NzkyNzk4LCJuYmYiOjE2MDU3OTI4NTgsImV4cCI6MTYxMzU2ODc5OCwidWlkIjoxLCJhY2NvdW50IjoibWFzdGVyIn0.UG7HSZQ-9_742DM9Q1RunViPZ43KliTg5noYnvsCuA0",
            "api_access_refresh_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiIsImp0aSI6IjEtcmVmcmVzaC0xNjA1NzkyNzk4In0.eyJpc3MiOiJodHRwOlwvXC9tYXN0ZXJsYWIuaW5rXC8iLCJhdWQiOiIxIiwianRpIjoiMS1yZWZyZXNoLTE2MDU3OTI3OTgiLCJpYXQiOjE2MDU3OTI3OTgsIm5iZiI6MTYwNTc5Mjg1OCwiZXhwIjoxNjIxMzQ0Nzk4LCJ1aWQiOjEsImFjY291bnQiOiJtYXN0ZXIifQ.zKWG6ouj_CX_gfC09AChEj6IUyg783Jqm5LBku1Jjbo"
        }
    }
}
```

## 项目

### 1、创建项目

**请求方式：** POST  
**请求地址：** [域名]/api/projects/v1/?access_token=[令牌]  
**请求参数：**  

```text
name=MASTERLAB          // 项目名
org_id=1                // 组织ID
key=MASTERLAB           // 项目KEY
lead=1                  // 项目负责人ID
project_tpl_id=1        // 项目模板ID
```

**返回结果：**

```text
{
    "ret": "20000",
    "debug": {},
    "time": 1606221610,
    "trace": [],
    "data": {
        "project_id": "13",
        "key": "MASTERLAB",
        "org_name": "Default",
        "path": "default/MASTERLAB"
    },
    "msg": "操作成功"
}
```

### 2、获取项目

**请求方式：** GET  
**请求地址：**  
    - [域名]/api/projects/v1/[项目ID]?access_token=[令牌]  
    - [域名]/api/projects/v1/?access_token=[令牌]  
**请求参数：**  

```text
有项目ID获取单个项目信息，无项目ID获取项目列表
```

**返回结果：**

```text
{
    "ret": "20000",
    "debug": {},
    "time": 1606222801,
    "trace": [],
    "data": [
        {
            "id": "103",
            "org_id": "1",
            "org_path": "default",
            "name": "MASTERLAB",
            "url": "",
            "lead": "1",
            "description": "",
            "key": "MASTERLAB",
            "pcounter": null,
            "default_assignee": "1",
            "assignee_type": null,
            "avatar": "",
            "category": "0",
            "type": "1",
            "type_child": "0",
            "permission_scheme_id": "0",
            "workflow_scheme_id": "0",
            "create_uid": "1",
            "create_time": "1606221610",
            "un_done_count": "0",
            "done_count": "0",
            "closed_count": "0",
            "archived": "N",
            "issue_update_time": "1606221610",
            "is_display_issue_catalog": "1",
            "subsystem_json": "[\"issues\",\"gantt\",\"kanban\",\"sprint\",\"mind\",\"backlog\",\"stat\",\"chart\",\"activity\",\"webhook\"]",
            "project_view": "summary",
            "issue_view": "",
            "issue_ui_scheme_id": "0",
            "project_tpl_id": "1",
            "default_issue_type_id": "1",
            "is_remember_last_issue": "0",
            "remember_last_issue_field": "[]",
            "remember_last_issue_data": "{}",
            "done_percent": 0,
            "type_name": "默认模板",
            "path": "default",
            "create_time_text": "2020-11-24 20:40:10",
            "create_time_origin": "2020-11-24 20:40:10",
            "first_word": "C",
            "avatar_exist": false
        },
        ......
    ],
    "msg": "OK"
}
```

### 3、更新项目名称和描述信息

**请求方式：** PATCH  
**请求地址：**  
    - [域名]/api/projects/v1/[项目ID]?access_token=[令牌]  
**请求参数：**  

```text
name=MASTERLAB          // 项目名
description=MASTERLAB           // 项目描述
```

**返回结果：**

```text
{
    "ret": "20000",
    "debug": {},
    "time": 1606305744,
    "trace": [],
    "data": [],
    "msg": "更新项目成功"
}
```

### 4、删除项目

**请求方式：** DELETE  
**请求地址：**  
    - [域名]/api/projects/v1/[项目ID]?access_token=[令牌]  
**请求参数：**  

```text
无
```

**返回结果：**

```text
{
    "ret": "20000",
    "debug": {},
    "time": 1606305952,
    "trace": [],
    "data": [],
    "msg": "操作成功"
}
```

## 事项

### 1、创建事项

**请求方式：** POST  
**请求地址：** [域名]/api/issue/issues/v1/?access_token=[令牌]  
**请求参数：**  

```text
summary=MASTERLAB          // 标题
issue_type=1                // 事项类型
project_id=1           // 项目ID
priority=1                  // 优先级
description=MASTERLAB       // 内容
module=1                     // 模块ID
creator=1                    // 创建人ID
reporter=1                   // 报告人ID
status=1                     // 状态ID
assignee=1                   // 负责人ID
sprint=1                     // 迭代ID
weight=20                     // 权重
start_date=2020-03-01                 // 开始时间
due_date=2020-05-01                   // 结束时间
```

**返回结果：**

```text
{
    "ret": "20000",
    "debug": {},
    "time": 1606307852,
    "trace": [],
    "data": {
        "id": "251"
    },
    "msg": "添加成功"
}
```

### 2、获取事项

**请求方式：** GET  
**请求地址：**  
    - 获取列表: [域名]/api/issue/issues/v1/?project=[项目ID]?access_token=[令牌]  
    - 获取单个: [域名]/api/issue/issues/v1/[事项ID]?access_token=[令牌]  
**请求参数：**  

```text
无
```

**返回结果：**

```text
{
    "ret": "20000",
    "debug": {},
    "time": 1606310436,
    "trace": [],
    "data": {
        "data": {
            "issues": [
                {
                    "id": "251",
                    "pkey": "example",
                    "issue_num": "251",
                    "project_id": "1",
                    "issue_type": "1",
                    "creator": "1",
                    "modifier": "0",
                    "reporter": "1",
                    "assignee": "1",
                    "summary": "MASTERLAB",
                    "description": "1",
                    "environment": "",
                    "priority": "1",
                    "resolve": "2",
                    "status": "1",
                    "created": "1606307852",
                    "updated": "1606307852",
                    "start_date": "2020-07-08",
                    "due_date": "2020-09-08",
                    "duration": "45",
                    "resolve_date": null,
                    "module": "1",
                    "milestone": null,
                    "sprint": "1",
                    "weight": "1",
                    "backlog_weight": "0",
                    "sprint_weight": "0",
                    "assistants": "",
                    "level": "0",
                    "master_id": "0",
                    "have_children": "0",
                    "followed_count": "0",
                    "comment_count": "0",
                    "progress": "0",
                    "depends": "",
                    "gant_sprint_weight": "499050000",
                    "gant_hide": "0",
                    "is_start_milestone": "0",
                    "is_end_milestone": "0",
                    "warning_delay": 0,
                    "postponed": 1,
                    "created_text": "2020-11-25 20:37:32",
                    "created_full": "2020-11-25 20:37:32",
                    "updated_text": "2020-11-25 20:37:32",
                    "updated_full": "2020-11-25 20:37:32",
                    "assistants_arr": []
                },
                ......
            ]
        },
        "total": "45",
        "page": 1,
        "page_size": 20
    },
    "msg": "OK"
}
```

### 3、更新事项

**请求方式：** PATCH  
**请求地址：**  
    - [域名]/api/issue/issues/v1/[事项ID]?access_token=[令牌]  
**请求参数：**  

```text
summary=MASTERLAB          // 标题
issue_type=1                // 事项类型
priority=1                  // 优先级
description=MASTERLAB       // 内容
module=1                     // 模块ID
creator=1                    // 创建人ID
reporter=1                   // 报告人ID
status=1                     // 状态ID
assignee=1                   // 负责人ID
sprint=1                     // 迭代ID
weight=20                     // 权重
start_date=2020-03-01                 // 开始时间
due_date=2020-05-01                   // 结束时间
```

**返回结果：**

```text
{
    "ret": "20000",
    "debug": {},
    "time": 1606311293,
    "trace": [],
    "data": {
        "id": 251,
        "pkey": "example",
        "issue_num": "251",
        "project_id": "1",
        "issue_type": "0",
        "creator": "1",
        "modifier": "1",
        "reporter": "1",
        "assignee": "1",
        "summary": "MASTERLAB",
        "description": "MASTERLAB",
        "environment": "",
        "priority": "1",
        "resolve": "2",
        "status": "1",
        "created": "1606307852",
        "updated": "1606307852",
        "start_date": "0000-00-00",
        "due_date": "0000-00-00",
        "duration": "0",
        "resolve_date": null,
        "module": "0",
        "milestone": null,
        "sprint": "0",
        "weight": "0",
        "backlog_weight": "0",
        "sprint_weight": "0",
        "assistants": "",
        "level": "0",
        "master_id": "0",
        "have_children": "0",
        "followed_count": "0",
        "comment_count": "0",
        "progress": "0",
        "depends": "",
        "gant_sprint_weight": "499050000",
        "gant_hide": "0",
        "is_start_milestone": "0",
        "is_end_milestone": "0"
    },
    "msg": "更新成功"
}
```

### 4、删除事项

**请求方式：** DELETE  
**请求地址：**  
    - [域名]/api/issue/issues/v1/[事项ID]?access_token=[令牌]  
**请求参数：**  

```text
无
```

**返回结果：**

```text
{
    "ret": "20000",
    "debug": {},
    "time": 1606311462,
    "trace": [],
    "data": [],
    "msg": "删除成功"
}
```

## 模块

### 1、创建模块

**请求方式：** POST  
**请求地址：** [域名]/api/modules/v1/?project_id=[项目ID]&access_token=[令牌]  
**请求参数：**  

```text
module_name=模块A
description=模块A描述  
```

**返回结果：**

```text
{
    "ret": "20000",
    "debug": {},
    "time": 1606395067,
    "trace": [],
    "data": {
        "id": "22"
    },
    "msg": "操作成功"
}
```

### 2、获取模块

**请求方式：** GET  
**请求地址：**  
    - 获取列表: [域名]/api/modules/v1/?project=[项目ID]?access_token=[令牌]  
    - 获取单个: [域名]/api/modules/v1/[模块ID]?access_token=[令牌]  
**请求参数：**  

```text
无
```

**返回结果：**

```text
{
    "ret": "20000",
    "debug": {},
    "time": 1606395342,
    "trace": [],
    "data": {
        "1": {
            "k": "1",
            "id": "1",
            "project_id": "1",
            "name": "后端架构",
            "description": "",
            "lead": "0",
            "default_assignee": "0",
            "ctime": "1579249107",
            "order_weight": "0",
            "project_name": "示例项目23"
        },
        "2": {
            "k": "2",
            "id": "2",
            "project_id": "1",
            "name": "前端架构",
            "description": "",
            "lead": "0",
            "default_assignee": "0",
            "ctime": "1579249118",
            "order_weight": "0",
            "project_name": "示例项目23"
        },
        ......
    },
    "msg": "OK"
}
```

### 3、更新模块

**请求方式：** PATCH  
**请求地址：**  
    - [域名]/api/modules/v1/[模块ID]?project_id=[项目ID]&access_token=[令牌]  
**请求参数：**  

```text
module_name=模块A
description=模块A描述
```

**返回结果：**

```text
{
    "ret": "20000",
    "debug": {},
    "time": 1606395578,
    "trace": [],
    "data": {
        "name": "模块A",
        "description": "模块A描述",
        "id": 22
    },
    "msg": "修改成功"
}
```

### 4、删除模块

**请求方式：** DELETE  
**请求地址：**  
    - [域名]/api/modules/v1/[模块ID]?project_id=[项目ID]&access_token=[令牌]  
**请求参数：**  

```text
无
```

**返回结果：**

```text
{
    "ret": "20000",
    "debug": {},
    "time": 1606395701,
    "trace": [],
    "data": [],
    "msg": "操作成功"
}
```

## 迭代

### 1、创建迭代

**请求方式：** POST  
**请求地址：** [域名]/api/sprints/v1/?project_id=[项目ID]&access_token=[令牌]  
**请求参数：**  

```text
sprint_name=迭代A
description=迭代A-desc
start_date=2020-08-09
end_date=2020-10-10
```

**返回结果：**

```text
{
    "ret": "20000",
    "debug": {},
    "time": 1606396026,
    "trace": [],
    "data": {
        "id": "18"
    },
    "msg": "操作成功"
}
```

### 2、获取迭代

**请求方式：** GET  
**请求地址：**  
    - 获取列表: [域名]/api/sprints/v1/?project=[项目ID]?access_token=[令牌]  
    - 获取单个: [域名]/api/sprints/v1/[迭代ID]?access_token=[令牌]  
**请求参数：**  

```text
无
```

**返回结果：**

```text
{
    "ret": "20000",
    "debug": {},
    "time": 1606396385,
    "trace": [],
    "data": {
        "1": {
            "k": "1",
            "id": "1",
            "project_id": "1",
            "name": "1.0迭代",
            "description": "",
            "active": "0",
            "status": "1",
            "order_weight": "0",
            "start_date": "2020-01-17",
            "end_date": "2020-07-01",
            "target": "",
            "inspect": "",
            "review": "",
            "project_name": "示例项目23"
        },
        ......
    },
    "msg": "OK"
}
```

### 3、更新迭代

**请求方式：** PATCH  
**请求地址：**  
    - [域名]/api/sprints/v1/[迭代ID]?project_id=[项目ID]&access_token=[令牌]  
**请求参数：**  

```text
sprint_name=迭代B
description=迭代B描述
start_date=2020-08-09
end_date=2020-11-15
```

**返回结果：**

```text
{
    "ret": "20000",
    "debug": {},
    "time": 1606396701,
    "trace": [],
    "data": {
        "name": "迭代B",
        "description": "迭代B描述",
        "start_date": "2020-08-09",
        "id": 18
    },
    "msg": "修改成功"
}
```

### 4、删除迭代

**请求方式：** DELETE  
**请求地址：**  
    - [域名]/api/sprints/v1/[迭代ID]?project_id=[项目ID]&access_token=[令牌]  
**请求参数：**  

```text
无
```

**返回结果：**

```text
{
    "ret": "20000",
    "debug": {},
    "time": 1606396847,
    "trace": [],
    "data": [],
    "msg": "操作成功"
}
```

## 版本------------------todo

### 1、创建版本

**请求方式：** POST  
**请求地址：** [域名]/api/versions/v1/?project_id=[项目ID]&access_token=[令牌]  
**请求参数：**  

```text
sprint_name=迭代A
description=迭代A-desc
start_date=2020-08-09
end_date=2020-10-10
```

**返回结果：**

```text
{
    "ret": "20000",
    "debug": {},
    "time": 1606396026,
    "trace": [],
    "data": {
        "id": "18"
    },
    "msg": "操作成功"
}
```

### 2、获取版本

**请求方式：** GET  
**请求地址：**  
    - 获取列表: [域名]/api/versions/v1/?project=[项目ID]?access_token=[令牌]  
    - 获取单个: [域名]/api/versions/v1/[版本ID]?access_token=[令牌]  
**请求参数：**  

```text
无
```

**返回结果：**

```text
{
    "ret": "20000",
    "debug": {},
    "time": 1606396385,
    "trace": [],
    "data": {
        "1": {
            "k": "1",
            "id": "1",
            "project_id": "1",
            "name": "1.0迭代",
            "description": "",
            "active": "0",
            "status": "1",
            "order_weight": "0",
            "start_date": "2020-01-17",
            "end_date": "2020-07-01",
            "target": "",
            "inspect": "",
            "review": "",
            "project_name": "示例项目23"
        },
        ......
    },
    "msg": "OK"
}
```

### 3、更新版本

**请求方式：** PATCH  
**请求地址：**  
    - [域名]/api/versions/v1/[版本ID]?project_id=[项目ID]&access_token=[令牌]  
**请求参数：**  

```text
sprint_name=迭代B
description=迭代B描述
start_date=2020-08-09
end_date=2020-11-15
```

**返回结果：**

```text
{
    "ret": "20000",
    "debug": {},
    "time": 1606396701,
    "trace": [],
    "data": {
        "name": "迭代B",
        "description": "迭代B描述",
        "start_date": "2020-08-09",
        "id": 18
    },
    "msg": "修改成功"
}
```

### 4、删除版本

**请求方式：** DELETE  
**请求地址：**  
    - [域名]/api/versions/v1/[版本ID]?project_id=[项目ID]&access_token=[令牌]  
**请求参数：**  

```text
无
```

**返回结果：**

```text
{
    "ret": "20000",
    "debug": {},
    "time": 1606396847,
    "trace": [],
    "data": [],
    "msg": "操作成功"
}
```