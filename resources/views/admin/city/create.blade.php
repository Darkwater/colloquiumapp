@extends('layouts.panel', [
    'title' => trans('admin/city.add_city')
])

@section('title', 'Admin - ' . trans('admin/city.add_city'))

@section('panel-body')
<form method="post" action="/admin/cities">
    {{ csrf_field() }}
    <div class="col-md-6">
        <div class="form-group">
        <label>{{ trans('admin/city.name') }}</label>
        <input type="text"
               class="form-control"
               placeholder="{{ trans('admin/city.name') }}"
               name="name"
               value="{{ request()->old('name') }}"
        />
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" style="padding: 20px 15px 0 30px;">
            <a class="btn btn-default pull-left" href="{{ url('/admin/cities') }}">{{ trans('admin/city.goback') }}</a>
            <button type="submit" class="btn btn-success pull-right">{{ trans('admin/city.save') }}</button>
        </div>
    </div>
</form>
@endsection
