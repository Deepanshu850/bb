@php $styleCss = 'style' @endphp
<div class="row mb-3">
    <div class="col-12 col-sm-3 pt-5">
        <select class="form-select" {{$styleCss}}="width: 100%" id="postTypeFilter">
            <option value=""> {{__('messages.post.select_post_type')}}</option>
            @foreach(App\Models\Post::TYPE as $key => $type)
                <option value="{{ $key }}">
                    {{$type}}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-12 col-sm-3 pt-5">
        <select class="form-select" {{$styleCss}}="width: 100%" id="categoryFilter">
            <option value="">{{__('messages.common.select_category')}}</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">
                    {{$category->name}}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-12 col-sm-3 pt-5">
        <select class="form-select" {{$styleCss}}="width: 100%" id="subCategoryFilter">
            <option value=""> {{__('messages.common.select_subcategory')}}</option>
            @foreach($subCategories as $subCategory)
                <option value="{{ $subCategory->id }}">
                    {{$subCategory->name}}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-12 col-sm-3 pt-5">
        <select class="form-select" {{$styleCss}}="width: 100%" id="languageFilter">
            <option value="">{{__('messages.common.select_language')}}</option>
            @foreach(getLanguage() as $key => $language)
                <option value="{{$key}}">
                    {{$language}}
                </option>
            @endforeach
        </select>
    </div>
</div>
