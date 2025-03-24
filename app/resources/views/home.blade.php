@extends('layouts.app_boot')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">進捗状況確認システム</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">～開発中～</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">フロントエンド</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">サーバーサイド基礎</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Laravel</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">自作課題</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Area Chart Example
                </div>
                <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    レイヤー分布図
                </div>
                <div class="card-body">
                    <canvas id="myBarChart" width="100%" height="40"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            アカデミア情報記載予定
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
<script>
    // DOMが完全に読み込まれてからスクリプトを実行
    document.addEventListener("DOMContentLoaded", function() {
        var ctx = document.getElementById("myBarChart").getContext("2d");

        // PHPからJavaScriptへ安全にデータを渡す
        var layerCounts = @json($layerCounts);

        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["レイヤー1", "レイヤー2", "レイヤー3", "レイヤー4", "レイヤー5", '非アクティブ'],
                datasets: [{
                    label: "人数",
                    backgroundColor: "rgba(2,117,216,1)",
                    borderColor: "rgba(2,117,216,1)",
                    data: [
                        layerCounts['1'],
                        layerCounts['2'],
                        layerCounts['3'],
                        layerCounts['4'],
                        layerCounts['5'],
                    ],
                }],
            },
            options: {
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            maxTicksLimit: 6
                        }
                    },
                    y: {
                        ticks: {
                            min: 0,
                            max: 20,
                            maxTicksLimit: 5
                        },
                        grid: {
                            display: true
                        }
                    }
                },
                legend: {
                    display: false
                }
            }
        });
    });
</script>
@endsection