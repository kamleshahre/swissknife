@extends('layouts.master')
@section('content')
<div class="row">
    <div class="large-12 columns">
        <h1 class="subheader">Startpagina</h1>
        <div class="panel">
            <h2>Pas hier je festival aan</h2>
            <form>
                <fieldset>
                    <img src="./_styles/images/logo.png"alt="placeholder" >
                    <label for="logo">Logo</label>
                    <input type="file" name="logo">
                </fieldset>

                <fieldset>
                    <label for="main_color">Hoofd kleur</label>
                    <input type="color" name="main_color"/>
                    <label for="support_color">Secundaire kleur</label>
                    <input type="color" name="support_color"/>
                </fieldset>
                <input type="submit" class="button" value="submit"/>
            </form>
        </div>
    </div>
</div>
@stop