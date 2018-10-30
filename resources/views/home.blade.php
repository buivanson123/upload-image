@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Danh sách ảnh
                        <a class="btn btn-primary btn-sm float-right" data-toggle="modal" href="#modal-id">Upload ảnh</a>
                        <a id="btn-test" data-toggle="modal">Test</a>
                    </div>
                    <div class="card-body row" id="image-item-row">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<div class="modal fade" id="modal-id">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form method="POST" enctype="multipart/form-data" action="{{ route('image') }}">
            <div class="modal-body">
                @csrf
              <div class="row" id="conten-modal-image">
                  <div class="col-md-2 item">
                     <div class="group-chose-file">
                         <input type="file" accept="image/*" name="image[]" value="" class="form-control-file"  placeholder="Chọn ảnh">
                         <button type="button" class="btn btn-default">Chọn ảnh</button>
                     </div>
                  </div>
              </div>
            </div>
                <div class="modal-footer">
                    {{--<input id="f02" type="file" placeholder="Add profile picture" />--}}
                    {{--<label for="f02">Add profile picture</label>--}}


                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary" id="btn-upload">Upload</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
