@extends('admin.layout')
@section('title', $red->exists ? 'Editar red social' : 'Nueva red social')
@section('breadcrumb', 'Configurar enlace de red social')

@section('content')
<div class="row g-4">
  <div class="col-lg-7">
    <form method="POST"
          action="{{ $red->exists ? route('admin.redes.update', $red) : route('admin.redes.store') }}">
      @csrf
      @if($red->exists) @method('PUT') @endif

      <div class="adm-card">
        <div class="adm-card-header"><span class="adm-card-title">Datos de la red social</span></div>
        <div class="adm-card-body">
          <div class="mb-3">
            <label class="adm-form-label">Clase del icono (Font Awesome) <span style="color:#dc2626">*</span></label>
            <input type="text" name="icono" class="adm-form-control"
                   value="{{ old('icono', $red->icono) }}"
                   placeholder="fa-brands fa-facebook" required>
            <span class="adm-form-hint">Ej: fa-brands fa-instagram · fa-brands fa-tiktok · fa-brands fa-linkedin</span>
          </div>
          <div class="mb-3">
            <label class="adm-form-label">Nombre / Label <span style="color:#dc2626">*</span></label>
            <input type="text" name="label" class="adm-form-control"
                   value="{{ old('label', $red->label) }}" placeholder="Facebook" required>
          </div>
          <div class="mb-3">
            <label class="adm-form-label">URL <span style="color:#dc2626">*</span></label>
            <input type="url" name="url" class="adm-form-control"
                   value="{{ old('url', $red->url) }}" placeholder="https://www.facebook.com/..." required>
          </div>
          <div class="row g-3">
            <div class="col-sm-6">
              <label class="adm-form-label">Tipo <span style="color:#dc2626">*</span></label>
              <select name="tipo" class="adm-form-control" required>
                <option value="institucional" {{ old('tipo', $red->tipo) === 'institucional' ? 'selected' : '' }}>Institucional</option>
                <option value="inmerco"       {{ old('tipo', $red->tipo) === 'inmerco'       ? 'selected' : '' }}>INMERCO</option>
              </select>
            </div>
            <div class="col-sm-6">
              <label class="adm-form-label">Orden</label>
              <input type="number" name="orden" class="adm-form-control" min="0"
                     value="{{ old('orden', $red->orden ?? 0) }}">
            </div>
          </div>
        </div>
      </div>

      <div class="d-flex gap-3 mt-3">
        <button type="submit" class="adm-btn-primary">
          <i class="fa-solid fa-floppy-disk"></i>
          {{ $red->exists ? 'Guardar cambios' : 'Crear red social' }}
        </button>
        <a href="{{ route('admin.redes.index') }}" class="adm-btn-outline">Cancelar</a>
      </div>
    </form>
  </div>

  <div class="col-lg-5">
    <div class="adm-card">
      <div class="adm-card-header"><span class="adm-card-title">Iconos disponibles</span></div>
      <div class="adm-card-body">
        <p style="font-size:.78rem;color:#9a9a9a;margin-bottom:1rem">Copia la clase exacta en el campo de icono:</p>
        @foreach([
          ['fa-brands fa-facebook',  'Facebook'],
          ['fa-brands fa-instagram', 'Instagram'],
          ['fa-brands fa-tiktok',    'TikTok'],
          ['fa-brands fa-linkedin',  'LinkedIn'],
          ['fa-brands fa-youtube',   'YouTube'],
          ['fa-brands fa-twitter',   'Twitter / X'],
          ['fa-brands fa-whatsapp',  'WhatsApp'],
        ] as [$cls, $name])
          <div style="display:flex;align-items:center;gap:.75rem;padding:.5rem 0;border-bottom:1px solid #f0f2f0;cursor:pointer"
               onclick="document.querySelector('[name=icono]').value='{{ $cls }}'">
            <div style="width:32px;height:32px;background:#edf8ef;border-radius:7px;display:flex;align-items:center;justify-content:center;color:#2D9F3C">
              <i class="{{ $cls }}"></i>
            </div>
            <div>
              <div style="font-size:.82rem;font-weight:600">{{ $name }}</div>
              <div style="font-size:.7rem;color:#9a9a9a">{{ $cls }}</div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection
