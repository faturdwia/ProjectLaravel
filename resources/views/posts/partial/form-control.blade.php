<div class="mb-3">
    <label for="inputTitle" class="form-label">Title</label>
    <input type="text" class="form-control" id="inputTitle" name="title" value="{{ old('title') ?? $post->title }}">
    @error('title')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="inputBody" class="form-label">Body</label>
    <textarea class="form-control" id="inputBody" name="body">{{ old('body') ?? $post->body }}</textarea>
    @error('body')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="inputCategory" class="form-label">Category</label>
    <select class="form-control" id="inputCategory" name="category_id">
        <option disabled selected>Choose One!</option>
        @foreach ($category as $item)
            <option {{ $item->id == $post->category_id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </select>
    @error('category_id')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="inputTags" class="form-label">Tags</label>
    <select class="form-control select2-multiple" multiple id="inputTags" name="tags[]">
        @foreach ($post->tags as $item)
            <option selected value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
        @foreach ($tag as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </select>
    @error('tags')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<button type="submit" class="btn btn-primary">Submit</button>