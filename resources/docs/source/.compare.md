---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://webdevlistapi.test/docs/collection.json)

<!-- END_INFO -->

#Tasks management


APIs for managing tasks
<!-- START_4227b9e5e54912af051e8dd5472afbce -->
## Display a listing of the tasks.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://webdevlistapi.test/api/tasks" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://webdevlistapi.test/api/tasks"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 5,
            "user_id": 1,
            "title": "sec task",
            "description": "desc of sec task",
            "due": "2019-12-15 00:00:00",
            "created_at": "2019-12-10 23:57:19",
            "updated_at": "2019-12-10 23:57:19",
            "creator": {
                "id": 1,
                "name": "hitesh",
                "email": "hitesh@gmail.com",
                "email_verified_at": null,
                "created_at": "2019-10-17 03:46:51",
                "updated_at": "2019-10-17 03:46:51"
            }
        },
        {
            "id": 4,
            "user_id": 1,
            "title": "sec task",
            "description": "desc of sec task",
            "due": "2019-12-15 00:00:00",
            "created_at": "2019-12-09 03:31:10",
            "updated_at": "2019-12-09 03:31:10",
            "creator": {
                "id": 1,
                "name": "hitesh",
                "email": "hitesh@gmail.com",
                "email_verified_at": null,
                "created_at": "2019-10-17 03:46:51",
                "updated_at": "2019-10-17 03:46:51"
            }
        },
        {
            "id": 1,
            "user_id": 1,
            "title": "updated first task title",
            "description": "new desc",
            "due": "2019-12-13 00:00:00",
            "created_at": "2019-12-09 03:28:19",
            "updated_at": "2019-12-09 03:34:15",
            "creator": {
                "id": 1,
                "name": "hitesh",
                "email": "hitesh@gmail.com",
                "email_verified_at": null,
                "created_at": "2019-10-17 03:46:51",
                "updated_at": "2019-10-17 03:46:51"
            }
        }
    ],
    "links": {
        "first": "http:\/\/webdevlistapi.test\/api\/tasks?page=1",
        "last": "http:\/\/webdevlistapi.test\/api\/tasks?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "path": "http:\/\/webdevlistapi.test\/api\/tasks",
        "per_page": 4,
        "to": 3,
        "total": 3
    }
}
```
> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/tasks`


<!-- END_4227b9e5e54912af051e8dd5472afbce -->

<!-- START_4da0d9b378428dcc89ced395d4a806e7 -->
## Store a newly created resource in storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://webdevlistapi.test/api/tasks" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"title":"my first task","description":"possimus","due":"next friday"}'

```

```javascript
const url = new URL(
    "http://webdevlistapi.test/api/tasks"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "my first task",
    "description": "possimus",
    "due": "next friday"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "title": "sec task",
        "description": "desc of sec task",
        "due": "2019-12-15 00:00:00",
        "user_id": 1,
        "updated_at": "2019-12-10 23:57:19",
        "created_at": "2019-12-10 23:57:19",
        "id": 5,
        "creator": {
            "id": 1,
            "name": "hitesh",
            "email": "hitesh@gmail.com",
            "email_verified_at": null,
            "created_at": "2019-10-17 03:46:51",
            "updated_at": "2019-10-17 03:46:51"
        }
    }
}
```
> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`POST api/tasks`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `title` | string |  required  | title of the task.
        `description` | text |  optional  | description of the task
        `due` | string |  optional  | date string.
    
<!-- END_4da0d9b378428dcc89ced395d4a806e7 -->

<!-- START_5297efa151ae4fd515fec2efd5cb1e9a -->
## Display the specified task.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://webdevlistapi.test/api/tasks/sit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://webdevlistapi.test/api/tasks/sit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 5,
        "user_id": 1,
        "title": "sec task",
        "description": "desc of sec task",
        "due": "2019-12-15 00:00:00",
        "created_at": "2019-12-10 23:57:19",
        "updated_at": "2019-12-10 23:57:19",
        "creator": {
            "id": 1,
            "name": "hitesh",
            "email": "hitesh@gmail.com",
            "email_verified_at": null,
            "created_at": "2019-10-17 03:46:51",
            "updated_at": "2019-10-17 03:46:51"
        }
    }
}
```
> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/tasks/{task}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `task` |  required  | id of the task

<!-- END_5297efa151ae4fd515fec2efd5cb1e9a -->

<!-- START_546f027bf591f2ef4a8a743f0a59051d -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://webdevlistapi.test/api/tasks/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://webdevlistapi.test/api/tasks/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/tasks/{task}`

`PATCH api/tasks/{task}`


<!-- END_546f027bf591f2ef4a8a743f0a59051d -->

<!-- START_8b8069956f22facfa8cdc67aece156a8 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://webdevlistapi.test/api/tasks/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://webdevlistapi.test/api/tasks/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/tasks/{task}`


<!-- END_8b8069956f22facfa8cdc67aece156a8 -->


