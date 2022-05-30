@extends('layouts.dashboard.index', ['activePage' => 'roles', 'titlePage' => 'Editar Rol'])
@section('main-content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="POST" action="{{ route('roles.update', $role->id) }}" class="form-horizontal">
          @csrf
          @method('PUT')
          <div class="card">
            <!--Header-->
            <div class="card-header card-header-primary">
              <h4 class="card-title">Editar rol</h4>
              <p class="card-category">Editar datos del rol</p>
            </div>
            <!--End header-->
            <!--Body-->
            <div class="card-body">
              <div class="row">
                <label for="name" class="col-sm-2 col-form-label">Nombre del rol</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="name" value="{{ old('name', $role->name) }}" autocomplete="off" autofocus minlength="4" maxlength="15" 
                  onkeypress="return blockSpecialChar(event)">
                  @if ($errors->has('name'))
                    <span class="error text-danger" for="input-name" style="font-size: 15px">{{ $errors->first('name') }}</span>
                  @endif
                </div>
              </div>
              <div class="row">
                <label for="name" class="col-sm-2 col-form-label">Permisos</label>
                <div class="col-sm-7">
                  <div class="form-group">
                    <div class="tab-content">
                      <div class="tab-pane active" id="profile">
                        
                        <div class="form-group" style="margin-top: 2%;">                         
                          <span class="input-group" style="width: 60%; margin-right:auto; margin-left:auto">
                              <img src="{{asset('images/search.svg')}}" alt="" style="border-radius: 10px; position: relative; width:100%; max-width:30px; right:8px;">
                              <input id="searchTerm" type="text" onkeyup="doSearch()" class="form-control pull-right"  placeholder="Escribe para buscar en la tabla..." />
                          </span>                          
                        </div>
                        <table class="table" id="rol_permisos_edit">
                          <tbody>
                            @foreach ($permissions as $id => $permission)
                            <tr>
                              <td>
                                <div class="form-check">
                                  <label class="form-check-label" style="margin-bottom: 15%">
                                    <input class="form-check-input" type="checkbox" name="permissions[]"
                                      value="{{ $id }}" {{ $role->permissions->contains($id) ? 'checked' : '' }}>
                                    <span class="form-check-sign">
                                      <span class="check" value=""></span>
                                    </span>
                                  </label>
                                </div>
                              </td>
                              <td>
                                {{ $permission }}
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--End body-->
            <!--Footer-->
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
          </div>
          <!--End footer-->
        </form>
      </div>
    </div>
  </div>
</div>
<script language="javascript">
  function doSearch() {
      var tableReg = document.getElementById('rol_permisos_edit');
      var searchText = document.getElementById('searchTerm').value.toLowerCase();
      for (var i = 1; i < tableReg.rows.length; i++) {
          var cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
          var found = false;
          for (var j = 0; j < cellsOfRow.length && !found; j++) {
              var compareWith = cellsOfRow[j].innerHTML.toLowerCase();
              if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1)) {
                  found = true;
              }
          }
          if (found) {
              tableReg.rows[i].style.display = '';
          } else {
              tableReg.rows[i].style.display = 'none';
          }
      }
  }
</script>
<script type="text/javascript">
  function blockSpecialChar(e){
       var k;
       document.all ? k = e.keyCode : k = e.which;
       return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 32);
       }
 function blockNoNumber(e){
     var k;
     document.all ? k = e.keyCode : k = e.which;
     return ( (k >= 48 && k <= 57));
     }
 let refresh = document.getElementById('refresh');
 refresh.addEventListener('click', _ => {
         location.reload();
})
</script>
@endsection