@extends('back.layouts.master')
@section('title','Tum makaleler')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            <a href="{{route('admin.trashed.article')}}" class="btn btn-warning btn-sm"><i class="fa fa-frash"></i>Silinen makaleler</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Fotograf</th>
                        <th>Baslig</th>
                        <th>Kategori</th>
                        <th>Goruntuleme sayi</th>
                        <th>Olusturma tarixi</th>
                        <th>Salary</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td><img src="{{$article->image}}" width="300"></td>
                            <td>{{$article->title}}</td>
                            <td>{{$article->getCategory->name}}</td>
                            <td>{{$article->hit}}</td>
                            <td>{{$article->created_at->diffForHumans()}}</td>
                            <td>
                                <a href="#" title="Goruntule" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                <a href="{{route('admin.makaleler.edit',$article->id)}}" title="Duzenle" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                <form method="post" action="{{route('admin.makaleler.destroy',$article->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
{{--@section('css')--}}
{{--    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">--}}
{{--@endsection--}}

{{--@section('js')--}}
{{--    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>--}}
{{--@endsection--}}
