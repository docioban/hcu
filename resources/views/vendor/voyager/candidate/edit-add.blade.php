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
{{--                             @dd($dataType)--}}
                            <div class="float-letf bd-success col-md-3">
                                <img src="/storage/candidates/{{$dataTypeContent->photo}}" class="rounded-circle" width="300" height="250" alt="sdfas"/><br><br>
                                <label class="control-label" for="name">Incarca CV</label>
                                <input id="file-5" name="cv" class="file" type="file" multiple>
                                <label class="control-label" for="name">Incarca o poza</label>
                                <input id="file-5" name="photo" class="file" type="file" multiple>
                            </div>
                            <div class="floar-right bd-primary col-md-9">
                                <div class="form-group @if($dataTypeContent->type == 'hidden') hidden @endif {{ $errors->has($dataTypeContent->field) ? 'has-error' : '' }}" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                    <div class="">
                                        <div class="col-md-4">
                                            <label class="control-label" for="name">Slug</label>
                                            <input type="text" class="form-control" id="name" placeholder="{{$dataTypeContent->slug}}">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="control-label" for="name">Name</label>
                                            <input type="textarea" class="form-control" id="name" placeholder="{{$dataTypeContent->surname . ' ' . $dataTypeContent->name}}">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="control-label" for="name">Location</label>
                                            <input type="text" class="form-control" id="name" placeholder="{{$dataTypeContent->location}}">
                                        </div>
                                    </div><br><br><br><br>
                                    <div>
                                        <div class="col-md-4">
                                            <label class="control-label" for="name">Starea civila</label>
                                            <input type="text" class="form-control" id="name" placeholder="{{$dataTypeContent->civil_status}}">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="control-label" for="name">Functia</label>
                                            <input type="text" class="form-control" id="name" placeholder="{{$dataTypeContent->function}}">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="control-label" for="name">Studii</label>
                                            <input type="text" class="form-control" id="name" placeholder="{{$dataTypeContent->studies}}">
                                        </div>
                                    </div><br><br><br><br>
                                    <div class="col-md-4"><br><br><br><br></div>
                                    <div class="col-md-4">
                                        <label class="control-label" for="name">Data Nasterii</label>
                                        <input type="text" class="form-control" id="name" placeholder="{{$dataTypeContent->date}}">
                                    </div>
                                    <div class="col-md-4"><br><br><br><br></div>
                                </div>
                                <div>
                                    <h3 align='center'>Posturi</h3>
                                    @foreach($posts as $post)
                                    <div class="form-group @if($post->type == 'hidden') hidden @endif col-md-12 {{ $errors->has($post->field) ? 'has-error' : '' }}" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                        <div class="border border-success">
                                                <hr>
                                            <div>
                                                <div class="col-md-11" style="padding:0px">
                                                    <input type="text" class="form-control" size="4" id="name" placeholder="{{$post->title}}">
                                                </div>
                                                <div class="col-md-1" align='right'>
                                                    <img src="/storage/delete.png" width="30">
                                                </div>
                                            </div>
                                            <div class="col text-decoration-none col-md-3" style="padding:0px">
                                                <label class="control-label" for="name"><b>Limba </b></label>
                                                <input type="text" class="form-control" id="name" placeholder="{{$post->language}}">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label" for="name"><b>Tipul </b></label>
                                                <input type="text" class="form-control" id="name" placeholder="{{$post->type}}">
                                            </div><br><br><br><br><br>
                                            <label class="control-label" for="name"><b>Subtitlul</b></label>
                                            <input type="text" class="form-control" id="name" placeholder="{{$post->subtitle}}">
                                            <label class="control-label" for="name"><b>Corpul</b></label>
                                            {!! Form::textarea('mytextarea', '', ['placeholder' => $post->body, 'class' => 'form-control']) !!}
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
                             </div>
                     </div><!-- panel-body -->
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

                            <div class="panel-body ">

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
{{--                                 @dd($dataType)--}}
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
                                                <input type="text" class="form-control" id="name" placeholder="{{$dataTypeContent->slug}}">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label" for="name">Имя</label>
                                                <input type="textarea" class="form-control" id="name" placeholder="{{$dataTypeContent->surname . ' ' . $dataTypeContent->name}}">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label" for="name">Место рождения</label>
                                                <input type="text" class="form-control" id="name" placeholder="{{$dataTypeContent->location}}">
                                            </div>
                                        </div><br><br><br><br>
                                        <div>
                                            <div class="col-md-4">
                                                <label class="control-label" for="name">Гражданский статус</label>
                                                <input type="text" class="form-control" id="name" placeholder="{{$dataTypeContent->civil_status}}">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label" for="name">Функция</label>
                                                <input type="text" class="form-control" id="name" placeholder="{{$dataTypeContent->function}}">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label" for="name">Учёба</label>
                                                <input type="text" class="form-control" id="name" placeholder="{{$dataTypeContent->studies}}">
                                            </div>
                                        </div><br><br><br><br>
                                        <div class="col-md-4"><br><br><br><br></div>
                                        <div class="col-md-4">
                                            <label class="control-label" for="name">Дата рождения</label>
                                            <input type="text" class="form-control" id="name" placeholder="{{$dataTypeContent->date}}">
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
                                                        <input type="text" class="form-control" size="4" id="name" placeholder="{{$post->title}}">
                                                    </div>
                                                    <div class="col-md-1" align='right'>
                                                        <img src="/storage/delete.png" width="30">
                                                    </div>
                                                </div>
                                                <div class="col text-decoration-none col-md-3" style="padding:0px">
                                                    <label class="control-label" for="name"><b>Язык </b></label>
                                                    <input type="text" class="form-control" id="name" placeholder="{{$post->language}}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="control-label" for="name"><b>Тип </b></label>
                                                    <input type="text" class="form-control" id="name" placeholder="{{$post->type}}">
                                                </div><br><br><br><br><br>
                                                <label class="control-label" for="name"><b>Подназвание</b></label>
                                                <input type="text" class="form-control" id="name" placeholder="{{$post->subtitle}}">
                                                <label class="control-label" for="name"><b>Корпус</b></label>
                                                {!! Form::textarea('mytextarea', '', ['placeholder' => $post->body, 'class' => 'form-control']) !!}
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
                                </div>
                             </div><!-- panel-body -->

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
    </div></div></div>
@endsection

@section('javascript')
    <script>
openCity(event, 'Rusa');

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
