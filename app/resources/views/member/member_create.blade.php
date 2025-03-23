@extends('layouts.app_boot')

@section('content')
<h2>人材追加</h2>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<form class="row g-3" action="{{ route('member.store') }}" method="POST">
    @csrf
    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">名前</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="col-md-6">
        <label for="inputState" class="form-label">担当</label>
        <select id="inputState" class="form-select" name="teacher_id">
            @include('profile.partials.teacher')
        </select>
    </div>

    <div class="col-md-6">
        <label for="inputState" class="form-label">拠点</label>
        <select id="inputState" class="form-select" name="base">
            @include('profile.partials.base')
        </select>
    </div>
    <div class="col-md-6">
        <label for="inputState" class="form-label">単元</label>
        <select id="inputState" class="form-select" name="unit">
            @include('profile.partials.unit')
        </select>
    </div>

    <div class="col-md-6">
        <label for="inputState" class="form-label">レイヤー</label>
        <select id="inputState" class="form-select" name="layer">
            @include('profile.partials.layer')
        </select>
    </div>

    <!-- 日付入力欄を追加 -->
    <div class="col-md-6">
        <label for="inputDate" class="form-label">カリキュラム開始日</label>
        <input type="date" class="form-control" id="inputDate" name="date">
    </div>

    <div class="col-12 d-flex justify-content-center">
        <a href="{{ route('home') }}" class="btn btn-secondary btn-lg mx-2">戻る</a>
        <button type="submit" class="btn btn-primary" style="width: auto;">人材追加</button>
    </div>
</form>
@endsection