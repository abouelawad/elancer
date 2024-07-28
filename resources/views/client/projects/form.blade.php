<div class="form-group">
  <x-projects.input
          label='Title' id='title' 
          type='text'
          name='title'
          value="{{$project->title}}"
          
  />
</div>
<div class="form-group">
  <x-projects.input
          label='Description' id='description' 
          type='text'
          name='description'
          value="{{$project->description}}"
          
  />
</div>




{{-- <div class="form-group">
<label for="description">Description</label>
<textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description">{{ old('description',$category->description) }}</textarea>
@error('description')
    <p class="invalid-feedback">{{ $message }} </p>
@enderror
</div> --}}

<div class="form-group">

      {{-- <label for="parent_id">Parent</label>
      <select id="parent_id" class="form-control" name="parent_id">
          <option value="">No parent</option>
          @foreach ($categories as $cat)
            
          @if($cat->id !=$category->id )
          <option value="{{ $cat->id }}" @if($cat->id== old('parent_id',$category->parent_id )) selected @endif>{{  $cat->name }}</option>
          @endif
          @endforeach
      </select> --}}
<x-categories.select  
  label='Status' id='status'
  name='status'
  selection="{{ $project->status }}"
  {{-- :collection="$statuses->pluck('status','id')" --}}
  selectedId="{{ $project->id }}"
/>

</div>

{{-- <div class="form-group">
  <label for="file">File</label>
  <input type="file" class="form-control" name="image" id="image">
</div> --}}