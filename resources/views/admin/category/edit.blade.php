@extends('admin.layout.adminMaster')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/h-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('upperScript')
    <script src="{{ asset('js/admin/regEx.js') }}"></script>
@endsection

@section('title')
    <title>Sửa Thể Loại</title>
@endsection

@section('content')
    @include('admin.category.menu')

    <div class="container">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif

        @if (session('noti'))
            <div class="alert alert-success">
                {{ session('noti') }}
            </div>
        @endif
        <div class="form">
            <form action="{{ route('post-edit-category') }}" method="post">
                {{ csrf_field() }}
                <div class="div-input">
                    <label for="category_name" class="myLabel">Tên thể loại</label>
                    <input type="text" name="category_name" id="category_name" 
                            value="{{ $data->category_name }}" class="input" maxlength="50">
                </div>
                <div class="div-input">
                    <label for="category_fullname" class="myLabel">Tên đầy đủ của thể loại</label>
                    <input type="text" name="category_fullname" id="category_fullname" 
                            value="{{ $data->category_fullname }}" class="input" maxlength="100">
                </div>
                <div class="div-input">
                    <label for="category_platform" class="myLabel">Nền tảng</label>
                    <select name="category_platform[]" id="category_platform"
                            class="selectpicker" multiple data-width="25em" data-size="5"
                            data-actions-box="true" data-dropup-auto="false"
                            data-live-search="true" data-icon-base="fas" data-tick-icon="fa-check">
                        @foreach ($listPlatform as $item)
                            <option value="{{ $item->platform_id }}"
                                @foreach ($listCatePlat as $value)
                                    @if ($value->platform_id == $item->platform_id) 
                                        {{ "selected" }} {{-- Su dung de chon cac nen tang cua the loai --}}
                                    @endif
                                @endforeach>{{ $item->platform_name }}</option>
                        @endforeach
                    </select>
                    <p id="invalid-platform" class="error">ok</p>
                </div>
                <input type="hidden" name="category_id" value="{{ $data->category_id }}">
                <div class="div-btn">
                    <input type="reset" value="Nhập lại" class="input-button">
                    <input type="submit" value="Sửa" class="input-button">
                </div>
            </form>
        </div>
    </div>
@endsection

@section('lowerScript')
    <script>
        let name = document.getElementById('category');
        name.className = 'list active';

        let xMenu = document.getElementById('edit');
        xMenu.className = 'content-list active';
    </script>
@endsection