@extends('layouts.app_boot')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">{{ $teacher->name }} 担当メンバー</h1>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            {{ $teacher->name }} のメンバー一覧
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>人材詳細</th>
                        <th>名前</th>
                        <th>単元</th>
                        <th>拠点</th>
                        <th>開始日</th>
                        <th>レイヤー</th>
                        <th>担当</th>
                        <th>状況</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>人材詳細</th>
                        <th>名前</th>
                        <th>単元</th>
                        <th>拠点</th>
                        <th>開始日</th>
                        <th>レイヤー</th>
                        <th>担当</th>
                        <th>状況</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($members as $member)
                    <tr>
                        <td><a href="{{ route('member.show', $member->id) }}">詳細</a></td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->unit }}</td>
                        <td>{{ $member->base }}</td>
                        <td>{{ $member->date }}</td>
                        <td>{{ $member->layer ?? '未設定' }}</td>
                        <td>{{ $member->teacher->name ?? '未設定' }}</td>
                        <td>
                            @if ($member->stop_flg == 0)
                            アクティブ
                            @else
                            非アクティブ
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection