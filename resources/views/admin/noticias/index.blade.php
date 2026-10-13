@extends('admin.layout')
@section('title', 'Noticias')
@section('breadcrumb', 'Gestión de noticias del carrusel')
@section('topbar-actions')
  <a href="{{ route('admin.noticias.create') }}" class="adm-btn-primary">
    <i class="fa-solid fa-plus"></i> Nueva noticia
  </a>
@endsection

@section('content')
<div class="adm-card">
  <div class="adm-card-body p-0">
    <table class="adm-table">
      <thead>
        <tr>
          <th>Imagen</th>
          <th>Título</th>
          <th>Fecha</th>
          <th>Publicación (Bolivia)</th>
          <th>Estado</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @forelse($noticias as $n)
          <tr>
            <td>
              <img src="{{ Str::startsWith($n->imagen_url, '/') ? $n->imagen_url : asset($n->imagen_url) }}"
                   alt="{{ $n->titulo }}"
                   style="width:72px;height:48px;object-fit:cover;border-radius:6px;background:#f0f2f0">
            </td>
            <td style="max-width:220px">
              <div style="font-weight:600;font-size:.85rem">{{ $n->titulo }}</div>
              <div style="font-size:.72rem;color:#9a9a9a;margin-top:.2rem">Orden: {{ $n->orden }}</div>
            </td>
            <td style="font-size:.82rem">{{ $n->fecha }}</td>
            <td style="font-size:.75rem;color:#5a5a5a;min-width:160px">
              @if($n->publicar_desde)
                <div><span style="color:#9a9a9a">Desde:</span>
                  {{ $n->publicar_desde->copy()->setTimezone('America/La_Paz')->format('d/m/Y H:i') }}
                </div>
              @else
                <div style="color:#9a9a9a">Inmediata</div>
              @endif
              @if($n->publicar_hasta)
                <div><span style="color:#9a9a9a">Hasta:</span>
                  {{ $n->publicar_hasta->copy()->setTimezone('America/La_Paz')->format('d/m/Y H:i') }}
                </div>
              @else
                <div style="color:#9a9a9a">Sin expiración</div>
              @endif
            </td>
            <td>
              <span class="adm-badge {{ $n->statusClass() }}">
                {{ $n->statusLabel() }}
              </span>
            </td>
            <td>
              <div class="d-flex gap-2">
                <a href="{{ route('admin.noticias.edit', $n) }}" class="adm-btn-outline adm-btn-sm">
                  <i class="fa-solid fa-pen"></i> Editar
                </a>
                <form method="POST" action="{{ route('admin.noticias.destroy', $n) }}"
                      onsubmit="return confirm('¿Eliminar esta noticia?')">
                  @csrf @method('DELETE')
                  <button type="submit" class="adm-btn-danger adm-btn-sm">
                    <i class="fa-solid fa-trash"></i>
                  </button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr><td colspan="6" style="text-align:center;color:#9a9a9a;padding:2rem">No hay noticias registradas.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
