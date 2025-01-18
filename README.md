# BLACKJACK - Back: Laravel API REST / Front: VueJS

Este proyecto combina una API REST construida con Laravel (backend) y una aplicación frontend desarrollada con Vue.js. La configuración se realiza mediante contenedores Docker utilizando un único archivo `docker-compose.yml` que se encuentra en la raíz para gestionar ambos servicios junto con una base de datos MySQL. El mismo requiere de un archivo `.env` con los datos para la conexión a la base de datos.

## Requisitos previos

- Docker y Docker Compose instalados en tu máquina.

## Configuración

### Archivos necesarios

1. **Archivo `.env` para variables de entorno**  
   Crea un archivo `.env` en la raíz del proyecto con la siguiente información básica para conectar la base de datos dentro de los contenedores:

   ```env
   # Variables necesarias para conectar la base de datos
   DB_PASSWORD=yourPassword
   DB_DATABASE=yourDatabase
   ```

2. **Archivos `.gitignore`**  
   Asegúrate de que el archivo `.env` esté listado en el `.gitignore` para evitar versionar información sensible.

### Estructura del proyecto

El proyecto está organizado de la siguiente manera:

```
.
├── blackjack-api        # Carpeta del backend (Laravel API)
│   ├── Dockerfile       # Dockerfile para el backend
│   └── ...              # Archivos del proyecto Laravel
├── blackjack-front      # Carpeta del frontend (Vue.js)
│   ├── Dockerfile       # Dockerfile para el frontend
│   └── ...              # Archivos del proyecto Vue.js
├── docker-compose.yml   # Configuración unificada de Docker
└── README.md            # Este archivo
```

### Uso

#### 1. Construcción y arranque de los contenedores

Ejecuta el siguiente comando desde la raíz del proyecto: `docker compose up --build -d`. Esto levantará tres contenedores:

- blackjack-api: Servidor PHP con Laravel.
- blackjack-front: Servidor de desarrollo para Vue.js.
- blackjack-db: Base de datos MySQL.

#### 2. Acceso a los servicios

- Frontend (Vue.js): Disponible en [http://localhost:5173](http://localhost:5173)
- Backend (Laravel): Disponible en [http://localhost:8000](http://localhost:8000)
- Base de datos (MySQL): Puerto: 3306, el resto de datos configurados en el `.env`

#### 3. Ingreso a la terminal de los contenedores

Desde la raíz del proyecto, puedes hacerlo a través de los siguientes comandos:

- Backend (Laravel): `docker exec -it blackjack-api bash`
- Frontend (Vue.js): `docker exec -it blackjack-front sh`
- Base de datos (MySQL): `docker exec -it blackjack-db mysql -u root -p`

### Notas adicionales

Si necesitas ejecutar el frontend o backend por separado, puedes usar los archivos `docker-compose.yml` individuales en las carpetas `blackjack-api` y `blackjack-front`. El archivo `docker-compose.yml` en la raíz del proyecto centraliza la configuración para levantar todo el stack al mismo tiempo.
