
# Backend Project UKM Programming

A simple backend for online exam application used for a campus project


## API Reference

#### Get all classrooms

```http
  GET /api/classrooms
```

#### Get classroom

```http
  GET /api/classrooms/${id}
```

| Parameter | Type     | Description                             |
| :-------- | :------- | :-------------------------------------- |
| `id`      | `int`    | **Required**. Id of classroom to fetch  |

#### Add classroom

```http
  POST /api/classrooms?title={changed}
```

| Parameter | Type     | Description                             |
| :-------- | :------- | :-------------------------------------- |
| `changed` | `String` | **Required**. title of new classroom    |

#### Edit classroom

```http
  PUT /api/classrooms/{id}?title={changed}
```

| Parameter | Type     | Description                             |
| :-------- | :------- | :-------------------------------------- |
| `id`      | `int`    | **Required**. Id of classroom to edit   |
| `changed` | `String` | **Required**. title of new classroom    |

#### Delete classroom

```http
  DELETE /api/classrooms/{id}
```

| Parameter | Type     | Description                             |
| :-------- | :------- | :-------------------------------------- |
| `id`      | `int`    | **Required**. Id of classroom to delete |