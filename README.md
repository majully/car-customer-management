# Controle Cliente Automóvel - Laravel 8 API REST

Este projeto foi criado com framework Laravel para controle de automóveis dos clientes.

Os recursos (API) incluem:<br />
- Cadastrar novo cliente;<br />
- Editar cadastro de cliente;<br />
- Excluir cadastro de cliente;<br />
- Listar cadastro de cliente;<br />
- Buscar cliente pelo último número da placa do carro.
<br /><br />
## Instalação

Instalar comandos:
``` 
- git clone git@github.com:majully/car-customer-management.git
- composer update
- add .env and update database settings
- php artisan migrate:fresh --seed
- php artisan serve
```
<br />

## Endpoints

|   Método   |  Endpoint  |    Descrição    |
| :---         |     :---:      |          :--- |
| POST   | /cliente     | Cadastro de novo cliente.    |
| PUT     | /cliente/{id}       | Edição de um cliente já existente.      |
| DELETE     | /cliente/{id}       | Remoção de um cliente existente.      |
| GET     | /cliente/{id}       | Consulta de dados de um cliente      |
| GET     | /consulta/final-placa/{numero}       | Consulta de todos os clientes cadastrados na base, onde o último número da placa do carro é igual ao informado.      |


<br />

## Licença

O Controle Cliente Automóvel (Laravel 8 API REST) é um software de código aberto licenciado sob a [MIT license](https://opensource.org/licenses/MIT) © Wesley Majully.

