@extends('layouts.app_boot')

@section('content')
<h2>人材編集</h2>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<form class="row g-3" action="{{ route('member.update', $member->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- HTTPメソッドをPUTに指定 -->

    <div class="col-md-6">
        <label for="name" class="form-label">名前</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $member->name) }}">
    </div>
    <div class="col-md-6">
        <label for="inputState" class="form-label">担当</label>
        <select id="inputState" class="form-select" name="incharge">
            @include('profile.partials.teacher', ['selected' => $member->teacher_id])
        </select>
    </div>

    <div class="col-md-6">
        <label for="inputState" class="form-label">拠点</label>
        <select id="inputState" class="form-select" name="base">
            @include('profile.partials.base', ['selected' => $member->base])
        </select>
    </div>
    <div class="col-md-6">
        <label for="inputState" class="form-label">単元</label>
        <select id="inputState" class="form-select" name="unit">
            @include('profile.partials.unit', ['selected' => $member->unit])
        </select>
    </div>

    <div class="col-md-6">
        <label for="inputState" class="form-label">レイヤー</label>
        <select id="inputState" class="form-select" name="layer">
            @include('profile.partials.layer', ['selected' => $member->layer])
        </select>
    </div>

    <!-- 日付入力欄 -->
    <div class="col-md-6">
        <label for="inputDate" class="form-label">カリキュラム開始日</label>
        <input type="date" class="form-control" id="inputDate" name="date" value="{{ old('date', $member->date) }}">
    </div>

    <!-- コメント欄 -->
    <div class="col-md-12">
        <label for="comments" class="form-label">コメント</label>
        <textarea class="form-control" id="comments" name="comments" rows="3">{{ old('comment', $member->comment) }}</textarea>
    </div>

    <div class="col-12 d-flex justify-content-center">
        <a href="{{ route('home') }}" class="btn btn-secondary btn-lg mx-2">戻る</a>
        <button type="submit" class="btn btn-primary" style="width: auto;">更新</button>
    </div>
</form>
@endsection