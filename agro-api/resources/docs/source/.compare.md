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
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#Pragas


<!-- START_4d0666b6bdb5dfbcdc3c604cea49bb3e -->
## Listar pragas.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/pragas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/pragas"
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
[
    {
        "id": 1,
        "nome": "Erva Daninha",
        "created_at": "2020-08-03 19:52:31",
        "updated_at": "2020-08-03 19:52:31"
    }
]
```

### HTTP Request
`GET api/pragas`


<!-- END_4d0666b6bdb5dfbcdc3c604cea49bb3e -->

<!-- START_d1f5cc70d69128785668ca990135ee5e -->
## Criar nova praga.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost/api/pragas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"nome":"ut"}'

```

```javascript
const url = new URL(
    "http://localhost/api/pragas"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nome": "ut"
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
    "id": 1,
    "nome": "Erva Daninha",
    "created_at": "2020-08-03 19:52:31",
    "updated_at": "2020-08-03 19:52:31"
}
```
> Example response (400):

```json
{
    "message": "Nome inválido"
}
```

### HTTP Request
`POST api/pragas`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `nome` | string |  required  | Nome da praga, exemplo: Erva Daninha
    
<!-- END_d1f5cc70d69128785668ca990135ee5e -->

<!-- START_bcad4025ba1d10a6226275efdb6cc6d5 -->
## Obter praga por ID.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/pragas/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/pragas/1"
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
    "id": 1,
    "nome": "Erva Daninha",
    "created_at": "2020-08-03 19:52:31",
    "updated_at": "2020-08-03 19:52:31"
}
```

### HTTP Request
`GET api/pragas/{praga}`


<!-- END_bcad4025ba1d10a6226275efdb6cc6d5 -->

<!-- START_41cf66d6505cf8ef3ab062c7b4ddc0a9 -->
## Editar praga.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/pragas/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"nome":"numquam"}'

```

```javascript
const url = new URL(
    "http://localhost/api/pragas/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nome": "numquam"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/pragas/{praga}`

`PATCH api/pragas/{praga}`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `nome` | string |  required  | Nome da praga, exemplo: Erva Daninha
    
<!-- END_41cf66d6505cf8ef3ab062c7b4ddc0a9 -->

<!-- START_9005679a7b54db73c12989142e872109 -->
## Deletar praga.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/pragas/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/pragas/1"
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
`DELETE api/pragas/{praga}`


<!-- END_9005679a7b54db73c12989142e872109 -->

#general


<!-- START_f7b7ea397f8939c8bb93e6cab64603ce -->
## Display Swagger API page.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/documentation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/documentation"
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
null
```

### HTTP Request
`GET api/documentation`


<!-- END_f7b7ea397f8939c8bb93e6cab64603ce -->

<!-- START_1ead214f30a5e235e7140eb2aaa29eee -->
## Dump api-docs content endpoint. Supports dumping a json, or yaml file.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/docs/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/docs/"
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
    "openapi": "3.0.0",
    "info": {
        "title": "Laravel OpenApi Demo Documentation",
        "description": "L5 Swagger OpenApi description",
        "contact": {
            "email": "admin@admin.com"
        },
        "license": {
            "name": "Apache 2.0",
            "url": "http:\/\/www.apache.org\/licenses\/LICENSE-2.0.html"
        },
        "version": "1.0.0"
    },
    "servers": [
        {
            "url": "http:\/\/my-default-host.com",
            "description": "Demo API Server"
        }
    ],
    "paths": {
        "\/pragas": {
            "get": {
                "tags": [
                    "Pragas"
                ],
                "summary": "Obter lista de pragas",
                "description": "Retorna uma lista de pragas",
                "operationId": "getPragas",
                "responses": {
                    "200": {
                        "description": "Successful operation",
                        "content": {
                            "application\/json": {
                                "schema": {
                                    "$ref": "#\/components\/schemas\/PragaResource"
                                }
                            }
                        }
                    },
                    "401": {
                        "description": "Unauthenticated"
                    },
                    "403": {
                        "description": "Forbidden"
                    }
                }
            }
        }
    },
    "components": {
        "schemas": {
            "Praga": {
                "xml": {
                    "name": "Praga"
                }
            },
            "PragaResource": {
                "title": "PragaResource",
                "description": "Project resource",
                "properties": {
                    "data": {
                        "title": "Dados",
                        "description": "Lista de pragas",
                        "type": "array",
                        "items": {
                            "$ref": "#\/components\/schemas\/Praga"
                        }
                    }
                },
                "type": "object",
                "xml": {
                    "name": "PragaResource"
                }
            }
        }
    },
    "tags": [
        {
            "name": "Projects",
            "description": "API Endpoints of Projects"
        }
    ]
}
```

### HTTP Request
`GET docs/{jsonFile?}`

`POST docs/{jsonFile?}`

`PUT docs/{jsonFile?}`

`PATCH docs/{jsonFile?}`

`DELETE docs/{jsonFile?}`

`OPTIONS docs/{jsonFile?}`


<!-- END_1ead214f30a5e235e7140eb2aaa29eee -->

<!-- START_1a23c1337818a4de9e417863aebaca33 -->
## docs/asset/{asset}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/docs/asset/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/docs/asset/1"
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


> Example response (404):

```json
{
    "message": "(1) - this L5 Swagger asset is not allowed"
}
```

### HTTP Request
`GET docs/asset/{asset}`


<!-- END_1a23c1337818a4de9e417863aebaca33 -->

<!-- START_a2c4ea37605c6d2e3c93b7269030af0a -->
## Display Oauth2 callback pages.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/oauth2-callback" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/oauth2-callback"
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
null
```

### HTTP Request
`GET api/oauth2-callback`


<!-- END_a2c4ea37605c6d2e3c93b7269030af0a -->


