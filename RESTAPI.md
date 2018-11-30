# API Details

`GET /pharmacies/latitude/{latitude}/longitude/{longitude}`

Retrieve the closest pharmacy to the provided GPS coordinates.

## URI Path Parameters
| Field       | Description                               | Required | Type                                                              | Example    |
| ----------- | ----------------------------------------- |:--------:| ---------------------------------------------------------------------- | ---------- |
| `latitude`  | The latitude needed to lookup a pharmacy  |    Y     | Decimal ([ISO 6709](https://en.wikipedia.org/wiki/ISO_6709#Latitude))  | 38.825469  |
| `longitude` | The longitude needed to lookup a pharmacy |    Y     | Decimal ([ISO 6709](https://en.wikipedia.org/wiki/ISO_6709#longitude)) | -94.507300 |

## Example
Below is an example of using the pharmacy-lookup API to retrieve the closest pharmacy to the provided GPS coordinates.
### Request URI

`GET http://localhost:8000/api/pharmacies/latitude/38.825469/longitude/-94.507300`

### Request Body
An empty request body is needed for this GET request.

### Response Body
```json
{
    "name": "AUBURN PHARMACY",
    "distance": 7.7,
    "address": {
        "street": "13351 MISSION RD",
        "city": "LEAWOOD",
        "state": "KS",
        "zip": 66209
    }
}
```
A successful response will yield a `200: OK` status

## Response Body Paramaters
| Field      | Description                                        | Type    | Example                                        |
| ---------- | -------------------------------------------------- | ------- | ---------------------------------------------- |
| `name`     | Name of the pharmacy that was found                | String  | "AUBURN PHARMACY"                              |
| `distance` | Distance in _miles_ to the pharmacy that was found | Decimal | 7.7                                            |
| `address`  | Object representing the address of the pharmacy    | Object  | [Refer to the Address Object](#address-object) |

### Address Object
| Field    | Description                  | Type    | Example            |
| -------- | ---------------------------- | ------- | ------------------ |
| `street` | Street number and name       | String  | "13351 MISSION RD" |
| `city`   | Name of the city             | String  | "LEAWOOD"          |
| `state`  | Short-hand name of the state | String  | "KS"               |
| `zip`    | Zip code                     | Integer | 66209              |

## Error Responses
These were not implemented.
### 404: Not Found

### 422: Unprocessable Entity
```json
{
  "error": "INVALID_REQUEST",
  "message": "Latitude entered is not within the bounds"
}
```

### 500: Internal Server Error
 Default server response
