@extends('layouts.app_boot')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">詳細情報</h1>

    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">人材詳細</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <h5>名前</h5>
                    <p class="fs-5">{{ $member->name }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <h5>拠点</h5>
                    <p class="fs-5">{{ $member->base }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <h5>単元</h5>
                    <p class="fs-5">{{ $member->unit }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <h5>レイヤー</h5>
                    <p class="fs-5">{{ $member->layer }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <h5>担当</h5>
                    <p class="fs-5">{{ $member->teacher_id }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <h5>状況</h5>
                    <p class="fs-5">
                        {{ $member->stop_flg == 0 ? 'アクティブ' : '非アクティブ' }}
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <h5>メモ</h5>
                    <p class="fs-5">{{ $member->comment }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-4">
        <a href="{{ route('member.edit', $member->id) }}" class="btn btn-primary btn-lg mx-2">編集</a>
        <a href="{{ route('home') }}" class="btn btn-secondary btn-lg mx-2">戻る</a>
        
        @if($post->status == 0)
            <!-- アクティブの状態の場合 -->
            <form action="{{ route('member.stop', $member->id) }}" method="POST" id="stopForm">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-warning btn-lg mx-2" onclick="return confirmStop()">非アクティブにする</button>
            </form>
        @else
            <!-- 非アクティブの状態の場合 -->
            <form action="{{ route('member.active', $member->id) }}" method="POST" id="activateForm">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-success btn-lg mx-2" onclick="return confirmActivate()">アクティブに復帰</button>
            </form>
        @endif
    </div>
</div>

<script>
    function confirmStop() {
        return confirm("非アクティブにしますか？");
    }

    function confirmActivate() {
        return confirm("アクティブに復帰しますか？");
    }
</script>

@endsection
