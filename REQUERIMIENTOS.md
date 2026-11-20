# Toma de requerimientos – Skate Shop

## 1. ¿Qué es la app?

Skate Shop es una tienda de skate en línea. La idea es que la gente pueda ver los productos que tengo (tablas, trucks, ruedas, bearings, lija, ropa y accesorios), buscarlos, y comprarlos dejando sus datos de envío.

El administrador es el que se encarga de la tienda: sube los productos, los edita, los borra y ve todos los pedidos que han hecho los clientes.

No quería algo tan complicado, sino algo simple que funcione bien y se vea decente.

## 2. ¿Quiénes la usan?

| Quién | Qué puede hacer |
|---|---|
| **Visitante** (no ha iniciado sesión) | Ver la portada con las fotos de la tienda, registrarse o iniciar sesión |
| **Cliente** | Ver los productos, buscar, filtrar, comprar y ver sus propios pedidos |
| **Administrador** | Todo lo del cliente, más crear, editar y eliminar productos y ver los pedidos de todos |

Cuando alguien se registra queda como **cliente** de una vez. El administrador ya viene creado.

## 3. Lo que la app tiene que hacer (requerimientos funcionales)

Estas son las cosas que la app **hace**, osea lo que el usuario puede hacer en ella.

| # | Requerimiento | Quién |
|---|---|---|
| RF-01 | Que alguien se pueda **registrar** con su nombre, correo y contraseña. Queda como cliente. | Visitante |
| RF-02 | Poder **iniciar sesión** con correo y contraseña, y **cerrar sesión**. | Todos |
| RF-03 | Que la **portada** tenga un carrusel con fotos de la tienda que cambie solo cada 4 segundos y también con flechas. | Todos |
| RF-04 | Ver el **catálogo** de productos en cuadritos: foto, nombre, precio en quetzales y cuántos hay disponibles. | Cliente y admin |
| RF-05 | **Buscar** productos escribiendo el nombre, la marca, el tipo o algo de la descripción. | Cliente y admin |
| RF-06 | **Filtrar** por tipo: Tabla, Ruedas, Trucks, Bearings, Lija, Ropa y Accesorios. | Cliente y admin |
| RF-07 | **Crear** un producto nuevo con nombre, marca, medida o talla, tipo, precio, stock, descripción y foto. | Admin |
| RF-08 | **Editar** un producto. Si no se sube foto nueva se queda la que ya tenía. | Admin |
| RF-09 | **Eliminar** un producto. Antes pregunta si estás seguro. Los pedidos que ya se hicieron de ese producto no se borran. | Admin |
| RF-10 | **Comprar** un producto: escoger la cantidad y poner los datos de envío (nombre, teléfono, dirección y ciudad). La app saca el total sola. | Cliente y admin |
| RF-11 | Al comprar, que se **reste del stock** lo que se compró. No se puede comprar más de lo que hay. | Sistema |
| RF-12 | Si un producto ya no tiene stock, que diga **Agotado** y no deje comprarlo. | Sistema |
| RF-13 | Que el cliente vea **Mis pedidos**, osea solo los que él hizo, con producto, cantidad, total, dirección y estado. | Cliente |
| RF-14 | Que el admin vea **todos los pedidos** y de qué cliente es cada uno. | Admin |
| RF-15 | Que cada usuario pueda **editar su perfil**: cambiar su nombre, correo o contraseña, o borrar su cuenta. | Cliente y admin |

## 4. Cómo tiene que ser la app (requerimientos no funcionales)

Estas no son cosas que el usuario "hace", sino **cómo** tiene que funcionar la app por dentro y por fuera.

| # | Requerimiento |
|---|---|
| RNF-01 | Toda la página tiene que estar en **español**, también el login, el registro y los mensajes de error. |
| RNF-02 | Tiene que ser **fácil de usar**: botones claros (Comprar, Editar, Eliminar) y que avise cuando algo se hizo bien, por ejemplo "Producto creado". |
| RNF-03 | **Seguridad**: un cliente no puede crear, editar ni borrar productos, aunque escriba la dirección a mano en el navegador; le sale que no tiene permiso (error 403). |
| RNF-04 | Las **contraseñas** no se guardan tal cual, Laravel las guarda encriptadas, osea que ni viendo la base de datos se pueden leer. |
| RNF-05 | Para ver la tienda y comprar **hay que iniciar sesión**. Sin sesión solo se ve la portada. |
| RNF-06 | Que **revise los datos** antes de guardar: que no falten campos, que el precio y el stock no sean negativos y que la foto sea imagen de máximo 2 MB. Si algo está mal, avisa en rojo debajo del campo. |
| RNF-07 | Los precios van en **quetzales (Q)** y la hora es la de **Guatemala**. |
| RNF-08 | Los datos se guardan en una base de datos **MySQL**. |
| RNF-09 | Tiene que funcionar bien en el navegador de la **computadora**. En celular sí abre, pero no se le dio prioridad. |
| RNF-10 | Que se vea **decente y con estilo de skate**: barra amarilla, logo SkateShop y fotos. |

## 5. Lo que guarda la base de datos

| Tabla | Qué guarda |
|---|---|
| `users` | Los usuarios: nombre, correo, contraseña (encriptada) y rol (`admin` o `cliente`). |
| `productos` | Los productos: nombre, marca, medida/talla, tipo, precio, stock, descripción y foto. |
| `pedidos` | Las compras: quién compró, qué producto, cantidad, total, datos de envío y estado (empieza en "Pendiente"). |

Un usuario puede tener muchos pedidos, y cada pedido es de un solo producto.

## 6. Lo que NO hace (por ahora)

Para que quede claro hasta dónde llega el proyecto:

- No cobra con tarjeta, solo registra el pedido.
- No hay carrito, se compra un producto a la vez.
- El admin no le cambia el estado a los pedidos, todos se quedan en "Pendiente".
- No manda correos.

## 7. Con qué se hizo

- **Laravel 13** con **Breeze** (el login y el registro).
- **PHP 8.4** y **Composer**.
- **MySQL 8** corriendo en **Docker**.
- **Tailwind CSS** y **Vite** para los estilos.
- **Visual Studio Code** para programar.

## 8. Usuarios de prueba

| Rol | Correo | Contraseña |
|---|---|---|
| Admin | admin@skateshop.gt | admin123 |
| Cliente | cliente@skateshop.gt | cliente123 |
