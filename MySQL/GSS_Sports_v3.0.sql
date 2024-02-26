CREATE DATABASE GSS_SPORTS;

use gss_sports;

CREATE TABLE USERS (
	user_ID int (50) primary key,
    adminUsername varchar (50),
	email varchar (100),
    userPassword varchar (100)
);

CREATE TABLE ADMIN (
	Admin_ID int (50) primary key,
	username varchar (50),
    password varchar (20),
    user_ID int (50),
    foreign key (user_ID) REFERENCES USERS(user_ID)
);
CREATE TABLE CUSTOMER (
	customer_ID int primary key,
    user_ID int (50),
    firstName varchar (50),
    lastName varchar (50),
    phoneNumber int,
    email varchar (50),
    customer_Address varchar (50),
    customer_Type ENUM ('NEW', 'Existing'),
    foreign key (user_ID) REFERENCES USERS(user_ID)
);

CREATE TABLE PRODUCTS (
	product_ID int primary key,
    product_Name varchar (50),
    product_Description varchar (255),
    product_Price decimal (50),
    product_Size ENUM ('S', 'M', 'L'),
    product_Gender ENUM ('Male', 'Gender'),
    product_County varchar (100)
);

CREATE TABLE CART (
	cart_ID int primary key,
    customer_ID int,
    product_ID int,
    quantity int,
    price decimal (50),
    total_Price decimal (50),
    FOREIGN KEY (customer_ID) REFERENCES CUSTOMER(customer_ID),
    FOREIGN KEY (product_ID) REFERENCES PRODUCTS(product_ID)
);

CREATE TABLE ORDERS (
	order_ID int primary key,
    cart_ID int,
    product_ID int,
    ordered_date date,
    shipped_date date,
    total_Price decimal (50),
    FOREIGN KEY (cart_ID) REFERENCES CART(cart_ID)
);

CREATE TABLE PAYMENTS (
	payment_ID int primary key,
    paymentType ENUM ('CASH', 'CARD'),
    order_ID int,
	FOREIGN KEY (order_ID) REFERENCES ORDERS(order_ID)
);