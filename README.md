# FunkMoes

<p align="center">
  <img src="https://raw.githubusercontent.com/tuUsuario/FunkMoes/main/assets/logo.png" alt="FunkMoes Logo" width="200">
</p>

**FunkMoes** es una plataforma web diseñada para la gestión y descubrimiento de colecciones musicales. Este documento describe en detalle el propósito del proyecto, su arquitectura, funcionalidades y pasos para su instalación y uso. Preparado como Trabajo de Fin de Grado (TFG) por Guillermo Mateos De Los Santos Aguilera.

---

## 📋 Tabla de Contenidos
1. [Introducción](#introducción)
2. [Arquitectura y Tecnologías](#arquitectura-y-tecnologías)
3. [Funcionalidades Principales](#funcionalidades-principales)
4. [Requisitos](#requisitos)
5. [Instalación y Configuración](#instalación-y-configuración)
6. [Desarrollo y Uso](#desarrollo-y-uso)
7. [Estructura del Proyecto](#estructura-del-proyecto)
8. [Pruebas](#pruebas)
9. [Despliegue](#despliegue)
10. [Contribuciones](#contribuciones)
11. [Licencia](#licencia)
12. [Contacto](#contacto)

---

## 1. Introducción
FunkMoes es una tienda en línea especializada en camisetas, sudaderas y gorros de estilo urbano. Permite a los usuarios navegar por distintas categorías de productos, gestionar su perfil, añadir artículos al carrito y completar pedidos de forma ágil y segura.

## 2. Arquitectura y Tecnologías
- **Backend**: Laravel 10 (PHP 8)
  - Controladores MVC y rutas RESTful para productos, carrito y pedidos
  - Autenticación y autorización de usuarios (roles Admin y Cliente)
  - ORM Eloquent con modelos: `Product`, `Category`, `Cart`, `CartItem`, `Order`, `OrderItem`, `User`
  - Envío de emails: confirmación de compra con `Mail\PurchaseConfirmation`
- **Frontend**: Vue.js 3 + Vite
  - Componentes dinámicos para catálogo, carrito y formulario de checkout
  - Tailwind CSS para diseño responsive
  - Estado global con Pinia y comunicación con backend vía Axios
- **Base de datos**: MySQL (v8) / SQLite (para pruebas locales)
- **Herramientas**:
  - Composer para dependencias PHP
  - npm / yarn para dependencias JS
  - PHPUnit / Pest para pruebas unitarias y de integración
  - Docker (opcional para despliegue en contenedores)

## 3. Funcionalidades Principales
1. **Autenticación y registro**: Creación y gestión de cuentas de usuario con roles Cliente y Admin.
2. **Catálogo de productos**: Listado, filtrado por categoría y búsqueda por nombre.
3. **Detalle de producto**: Vista detallada con imágenes, descripción, precio y stock disponible.
4. **Carrito de compra**: Añadir, modificar cantidades y remover artículos antes de la compra.
5. **Proceso de checkout**: Generación de pedidos, cálculo de totales e impuestos.
6. **Confirmación por email**: Envío automático de correo tras realizar un pedido.
7. **Panel de administración**: CRUD de productos, categorías y visualización de pedidos.
8. **Gestión de pedidos**: Seguimiento de estado y historial de compras por parte del cliente.

## 4. Requisitos
- PHP ≥ 8.0
- Extensiones: OpenSSL, PDO, Mbstring, Tokenizer, XML
- MySQL ≥ 5.7 / MariaDB ≥ 10.2
- Composer
- Node.js ≥ 14 & npm/yarn
- Opcional: Docker & Docker Compose

## 5. Instalación y Configuración
1. Clonar repositorio:
   ```powershell
   git clone https://github.com/tuUsuario/FunkMoes.git
   cd FunkMoes
   ```
2. Instalar dependencias PHP y JS:
   ```powershell
   composer install
   npm install
   ```
3. Configurar variables de entorno:
   ```powershell
   cp .env.example .env
   php artisan key:generate
   ```
4. Crear y migrar base de datos:
   ```powershell
   php artisan migrate --seed
   ```
5. Iniciar servidor de desarrollo:
   ```powershell
   npm run dev    # Frontend
   php artisan serve  # Backend
   ```

## 6. Desarrollo y Uso
1. Accede a `http://127.0.0.1:8000`.
2. Regístrate o inicia sesión usando tu cuenta de GitHub/Google.
3. Explora la sección **Explorar Música** para descubrir recomendaciones.
4. Crea y gestiona tus playlists desde **Mi Biblioteca**.
5. Participa en el feed en tiempo real y agrega valoraciones y comentarios.

## 7. Estructura del Proyecto
```
app/          # Código fuente Laravel (MVC)
  Http/
  Models/
  Mail/
bootstrap/    # Bootstrap de la aplicación
config/       # Archivos de configuración
database/     # Migraciones y seeders
public/       # Entrada pública y assets compilados
resources/    # Vistas Blade, assets SASS y JS
routes/       # Definición de rutas
tests/        # Tests unitarios y funcionales
```

## 8. Pruebas
- Ejecutar suite completa:
  ```powershell
  php artisan test
  ```
- Generar cobertura de código con Xdebug o phpdbg:
  ```powershell
  ./vendor/bin/phpunit --coverage-html coverage
  ```

## 9. Despliegue
- Con Docker Compose:
  ```powershell
  docker-compose up -d --build
  ```
- Configurar servidor Apache/Nginx apuntando a `public/`.
- Variables de entorno en producción ajustadas en `.env`.

## 10. Contribuciones
Agradecemos colaboraciones y sugerencias.
1. Haz fork del proyecto.
2. Crea una rama feature: `git checkout -b feature/nombre`
3. Envía tus cambios mediante pull request.

## 11. Licencia
Este proyecto se distribuye bajo la licencia MIT. Consulta el archivo [LICENSE](LICENSE) para más detalles.

## 12. Contacto
- **Autor**: Guillermo Mateos De Los Santos Aguilera
- **Email**: guillermo.moestilos@gmail.com

---
*Última actualización: Julio 2025*
