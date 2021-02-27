@csrf
                      <div class="form-group">
                          <label for="name" >Identificador:</label>
                          @if ($role->exists)
                            <input disabled type="text"  class="form-control" value="{{$role->name}}">

                          @else
                            <input  type="text" name="name" class="form-control" value="{{old('display_name',$role->name)}}">

                          @endif
                      </div>
                      <div class="form-group">
                          <label for="display_name" >Nombre:</label>
                      <input type="text" name="display_name" class="form-control" value="{{old('display_name',$role->display_name)}}">
                      </div>

                      <div class="row">


                        <div class="form-group col-md-6">
                            <label for="password" >Permisos</label>
                            @include('admin.permissions.checkboxes',['model'=>$role])

                        </div>
                      </div>
