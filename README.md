# ⚡ VOLTIA Motors — Landing interactiva para tienda de vehículos

Tienda de vehículos eléctricos e híbridos con fotos reales, plato giratorio 3D y backend PHP + MySQL.

## Ver demo
```
http://localhost/voltia-motors/
```
El formulario guarda en MySQL (`guardar-prueba.php`). Panel admin: `http://localhost/voltia-motors/admin/?key=voltia2026`

## Arquitectura profesional
| Capa | Tecnología | Archivo |
|---|---|---|
| Vista | PHP + parciales reutilizables | `index.php`, `partials/` |
| Estilo + animación | CSS3 (keyframes, 3D, reflection) | `styles.css` |
| Interactividad | JavaScript (fetch, tilt 3D, slider) | `app.js` |
| API | PHP + JSON (modelos desde MySQL) | `api/modelos.php` |
| Backend | PHP 8 + PDO + validación | `guardar-prueba.php`, `config.php` |
| Datos | MySQL (`modelos`, `pruebas`) | `db/voltia_db.sql` |
| Admin | PHP con llave + estados + WhatsApp | `admin/index.php` |

## Fotos reales + plato giratorio
- **Hero**: el Voltia-One gira en un **plato giratorio**: plataforma con luz rotativa, anillo orbital, balanceo 3D (`rotateY`), reflejo en el piso y barrido de brillo.
- **Franja en movimiento**: foto real con paneo de cámara y líneas de velocidad.
- **Modelos**: fotos reales (deportivo, sedán en movimiento con motion-blur, SUV 4x4) con zoom al hover + brillo.
- **Configurador**: cambia de modelo en el plato y aplica tonos de pintura en vivo.
- Fotos: Unsplash con licencia de uso libre (crédito en el footer). Si una foto falla, hay imagen de respaldo automática.

## Protección (disuasoria)
| Capa | Dónde |
|---|---|
| Clic derecho desactivado | `partials/header.php` (`oncontextmenu`) + `app.js` |
| Arrastrar / guardar imágenes bloqueado | CSS `pointer-events:none` + JS `dragstart` |
| Selección limitada en galerías/logo | clase `.noselect` |
| Atajos Ver código / Guardar bloqueados | `keydown` en `app.js` |
| Marca de agua tenue | `.watermark` en `partials/header.php`/`styles.css` |

> Nota técnica: nada en la web es 100% incopiable; estas capas solo dificultan la copia casual.

## Archivos
```
voltia-motors/
├── index.php        · portada
├── partials/        · cabecera y pie compartidos
├── styles.css       · estilos y animaciones
├── app.js           · interactividad
├── logo.svg         · logotipo
├── api/             · API JSON de modelos
├── admin/           · panel de solicitudes
├── db/              · esquema MySQL
├── config.php       · configuración
├── guardar-prueba.php · backend del formulario
└── README.md
```

© 2026 VOLTIA Motors · Diana Trujillo
