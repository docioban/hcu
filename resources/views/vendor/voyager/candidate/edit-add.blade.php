@php
    $edit = !is_null($dataTypeContent->getKey());
    $add  = is_null($dataTypeContent->getKey());
@endphp

@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        /* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons that are used to open the tab content */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
    </style>
@stop

@section('content')
<div class="tab">
    <button class="tablinks" onclick="openCity(event, 'Romana')">Româna</button>
    <button class="tablinks" onclick="openCity(event, 'Rusa')">Rusă</button>
</div>
  
<!-- Tab content -->
<div id="Romana" class="tabcontent">
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                        <!-- PUT Method if we are editing -->
                {!! Form::open(['action' => ['CandidateController@update', $dataTypeContent->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                    <!-- CSRF TOKEN -->
                        {{ csrf_field() }}
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <!-- Adding / Editing -->   
                            @php
                                $dataTypeRows = $dataType->{($edit ? 'editRows' : 'addRows' )};
                                $posts = \App\Post::where('candidate_id', $dataTypeContent->id)->get()
                            @endphp
                            {{-- @dd($dataType) --}}
                            <div class="float-letf bd-success col-md-3">
{{--                                @dd($dataTypeContent->photo)--}}
                                <img src="/storage/candidates/{{$dataTypeContent->photo}}" class="rounded-circle" width="300" height="250" alt="sdfas"/><br><br>
                                <label class="control-label">Incarca CV</label>
                                <input id="file-5" name="cv" class="file" type="file" multiple>
                                <label class="control-label">Incarca o poza</label>
                                <input id="file-5" name="photo" class="file" type="file" multiple>
                            </div>
                            <div class="floar-right bd-primary col-md-9">
                                <div class="form-group @if($dataTypeContent->type == 'hidden') hidden @endif {{ $errors->has($dataTypeContent->field) ? 'has-error' : '' }}" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                    <div>
                                        <div class="col-md-4">
                                            <label class="control-label" for="name">Nume</label>
                                            <input type="textarea" class="form-control" name="name" value="{{$dataTypeContent->name}}"> 
                                        </div>
                                        <div class="col-md-4">
                                            <label class="control-label" for="surname">Prenume</label>
                                            <input type="textarea" class="form-control" name="surname" value="{{$dataTypeContent->surname}}"> 
                                        </div>
                                        <div class="col-md-4">
                                            <label class="control-label" for="constituency_id">Circumscriptia</label>
                                            <input type="text" class="form-control" name="constituency_id" value="{{$dataTypeContent->constituency_id}}"> 
                                        </div>
                                    </div><br><br><br><br>
                                    <div>
                                        <div class="col-md-4">
                                            <label class="control-label" for="civil_status">Starea civila</label>
                                            <input type="text" class="form-control" name="civil_status" value="{{$dataTypeContent->civil_status}}">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="control-label" for="function">Functia</label>
                                            <input type="text" class="form-control" name="function" value="{{$dataTypeContent->function}}">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="control-label" for="studies">Studii</label>
                                            <input type="text" class="form-control" name="studies" value="{{$dataTypeContent->studies}}">
                                        </div>
                                    </div><br><br><br><br>
                                    <div>    
                                        <div class="col-md-4">
                                            <label class="control-label" for="date">Data Nasterii</label>
                                            <input type="text" class="form-control" name="date" value="{{$dataTypeContent->date}}"> 
                                        </div>
                                        <div class="col-md-4">
                                            <label class="control-label" for="location">Locul nasterii</label>
                                            <input type="text" class="form-control" name="location" value="{{$dataTypeContent->location}}">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="control-label" for="party_id">Partidul</label>
                                            <input type="text" class="form-control" name="party_id" value="{{$dataTypeContent->party_id}}"> 
                                        </div>
                                    </div>
                                    <div>
                                        
                                        <div class="col-md-4"><br><br><br><br></div>
                                        <div class="col-md-4"><br><br><br><br></div>
                                        <div class="col-md-4"><br><br><br><br></div>
                                    </div>     
                                </div>
                                <div>
                                    <h3 align='center'>Posturi</h3>
                                    @foreach($posts as $post)
                                    <div class="form-group @if($post->type == 'hidden') hidden @endif col-md-12 {{ $errors->has($post->field) ? 'has-error' : '' }}" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                        <div class="border border-success">
                                                <hr>
                                            <div>
                                                <div class="col-md-11" style="padding:0px">
                                                    <input type="text" class="form-control" size="4" id="name" value="{{$post->title}}">
                                                </div>
                                                <div class="col-md-1" align='right'>
                                                    <img src="/storage/delete.png" width="30">
                                                </div>
                                            </div>
                                            <div class="col text-decoration-none col-md-3" style="padding:0px">
                                                <label class="control-label" for="name"><b>Limba </b></label>
                                                <input type="text" class="form-control" id="name" value="{{$post->language}}">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label" for="name"><b>Tipul </b></label>
                                                <input type="text" class="form-control" id="name" value="{{$post->type}}">
                                            </div><br><br><br><br><br>
                                            <label class="control-label" for="name"><b>Subtitlul</b></label>
                                            <input type="text" class="form-control" id="name" value="{{$post->subtitle}}">
                                            <label class="control-label" for="name"><b>Corpul</b></label>
                                            {!! Form::textarea('mytextarea', '', ['value' => $post->body, 'class' => 'form-control']) !!}
                                        </div>
                                    </div>@endforeach
                                </div>
                            </div>
                            <div>
                                <hr>
                                <h3 align='center'>Adauga un post</h3>
                                <div class="form-group @if($post->type == 'hidden') hidden @endif col-md-12 {{ $errors->has($post->field) ? 'has-error' : '' }}" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                    <div class="border border-success">
                                        <div class="col-md-12" style="padding:0px">
                                            <label class="control-label" for="name"><b>Titlu </b></label>
                                            <input type="text" class="form-control" size="4" id="name">
                                        </div>
                                        <div class="col text-decoration-none col-md-3" style="padding:0px">
                                            <label class="control-label" for="name"><b>Limba </b></label>
                                            <input type="text" class="form-control" id="name">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="control-label" for="name"><b>Tipul </b></label>
                                            <input type="text" class="form-control" id="name">
                                        </div><br><br><br><br><br><br>
                                        <label class="control-label" for="name"><b>Subtitlul</b></label>
                                        <input type="text" class="form-control" id="name">
                                        <label class="control-label" for="name"><b>Corpul</b></label>
                                        {!! Form::textarea('mytextarea', '', ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            {{-- </div> --}}
                    {{-- </div><!-- panel-body --> --}}
                    <div align='right'>
                        {{Form::hidden('_method','PUT')}}
                        {{Form::submit('Salveaza', ['class'=>'btn btn-primary'])}}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div> 
<!-- Tab content -->
<div id="Rusa" class="tabcontent">
        <div class="page-content edit-add container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-bordered">
                            <!-- form start -->
                            {!! Form::open(['action' => ['CandidateController@update', $dataTypeContent->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                    
                                <!-- PUT Method if we are editing -->
                            @if($edit)
                                {{ method_field("PUT") }}
                            @endif
        
                            <!-- CSRF TOKEN -->
                                {{ csrf_field() }}
        
                            {{-- <div class="panel-body "> --}}
    
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <!-- Adding / Editing -->
                                {{-- @dd($dataType) --}}
                                <div class="float-letf bd-success col-md-3">
                                    <img src="/storage/candidates/{{$dataTypeContent->photo}}" class="rounded-circle" width="300" height="250" alt="sdfas"/><br><br>
                                    <label class="control-label" for="name">Загрузить CV</label>
                                    <input id="file-5" name="cv" class="file" type="file" multiple>
                                    <label class="control-label" for="name">Загрузить фото</label>
                                    <input id="file-5" name="photo" class="file" type="file" multiple>
                                </div>
                                <div class="floar-right bd-primary col-md-9">
                                    <div class="form-group @if($dataTypeContent->type == 'hidden') hidden @endif {{ $errors->has($dataTypeContent->field) ? 'has-error' : '' }}" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                        <div class="">
                                            <div class="col-md-4">
                                                <label class="control-label" for="name">Слаг</label>
                                                <input type="text" class="form-control" id="name" value="{{$dataTypeContent->slug}}">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label" for="name">Имя</label>
                                                <input type="textarea" class="form-control" id="name" value="{{$dataTypeContent->surname . ' ' . $dataTypeContent->name}}"> 
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label" for="name">Место рождения</label>
                                                <input type="text" class="form-control" id="name" value="{{$dataTypeContent->location}}">
                                            </div>
                                        </div><br><br><br><br>
                                        <div>
                                            <div class="col-md-4">
                                                <label class="control-label" for="name">Гражданский статус</label>
                                                <input type="text" class="form-control" id="name" value="{{$dataTypeContent->civil_status}}">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label" for="name">Функция</label>
                                                <input type="text" class="form-control" id="name" value="{{$dataTypeContent->function}}">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label" for="name">Учёба</label>
                                                <input type="text" class="form-control" id="name" value="{{$dataTypeContent->studies}}">
                                            </div>
                                        </div><br><br><br><br>
                                        <div class="col-md-4"><br><br><br><br></div>
                                        <div class="col-md-4">
                                            <label class="control-label" for="name">Дата рождения</label>
                                            <input type="text" class="form-control" id="name" value="{{$dataTypeContent->date}}"> 
                                        </div>     
                                        <div class="col-md-4"><br><br><br><br></div>
                                    </div>
                                    <div>
                                        <h3 align='center'>Посты</h3>
                                        @foreach($posts as $post)
                                        <div class="form-group @if($post->type == 'hidden') hidden @endif col-md-12 {{ $errors->has($post->field) ? 'has-error' : '' }}" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                            <div class="border border-success">
                                                    <hr>
                                                <div>
                                                    <div class="col-md-11" style="padding:0px">
                                                        <input type="text" class="form-control" size="4" id="name" value="{{$post->title}}">
                                                    </div>
                                                    <div class="col-md-1" align='right'>
                                                        <img src="/storage/delete.png" width="30">
                                                    </div>
                                                </div>
                                                <div class="col text-decoration-none col-md-3" style="padding:0px">
                                                    <label class="control-label" for="name"><b>Язык </b></label>
                                                    <input type="text" class="form-control" id="name" value="{{$post->language}}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="control-label" for="name"><b>Тип </b></label>
                                                    <input type="text" class="form-control" id="name" value="{{$post->type}}">
                                                </div><br><br><br><br><br>
                                                <label class="control-label" for="name"><b>Подназвание</b></label>
                                                <input type="text" class="form-control" id="name" value="{{$post->subtitle}}">
                                                <label class="control-label" for="name"><b>Корпус</b></label>
                                                {!! Form::textarea('mytextarea', '', ['value' => $post->body, 'class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div><hr>
                                        <h3 align='center'>Создай новый пост</h3>
                                        <div class="form-group @if($post->type == 'hidden') hidden @endif col-md-12 {{ $errors->has($post->field) ? 'has-error' : '' }}" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                            <div class="border border-success">
                                                <div class="col-md-12" style="padding:0px">
                                                    <label class="control-label" for="name"><b>Название </b></label>
                                                    <input type="text" class="form-control" size="4" id="name">
                                                </div>
                                                <div class="col text-decoration-none col-md-3" style="padding:0px">
                                                    <label class="control-label" for="name"><b>Язык </b></label>
                                                    <input type="text" class="form-control" id="name">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="control-label" for="name"><b>Тип </b></label>
                                                    <input type="text" class="form-control" id="name">
                                                </div><br><br><br><br><br><br>
                                                <label class="control-label" for="name"><b>Подназвание</b></label>
                                                <input type="text" class="form-control" id="name">
                                                <label class="control-label" for="name"><b>Корпус</b></label>
                                                {!! Form::textarea('mytextarea', '', ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>
                                {{-- </div> --}}
                            {{-- </div><!-- panel-body --> --}}
                                
                            <div align='right'>
                                {{Form::hidden('_method','PUT')}}
                                {{Form::submit('Сохранить', ['class'=>'btn btn-primary'])}}
                                {!! Form::close() !!}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>  
    </div>
@endsection

@section('javascript')
    <script>
openCity(event, 'Romana');

function openCity(evt, cityName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
    </script>
@stop
