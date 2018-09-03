-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2018-08-29 03:58:01.193

-- tables
-- Table: client
CREATE TABLE client (
    password varchar(200) NOT NULL,
    isAdmin BOOLEAN NOT NULL DEFAULT 0,
    username varchar(200) NOT NULL,
    id int NOT NULL AUTO_INCREMENT,
    UNIQUE INDEX username (username),
    CONSTRAINT client_pk PRIMARY KEY (id)
);

-- Table: credit
CREATE TABLE credit (
    interest_rate decimal(40,10) NOT NULL DEFAULT 0.02,
    pay_date date NOT NULL,
    loan_amount decimal(40,10) NOT NULL,
    balance decimal(40,10) NOT NULL,
    isAproved BOOLEAN NOT NULL DEFAULT 0,
    late_payment_fee decimal(40,10) NOT NULL,
    id int NOT NULL AUTO_INCREMENT,
    guest_email varchar(100),
    user_id int,
    CONSTRAINT credit_pk PRIMARY KEY (id)
);

-- Table: credit_card
CREATE TABLE credit_card (
    max_capacity decimal(40,10) NOT NULL,
    isAproved BOOLEAN NOT NULL DEFAULT 0,
    consumed decimal(40,10) NOT NULL,
    overbook decimal(40,10) NOT NULL,
    handling_fee decimal(40,10) NOT NULL,
    interest_rate decimal(40,10) NOT NULL,
    id int NOT NULL AUTO_INCREMENT,
    user_id int NOT NULL,
    savings_account_id int NOT NULL,
    CONSTRAINT credit_card_pk PRIMARY KEY (id)
);

-- Table: credit_card_purchase
CREATE TABLE credit_card_purchase (
    number_fees int NOT NULL,
    amount int NOT NULL,
    isJavecoins BOOLEAN NOT NULL DEFAULT 1 COMMENT 'This is either pesos or javelins',
    id int NOT NULL AUTO_INCREMENT,
    credit_card_id int NOT NULL,
    CONSTRAINT credit_card_purchase_pk PRIMARY KEY (id)
);

-- Table: guest
CREATE TABLE guest (
    email varchar(100) NOT NULL,
    cedula int NOT NULL,
    CONSTRAINT guest_pk PRIMARY KEY (email)
);

-- Table: message
CREATE TABLE message (
    content varchar(500) NOT NULL,
    date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    id int NOT NULL AUTO_INCREMENT,
    user_id int NOT NULL,
    CONSTRAINT message_pk PRIMARY KEY (id)
);

-- Table: movement
CREATE TABLE movement (
    amount decimal(50,10) NOT NULL,
    type_transfer int NOT NULL COMMENT 'This can be to another user, to pay a credit card or pay a credit.',
    origin_bank varchar(200) NOT NULL DEFAULT 'J&ABank',
    transfer_cost decimal(50,10) NOT NULL DEFAULT 0.0,
    date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    id int NOT NULL AUTO_INCREMENT,
    savings_account_id int,
    destiny int,
    foreign_account_id int,
    CONSTRAINT movement_pk PRIMARY KEY (id)
);

-- Table: savings_account
CREATE TABLE savings_account (
    balance decimal(40,10) NOT NULL,
    id int NOT NULL AUTO_INCREMENT,
    interest_rate numeric(40,10) NOT NULL,
    user_id int NOT NULL,
    CONSTRAINT savings_account_pk PRIMARY KEY (id)
);

-- Table: admin_constant
CREATE TABLE admin_constant (
    guest_credit_fee int NOT NULL,
    id int NOT NULL AUTO_INCREMENT
);

-- foreign keys
-- Reference: credit_card_purchase_credit_card (table: credit_card_purchase)
ALTER TABLE credit_card_purchase ADD CONSTRAINT credit_card_purchase_credit_card FOREIGN KEY credit_card_purchase_credit_card (credit_card_id)
    REFERENCES credit_card (id)
    ON DELETE CASCADE;

-- Reference: credit_card_user (table: credit_card)
ALTER TABLE credit_card ADD CONSTRAINT credit_card_user FOREIGN KEY credit_card_user (user_id)
    REFERENCES client (id)
    ON DELETE CASCADE;

ALTER TABLE credit_card ADD CONSTRAINT credit_card_savings_account FOREIGN KEY credit_card_savings_account (savings_account_id)
    REFERENCES savings_account (id)
    ON DELETE CASCADE;

-- Reference: credit_guest (table: credit)
ALTER TABLE credit ADD CONSTRAINT credit_guest FOREIGN KEY credit_guest (guest_email)
    REFERENCES guest (email)
    ON DELETE CASCADE;

-- Reference: credit_user (table: credit)
ALTER TABLE credit ADD CONSTRAINT credit_user FOREIGN KEY credit_user (user_id)
    REFERENCES client (id)
    ON DELETE CASCADE;

-- Reference: message_user (table: message)
ALTER TABLE message ADD CONSTRAINT message_user FOREIGN KEY message_user (user_id)
    REFERENCES client (id)
    ON DELETE CASCADE;

-- Reference: savings_account_user (table: savings_account)
ALTER TABLE savings_account ADD CONSTRAINT savings_account_user FOREIGN KEY savings_account_user (user_id)
    REFERENCES client (id)
    ON DELETE CASCADE;

-- Reference: transaction_savings_account (table: movement)
ALTER TABLE movement ADD CONSTRAINT transaction_savings_account FOREIGN KEY transaction_savings_account (savings_account_id)
    REFERENCES savings_account (id) ON DELETE CASCADE;

-- End of file.
