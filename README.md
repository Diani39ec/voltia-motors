# ⚡ VOLTIA Motors — Tienda de vehículos · Por Diana Trujillo

Landing interactiva de concesionario: plato giratorio 3D con fotos reales, franja de auto en movimiento, configurador de modelo y tono, formulario que guarda en MySQL y panel admin.

## Demo local
```
http://localhost/voltia-motors/
```
- Formulario → `guardar-prueba.php` (valida y guarda; respaldo en CSV si MySQL falla)
- 🔑 Admin: `http://localhost/voltia-motors/admin/?key=voltia2026`

## Estructura del proyecto
```
voltia-motors/
├── index.php           · Portada (usa parciales): hero, motion, modelos, configurador, form
├── partials/
│   ├── header.php      · <head>, nav, botón de prueba
│   └── footer.php      · Pie con autoría + <script>
├── app.js              · Modelos desde la API (respaldo local), plato giratorio,
│                         filtros, slider, contadores, formulario por fetch, protección
├── styles.css          · Tema neón nocturno + turntable 3D + reflejo + shine
├── logo.svg            · Hexágono + rayo en degradado voltio→violeta
├── config.php          · Conexión PDO + clean() + ADMIN_KEY
├── api/modelos.php     · JSON de modelos desde MySQL
├── guardar-prueba.php  · Guarda solicitud de prueba (POST → JSON)
├── admin/index.php     · Solicitudes con estados y reclamo por WhatsApp
├── db/voltia_db.sql    · Esquema + 3 modelos
└── README.md
```

## Base de datos `voltia_db`
| Tabla | Guarda |
|---|---|
| `modelos` | nombre, tipo (electrico/hibrido), precio, autonomía, 0–100, carga, foto |
| `pruebas` | nombre, WhatsApp, modelo, estado (nueva/contactada/agendada/vendida) |

## Instalación
```powershell
Get-Content db/voltia_db.sql -Raw | mysql -u root
```

## Stack
PHP 8 + MySQL + JavaScript (fetch/JSON) + CSS3 (3D, keyframes).

Fotos de autos: Unsplash (licencia de uso libre), verificadas una por una.

© 2026 VOLTIA Motors · Hecho por **Diana Trujillo**
