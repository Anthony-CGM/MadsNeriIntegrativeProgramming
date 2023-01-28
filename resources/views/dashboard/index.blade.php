@extends('layouts.base')
@extends('layouts.app')
@extends('layouts.master')
@section('body')

<link href="{{asset('css/dashboard.css')}}" rel="stylesheet"> 

<div class="container" style="text-align: center">
<div class="chart-container">
<h4>Active Users</h4>
<div class="card">
    <canvas id="titleChart"></canvas>
</div>
</div>
</div>

<div class="container" style="text-align: center">
    <div class="chart-container">
        <div class="card-body">
            <h5 class="card-title">Supplies Restock Data</h5>
        </div>
    <canvas id="suppliesChart"></canvas>
        
    </div>
</div>

@endsection