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

#Culturas


<!-- START_633b68562aecdeb5aeea6c6806f5217d -->
## Listar Culturas.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/culturas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/culturas"
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
        "nome": "Soja",
        "created_at": "2020-08-03 19:52:31",
        "updated_at": "2020-08-03 19:52:31"
    }
]
```

### HTTP Request
`GET api/culturas`


<!-- END_633b68562aecdeb5aeea6c6806f5217d -->

<!-- START_af13f3b731c32e748f44c50e27717448 -->
## Criar nova Cultura.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost/api/culturas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"nome":"reiciendis"}'

```

```javascript
const url = new URL(
    "http://localhost/api/culturas"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nome": "reiciendis"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (201):

```json
{
    "id": 1,
    "nome": "Soja",
    "created_at": "2020-08-03 19:52:31",
    "updated_at": "2020-08-03 19:52:31"
}
```
> Example response (400):

```json
{
    "message": "Nome inválido ou muito curto"
}
```
> Example response (409):

```json
{
    "message": "Cultura já cadastrada"
}
```

### HTTP Request
`POST api/culturas`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `nome` | string |  required  | Nome da Cultura, exemplo: Soja
    
<!-- END_af13f3b731c32e748f44c50e27717448 -->

<!-- START_451f05b9de0402496b4d26aea3540a13 -->
## Obter Cultura por ID.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/culturas/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/culturas/1"
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
    "nome": "Soja",
    "created_at": "2020-08-03 19:52:31",
    "updated_at": "2020-08-03 19:52:31"
}
```
> Example response (404):

```json
{
    "message": "Cultura não encontrada"
}
```

### HTTP Request
`GET api/culturas/{cultura}`


<!-- END_451f05b9de0402496b4d26aea3540a13 -->

<!-- START_3fc84a9e54b3d683dc31bf9d3c4c1616 -->
## Editar Cultura.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/culturas/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"nome":"dolore"}'

```

```javascript
const url = new URL(
    "http://localhost/api/culturas/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nome": "dolore"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "Cultura não encontrada"
}
```
> Example response (400):

```json
{
    "message": "Nome inválido ou muito curto"
}
```

### HTTP Request
`PUT api/culturas/{cultura}`

`PATCH api/culturas/{cultura}`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `nome` | string |  required  | Nome da Cultura, exemplo: Soja
    
<!-- END_3fc84a9e54b3d683dc31bf9d3c4c1616 -->

<!-- START_b0bcafcaf878ed064db1974e2155a620 -->
## Deletar Cultura.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/culturas/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/culturas/1"
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


> Example response (404):

```json
{
    "message": "Cultura não encontrada"
}
```

### HTTP Request
`DELETE api/culturas/{cultura}`


<!-- END_b0bcafcaf878ed064db1974e2155a620 -->

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
    -d '{"nome":"repellat"}'

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
    "nome": "repellat"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (201):

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
    "message": "Nome inválido ou muito curto"
}
```
> Example response (409):

```json
{
    "message": "Praga já cadastrada"
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
> Example response (404):

```json
{
    "message": "Praga não encontrada"
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
    -d '{"nome":"architecto"}'

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
    "nome": "architecto"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "Praga não encontrada"
}
```
> Example response (400):

```json
{
    "message": "Nome inválido ou muito curto"
}
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


> Example response (404):

```json
{
    "message": "Praga não encontrada"
}
```

### HTTP Request
`DELETE api/pragas/{praga}`


<!-- END_9005679a7b54db73c12989142e872109 -->

#Produtos


<!-- START_6630bf8c7371ddc986b316d1569ba662 -->
## Listar Produtos.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/produtos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/produtos"
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
        "nome": "Pesticida 1",
        "created_at": "2020-08-03 19:52:31",
        "updated_at": "2020-08-03 19:52:31"
    }
]
```

### HTTP Request
`GET api/produtos`


<!-- END_6630bf8c7371ddc986b316d1569ba662 -->

<!-- START_0b6a7b57412165c2a99f32a9f216ce48 -->
## Criar nova Produto.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost/api/produtos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"nome":"et"}'

```

```javascript
const url = new URL(
    "http://localhost/api/produtos"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nome": "et"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (201):

```json
{
    "id": 1,
    "nome": "Pesticida 1",
    "created_at": "2020-08-03 19:52:31",
    "updated_at": "2020-08-03 19:52:31"
}
```
> Example response (400):

```json
{
    "message": "Nome inválido ou muito curto"
}
```
> Example response (409):

```json
{
    "message": "Produto já cadastrado"
}
```

### HTTP Request
`POST api/produtos`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `nome` | string |  required  | Nome do Produto, exemplo: Pesticida 1
    
<!-- END_0b6a7b57412165c2a99f32a9f216ce48 -->

<!-- START_c6a1f6562011d9a96af2cebdc7846b0a -->
## Obter Produto por ID.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/produtos/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/produtos/1"
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
    "nome": "Pesticida 1",
    "created_at": "2020-08-03 19:52:31",
    "updated_at": "2020-08-03 19:52:31"
}
```
> Example response (404):

```json
{
    "message": "Produto não encontrado"
}
```

### HTTP Request
`GET api/produtos/{produto}`


<!-- END_c6a1f6562011d9a96af2cebdc7846b0a -->

<!-- START_5af17273bdd0c838309ebb84106fc95d -->
## Editar Produto.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/produtos/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"nome":"vero"}'

```

```javascript
const url = new URL(
    "http://localhost/api/produtos/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nome": "vero"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "Produto não encontrado"
}
```
> Example response (400):

```json
{
    "message": "Nome inválido ou muito curto"
}
```

### HTTP Request
`PUT api/produtos/{produto}`

`PATCH api/produtos/{produto}`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `nome` | string |  required  | Nome do Produto, exemplo: Pesticida 1
    
<!-- END_5af17273bdd0c838309ebb84106fc95d -->

<!-- START_1aaf70b2ab74b451e722d0e98df44623 -->
## Deletar Produto.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/produtos/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/produtos/1"
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


> Example response (404):

```json
{
    "message": "Produto não encontrado"
}
```

### HTTP Request
`DELETE api/produtos/{produto}`


<!-- END_1aaf70b2ab74b451e722d0e98df44623 -->


