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
**请求地址：** [域名]/api/projects/v1/[项目ID]/?access_token=[令牌]  
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


