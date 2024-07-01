@extends('backend/layout.template')
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Kategori Menu</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        <form action="{{ route('kategorimenu.add')}}" method="get" style="display: contents">
                            @method('get')
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></button>
                        </form>
                        Tambah Menu
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Kategori</th>
                                    <th>Child Menu</th>
                                    <th>Type Menu</th>
                                    <th>Visiblity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $keys => $item)
                                <tr>
                                    <th>{{$keys+1 }}</th>
                                    <td>{{$item->namaKate }}</td>
                                    <td>@if (!empty($item->parents))
                                        <span class="badge bg-info text-white">{{ $item->parents->namaKate }}</span>
                                        @else
                                        <span class="badge bg-primary text-white">MENU UTAMA</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->type === 'page')
                                        <form action="{{ route('kategorimenu.updatetype', [$item->id, $item->type,$item->slug]) }}" method="POST">
                                            @method('put')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm text-light" onclick="return confirm('Change To Article, Are You Sure?')">
                                                <i class='bx bxs-bookmarks' ></i> Page
                                            </button>
                                        </form>
                                        @else
                                        <form action="{{ route('kategorimenu.updatetype', [$item->id, $item->type,$item->slug]) }}" method="POST">
                                            @method('put')
                                            @csrf
                                            <button type="submit" class="btn btn-primary btn-sm text-light" onclick="return confirm('Change To Page, Are You Sure?')">
                                            <i class='bx bx-news'></i> Articles
                                            </button>
                                        </form>
                                            
                                        @endif
                                    </td>
                                    <td class="color-primary">
                                        @if ($item->menustatus === 0)
                                        <form action="{{ route('kategorimenu.updatestatus', [$item->id, $item->menustatus,$item->slug]) }}" method="POST">
                                            @method('put')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Change to Visible, Are You Sure?')">
                                                <i class='bx bx-hide' ></i> Hide
                                            </button>
                                        </form>
                                        @else
                                        <form action="{{ route('kategorimenu.updatestatus', [$item->id, $item->menustatus,$item->slug]) }}" method="POST">
                                        @method('put')
                                        @csrf
                                        <button type="submit" class="btn btn-warning btn-sm text-light" onclick="return confirm('Change to Hide, Are You Sure?')">
                                            <i class='bx bx-show' ></i> Visible
                                        </button>
                                        </form>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{route('kategorimenu.editmenu',$item->slug) }}" method="post" style="display: contents">
                                            @method('get')
                                            @csrf
                                                <button class="btn btn-success btn-sm">
                                                    <i class="fa fa-edit text-white"></i>
                                                </button>
                                        </form>
                                        {{-- @if (!empty($item->parents)) --}}
                                        <form action="{{ route('delMenu',$item->id) }}" method="POST" style="display: contents">
                                            @method("delete")
                                            @csrf
                                            <button class="btn btn-danger btn-sm mt-1" type="submit" onclick="return confirm('Are You Sure?')">
                                            <i class="fa fa-trash"></i></button>
                                        </form>
                                        {{-- @endif --}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation pagination pagination-sm justify-content-end">
                            {{ $categories->onEachSide(5)->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection