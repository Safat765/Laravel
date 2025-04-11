@extends('layout.main')
@push("title")
<title>Course View</title>
@section('main')
<div class="table-responsive">
    <div class="form-group d-flex justify-content-between align-items-start">
        <div class="d-flex">
            <div class="p-1">            
                <div class="d-flex justify-content-start mb-3">
                    <a href="{{url('/courses/create')}}" class="btn btn-primary m-2">
                        Create Course
                    </a>
                </div>
            </div>
            <div class="p-1">                       
                <div class="d-flex justify-content-start mb-3">
                    <a href="{{url('/courses')}}" class="btn btn-secondary m-2">
                        Reset
                    </a>
                </div>
            </div>
        </div>
        
        <div class="flex-grow-1" style="min-width: 250px; max-width: 500px;">
            {{ Form::open([URL::route('courses.index'), 'method' => 'get']) }}
            <div class="form-group d-flex">
                <div class="form-group p-1 col-10">
                    {{ Form::text('search', $search, [
                    'class' => 'form-control',
                    'placeholder' => 'Search by Course name or Credit',
                    'required' => true
                    ])}}
                </div>                                            
                <div class="p-1">
                    {{ Form::submit('Search', [
                    'class' => 'btn btn-primary btn-block'
                    ]) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>     
    </div>
    <div class="bg-warning  text-black text-center mx-5">
        <h5>Total Course : {{ $totalCourses }}</h5>
    </div>
    <table class="table table-striped table-bordered table-hover text-center" style="font-size: 15px;">
        <thead>
            <tr>
                <th scope="col">Course name</th>
                <th scope="col">Credit</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
            <tr @if($course->status == 0) class="disabled-row" style="opacity: 0.3;" @endif>
                <td scope="row">{{$course->name}}</td>
                <td scope="row">{{$course->credit}}</td>
                    @if ($course->status == $status['ACTIVE'])
                    <a href="/courses/status/{{$course->course_id}}">
                        <span class="badge bg-success">Active</span>
                    </a>
                    @else
                    <a href="/courses/status/{{$course->course_id}}">
                        <span class="badge bg-danger">Inactive</span>
                    </a>
                    @endif
                </td>
                <td>
                    <div class="d-flex gap-2" style="display: inline-block;">
                        @if($course->status == 0) 
                            {{ Form::open(['url' => 'courses/' .$course->course_id.'/edit', 'method' => 'get']) }}
                            
                            <div class="text-center">
                                {{ Form::button(HTML::decode('<i class="las la-edit"></i>'), [
                                    'class' => 'btn btn-success btn-sm',
                                    'type' => 'submit',
                                    'disabled' => 'disabled'
                                ])}}
                            </div>
                            {{ Form::close() }}
                        @else
                            {{ Form::open(['url' => 'courses/' .$course->course_id.'/edit', 'method' => 'get']) }}
                            
                            <div class="text-center">
                                {{ Form::button(HTML::decode('<i class="las la-edit"></i>'), [
                                    'class' => 'btn btn-success btn-sm',
                                    'type' => 'submit'
                                ])}}
                            </div>
                            {{ Form::close() }}
                        @endif
                        
                        @if($course->status == 0) 
                            {{ Form::open(['url' => 'courses/' .$course->course_id, 'method' => 'delete']) }}
                            
                            <div class="text-center">
                                {{ Form::button(HTML::decode('<i class="las la-trash-alt"></i>'), [
                                    'class' => 'btn btn-danger btn-sm',
                                    'type' => 'submit',
                                    'disabled' => 'disabled'
                                ])}}
                            </div>
                            {{ Form::close() }}
                        @else
                            {{ Form::open(['url' => 'courses/' .$course->course_id, 'method' => 'delete']) }}                            
                            <div class="text-center">
                                {{ Form::button(HTML::decode('<i class="las la-trash-alt"></i>'), [
                                    'class' => 'btn btn-danger btn-sm',
                                    'type' => 'submit'
                                ])}}
                            </div>
                            {{ Form::close() }}
                        @endif
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="text-center">
        {{ $courses->links() }}
    </div>
</div>

@endsection