@extends('layouts.master')

@section('title')
    Confirm Newsletter Registration | @parent
@stop
@section('meta')
    <meta name="title" content=""/>
    <meta name="description" content=""/>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form class="form-horizontal" action="{{ route('billing.sms.send') }}" method="post">
                {{ csrf_field() }}
                <fieldset>
                    <legend>Send SMS</legend>
                    <div class="form-group">
                        <label for="secret" class="col-lg-2 control-label">Secret</label>
                        <div class="col-lg-10">
                            <input class="form-control" id="secret" name="secret" placeholder="Secret" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="from" class="col-lg-2 control-label">From</label>
                        <div class="col-lg-10">
                            <input class="form-control" id="from" name="from" placeholder="Phone number" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="to" class="col-lg-2 control-label">To</label>
                        <div class="col-lg-10">
                            <input class="form-control" id="to" name="to" placeholder="Phone number" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message" class="col-lg-2 control-label">Message</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="3" id="textArea" name="message"></textarea>
                            <span class="help-block">Write message. SMS max lenght is 255 chararchters. 255 left.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="reset" class="btn btn-default">Reset</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
@stop
