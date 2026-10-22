@php try { $anvLatam = isLatam(); } catch (\Throwable $e) { $anvLatam = false; } @endphp
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
    .anv-aviso {
        @if ($anvLatam)
        --anv-noche-2: #0a2a14; --anv-noche-3: #0f4d1a; --anv-noche-rgb: 4, 20, 10; --anv-claro-0: #e8f6ea; --anv-claro-1: #cfe6d3; --anv-claro-2: #a9c8ae;
        --anv-oro: #6dff5a; --anv-oro-rgb: 109, 255, 90; --anv-luz: #3fd957; --anv-boton: #12a826; --anv-boton-2: #0b7f1c; --anv-boton-rgb: 18, 168, 38;
        @else
        --anv-noche-2: #0a2240; --anv-noche-3: #0d3d70; --anv-noche-rgb: 4, 16, 31; --anv-claro-0: #e6f1fc; --anv-claro-1: #c9dcef; --anv-claro-2: #a3bdd6;
        --anv-oro: #5ac8fa; --anv-oro-rgb: 90, 200, 250; --anv-luz: #4fb3ff; --anv-boton: #0a84ff; --anv-boton-2: #0066d6; --anv-boton-rgb: 10, 132, 255;
        @endif
    }
    .anv-aviso { position: fixed; right: 20px; bottom: 20px; z-index: 1060; width: 340px; max-width: calc(100vw - 32px);
        background: linear-gradient(160deg, var(--anv-noche-2), var(--anv-noche-3)); color: var(--anv-claro-0); border-radius: 14px; padding: 18px 18px 16px; text-align: left;
        box-shadow: 0 24px 50px -16px rgba(var(--anv-noche-rgb), .7); border: 1px solid rgba(255, 255, 255, .14);
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        animation: anv-entrar .5s ease-out both; }
    .anv-cerrar { position: absolute; top: 8px; right: 10px; background: none; border: 0; color: var(--anv-claro-2);
        font-size: 22px; line-height: 1; cursor: pointer; padding: 2px 6px; }
    .anv-cerrar:hover { color: #fff; }
    .anv-etiqueta { display: inline-flex; align-items: center; gap: 6px; font-size: 11px; font-weight: 700;
        letter-spacing: .06em; text-transform: uppercase; color: var(--anv-oro); margin-bottom: 8px; }
    .anv-punto { width: 7px; height: 7px; border-radius: 50%; background: var(--anv-oro); box-shadow: 0 0 0 0 rgba(var(--anv-oro-rgb), .6);
        animation: anv-pulso 1.8s infinite; }
    .anv-titulo { font-size: 16px; font-weight: 700; color: #fff; line-height: 1.3; margin-bottom: 6px; padding-right: 16px; }
    .anv-texto { font-size: 13px; line-height: 1.5; color: var(--anv-claro-1); margin: 0 0 14px; }
    .anv-texto strong { color: #fff; }
    .anv-boton { display: block; text-align: center; background: linear-gradient(135deg, var(--anv-luz), var(--anv-boton) 55%, var(--anv-boton-2)); color: #fff !important;
        font-weight: 600; font-size: 14px; padding: 10px 14px; border-radius: 999px; text-decoration: none !important;
        transition: transform .15s, box-shadow .15s; }
    .anv-boton:hover { transform: translateY(-1px); box-shadow: 0 10px 24px -8px rgba(var(--anv-boton-rgb), .7); }
    .anv-contacto { font-size: 12px; color: var(--anv-claro-2); margin: 10px 0 0; text-align: center; line-height: 1.4; }
    .anv-contacto a { color: var(--anv-oro) !important; font-weight: 600; text-decoration: none; white-space: nowrap; }
    @keyframes anv-entrar { from { opacity: 0; transform: translateY(16px); } to { opacity: 1; transform: none; } }
    @keyframes anv-pulso { 70% { box-shadow: 0 0 0 7px rgba(var(--anv-oro-rgb), 0); } 100% { box-shadow: 0 0 0 0 rgba(var(--anv-oro-rgb), 0); } }
    @media (max-width: 576px) { .anv-aviso { right: 16px; left: 16px; bottom: 56px; width: auto; } }
</style>
