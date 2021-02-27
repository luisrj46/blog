<div class="form-group">
    @foreach ($roles as $role)
    <div class="custom-control custom-checkbox">
        <input name="roles[]" value="{{$role->name}}" class="custom-control-input custom-control-input-info custom-control-input-outline" type="checkbox" id="{{$role->name}}{{$role->id}}" {{$user->roles->contains($role->id)?'checked':''}} >
        <label for="{{$role->name}}{{$role->id}}" class="custom-control-label">{{$role->name}}</label><br>
    <small class="text-muted">{{$role->permissions->pluck('name')->implode(', ')}}</small>
    </div>
    @endforeach
</div>
