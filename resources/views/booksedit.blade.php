@extends('layouts.app')
@section('content')
    <div class="row container">
        <div class="col-md-12">
            <!-- ↓バリデーションエラーの表示に使用-->
						@include('common.errors')
            <!-- ↑バリデーションエラーの表示に使用-->
            <form action="{{ url('books/update') }}" method="POST">
                <!-- item_name -->
                <div class="form-group p-2">
                    <label for="item_name">タイトル</label>
                    <input type="text" name="item_name" class="form-control" id="item_name" value="{{$book->item_name}}">
                </div>
                <!--/ item_name -->
                
                <!-- item_number -->
                <div class="form-group p-2">
                    <label for="item_number">冊数</label>
                    <input type="text" name="item_number" class="form-control" id="item_number" value="{{$book->item_number}}">
                </div>
                <!--/ item_number -->
                
                <!-- item_amount -->
                <div class="form-group p-2">
                    <label for="item_amount">金額</label>
                    <input type="text" name="item_amount" class="form-control" id="item_amount" value="{{$book->item_amount}}">
                </div>
                <!--/ item_amount -->
                
                <!-- published -->
                <div class="form-group p-2">
                    <label for="published">公開日</label>
                    <input type="date" name="published" class="form-control" id="published" value="{{$book->published}}">
                </div>
                <!--/ published -->
                
                <!-- Save ボタン/Back ボタン -->
                <div class="form-group p-2">
	                <div class="well well-sm">
	                    <button type="submit" class="btn btn-primary">Save</button>
	                    <a class="btn btn-link pull-right" href="{{ url('/') }}"> Back</a>
	                </div>
                </div>
                <!--/ Save ボタン/Back ボタン -->
                
                <!-- id 値を送信 -->
                <input type="hidden" name="id" value="{{$book->id}}" />
                <!--/ id 値を送信 -->
                
                <!-- CSRF -->
                @csrf
                <!--/ CSRF -->
            </form>
        </div>
    </div>
@endsection