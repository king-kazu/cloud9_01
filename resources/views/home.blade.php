@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                   <div class="alert alert-primary">
        <div>マイページサンプル</div>
        <div>ログインユーザーの情報のみ表示</div>
    </div>
    <table class="table table-striped task-table">
        <!-- テーブルヘッダ -->
        <thead>
            <th>本一覧</th>
            <th>&nbsp;</th>
        </thead>
        <!-- テーブル本体 -->
        <tbody>
            @if(isset($books))
                @foreach ($books as $book)
                    <tr>
                        <!-- 本タイトル -->
                        <td class="table-text">
                            <div>{{ $book->item_name }}</div>
                        </td>
                        <td>
                            <form action="{{ url('book/'.$book->id.'/like') }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">
                                    削除
                                </button>
                            </form>
                        </td>
                        <!-- 本: 更新ボタン -->
                        <td>
                            <a href="{{ url('booksedit/'.$book->id) }}">
                                <button type="submit" class="btn btn-primary">更新</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
