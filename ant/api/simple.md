## 用户授权

**请求方式：** GET  
**请求地址：** http://domain/api/auth?account=master&password=testtest  
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

## 

