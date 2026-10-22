<div id="anv-aviso" class="anv-aviso" role="dialog" aria-live="polite" aria-label="Nueva versión disponible">
    <button type="button" class="anv-cerrar" aria-label="Cerrar aviso"
        onclick="document.getElementById('anv-aviso').style.display='none'; try { sessionStorage.setItem('anv-oculto', '1'); } catch (e) {}">&times;</button>
    <div class="anv-etiqueta"><span class="anv-punto"></span> Actualización importante</div>
    <div class="anv-titulo">Existe una nueva versión de tu sistema y es importante que te cambies</div>
    <p class="anv-texto">
        Esta versión quedará <strong>sin soporte</strong>. La nueva es <strong>más rápida, más segura y más fácil de usar</strong>,
        incluye muchísimas opciones más, como una app nativa para Android y comandas impresas configurables. Cambiarte es gratis.
    </p>
    <a href="{{ route('nueva-version') }}" target="_blank" rel="noopener" class="anv-boton">Ver por qué debo cambiarme &rarr;</a>
    <p class="anv-contacto">Comunícate con
        <a href="https://wa.me/50374880240?text={{ rawurlencode('Hola, quiero cambiarme a la nueva versión de mi sistema.') }}" target="_blank" rel="noopener">soporte técnico</a>
        o al WhatsApp <a href="https://wa.me/50366917170?text={{ rawurlencode('Hola, quiero cambiarme a la nueva versión de mi sistema.') }}" target="_blank" rel="noopener">+503 6691-7170</a></p>
</div>

<script>
    try { if (sessionStorage.getItem('anv-oculto') === '1') document.getElementById('anv-aviso').style.display = 'none'; } catch (e) {}
</script>

<style>
    .anv-aviso { position: fixed; right: 20px; bottom: 20px; z-index: 1060; width: 340px; max-width: calc(100vw - 32px);
        background: linear-gradient(160deg, #241030, #3a1747); color: #f3e6ee; border-radius: 14px; padding: 18px 18px 16px; text-align: left;
        box-shadow: 0 24px 50px -16px rgba(22, 10, 28, .7); border: 1px solid rgba(255, 255, 255, .14);
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        animation: anv-entrar .5s ease-out both; }
    .anv-cerrar { position: absolute; top: 8px; right: 10px; background: none; border: 0; color: #c9b5c3;
        font-size: 22px; line-height: 1; cursor: pointer; padding: 2px 6px; }
    .anv-cerrar:hover { color: #fff; }
    .anv-etiqueta { display: inline-flex; align-items: center; gap: 6px; font-size: 11px; font-weight: 700;
        letter-spacing: .06em; text-transform: uppercase; color: #ffb547; margin-bottom: 8px; }
    .anv-punto { width: 7px; height: 7px; border-radius: 50%; background: #ffb547; box-shadow: 0 0 0 0 rgba(255, 181, 71, .6);
        animation: anv-pulso 1.8s infinite; }
    .anv-titulo { font-size: 16px; font-weight: 700; color: #fff; line-height: 1.3; margin-bottom: 6px; padding-right: 16px; }
    .anv-texto { font-size: 13px; line-height: 1.5; color: #e4d3de; margin: 0 0 14px; }
    .anv-texto strong { color: #fff; }
    .anv-boton { display: block; text-align: center; background: linear-gradient(135deg, #ff8a5c, #f2542d 55%, #d93a16); color: #fff !important;
        font-weight: 600; font-size: 14px; padding: 10px 14px; border-radius: 999px; text-decoration: none !important;
        transition: transform .15s, box-shadow .15s; }
    .anv-boton:hover { transform: translateY(-1px); box-shadow: 0 10px 24px -8px rgba(242, 84, 45, .7); }
    .anv-contacto { font-size: 12px; color: #c9b5c3; margin: 10px 0 0; text-align: center; line-height: 1.4; }
    .anv-contacto a { color: #ffb547 !important; font-weight: 600; text-decoration: none; white-space: nowrap; }
    @keyframes anv-entrar { from { opacity: 0; transform: translateY(16px); } to { opacity: 1; transform: none; } }
    @keyframes anv-pulso { 70% { box-shadow: 0 0 0 7px rgba(255, 181, 71, 0); } 100% { box-shadow: 0 0 0 0 rgba(255, 181, 71, 0); } }
    @media (max-width: 576px) { .anv-aviso { right: 16px; left: 16px; bottom: 56px; width: auto; } }
</style>
