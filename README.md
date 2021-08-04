# PHP web portal connected with X3

## Objectives

The objective of this portal is to show an example __outside of Sage X3__ 
which uses __X3 web services__ and __GraphQL api__. 

 * This is an example for __Presales or for developers__. 
 * This is __not__ a portal to put __into production__.
 * This portal is used for the __Bootcamp__ on the Sage X3 web services offered by the __Sage COEX team__.
  
## Using Sage SOAP web services X3
 
 * Sales orders for reading (List and Detail) and for writing into Sage X3
 * Products     for reading (List and Detail) 
 * Available Stock

## Using New authentication __Connected applications__
 
 * No more authentication in __basic HTTP__
 * Use of Standard __JSON Web Tokens__ (JWT)

## Using Sage GraphQL api

 * Purchasing orders ( List and Detail)
 * Purchasing receipts ( List, Detail and __Creation__)

## Use GraphQL queries

# Purchase orders

## Query GraphQL - Operation X3 query ( for the list)

````graphql
{
  xtremX3Purchasing {
    purchaseOrder {
      query(first: 50, filter: "[{orderFromSupplier:{_id:'CN001'}},{purchaseSite:{_id:'FR011'}},{}]", orderBy: "{purchaseSite:{_id:-1},_id:-1}") {
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
````

### Explanations

It is indeed a __GraphQl__ request because without the __word 'query'_ the graphql server assumes that it is the __operation 'query'__.


````graphql
{
  xtremX3Purchasing {
    ...

query {
  xtremX3Purchasing {
    ...

    
````

## Query GraphQL - Operation X3 read ( for the detail)

````graphql
{
  xtremX3Purchasing {
    purchaseOrder {
      read(_id: "POFR0110112") {
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
````

# Purchase receipts

## Query GraphQL - Operation X3 query ( for the list)

````graphql
{
  xtremX3Purchasing {
    purchaseReceipt {
      query(filter: "{lines:{_every:true,purchaseOrder:'POFR0110112'}}", orderBy: "{id:-1}") {
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
````

## Query GraphQL - Operation X3 read ( for the detail)

````graphql
{
  xtremX3Purchasing {
    purchaseReceipt {
      read(_id: "RECFR0110094") {
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

````

## Mutation GraphQL - Operation X3 create ( for the creation)

````graphql
mutation {
  xtremX3Purchasing {
    purchaseReceipt {
      create(
        data: 
        	{
            receiptSite: "FR011", 
            receiptDate: "2021-08-04", 
            supplier: "CN001", 
            lines: 
            	[
                {
                  receiptSite: "FR011", 
                  purchaseOrder: "POFR0110112", 
                  purchaseOrderLineNumber: "1000", 
                  product: "DIS012", 
                  receiptUnit: "UN", 
                  quantityInReceiptUnitReceived: "10", 
                  stockDetails: 
                  	[
                      {
                        status: "A", 
                        packingUnit: "UN", 
                        quantityInPackingUnit: "10"
                      }
                    ]
                }, 
                {
                  receiptSite: "FR011",
                  purchaseOrder: "POFR0110112", 
                  purchaseOrderLineNumber: "2000",
                  product: "DIS013",
                  receiptUnit: "UN",
                  quantityInReceiptUnitReceived: "20",
                  stockDetails: 
                  	[
                      {
                        status: "A",
                        packingUnit: "UN",
                        quantityInPackingUnit: "20"
                      }
                    ]
                }
              ]
          }
      )
      {
        id
      }
    }
  }
}


````

## Using Web Sage design

    ...to complete

## Setup X3 only for SOAP web services

* Unzip V12.zip in X3/PATCH_X3
* Install patch X3 SRC_SVG_WEB_PHP_YYYYMMDD_NN from X3/PATCH_X3/V12
* Publish the web services YOSOH, YOITM and YSTOCK_LOT
	

## Features

* PHP source

* No X3 sources
  
* X3 specific patch for the SOAP web services


## Remarks

* X3 Version minimum  X3 2021R2

* We must use the basic authentication http.
