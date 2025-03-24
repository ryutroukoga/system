@extends('layouts.app_boot')

@section('content')
<h2>講師追加</h2>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<form class="row g-3" action="{{ route('teacher.store') }}" method="POST">
    @csrf
    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">名前</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="col-md-6">
        <label for="inputState" class="form-label">拠点</label>
        <select id="inputState" class="form-select" name="base">
            @include('profile.partials.base')
        </select>
    </div>
    <div class="col-12 d-flex justify-content-center">
        <a href="{{ route('home') }}" class="btn btn-secondary btn-lg mx-2">戻る</a>
        <button type="submit" class="btn btn-primary" style="width: auto;">講師登録</button>
    </div>
</form>
@endsection