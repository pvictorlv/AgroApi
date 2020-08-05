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
[Get Postman Collection](http://localhost:8082/docs/collection.json)

<!-- END_INFO -->

#Autenticação

Gerenciamento de sessão.
<!-- START_a925a8d22b3615f12fca79456d286859 -->
## Realizar login.

> Example request:

```bash
curl -X POST \
    "http://localhost:8082/api/auth/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"a","senha":"est"}'

```

```javascript
const url = new URL(
    "http://localhost:8082/api/auth/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "a",
    "senha": "est"
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
    "access_token": "xxxxx.yyyy.zzzz",
    "token_type": "bearer",
    "expires_in": 3600
}
```

### HTTP Request
`POST api/auth/login`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | string |  required  | Email do usuário, exemplo: Admin@Admin.com
        `senha` | string |  required  | Senha do usuário, exemplo: 123456
    
<!-- END_a925a8d22b3615f12fca79456d286859 -->

<!-- START_19ff1b6f8ce19d3c444e9b518e8f7160 -->
## Finalizar e invalidar a sessão atual.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost:8082/api/auth/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8082/api/auth/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "Deslogado com sucesso!"
}
```

### HTTP Request
`POST api/auth/logout`


<!-- END_19ff1b6f8ce19d3c444e9b518e8f7160 -->

<!-- START_b8685907d076b226506a2f2852a60e81 -->
## Registrar novo usuário.

> Example request:

```bash
curl -X POST \
    "http://localhost:8082/api/auth/registro" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"nome":"voluptatibus","email":"iure","senha":"molestias"}'

```

```javascript
const url = new URL(
    "http://localhost:8082/api/auth/registro"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nome": "voluptatibus",
    "email": "iure",
    "senha": "molestias"
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
    "nome": "testes",
    "email": "123@123.com",
    "updated_at": "2020-08-04T20:28:24.000000Z",
    "created_at": "2020-08-04T20:28:24.000000Z",
    "id": 7
}
```
> Example response (400):

```json
{
    "email": [
        "email deve ser único."
    ],
    "senha": [
        "senha deve ter pelo menos 6 caracteres."
    ]
}
```

### HTTP Request
`POST api/auth/registro`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `nome` | string |  required  | Nome do usuário, exemplo: Admin
        `email` | string |  required  | Email do usuário, exemplo: Admin@Admin.com
        `senha` | string |  required  | Senha do usuário, exemplo: 123456
    
<!-- END_b8685907d076b226506a2f2852a60e81 -->

<!-- START_994af8f47e3039ba6d6d67c09dd9e415 -->
## Atualizar o token.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost:8082/api/auth/refresh" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8082/api/auth/refresh"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "access_token": "xxxxx.yyyy.zzzz",
    "token_type": "bearer",
    "expires_in": 3600
}
```

### HTTP Request
`POST api/auth/refresh`


<!-- END_994af8f47e3039ba6d6d67c09dd9e415 -->

<!-- START_a47210337df3b4ba0df697c115ba0c1e -->
## Obter o usuário autenticado.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost:8082/api/auth/me" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8082/api/auth/me"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "id": 7,
    "nome": "testes",
    "email": "123@123.com",
    "created_at": "2020-08-04T20:28:24.000000Z",
    "updated_at": "2020-08-04T20:28:24.000000Z"
}
```

### HTTP Request
`POST api/auth/me`


<!-- END_a47210337df3b4ba0df697c115ba0c1e -->

#Culturas


<!-- START_633b68562aecdeb5aeea6c6806f5217d -->
## Listar Culturas.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost:8082/api/culturas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8082/api/culturas"
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
    "http://localhost:8082/api/culturas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"nome":"exercitationem"}'

```

```javascript
const url = new URL(
    "http://localhost:8082/api/culturas"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nome": "exercitationem"
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
    -G "http://localhost:8082/api/culturas/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8082/api/culturas/1"
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
    "http://localhost:8082/api/culturas/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"nome":"velit"}'

```

```javascript
const url = new URL(
    "http://localhost:8082/api/culturas/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nome": "velit"
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
> Example response (200):

```json
{
    "id": 1,
    "nome": "Soja",
    "created_at": "2020-08-03 19:52:31",
    "updated_at": "2020-08-03 19:52:31"
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
    "http://localhost:8082/api/culturas/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8082/api/culturas/1"
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
> Example response (200):

```json
{
    "message": "Deletado com sucesso"
}
```

### HTTP Request
`DELETE api/culturas/{cultura}`


<!-- END_b0bcafcaf878ed064db1974e2155a620 -->

#Dosagens


<!-- START_f980d53df276409e7d57de288b39b48e -->
## Gerar relatório.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost:8082/api/dosagens/pdf?cultura=facere&produto=qui&praga=qui" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8082/api/dosagens/pdf"
);

let params = {
    "cultura": "facere",
    "produto": "qui",
    "praga": "qui",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

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


> Example response (401):

```json
{
    "message": "Token not provided"
}
```

### HTTP Request
`GET api/dosagens/pdf`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `cultura` |  optional  | int ID da cultura, exemplo: 1
    `produto` |  optional  | int ID do produto, exemplo: 2
    `praga` |  optional  | int ID da praga, exemplo: 1

<!-- END_f980d53df276409e7d57de288b39b48e -->

<!-- START_765319e4ef288e9640888252bce28a97 -->
## Listar dosagens.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost:8082/api/dosagens?cultura=debitis&produto=eum&praga=sint" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8082/api/dosagens"
);

let params = {
    "cultura": "debitis",
    "produto": "eum",
    "praga": "sint",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

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
        "cultura_id": 1,
        "praga_id": 2,
        "produto_id": 1,
        "dosagem": "100ml por litro",
        "created_at": "2020-08-05T02:54:16.000000Z",
        "updated_at": "2020-08-05T02:54:16.000000Z"
    }
]
```

### HTTP Request
`GET api/dosagens`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `cultura` |  optional  | int ID da cultura, exemplo: 1
    `produto` |  optional  | int ID do produto, exemplo: 2
    `praga` |  optional  | int ID da praga, exemplo: 1

<!-- END_765319e4ef288e9640888252bce28a97 -->

<!-- START_bd3d9c710b1d5baf46815507ed69a285 -->
## Criar uma nova dosagem.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost:8082/api/dosagens" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"dosagem":"itaque","cultura":13,"produto":5,"praga":9}'

```

```javascript
const url = new URL(
    "http://localhost:8082/api/dosagens"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "dosagem": "itaque",
    "cultura": 13,
    "produto": 5,
    "praga": 9
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
    "cultura_id": 1,
    "praga_id": 2,
    "produto_id": 1,
    "dosagem": "100ml por litro",
    "created_at": "2020-08-05T02:54:16.000000Z",
    "updated_at": "2020-08-05T02:54:16.000000Z"
}
```

### HTTP Request
`POST api/dosagens`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `dosagem` | string |  required  | Dosagem, exemplo: 100ml por litro
        `cultura` | integer |  required  | ID da cultura, exemplo: 1
        `produto` | integer |  required  | ID do produto, exemplo: 2
        `praga` | integer |  required  | ID da praga, exemplo: 1
    
<!-- END_bd3d9c710b1d5baf46815507ed69a285 -->

<!-- START_e99bfbba274ce06aa71c5ce01d07f3ca -->
## Obter dosagem por ID.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost:8082/api/dosagens/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8082/api/dosagens/1"
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
    "cultura_id": 1,
    "praga_id": 2,
    "produto_id": 1,
    "dosagem": "100ml por litro",
    "created_at": "2020-08-05T02:54:16.000000Z",
    "updated_at": "2020-08-05T02:54:16.000000Z"
}
```
> Example response (404):

```json
{
    "message": "Dosagem não encontrada"
}
```

### HTTP Request
`GET api/dosagens/{dosagen}`


<!-- END_e99bfbba274ce06aa71c5ce01d07f3ca -->

<!-- START_0ac17170cab282c03b12f877f0a095b6 -->
## Update the specified resource in storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://localhost:8082/api/dosagens/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8082/api/dosagens/1"
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
`PUT api/dosagens/{dosagen}`

`PATCH api/dosagens/{dosagen}`


<!-- END_0ac17170cab282c03b12f877f0a095b6 -->

<!-- START_c16f685f7352cbe2c256d33218bf30dd -->
## Deletar dosagem.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "http://localhost:8082/api/dosagens/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8082/api/dosagens/1"
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
    "message": "Dosagem não encontrada"
}
```
> Example response (200):

```json
{
    "message": "Deletado com sucesso"
}
```

### HTTP Request
`DELETE api/dosagens/{dosagen}`


<!-- END_c16f685f7352cbe2c256d33218bf30dd -->

#Produtos


<!-- START_6630bf8c7371ddc986b316d1569ba662 -->
## Listar Produtos.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost:8082/api/produtos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8082/api/produtos"
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
## Criar novo Produto.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost:8082/api/produtos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"nome":"alias"}'

```

```javascript
const url = new URL(
    "http://localhost:8082/api/produtos"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nome": "alias"
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
    -G "http://localhost:8082/api/produtos/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8082/api/produtos/1"
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
    "http://localhost:8082/api/produtos/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"nome":"qui"}'

```

```javascript
const url = new URL(
    "http://localhost:8082/api/produtos/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nome": "qui"
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
    "http://localhost:8082/api/produtos/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8082/api/produtos/1"
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
> Example response (200):

```json
{
    "message": "Deletado com sucesso"
}
```

### HTTP Request
`DELETE api/produtos/{produto}`


<!-- END_1aaf70b2ab74b451e722d0e98df44623 -->


