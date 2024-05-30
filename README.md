# PHP web portal connected with X3

## Minimal version Sage X3

For GraphQL : Sage X3 2023R2

## Objectives

The objective of this portal is to show an example **outside of Sage X3**
which uses **X3 web services** and **GraphQL api**.

- This is an example for **Presales or for developers**.
- This is **not** a portal to put **into production**.
- This portal is used for the **Bootcamp** on the Sage X3 web services offered by the **Sage COEX team**.

## Using Sage SOAP web services X3

- Sales orders for reading (List and Detail) and for writing into Sage X3
- Products for reading (List and Detail)
- Available Stock

## Using New authentication **Connected applications**

- No more authentication in **basic HTTP**
- Use of Standard **JSON Web Tokens** (JWT)

## Using Sage GraphQL api

- Purchasing orders ( List and Detail)
- Purchasing receipts ( List, Detail and **Creation**)

## Use GraphQL queries with the UI graphql api

### GraphQL Query - mySpeList

![Query mySpeList](/docimg/query_list.png)

### GraphQL Mutation - mySpeCreate

![Mutation mySpeCreate](/docimg/mutation.png)

## Description of GraphQl queries

### Purchase orders

#### Query GraphQL - Operation X3 query ( for the list)

**myspelist** is a operation created for using parameters

```graphql
query mySpeList($first: Int!, $filter: String, $orderBy: String) {
  x3Purchasing {
    purchaseOrder {
      query(first: $first, filter: $filter, orderBy: $orderBy) {
        edges {
          node {
            _id
            purchaseSite {
              name
              _id
            }
            receiptSite {
              name
            }
            orderFromSupplier {
              code
            }
            internalOrderReference
            receiptStatus
            signatureStatus
            isClosed
          }
        }
      }
    }
  }
}
```

**GraphQl query variables**

```json
{
  "first": 50,
  "filter": "[{orderFromSupplier:{_id:'CN001'}},{purchaseSite:{_id:'FR011'}},{receiptStatus:'no'}]",
  "orderBy": "{purchaseSite:{_id:-1},_id:-1}"
}
```

#### Query GraphQL - Operation X3 read ( for the detail)

```graphql
query mySpeDetail($id: Id!) {
  x3Purchasing {
    purchaseOrder {
      read(_id: $id) {
        _id
        purchaseSite {
          name
          _id
        }
        receiptSite {
          name
        }
        orderFromSupplier {
          code
        }
        internalOrderReference
        receiptStatus
        signatureStatus
        isClosed
        _createStamp
        _updateStamp
        purchaseOrderQuantityLines {
          query {
            edges {
              node {
                lineNumber
                product {
                  code
                  description1
                }
                quantityInOrderUnitOrdered
                quantityInStockUnitReceived
                orderUnit {
                  code
                }
              }
            }
          }
        }
      }
    }
  }
}
```

**GraphQl query variables**

```json
{
  "id": "POFR0110113"
}
```

### Purchase receipts

#### Query GraphQL - Operation X3 query ( for the list)

```graphql
query mySpeList($filter: String, $orderBy: String) {
  x3Purchasing {
    purchaseReceipt {
      query(filter: $filter, orderBy: $orderBy) {
        edges {
          node {
            id
            receiptSite {
              _id
              name
            }
            receiptDate
            supplier {
              _id
            }
          }
        }
      }
    }
  }
}
```

**GraphQl query variables**

```json
{
  "filter": "{lines:{_every:true,purchaseOrder:'POFR0110113'}}",
  "orderBy": "{id:-1}"
}
```

#### Query GraphQL - Operation X3 read ( for the detail)

```graphql
query mySpeDetail($id: Id!) {
  x3Purchasing {
    purchaseReceipt {
      read(_id: $id) {
        id
        receiptSite {
          _id
          name
        }
        receiptDate
        supplier {
          _id
        }
        lines {
          query {
            edges {
              node {
                _sortValue
                _id
                lineNumber
                purchaseOrder
                purchaseOrderLineNumber
                purchaseOrderSequenceNumber
                quantityInReceiptUnitReceived
              }
            }
          }
        }
      }
    }
  }
}
```

**GraphQl query variables**

```json
{
  "id": "RECFR0110094"
}
```

#### Mutation GraphQL - Operation X3 create ( for the creation)

```graphql
mutation mySpeCreate($data: PurchaseReceipt_Input!) {
  x3Purchasing {
    purchaseReceipt {
      create(data: $data) {
        id
      }
    }
  }
}
```

**GraphQl query variables**

```json
{
  "data": {
    "receiptSite": "FR011",
    "receiptDate": "2021-08-05",
    "supplier": "CN001",
    "lines": [
      {
        "receiptSite": "FR011",
        "purchaseOrder": "POFR0110112",
        "purchaseOrderLineNumber": "1000",
        "product": "DIS012",
        "receiptUnit": "UN",
        "quantityInReceiptUnitReceived": "10",
        "stockDetails": {
          "status": "A",
          "packingUnit": "UN",
          "quantityInPackingUnit": "10"
        }
      },
      {
        "receiptSite": "FR011",
        "purchaseOrder": "POFR0110112",
        "purchaseOrderLineNumber": "2000",
        "product": "DIS013",
        "receiptUnit": "UN",
        "quantityInReceiptUnitReceived": "20",
        "stockDetails": {
          "status": "A",
          "packingUnit": "UN",
          "quantityInPackingUnit": "20"
        }
      }
    ]
  }
}
```

## Using Web Sage design

    ...to complete

## Setup X3 only for SOAP web services

- Unzip V12.zip in X3/PATCH_X3
- Install patch X3 SRC_SVG_WEB_PHP_YYYYMMDD_NN from X3/PATCH_X3/V12
- Publish the web services YOSOH, YOITM and YSTOCK_LOT

## Features

- PHP source

- No X3 sources
- X3 specific patch for the SOAP web services
