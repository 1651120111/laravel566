<form action="" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Tên danh mục:</label>
        <input type="text" class="form-control" name="name" placeholder="Tên danh mục" value=" {{ old('name',isset($category->c_name)?$category->c_name:'') }}">
        @if($errors->has('name'))
            <span class="error-text">
			            {{$errors->first('name')}}
			        </span>
        @endif
    </div>
    <div class="form-group">
        <label for="name">Icon:</label>
        <input type="text" name="icon" class="form-control" placeholder="fa fa home" value=" {{ old('icon',isset($category->c_icon)?$category->c_icon:'') }}">
        @if($errors->has('icon'))
            <span class="error-text">
			            {{$errors->first('icon')}}
			        </span>
        @endif
    </div>
    <div class="form-group">
        <label for="name">Meta title:</label>
        <input type="text" class="form-control" name="c_title_seo" placeholder="Meta title" value=" {{ old('c_title_seo',isset($category->c_title_seo)?$category->c_title_seo:'') }} ">
    </div>
    <div class="form-group">
        <label for="name">Meta Decription:</label>
        <input type="text" class="form-control" name="c_decription_seo" placeholder="Meta Decription" value=" {{ old('c_decription_seo',isset($category->c_decription_seo)?$category->c_decription_seo:'') }} ">
    </div>

    <div class="form-group">
        <div class="checkbox">
            <label><input type="checkbox" name="hot">Nổi bật</label>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Lưu thông tin</button>
</form>
