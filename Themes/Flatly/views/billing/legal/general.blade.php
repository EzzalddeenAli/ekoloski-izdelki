@extends('layouts.master')

@section('title')
    Confirm Newsletter Registration | @parent
@stop
@section('meta')
    <meta name="title" content=""/>
    <meta name="description" content=""/>
@stop

@section('content')

    <div class="row">

        <h1>Splosni pogoji</h1>

        <p>
            Open Source Project
        </p>
        <ul>
            <li>TODO: github</li>
            <li>TODO: slack</li>
            <li><a href="https://tree.taiga.io/project/kovacec-ekoloski-izdelki/kanban">taiga.io</a></li>
        </ul>

        <p>
            Build with:
        </p>
        <ul>
            <li><a href="https://laravel.com/">Laravel</a></li>
            <li><a href="https://vuejs.org/">Vuejs</a></li>
            <li><a href="https://m.do.co/c/62ffa97be7bb">DigitalOcean</a></li>
            <li><a href="https://mailgun.com">Mailgun</a></li>
        </ul>

        <p>
            Zelite pomagati pri razvoju projekta? <br>
            Posljite email na ({!! "bojan@kovacec.net" !!}) da vas dodam k teamu na
            <a href="https://tree.taiga.io/project/kovacec-ekoloski-izdelki/kanban">taiga.io</a>
        </p>

    </div>
@stop
