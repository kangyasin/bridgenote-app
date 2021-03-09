# API Spec

## Authentication

All API must use this authentication

Request :
- Header :
    - Authorization : "Bearer [your secret auth key]"

## Create User Position

Request :
- Method : POST
- Endpoint : `/api/user-position`
- Header :
    - Content-Type: application/json
    - Accept: application/json
- Body :

```json 
{
    "user_id" : "integer",
    "position" : "string",
    "status" : "string",
}
```

Response :

```json 
{
    "code" : "number",
    "status" : "string",
    "data" : {
        "id" : "integer, unique",
        "user_id" : "integer",
        "position" : "string",
        "status" : "string",
        "created_at" : "date",
        "updated_at" : "date"
     }
}
```

## Get User Position

Request :
- Method : GET
- Endpoint : `/api/user-position/{id}`
- Header :
    - Accept: application/json

Response :

```json 
{
    "code" : "number",
    "status" : "string",
    "data" : {
        "id" : "integer, unique",
        "user_id" : "integer",
        "position" : "string",
        "status" : "string",
        "created_at" : "date",
        "updated_at" : "date"
     }
}
```

## Update User Position

Request :
- Method : PUT
- Endpoint : `/api/user-position/{id}`
- Header :
    - Content-Type: application/json
    - Accept: application/json
- Body :

```json 
{
    "position" : "string",
    "status" : "string",
}
```

Response :

```json 
{
    "code" : "number",
    "status" : "string",
    "data" : {
        "id" : "integer, unique",
        "user_id" : "integer",
        "position" : "string",
        "status" : "string",
        "created_at" : "date",
        "updated_at" : "date"
     }
}
```

## List User Position

Request :
- Method : GET
- Endpoint : `/api/user-position`
- Header :
    - Accept: application/json
- Query Param :
    - size : number,
    - page : number

Response :

```json 
{
    "code" : "number",
    "status" : "string",
    "data" : [
        {
            "id" : "integer, unique",
            "user_id" : "integer",
            "position" : "string",
            "status" : "string",
            "created_at" : "date",
            "updated_at" : "date"
        },
        {
            "id" : "integer, unique",
            "user_id" : "integer",
            "position" : "string",
            "status" : "string",
            "created_at" : "date",
            "updated_at" : "date"
       }
    ]
}
```

## Delete User Position

Request :
- Method : DELETE
- Endpoint : `/api/user-position/{id}`
- Header :
    - Accept: application/json

Response :

```json 
{
    "code" : "number",
    "status" : "string"
}
```
