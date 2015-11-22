@extends('layouts.base')

 @section('menu')

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Prueba Gavility</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    	<ul class="nav navbar-nav ">
          <li><a href="/">Cube Summation</a></li>
          <li><a href="codigo">Code Refactoring</a></li>
          <li><a href="preguntas">Pregunta</a></li>
        </ul>
        <p class="navbar-text navbar-right">
          <a class="navbar-brand" href="https://github.com/hammer92/Gravility.local.git">  <i class="fa fa-github-square"> GitHub</i></a>
          <a class="navbar-brand" href="https://docs.google.com/document/d/1ZEePIvgxsrShJfUkNLWJy7C7wB9tBHC9Kwq9-sCm2Xw/edit">  <i class="fa fa-file-text"> Documento</i></a>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

@stop