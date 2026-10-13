@extends('admin.layout')
@section('title', $noticia->exists ? 'Editar noticia' : 'Nueva noticia')
@section('breadcrumb', $noticia->exists ? 'Modificar noticia existente' : 'Crear nueva noticia')

@section('content')
<form method="POST"
      action="{{ $noticia->exists ? route('admin.noticias.update', $noticia) : route('admin.noticias.store') }}"
      enctype="multipart/form-data">
  @csrf
  @if($noticia->exists) @method('PUT') @endif

  <div class="row g-4">

    {{-- Columna principal --}}
    <div class="col-lg-8">

      {{-- Información básica --}}
      <div class="adm-card mb-4">
        <div class="adm-card-header"><span class="adm-card-title">Información de la noticia</span></div>
        <div class="adm-card-body">
          <div class="mb-3">
            <label class="adm-form-label">Título <span style="color:#dc2626">*</span></label>
            <input type="text" name="titulo" class="adm-form-control"
                   value="{{ old('titulo', $noticia->titulo) }}" required maxlength="255">
          </div>
          <div class="mb-3">
            <label class="adm-form-label">Descripción (resumen) <span style="color:#dc2626">*</span></label>
            <textarea name="descripcion" class="adm-form-control" rows="3" required>{{ old('descripcion', $noticia->descripcion) }}</textarea>
            <span class="adm-form-hint">Texto corto que aparece en el carrusel.</span>
          </div>
          <div class="mb-3">
            <label class="adm-form-label">Cuerpo completo</label>
            <textarea name="cuerpo" class="adm-form-control" rows="8">{{ old('cuerpo', $noticia->cuerpo) }}</textarea>
            <span class="adm-form-hint">Contenido completo en la página de detalle.</span>
          </div>
          <div class="row g-3">
            <div class="col-sm-6">
              <label class="adm-form-label">Enlace (href) <span style="color:#dc2626">*</span></label>
              <input type="text" name="href" class="adm-form-control"
                     value="{{ old('href', $noticia->href ?? '#') }}" required>
              <span class="adm-form-hint">Ej: #acreditacion, #historia</span>
            </div>
            <div class="col-sm-3">
              <label class="adm-form-label">Fecha visible <span style="color:#dc2626">*</span></label>
              <input type="text" name="fecha" class="adm-form-control"
                     value="{{ old('fecha', $noticia->fecha) }}" placeholder="Mayo 2025" required>
            </div>
            <div class="col-sm-3">
              <label class="adm-form-label">Orden</label>
              <input type="number" name="orden" class="adm-form-control" min="0"
                     value="{{ old('orden', $noticia->orden ?? 0) }}">
            </div>
          </div>
        </div>
      </div>

      {{-- Programación de publicación --}}
      <div class="adm-card mb-4">
        <div class="adm-card-header">
          <span class="adm-card-title">Programación de publicación</span>
        </div>
        <div class="adm-card-body">
          <div class="row g-3">
            <div class="col-sm-6">
              <label class="adm-form-label">
                <i class="fa-solid fa-calendar-plus me-1" style="color:var(--g7)"></i>
                Inicio de publicación
              </label>
              <input type="datetime-local" name="publicar_desde_local"
                     class="adm-form-control"
                     value="{{ old('publicar_desde_local', $desde_local ?? '') }}">
              <span class="adm-form-hint">Dejar vacío para publicar inmediatamente.</span>
            </div>
            <div class="col-sm-6">
              <label class="adm-form-label">
                <i class="fa-solid fa-calendar-xmark me-1" style="color:#dc2626"></i>
                Fecha de expiración
              </label>
              <input type="datetime-local" name="publicar_hasta_local"
                     class="adm-form-control"
                     value="{{ old('publicar_hasta_local', $hasta_local ?? '') }}">
              <span class="adm-form-hint">Dejar vacío para no expirar nunca.</span>
            </div>
          </div>

          {{-- Aviso de zona horaria --}}
          <div style="margin-top:1rem;background:#eff6ff;border:1px solid #bfdbfe;border-radius:8px;padding:.75rem 1rem;display:flex;align-items:flex-start;gap:.6rem">
            <i class="fa-solid fa-circle-info" style="color:#1d4ed8;margin-top:.1rem;flex-shrink:0"></i>
            <span style="font-size:.78rem;color:#1e40af">
              Las fechas se interpretan en <strong>hora de Bolivia (UTC-4)</strong>.
              Se almacenan en UTC internamente para funcionar correctamente en cualquier servidor.
            </span>
          </div>

          {{-- Estado actual si existe --}}
          @if($noticia->exists)
            <div style="margin-top:.75rem;display:flex;align-items:center;gap:.6rem">
              <span style="font-size:.75rem;color:#9a9a9a">Estado actual:</span>
              <span class="adm-badge {{ $noticia->statusClass() }}">{{ $noticia->statusLabel() }}</span>
              <span style="font-size:.72rem;color:#9a9a9a">
                (hora Bolivia: {{ \Carbon\Carbon::now('America/La_Paz')->format('d/m/Y H:i') }})
              </span>
            </div>
          @endif
        </div>
      </div>

    </div>

    {{-- Columna lateral --}}
    <div class="col-lg-4">

      {{-- Imagen --}}
      <div class="adm-card mb-4">
        <div class="adm-card-header"><span class="adm-card-title">Imagen</span></div>
        <div class="adm-card-body">
          @if($noticia->exists && $noticia->imagen_url)
            <div class="mb-2 position-relative">
              <img src="{{ Str::startsWith($noticia->imagen_url, '/') ? $noticia->imagen_url : asset($noticia->imagen_url) }}"
                   alt="Imagen actual"
                   style="width:100%;height:140px;object-fit:cover;border-radius:8px">
              <button type="button"
                      onclick="if(confirm('¿Eliminar esta imagen?')) document.getElementById('formQuitarImagen').submit()"
                      style="position:absolute;top:.5rem;right:.5rem;background:rgba(220,38,38,.85);border:none;color:#fff;border-radius:6px;padding:.3rem .6rem;font-size:.72rem;cursor:pointer">
                <i class="fa-solid fa-trash"></i> Quitar
              </button>
            </div>
          @endif

          <label class="adm-form-label">Subir imagen</label>
          <label class="adm-upload-zone d-block" for="imagen">
            <i class="fa-solid fa-cloud-arrow-up"></i>
            <p>Haz clic para seleccionar<br><small>JPG, PNG, WEBP — máx. 4 MB</small></p>
            <input type="file" id="imagen" name="imagen" accept="image/*" style="display:none"
                   onchange="previewImg(this)">
          </label>
          <img id="imgPreview" src="" alt="" style="display:none;width:100%;border-radius:8px;margin-top:.75rem">

          <div class="mt-3">
            <label class="adm-form-label">O pegar URL de imagen</label>
            <input type="url" name="imagen_url" class="adm-form-control"
                   value="{{ old('imagen_url') }}" placeholder="https://...">
            <span class="adm-form-hint">Si subes un archivo, la URL se ignora.</span>
          </div>
        </div>
      </div>

      {{-- Publicación --}}
      <div class="adm-card">
        <div class="adm-card-header"><span class="adm-card-title">Publicación</span></div>
        <div class="adm-card-body">
          <label style="display:flex;align-items:center;gap:.6rem;cursor:pointer">
            <input type="checkbox" name="activo" value="1"
                   style="accent-color:#2D9F3C;width:16px;height:16px"
                   {{ old('activo', $noticia->activo ?? true) ? 'checked' : '' }}>
            <span class="adm-form-label mb-0">Noticia activa</span>
          </label>
          <p class="adm-form-hint mt-1">
            Si está desmarcado, la noticia no se muestra aunque las fechas sean válidas.
          </p>
        </div>
      </div>

    </div>
  </div>

  <div class="d-flex gap-3 mt-2">
    <button type="submit" class="adm-btn-primary">
      <i class="fa-solid fa-floppy-disk"></i>
      {{ $noticia->exists ? 'Guardar cambios' : 'Crear noticia' }}
    </button>
    <a href="{{ route('admin.noticias.index') }}" class="adm-btn-outline">Cancelar</a>
  </div>
</form>

{{-- Form separado para eliminar imagen (fuera del form principal) --}}
@if($noticia->exists)
<form id="formQuitarImagen" method="POST"
      action="{{ route('admin.noticias.imagen.destroy', $noticia) }}"
      style="display:none">
  @csrf @method('DELETE')
</form>
@endif
@endsection

@push('scripts')
<script>
function previewImg(input) {
  var preview = document.getElementById('imgPreview');
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      preview.src = e.target.result;
      preview.style.display = 'block';
    };
    reader.readAsDataURL(input.files[0]);
  }
}
</script>
@endpush
