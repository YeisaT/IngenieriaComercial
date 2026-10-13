@extends('admin.layout')
@section('title', 'Redes Sociales')
@section('breadcrumb', 'Gestión de enlaces de redes sociales')
@section('topbar-actions')
  <a href="{{ route('admin.redes.create') }}" class="adm-btn-primary">
    <i class="fa-solid fa-plus"></i> Nueva red
  </a>
@endsection

@section('content')
<div class="adm-card">
  <div class="adm-card-body p-0">
    <table class="adm-table">
      <thead>
        <tr>
          <th>Icono</th>
          <th>Red / Label</th>
          <th>URL</th>
          <th>Tipo</th>
          <th>Orden</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @forelse($redes as $r)
          <tr>
            <td>
              <div style="width:36px;height:36px;background:#edf8ef;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:1rem;color:#2D9F3C">
                <i class="{{ $r->icono }}"></i>
              </div>
            </td>
            <td>
              <div style="font-weight:600;font-size:.85rem">{{ $r->label }}</div>
              <div style="font-size:.72rem;color:#9a9a9a">{{ $r->icono }}</div>
            </td>
            <td style="max-width:200px">
              <a href="{{ $r->url }}" target="_blank" style="font-size:.78rem;color:#2D9F3C;word-break:break-all">
                {{ Str::limit($r->url, 40) }}
              </a>
            </td>
            <td>
              <span class="adm-badge {{ $r->tipo === 'institucional' ? 'adm-badge-green' : 'adm-badge-gray' }}">
                {{ ucfirst($r->tipo) }}
              </span>
            </td>
            <td>{{ $r->orden }}</td>
            <td>
              <div class="d-flex gap-2">
                <a href="{{ route('admin.redes.edit', $r) }}" class="adm-btn-outline adm-btn-sm">
                  <i class="fa-solid fa-pen"></i> Editar
                </a>
                <form method="POST" action="{{ route('admin.redes.destroy', $r) }}"
                      onsubmit="return confirm('¿Eliminar esta red social?')">
                  @csrf @method('DELETE')
                  <button type="submit" class="adm-btn-danger adm-btn-sm">
                    <i class="fa-solid fa-trash"></i>
                  </button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr><td colspan="6" style="text-align:center;color:#9a9a9a;padding:2rem">No hay redes registradas.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
