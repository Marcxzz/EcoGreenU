```mermaid
classDiagram
    direction LR

    class Project {
        INT idProject
        CHAR[30] title
        CHAR[250] description
        CHAR[20] img
        DECIMAL[10,2] targetAmount
        DATETIME deadline
        CHAR[1] status
    }

    class User {
        INT idUser
        CHAR[50] firstName
        CHAR[50] lastName
        CHAR[255] email
        CHAR[20] phoneNumber
        CHAR[128] password
        BOOL isDeleted
    }

    class Payment {
        INT idPayment
        DECIMAL amount
        CHAR[150] description
        DATETIME date
        BOOL public
    }

    class PaymentMethod {
        INT idPaymentMethod
        CHAR[50] name
    }

    %% regole di lettura
    Project "1..1" --> "0..N" Payment : Have received
    Project "1..1" <-- "0..N" Payment : Refer

    User "1..1" --> "0..N" Payment : Make
    User "1..1" <-- "0..N" Payment : Made by

    User "1..1" --> "0..N" Project : Create
    User "1..1" <-- "0..N" Project : Created by

    PaymentMethod "1..1" --> "0..N" Payment : Refer
    PaymentMethod "1..1" <-- "0..N" Payment : Be done with
```