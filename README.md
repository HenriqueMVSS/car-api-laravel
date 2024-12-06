# API para cadastro de carros.

Esta API permite cadastrar, listar, editar e excluir carros.

### Configuração

1. Clone o repositório:
``
git clone https://github.com/HenriqueMVSS/car-api-laravel
``
2. Instale as dependências:
``
cd seu-repositorio
composer install
``

3. Configure o arquivo .env:
``
cp .env.example .env
php artisan key:generate
``

4. Configure o banco de dados no arquivo .env e execute as migrations:
``
php artisan migrate
``

5. Inicie o servidor:
``
php artisan serve
``

6. Agora você pode acessar a API em `http://localhost:8000/api/car`.


### Endpoints

#### Listar Carros

**GET /api/car**

Retorna uma lista de carros.

#### Exemplo de Requisição

```sh
GET http://localhost:8000/api/car
```

```
{
    "status": true,
    "cars": [
        {
            "id": 1,
            "make": "Toyota",
            "model": "Corolla",
            "year": 2020
        },
        {
            "id": 2,
            "make": "Honda",
            "model": "Civic",
            "year": 2019
        }
    ]
}
```

Cadastrar Carro
POST /api/car

Cadastra um novo carro.

Parâmetros
make (string): Marca do carro.
model (string): Modelo do carro.
year (integer): Ano do carro.
Exemplo de Requisição

```
POST http://localhost:8000/api/car
```
## Exemplo de Resposta
```
{
    "status": true,
    "car": {
        "id": 3,
        "make": "Ford",
        "model": "Mustang",
        "year": 2021
    }
}
```
Exibir Carro
GET /api/car/{id}

Retorna os detalhes de um carro específico.

Parâmetros
id (integer): ID do carro.
Exemplo de Requisição

```
GET http://localhost:8000/api/car/1
```

Exemplo de Resposta
```
{
    "status": true,
    "car": {
        "id": 1,
        "make": "Toyota",
        "model": "Corolla",
        "year": 2020
    }
}
```
Editar Carro
PUT /api/car/{id}

Edita os detalhes de um carro específico.

Parâmetros
id (integer): ID do carro.
make (string): Marca do carro.
model (string): Modelo do carro.
year (integer): Ano do carro.
Exemplo de Requisição

```
PUT http://localhost:8000/api/car/1 
```

Exemplo de Resposta
```
{
    "status": true,
    "car": {
        "id": 1,
        "make": "Toyota",
        "model": "Corolla",
        "year": 2022
    }
}
```

Excluir Carro
DELETE /api/car/{id}

Exclui um carro específico.

Parâmetros
id (integer): ID do carro.
Exemplo de Requisição

```
DELETE http://localhost:8000/api/car/1
```
Exemplo de Resposta:
```
{
    "status": true,
    "message": "Carro excluído com sucesso"
}
```
