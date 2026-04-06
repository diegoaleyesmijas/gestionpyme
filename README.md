# GestionPyme

![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-7952B3?logo=bootstrap&logoColor=white)
![Estado](https://img.shields.io/badge/Estado-En%20desarrollo-yellow)
![Demo](https://img.shields.io/badge/Demo-En%20vivo-brightgreen)

> Panel de administracion web para PYMEs. Desarrollado para resolver un problema real: muchas pequenas empresas gestionan su inventario y productos en hojas de calculo o papel. GestionPyme ofrece una solucion simple, rapida y funcional sin necesidad de software de pago.

---

## Demo en vivo

**URL:** https://gestionpyme.nxdigital.es

| Campo | Valor |
|-------|-------|
| Email | admin@gestionpyme.com |
| Contrasena | password |

---

## El problema que resuelve

Las PYMEs suelen gestionar productos, categorias e inventario con Excel o de forma manual. Este panel permite:

- Centralizar la informacion de productos en una base de datos real
- Controlar el acceso con autenticacion segura
- Operar el negocio desde cualquier dispositivo con navegador
- Escalar facilmente anadiendo nuevos modulos

---

## Stack tecnologico

| Capa | Tecnologia |
|------|------------|
| Backend | PHP 8 + PDO |
| Base de datos | MySQL 8 |
| Frontend | Bootstrap 5.3 + HTML5 + CSS3 |
| Autenticacion | Sessions + password_verify() |
| Servidor local | XAMPP / LAMP |

---

## Funcionalidades

- [x] Login seguro con hash de contrasena (password_verify)
- [x] Proteccion de rutas con sesiones PHP
- [x] CRUD completo de productos (crear, leer, editar, eliminar)
- [x] Categorias dinamicas cargadas desde base de datos
- [x] Alertas de exito y error en operaciones
- [x] Navbar y sidebar responsive (Bootstrap 5)
- [x] Logout con destruccion de sesion
- [ ] Roles de usuario (admin / operador) - proximamente
- [ ] Dashboard con metricas - proximamente
- [ ] API REST para integracion externa - proximamente

---

## Estructura del proyecto

```
gestionpyme/
├── config/
│   └── conexion.php        # Configuracion de base de datos
├── productos/
│   ├── listar.php          # Listado de productos
│   ├── crear.php           # Formulario de alta
│   ├── editar.php          # Edicion de producto
│   └── eliminar.php        # Baja de producto
├── index.php               # Dashboard principal
├── login.php               # Autenticacion
├── logout.php              # Cierre de sesion
├── navbar.php              # Barra de navegacion
└── sidebar.php             # Menu lateral
```

---

## Instalacion local

```bash
# 1. Clona el repositorio
git clone https://github.com/diegoaleyesmijas/gestionpyme.git

# 2. Copia la carpeta en tu servidor local
# XAMPP -> htdocs/gestionpyme
# LAMP  -> /var/www/html/gestionpyme

# 3. Importa la base de datos
# Abre phpMyAdmin e importa: /sql/tienda.sql

# 4. Configura la conexion
# Edita config/conexion.php con tus credenciales

# 5. Abre en el navegador
# http://localhost/gestionpyme
```

---

## Aprendizajes aplicados

Este proyecto fue construido para practicar y demostrar:

- Arquitectura MVC basica en PHP puro (sin framework)
- Conexion a base de datos con PDO y consultas preparadas (evita SQL injection)
- Gestion de sesiones y autenticacion segura
- Diseno responsive con Bootstrap 5
- Separacion de responsabilidades (config / vistas / logica)

---

## Roadmap

- [ ] Anadir roles de usuario (admin / operador)
- [ ] Dashboard con graficos de inventario
- [ ] Migracion a Laravel para escalabilidad
- [ ] API REST para consumo desde frontend React
- [ ] Tests unitarios con PHPUnit

---

## Autor

**Diego Leyes**
Desarrollador Web Full Stack en formacion | DAW Ilerna 2025/2026
Mas de 16 anos de experiencia en entornos B2B y consultoría IT

- Portfolio: https://portfolio-web-gules-rho.vercel.app/
- GitHub: https://github.com/diegoaleyesmijas
- Email: diegoaleyesmjs@gmail.com
