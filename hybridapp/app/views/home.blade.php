@extends('layouts.master')
@section('content')
<div class="row">
    <div class="large-12 columns">
        <hr/>
        <h1 class="subheader">Homepage</h1>
        <hr/>
        <div class="panel">
            <h2>Customize your festival</h2>
            <form>
                <fieldset>
                    <img src="./_styles/images/logo.png"alt="placeholder" >
                    <label for="logo">Logo</label>
                    <input type="file" name="logo">
                </fieldset>
                    <fieldset>
                    <label for="main_color">Primary color</label>
                    <input type="color" name="main_color"/>
                    <label for="support_color">Secundary color</label>
                    <input type="color" name="support_color"/>
                    </fieldset>
                <input type="submit" class="button" value="Submit"/>
            </form>
        </div>
    </div>
</div>
@stop