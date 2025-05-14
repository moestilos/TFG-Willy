Proyecto TFG: PunkMoes - Tienda Online de Ropa

1. Descripción General

PunkMoes es una tienda online especializada en la venta de camisetas, sudaderas y gorras. Los usuarios pueden registrarse, iniciar sesión, explorar catálogos de productos por colección, añadir productos al carrito y finalizar la compra mediante un sistema de pago.

2. Stack Tecnológico

Frontend: Angular

Backend: Symfony (PHP)

Base de Datos: PostgreSQL

Contenedores: Docker

3. Dinámica de la Web

Inicio: Vista general con enlaces a las colecciones (camisetas, sudaderas, gorras).

Colecciones: Cada colección muestra los productos disponibles con su nombre, precio, imagen y disponibilidad.

Producto: Página individual con detalles del producto y opción para añadir al carrito.

Carrito: Lista de productos seleccionados con cantidades y precio total. Desde aquí se procede al pago.

Registro/Login: Formularios para crear una cuenta o iniciar sesión.

Checkout: Formulario de pago donde se finaliza la compra.

4. Modelo de Datos (Base de Datos PostgreSQL)

Tablas Principales

users

id (PK)

name

email (unique)

password

created_at

categories

id (PK)

name (camiseta, sudadera, gorra)

products

id (PK)

name

stock

price

image_url

category_id (FK -> categories.id)

carts

id (PK)

user_id (FK -> users.id)

created_at

cart_items

id (PK)

cart_id (FK -> carts.id)

product_id (FK -> products.id)

quantity

orders

id (PK)

user_id (FK -> users.id)

total_price

status (pending, paid, shipped)

created_at

order_items

id (PK)

order_id (FK -> orders.id)

product_id (FK -> products.id)

quantity

price_at_purchase

5. Diagrama Entidad-Relación (ERD)

(Ver imagen a continuación)

6. Flujos Principales

Registro/Login:

El usuario accede al formulario de registro.

Ingresa su nombre, correo y contraseña.

Se guarda en la tabla users.

Inicia sesión.

Navegación y Selección:

Usuario navega por las colecciones (filtrado por categoría).

Visualiza los productos y elige uno.

Lo añade al carrito (se crea si no existe).

Puede modificar cantidades desde el carrito.

Compra:

Desde el carrito, accede al checkout.

Ingresa datos de pago.

Se genera un order, se copian los cart_items a order_items.

Se marca el pedido como "paid".

Se descuenta el stock de los productos.
![punkmoes_erd](https://github.com/user-attachments/assets/19a13c23-43e6-4b0f-9afe-97a771c8af28)
