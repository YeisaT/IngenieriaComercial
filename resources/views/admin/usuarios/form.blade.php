@extends('admin.layout')
@section('title', $usuario->exists ? 'Editar usuario' : 'Nuevo usuario')
@section('breadcrumb', $usuario->exists ? 'Modificar datos del usuario' : 'Crear nuevo acceso al sistema')

@section('content')
<div class="row g-4">
  <div class="col-lg-6">
    <form method="POST"
          action="{{ $usuario->exists ? route('admin.usuarios.update', $usuario) : route('admin.usuarios.store') }}">
      @csrf
      @if($usuario->exists) @method('PUT') @endif

      <div class="adm-card">
        <div class="adm-card-header"><span class="adm-card-title">Datos del usuario</span></div>
        <div class="adm-card-body">
          <div class="mb-3">
            <label class="adm-form-label">Nombre completo <span style="color:#dc2626">*</span></label>
            <input type="text" name="name" class="adm-form-control"
                   value="{{ old('name', $usuario->name) }}" required>
          </div>
          <div class="mb-3">
            <label class="adm-form-label">Correo electrónico <span style="color:#dc2626">*</span></label>
            <input type="email" name="email" class="adm-form-control"
                   value="{{ old('email', $usuario->email) }}" required>
          </div>
          <div class="mb-3">
            <label class="adm-form-label">Rol <span style="color:#dc2626">*</span></label>
            <select name="role" class="adm-form-control" required>
              <option value="admin"  {{ old('role', $usuario->role) === 'admin'  ? 'selected' : '' }}>Administrador</option>
              <option value="editor" {{ old('role', $usuario->role) === 'editor' ? 'selected' : '' }}>Editor</option>
            </select>
          </div>
          <div class="mb-1">
            <label class="adm-form-label">
              Contraseña {{ $usuario->exists ? '(dejar vacío para no cambiar)' : '' }}
              @if(!$usuario->exists)<span style="color:#dc2626">*</span>@endif
            </label>
            <input type="password" name="password" class="adm-form-control"
                   {{ !$usuario->exists ? 'required' : '' }}
                   autocomplete="new-password">
            <span class="adm-form-hint">Mínimo 8 caracteres, mayúsculas, minúsculas y números.</span>
          </div>
        </div>
      </div>

      <div class="d-flex gap-3 mt-3">
        <button type="submit" class="adm-btn-primary">
          <i class="fa-solid fa-floppy-disk"></i>
          {{ $usuario->exists ? 'Guardar cambios' : 'Crear usuario' }}
        </button>
        <a href="{{ route('admin.usuarios.index') }}" class="adm-btn-outline">Cancelar</a>
      </div>
    </form>
  </div>

  <div class="col-lg-6">
    <div class="adm-card">
      <div class="adm-card-header"><span class="adm-card-title">Roles del sistema</span></div>
      <div class="adm-card-body">
        <div style="padding:1rem;background:#edf8ef;border-radius:8px;margin-bottom:.75rem">
          <div style="font-weight:700;font-size:.85rem;color:#1a5c28;margin-bottom:.35rem">Administrador</div>
          <p style="font-size:.78rem;color:#2e2e2e;margin:0">Acceso completo al panel. Puede gestionar noticias, redes sociales y usuarios del sistema.</p>
        </div>
        <div style="padding:1rem;background:#f0f2f0;border-radius:8px">
          <div style="font-weight:700;font-size:.85rem;color:#2e2e2e;margin-bottom:.35rem">Editor</div>
          <p style="font-size:.78rem;color:#5a5a5a;margin:0">Acceso limitado. Puede gestionar noticias y redes sociales, pero no puede administrar usuarios.</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
