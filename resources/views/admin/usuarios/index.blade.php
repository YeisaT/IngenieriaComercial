@extends('admin.layout')
@section('title', 'Usuarios')
@section('breadcrumb', 'Gestión de accesos al sistema')
@section('topbar-actions')
  <a href="{{ route('admin.usuarios.create') }}" class="adm-btn-primary">
    <i class="fa-solid fa-plus"></i> Nuevo usuario
  </a>
@endsection

@section('content')
<div class="adm-card">
  <div class="adm-card-body p-0">
    <table class="adm-table">
      <thead>
        <tr>
          <th>Usuario</th>
          <th>Correo</th>
          <th>Rol</th>
          <th>Registrado</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($usuarios as $u)
          <tr>
            <td>
              <div style="display:flex;align-items:center;gap:.75rem">
                <div style="width:34px;height:34px;border-radius:50%;background:#2D9F3C;display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:.82rem;flex-shrink:0">
                  {{ strtoupper(substr($u->name, 0, 1)) }}
                </div>
                <span style="font-weight:600;font-size:.85rem">{{ $u->name }}</span>
                @if($u->id === auth()->id())
                  <span class="adm-badge adm-badge-green" style="font-size:.65rem">Tú</span>
                @endif
              </div>
            </td>
            <td style="font-size:.82rem">{{ $u->email }}</td>
            <td>
              <span class="adm-badge {{ $u->role === 'admin' ? 'adm-badge-green' : 'adm-badge-gray' }}">
                {{ ucfirst($u->role) }}
              </span>
            </td>
            <td style="font-size:.78rem;color:#9a9a9a">{{ $u->created_at->format('d/m/Y') }}</td>
            <td>
              <div class="d-flex gap-2">
                <a href="{{ route('admin.usuarios.edit', $u) }}" class="adm-btn-outline adm-btn-sm">
                  <i class="fa-solid fa-pen"></i> Editar
                </a>
                @if($u->id !== auth()->id())
                  <form method="POST" action="{{ route('admin.usuarios.destroy', $u) }}"
                        onsubmit="return confirm('¿Eliminar al usuario {{ $u->name }}?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="adm-btn-danger adm-btn-sm">
                      <i class="fa-solid fa-trash"></i>
                    </button>
                  </form>
                @endif
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
