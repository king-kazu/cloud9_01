@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <div class="alert alert-primary">
                        <div>管理者ページサンプル</div>
                        <div>UserモデルからBookモデルを呼んで、booksテーブルからデータを取得</div>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <th>ユーザー名</th>
                            <th>登録した本</th>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                @if($user->books() !== null)
                                <td>
                                    <ul>
                                        @foreach ($user->books as $book)
                                            <li>{{$book->item_name}}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!--ここを編集-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
