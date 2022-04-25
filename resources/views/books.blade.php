@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        <div class="card-title">
            見積もり希望図面登録
        </div>
        
        <!-- ↓バリデーションエラーの表示に使用-->
        @include('common.errors')
        <!-- ↑バリデーションエラーの表示に使用-->

        <!-- 本登録フォーム -->
        @if(Auth::check())
            <form action="{{ url('books') }}" enctype="multipart/form-data" method="POST" class="form-horizontal">
                @csrf
                <!-- 本のタイトル -->
                <div class="form-group col-md-6 p-2">
                    <label for="item_name" class="col-sm-3 control-label">メーカー</label>
                    <input type="text" name="item_name" class="form-control" id="item_name" value="{{ old('item_name') }}">
                </div>
                <!-- 冊数 -->
                <div class="form-group col-md-6 p-2">
                    <label for="item_number" class="col-sm-3 control-label">商品の種類</label>
                    <input type="text" name="item_number" class="form-control" id="item_number" value="{{ old('item_number') }}">
                </div>
                <!-- 金額 -->
                <div class="form-group col-md-6 p-2">
                    <label for="item_amount" class="col-sm-3 control-label">カラー</label>
                    <input type="text" name="item_amount" class="form-control" id="item_amount" value="{{ old('item_amount') }}">
                </div>
                <!-- 公開日 -->
                <div class="form-group col-md-6 p-2">
                    <label for="published" class="col-sm-3 control-label">見積り受取り希望日</label>
                    <input type="date" name="published" class="form-control" id="published" value="{{ old('published') }}">
                </div>
                <!-- 画像 -->
                <div class="form-group col-md-6 p-2">
                    <label for="published" class="col-sm-3 control-label">画像アップロード</label>
                    <!--<input type="submit" name="published" class="form-control" id="image" value="{{ old('image') }}">-->
                    <input type="file" name="imgpath" value="{{ old('image') }}">
                    <!--<input type="submit" value="アップロードする">-->
                </div>
                
                <!--<form action="/upload" enctype="multipart/form-data" method="post">-->
                <!--    @csrf-->
                <!--    <input type="file" name="imgpath">-->
                <!--    <input type="submit" value="アップロードする">-->
                <!--</form>-->
                    
                <!-- 登録ボタン -->
                <div class="form-group p-2">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-primary">
                            見積もりを申込む
                        </button>
                    </div>
                </div>
            </form>
        @endif
    </div>
	<!-- Book: 既に登録されてる本のリスト -->
    @if (count($books) > 0)
        <div class="card-body">
            <table class="table table-striped task-table">
                <!-- テーブルヘッダ -->
                <thead>
                    <th>見積もり状況</th>
                    <th>&nbsp;</th>
                </thead>
                <!-- テーブル本体 -->
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <!-- 本タイトル -->
                            <td class="table-text">
                                <div>{{ $book->item_name }}</div>
                            </td>
                                <!-- 登録者名 ↓ここを追加-->
                            <td class="table-text">
                                <div>{{ $book->user->name }}</div>
                            </td>
                            <td>
                             @if($book->user_id === Auth::id())
                                    <form action="{{ url('book/'.$book->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">
                                            削除
                                        </button>
                                    </form>
                                @endif
                            </td>
                            <!-- 本: 更新ボタン -->
                            <td>
                                @if($book->user_id === Auth::id())
                                    <a href="{{ url('booksedit/'.$book->id) }}">
                                        <button type="submit" class="btn btn-primary">更新</button>
                                    </a>
                                @endif
                            </td>
                            <!-- Likeボタン -->
                            <td>
                            	@if($book->favoriteBook()->where('user_id',Auth::id())->exists() === false)
                                	<form action="{{ url('book/'.$book->id.'/like') }}" method="POST">
                                		{{ csrf_field() }}
                                		<button type="submit" class="btn btn-outline-warning">
                                		    Like
                                		</button>
                                	</form>
                            	@endif
                            	@if($book->favoriteBook()->where('user_id',Auth::id())->exists() === true)
                                	<form action="{{ url('book/'.$book->id.'/unlike') }}" method="POST">
                                		{{ csrf_field() }}
                                		<button type="submit" class="btn btn-warning">
                                		    Unlike
                                		</button>
                                	</form>
                            	@endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection