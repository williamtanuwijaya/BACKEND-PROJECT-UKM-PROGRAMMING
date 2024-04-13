
# Backend Project UKM Programming

A simple backend for online exam application used for a campus project


## API Reference

#### Get all classrooms

```http
  GET /api/items
```

#### Get classroom

```http
  GET /api/items/${id}
```

| Parameter | Type     | Description                             |
| :-------- | :------- | :-------------------------------------- |
| `id`      | `int`    | **Required**. Id of classrooms to fetch |

#### Add classroom

```http
  POST /api/classrooms/
```

#### Edit classroom

```http
  PUT/PATCH /api/classrooms/{id}
```

| Parameter | Type     | Description                             |
| :-------- | :------- | :-------------------------------------- |
| `id`      | `int`    | **Required**. Id of classrooms to fetch |

#### Delete classroom

```http
  DELETE /api/classrooms/{id}
```

| Parameter | Type     | Description                             |
| :-------- | :------- | :-------------------------------------- |
| `id`      | `int`    | **Required**. Id of classrooms to fetch |

