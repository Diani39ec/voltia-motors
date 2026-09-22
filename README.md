# ⚡ VOLTIA Motors — Landing interactiva original

Tienda de vehículos eléctricos e híbridos. Marca, logo, textos e ilustraciones **creados desde cero en código** (SVG + CSS): no hay fotos de stock que alguien pueda reclamar ni plagiar.

## Ver demo
```
http://localhost/voltia-motors/
```

## Originalidad
- **Logo** `logo.svg`: hexágono + rayo, dibujado a mano en vectores (gradiente voltio→violeta).
- **Auto animado**: SVG propio (carrocería, vidrios, ruedas que giran, rayo, neón) + carretera con líneas en movimiento, ciudad con luces, luna flotante, partículas de velocidad.
- **Interactividad**: configurador de color en vivo, filtros de modelos, tarjetas 3D tilt, contadores animados, slider de opiniones, marquesina infinita, formulario con validación.

## Blindaje anti-copia (disuasorio)
| Capa | Dónde |
|---|---|
| Clic derecho desactivado | `index.html` (`oncontextmenu`) + `app.js` |
| Arrastrar / guardar imágenes bloqueado | CSS `pointer-events:none` + JS `dragstart` |
| Selección limitada en arte/logo | clase `.noselect` |
| Copiar texto pega atribución | evento `copy` en `app.js` |
| Atajos Ver código / Guardar bloqueados | `keydown` en `app.js` |
| Marca de agua gigante tenue | `.watermark` en `index.html`/`styles.css` |
| Aviso legal + metadatos | footer, `LICENSE`, `<meta copyright>` |

> Honestidad técnica: nada en la web es 100% incopiable; estas 7 capas hacen que copiar sea difícil, incompleto (el arte vive en tu CSS/JS) y legalmente riesgoso. El registro de la marca + depósito del código te dan la prueba de autoría.

## Archivos
```
voltia-motors/
├── index.html  · estructura + auto SVG original
├── styles.css  · todas las animaciones
├── app.js      · interactividad + protección
├── logo.svg    · logo vectorial original
├── LICENSE     · todos los derechos reservados
└── README.md
```

© 2026 VOLTIA Motors · Diana Trujillo (@Diani39ec).
