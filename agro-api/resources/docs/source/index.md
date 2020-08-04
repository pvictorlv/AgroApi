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

#Autenticação

Gerenciamento de sessão.
<!-- START_a925a8d22b3615f12fca79456d286859 -->
## Realizar login.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/auth/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/auth/login"
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



### HTTP Request
`POST api/auth/login`


<!-- END_a925a8d22b3615f12fca79456d286859 -->

<!-- START_19ff1b6f8ce19d3c444e9b518e8f7160 -->
## Finalizar e invalidar a sessão atual.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/auth/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/auth/logout"
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



### HTTP Request
`POST api/auth/logout`


<!-- END_19ff1b6f8ce19d3c444e9b518e8f7160 -->

<!-- START_b8685907d076b226506a2f2852a60e81 -->
## Register a User.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/auth/registro" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/auth/registro"
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



### HTTP Request
`POST api/auth/registro`


<!-- END_b8685907d076b226506a2f2852a60e81 -->

<!-- START_994af8f47e3039ba6d6d67c09dd9e415 -->
## Atualizar o token.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/auth/refresh" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/auth/refresh"
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



### HTTP Request
`POST api/auth/refresh`


<!-- END_994af8f47e3039ba6d6d67c09dd9e415 -->

<!-- START_a47210337df3b4ba0df697c115ba0c1e -->
## Obter o usuário autenticado.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/auth/me" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/auth/me"
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
    -d '{"nome":"cumque"}'

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
    "nome": "cumque"
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
    -d '{"nome":"sit"}'

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
    "nome": "sit"
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
> Example response (200):

```json
{
    "message": "Deletado com sucesso"
}
```

### HTTP Request
`DELETE api/culturas/{cultura}`


<!-- END_b0bcafcaf878ed064db1974e2155a620 -->

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
## Criar novo Produto.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost/api/produtos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"nome":"dignissimos"}'

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
    "nome": "dignissimos"
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
    -d '{"nome":"iusto"}'

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
    "nome": "iusto"
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
> Example response (200):

```json
{
    "message": "Deletado com sucesso"
}
```

### HTTP Request
`DELETE api/produtos/{produto}`


<!-- END_1aaf70b2ab74b451e722d0e98df44623 -->

#general


<!-- START_765319e4ef288e9640888252bce28a97 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/dosagens" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/dosagens"
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



### HTTP Request
`GET api/dosagens`


<!-- END_765319e4ef288e9640888252bce28a97 -->

<!-- START_bd3d9c710b1d5baf46815507ed69a285 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/dosagens" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/dosagens"
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



### HTTP Request
`POST api/dosagens`


<!-- END_bd3d9c710b1d5baf46815507ed69a285 -->

<!-- START_e99bfbba274ce06aa71c5ce01d07f3ca -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/dosagens/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/dosagens/1"
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



### HTTP Request
`GET api/dosagens/{dosagen}`


<!-- END_e99bfbba274ce06aa71c5ce01d07f3ca -->

<!-- START_0ac17170cab282c03b12f877f0a095b6 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/dosagens/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/dosagens/1"
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
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/dosagens/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/dosagens/1"
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
`DELETE api/dosagens/{dosagen}`


<!-- END_c16f685f7352cbe2c256d33218bf30dd -->


