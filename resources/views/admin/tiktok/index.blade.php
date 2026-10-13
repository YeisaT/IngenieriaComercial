@extends('admin.layout')
@section('title', 'TikTok Reels')
@section('breadcrumb', 'Gestión de reels de TikTok')
@section('topbar-actions')
  <a href="{{ route('admin.tiktok.create') }}" class="adm-btn-primary">
    <i class="fa-solid fa-plus"></i> Nuevo reel
  </a>
@endsection

@section('content')
<div class="adm-card">
  <div class="adm-card-body p-0">
    <table class="adm-table">
      <thead>
        <tr>
          <th>Portada</th>
          <th>Título</th>
          <th>Vistas</th>
          <th>Link</th>
          <th>Orden</th>
          <th>Estado</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @forelse($reels as $r)
          <tr>
            <td>
              <img src="{{ Str::startsWith($r->imagen_url, '/') ? $r->imagen_url : asset($r->imagen_url) }}"
                   style="width:42px;height:72px;object-fit:cover;border-radius:6px;background:#f0f2f0">
            </td>
            <td style="font-size:.85rem;max-width:180px">
              {{ $r->titulo ?? '—' }}
            </td>
            <td style="font-size:.82rem">{{ $r->vistas ?? '—' }}</td>
            <td>
              <a href="{{ $r->link }}" target="_blank" rel="noopener"
                 style="font-size:.75rem;color:var(--g7);word-break:break-all">
                {{ Str::limit($r->link, 35) }}
              </a>
            </td>
            <td>{{ $r->orden }}</td>
            <td>
              <span class="adm-badge {{ $r->activo ? 'adm-badge-green' : 'adm-badge-gray' }}">
                {{ $r->activo ? 'Activo' : 'Inactivo' }}
              </span>
            </td>
            <td>
              <div class="d-flex gap-2">
                <a href="{{ route('admin.tiktok.edit', $r) }}" class="adm-btn-outline adm-btn-sm">
                  <i class="fa-solid fa-pen"></i> Editar
                </a>
                <form method="POST" action="{{ route('admin.tiktok.destroy', $r) }}"
                      onsubmit="return confirm('¿Eliminar este reel?')">
                  @csrf @method('DELETE')
                  <button type="submit" class="adm-btn-danger adm-btn-sm">
                    <i class="fa-solid fa-trash"></i>
                  </button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr><td colspan="7" style="text-align:center;color:#9a9a9a;padding:2rem">No hay reels registrados.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
