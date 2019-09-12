<!DOCTYPE html>
<html>
<head>
<title>Celebration Height</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, minimal-ui" />
<style> @-ms-viewport { width: device-width; } </style>
<link rel="stylesheet" href="{{asset('vendor/reset.min.css')}}">
<link rel="stylesheet" href="{{asset('css/virtual-style.css')}}">
</head>
<body class="multiple-scenes ">

<div id="pano"></div>

<div id="sceneList">
  <ul class="scenes">
    
      <a href="javascript:void(0)" class="scene" data-id="0-welcome-to-celebration-height">
        <li class="text">Welcome To Celebration Height</li>
      </a>
    
      <a href="javascript:void(0)" class="scene" data-id="1-main-entry">
        <li class="text">Main Entry</li>
      </a>
    
      <a href="javascript:void(0)" class="scene" data-id="2-courtyard-hall">
        <li class="text">Courtyard Hall</li>
      </a>
    
      <a href="javascript:void(0)" class="scene" data-id="3-stage">
        <li class="text">Stage</li>
      </a>
    
      <a href="javascript:void(0)" class="scene" data-id="4-bar">
        <li class="text">Bar</li>
      </a>
    
      <a href="javascript:void(0)" class="scene" data-id="5-nagarkot-hall">
        <li class="text">Nagarkot Hall</li>
      </a>
    
      <a href="javascript:void(0)" class="scene" data-id="6-sarangkot-hall">
        <li class="text">Sarangkot Hall</li>
      </a>
    
  </ul>
</div>

<div id="titleBar">
  <h1 class="sceneName"></h1>
</div>

<a href="javascript:void(0)" id="autorotateToggle">
  <img class="icon off" src="{{asset('img/play.png')}}">
  <img class="icon on" src="{{asset('img/pause.png')}}">
</a>

<a href="javascript:void(0)" id="fullscreenToggle">
  <img class="icon off" src="{{asset('img/fullscreen.png')}}">
  <img class="icon on" src="{{asset('img/windowed.png')}}">
</a>

<a href="javascript:void(0)" id="sceneListToggle">
  <img class="icon off" src="{{asset('img/expand.png')}}">
  <img class="icon on" src="{{asset('img/collapse.png')}}">
</a>

<a href="javascript:void(0)" id="viewUp" class="viewControlButton viewControlButton-1">
  <img class="icon" src="{{asset('img/up.png')}}">
</a>
<a href="javascript:void(0)" id="viewDown" class="viewControlButton viewControlButton-2">
  <img class="icon" src="{{asset('img/down.png')}}">
</a>
<a href="javascript:void(0)" id="viewLeft" class="viewControlButton viewControlButton-3">
  <img class="icon" src="{{asset('img/left.png')}}">
</a>
<a href="javascript:void(0)" id="viewRight" class="viewControlButton viewControlButton-4">
  <img class="icon" src="{{asset('img/right.png')}}">
</a>
<a href="javascript:void(0)" id="viewIn" class="viewControlButton viewControlButton-5">
  <img class="icon" src="{{asset('img/plus.png')}}">
</a>
<a href="javascript:void(0)" id="viewOut" class="viewControlButton viewControlButton-6">
  <img class="icon" src="{{asset('img/minus.png')}}">
</a>

<script src="{{asset('vendor/es5-shim.js')}}"></script>
<script src="{{asset('vendor/eventShim.js')}}"></script>
<script src="{{asset('vendor/classList.js')}}"></script>
<script src="{{asset('vendor/requestAnimationFrame.js')}}" ></script>
<script src="{{asset('vendor/screenfull.min.js')}}" ></script>
<script src="{{asset('vendor/bowser.min.js')}}" ></script>
<script src="{{asset('vendor/marzipano.js')}}" ></script>

<script src="{{asset('js/data.js')}}"></script>
<script src="{{asset('js/virtual-index.js')}}"></script>

</body>
</html>
