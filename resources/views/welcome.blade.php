@extends('layouts.app')

@section('title','Welcome')

@section('content')

    <body> 
        <div style="background-image: url(https://static.vecteezy.com/system/resources/previews/004/511/333/large_2x/abstract-technological-background-business-futuristic-innovation-background-vector.jpg);
        width: 100%;
        height: 202px;
        background-size:cover;
        background-position:center;"
        class="d-flex justify-content-around">
            <div style="float: left; font-size: 30px; margin-top: 3%; ">
                <p style="font-family: 'Times New Roman'; text-align: center;">Sistema de Gestion de Aulas</p>
                <p style="font-family: 'Times New Roman'; text-align: center;">UMSS</p>
            </div>
            <div style="float: left;  margin-top: 4%; ">
                <div style="float: left; padding-right: 80px">
                    <img src="{{asset('images/logo umss.png')}}" width="65" height="92"  alt="" >
                </div>
                <div style="float: left; ">
                    <img src="{{asset('images/logo fcyt.png')}}" width="70" height="92"  alt="">
                </div>
            </div>
            
        </div>
        <div class="d-flex justify-content-around " style="display:flex; align-self: auto;">
                <div style="float: left; font-size: 30px; text-align: center; margin-top: 5%; ">
                    <p style="font-family: 'Times New Roman';">Realiza tu reserva de aula <br>cuando quieras y donde quieras</p>
                    
                    <img src="{{asset('images/egenius2.png')}}" width="300" height="200"  alt="" >
                </div>
                <div style="float: left; margin-top: 6%;">
                    <img src="{{asset('images/imagen1.jpg')}}" width="500" height="300"  alt="">
                </div>
        </div>
        
    </body>
@endsection