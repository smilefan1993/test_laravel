@extends('layouts.app')

@section('content')

    @include('partials.error')
    {{ Form::open(['route' => 'test.create' , 'class' => 'col-lg-5 col-lg-offset-3']) }}
        <div class="form-group">
            {!! Form::label('Test name') !!}
            {{ Form::text('name', null, ['class' => 'form-control']) }}
         </div>

        <div class="form-group">
            {!! Form::label('category') !!}
            {{ Form::select('category_id', \App\Category::getCategoryList(),null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {!! Form::label('sub_category') !!}
            {{ Form::select('sub_category_id',\App\Sub_category::getSubCategoryList(), null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {!! Form::label('Max_Test_Time') !!}
            {{ Form::text('max_test_time', null , ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {!! Form::label('success_weight') !!}
            {{ Form::text('success_weight',  null, ['class' => 'form-control']) }}
         </div>

        <div class="form-group">
            {!! Form::label('skip_question') !!}
            {{Form::hidden('skip_question','0',['class' => 'form-control'])}}
            {{ Form::checkbox('skip_question',  '1', ['class' => 'form-control']) }}
         </div>

        <div class="form-group">
             {!! Form::label('pause') !!}
            {{Form::hidden('pause','0',['class' => 'form-control'])}}
            {{ Form::checkbox('pause',  '1', ['class' => 'form-control']) }}
        </div>
         <div class="form-group">
            {!! Form::label('final_verdict_showing') !!}
             {{Form::hidden('final_verdict_showing','0',['class' => 'form-control'])}}
            {{ Form::checkbox('final_verdict_showing',  '1', ['class' => 'form-control']) }}
         </div>

        <div class="form-group">
            {!! Form::label('showing_mark') !!}
            {{Form::hidden('showing_mark','0',['class' => 'form-control'])}}
            {{ Form::checkbox('showing_mark','1', ['class' => 'form-control', 'multiple']) }}
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="create">
        </div>
    {{ Form::close() }}
@endsection