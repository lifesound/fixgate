{!! csrf_field() !!}
        <!--Type-->
@if(count($types))
    <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
        {!! Form::label('type','Type*' ,['class'=>'col-md-4 control-label']) !!}
        <div class="col-md-3">

            {!! Form::select('type',$types,isset($order)?$order->type:null,[ 'class' => 'form-control','placeholder' => 'Pick a type'])!!}

            @if ($errors->has('type'))
                <span class="help-block">
            <strong>{{ $errors->first('type') }}</strong>
        </span>
            @endif
        </div>
    </div>
@else
    <div class="container">
        <div class="callout callout-warning">
            <h4><i class="icon fa fa-warning"></i> Alert!</h4>

            <p>Until Now ,There is not any registered types .<br>
                <strong>Note that </strong>
                you can't add an order yet without type </p>
            @if(!auth()->user()->fromAdmins())
                <p>Please Contact your admins .</p>
            @else
                <p>Please <a href="/types/create"><strong>Add type</strong></a> Firstly </p>
            @endif
        </div>
    </div>
    @endif

            <!--Title-->
    <div class="form-group{{ $errors->has('title') ? ' has-error' : ''}}">
        {!! Form::label('title','Title*' , ['class' => 'col-md-4 control-label']) !!}

        <div class="col-md-6">
            {!! Form::text('title',isset($order)?$order->title:null, ['class' => 'form-control']) !!}
            @if ($errors->has('title'))
                <span class="help-block">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
            @endif
        </div>
    </div>


    <!--Description-->
    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        {!! Form::label('description' ,'Description*' , ['class' => 'col-md-4 control-label']) !!}

        <div class="col-md-6">
            {!! Form::textarea('description',isset($order)?$order->description:null,['class' => 'form-control' , 'rows' =>'4']) !!}
            @if ($errors->has('description'))
                <span class="help-block">
            <strong>{{ $errors->first('description') }}</strong>
        </span>
            @endif
        </div>
    </div>


    <!--Priority-->
    <div class="form-group{{ $errors->has('priority') ? ' has-error' : '' }}">
        {!! Form::label('priority','Priority*' ,['class'=>'col-md-4 control-label']) !!}

        <div class="col-md-3">
            {{--{!! Form::text('priority', isset($order)?$order->priority:null , ['id' => 'priority']) !!}--}}
            <input type="text" name="priority" id="priority" value="">
            <span class="changeable pull-right"></span>
            @if ($errors->has('priority'))
                <span class="help-block">
           <strong>{{ $errors->first('priority') }}</strong>
       </span>
            @endif
        </div>
    </div>

    <!--Contact-->
    <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
        {!! Form::label('contact','Contact Number*',['class'=>'col-md-4 control-label']) !!}

        <div class="col-md-3">
            {!! Form::text('contact',isset($order)?$order->contact:null,['class' =>'form-control']) !!}
            <span><small>please numbers only ex : 00167578987654 | 0567898768</small></span>

            @if ($errors->has('contact'))
                <span class="help-block">
            <strong>{{ $errors->first('contact') }}</strong>
        </span>
            @endif
        </div>
    </div>

    <!--Notes-->
    <div class="form-group{{ $errors->has('notes') ? ' has-error' : '' }}">
        {!! Form::label('notes','Notes',['class'=>'col-md-4 control-label' ]) !!}

        <div class="col-md-6">
            {!! Form::textarea('notes',isset($order)?$order->notes:null,['class'=>'form-control' ,'rows'=>2]) !!}
            @if ($errors->has('notes'))
                <span class="help-block">
            <strong>{{ $errors->first('notes') }}</strong>
        </span>
            @endif
        </div>
    </div>

    <!--Submit-->
    <div class="form-group">
        @if(count($types))
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-send"></i> {{$button}}
                </button>
            </div>
        @endif
    </div>

    {{--<input type="text" id="priority" name="priority" value="" />--}}