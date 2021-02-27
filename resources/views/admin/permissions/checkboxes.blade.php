<div class="form-group">
    @foreach ($permissions as $id => $name)
    <div class="custom-control custom-checkbox">
    <input name="permissions[]" value="{{$name}}" class="custom-control-input custom-control-input-info custom-control-input-outline" type="checkbox" id="{{$name}}{{$id}}" {{$model->permissions->contains($id) || collect(old('permissions'))->contains($name)?'checked':''}} >
    <label for="{{$name}}{{$id}}" class="custom-control-label">{{$name}}</label>
    </div>
    @endforeach
</div>
